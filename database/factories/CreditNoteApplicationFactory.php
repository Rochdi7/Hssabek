<?php

namespace Database\Factories;

use App\Models\Sales\CreditNoteApplication;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreditNoteApplicationFactory extends Factory
{
    protected $model = CreditNoteApplication::class;

    public function definition(): array
    {
        return [
            'credit_note_id' => CreditNoteFactory::new(),
            'invoice_id' => InvoiceFactory::new(),
            'amount_applied' => fake()->randomFloat(2, 50, 2000),
            'applied_at' => now(),
        ];
    }
}
