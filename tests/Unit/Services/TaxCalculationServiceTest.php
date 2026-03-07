<?php

namespace Tests\Unit\Services;

use App\Services\Sales\TaxCalculationService;
use Tests\TestCase;

class TaxCalculationServiceTest extends TestCase
{
    private TaxCalculationService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new TaxCalculationService();
    }

    public function test_calculate_line_item_with_no_discount(): void
    {
        $result = $this->service->calculateLineItem([
            'quantity' => 2,
            'unit_price' => 100,
            'discount_type' => 'none',
            'discount_value' => 0,
            'tax_rate' => 20,
        ]);

        $this->assertEquals(200.00, $result['line_subtotal']);
        $this->assertEquals(40.00, $result['line_tax']);
        $this->assertEquals(240.00, $result['line_total']);
    }

    public function test_calculate_line_item_with_percentage_discount(): void
    {
        $result = $this->service->calculateLineItem([
            'quantity' => 1,
            'unit_price' => 200,
            'discount_type' => 'percentage',
            'discount_value' => 10,
            'tax_rate' => 20,
        ]);

        // 200 - 10% = 180
        $this->assertEquals(180.00, $result['line_subtotal']);
        $this->assertEquals(36.00, $result['line_tax']); // 180 * 20%
        $this->assertEquals(216.00, $result['line_total']);
    }

    public function test_calculate_line_item_with_fixed_discount(): void
    {
        $result = $this->service->calculateLineItem([
            'quantity' => 1,
            'unit_price' => 500,
            'discount_type' => 'fixed',
            'discount_value' => 50,
            'tax_rate' => 20,
        ]);

        // 500 - 50 = 450
        $this->assertEquals(450.00, $result['line_subtotal']);
        $this->assertEquals(90.00, $result['line_tax']); // 450 * 20%
        $this->assertEquals(540.00, $result['line_total']);
    }

    public function test_calculate_document_with_multiple_items(): void
    {
        $items = [
            ['quantity' => 2, 'unit_price' => 100, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 20, 'label' => 'Item A'],
            ['quantity' => 1, 'unit_price' => 300, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 20, 'label' => 'Item B'],
        ];

        $result = $this->service->calculateDocument($items);

        // Item A: 200 + 40 tax = 240
        // Item B: 300 + 60 tax = 360
        $this->assertEquals(500.00, $result['subtotal']);
        $this->assertEquals(0.00, $result['discount_total']);
        $this->assertEquals(100.00, $result['tax_total']);
        $this->assertEquals(600.00, $result['total']);
        $this->assertCount(2, $result['calculated_items']);
    }

    public function test_calculate_document_with_charges(): void
    {
        $items = [
            ['quantity' => 1, 'unit_price' => 100, 'discount_type' => 'none', 'discount_value' => 0, 'tax_rate' => 20, 'label' => 'Item'],
        ];
        $charges = [
            ['label' => 'Shipping', 'amount' => 50, 'tax_rate' => 20],
        ];

        $result = $this->service->calculateDocument($items, $charges);

        // Item: 100 subtotal, 20 tax
        // Charge: 50 + 10 tax
        $this->assertEquals(100.00, $result['subtotal']);
        $this->assertEquals(30.00, $result['tax_total']); // 20 item tax + 10 charge tax
        $this->assertEquals(180.00, $result['total']); // 100 + 30 tax + 50 charge
        $this->assertCount(1, $result['calculated_charges']);
    }

    public function test_zero_tax_rate_produces_zero_tax(): void
    {
        $result = $this->service->calculateLineItem([
            'quantity' => 5,
            'unit_price' => 100,
            'discount_type' => 'none',
            'discount_value' => 0,
            'tax_rate' => 0,
        ]);

        $this->assertEquals(500.00, $result['line_subtotal']);
        $this->assertEquals(0.00, $result['line_tax']);
        $this->assertEquals(500.00, $result['line_total']);
    }

    public function test_rounding_to_two_decimals(): void
    {
        $result = $this->service->calculateLineItem([
            'quantity' => 3,
            'unit_price' => 33.33,
            'discount_type' => 'none',
            'discount_value' => 0,
            'tax_rate' => 20,
        ]);

        // 3 * 33.33 = 99.99
        $this->assertEquals(99.99, $result['line_subtotal']);
        $this->assertEquals(20.00, $result['line_tax']); // 99.99 * 0.2 = 19.998 → 20.00
        $this->assertEquals(119.99, $result['line_total']);
    }
}
