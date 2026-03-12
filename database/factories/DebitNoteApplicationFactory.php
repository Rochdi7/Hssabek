<?php

namespace Database\Factories;

use App\Models\Purchases\DebitNoteApplication;
use Illuminate\Database\Eloquent\Factories\Factory;

class DebitNoteApplicationFactory extends Factory
{
    protected $model = DebitNoteApplication::class;

    public function definition(): array
    {
        return [
            'debit_note_id' => DebitNoteFactory::new(),
            'vendor_bill_id' => VendorBillFactory::new(),
            'amount_applied' => fake()->randomFloat(2, 50, 2000),
        ];
    }
}
