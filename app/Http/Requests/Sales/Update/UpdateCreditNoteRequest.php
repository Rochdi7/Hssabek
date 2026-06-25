<?php

namespace App\Http\Requests\Sales\Update;

use App\Models\Sales\CreditNote;
use App\Models\Sales\Invoice;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCreditNoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $tenantId = TenantContext::id();

        return [
            'customer_id' => ['sometimes', 'required', 'uuid', Rule::exists('customers', 'id')->where('tenant_id', $tenantId)],
            'invoice_id' => ['nullable', 'uuid', Rule::exists('invoices', 'id')->where('tenant_id', $tenantId)],
            'issue_date' => ['sometimes', 'required', 'date'],
            'enable_tax' => ['nullable', 'boolean'],
            'reference_number' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string', 'max:2000'],

            'items' => ['sometimes', 'required', 'array', 'min:1', function ($_attribute, $value, $fail) {
                $invoiceId = $this->input('invoice_id');
                if (!$invoiceId || !is_array($value)) return;

                $invoice = Invoice::find($invoiceId);
                if (!$invoice) return;

                // For updates, exclude the current credit note's own application from amount_due
                $currentCreditNote = $this->route('creditNote');
                $ownApplicationAmount = 0;
                if ($currentCreditNote instanceof CreditNote) {
                    $ownApplicationAmount = (float) $currentCreditNote->applications()
                        ->where('invoice_id', $invoice->id)
                        ->sum('amount_applied');
                }

                $subtotal = 0;
                $taxTotal = 0;
                $enableTax = (bool) $this->input('enable_tax', true);

                foreach ($value as $item) {
                    $qty   = (float) ($item['quantity'] ?? 1);
                    $price = (float) ($item['unit_price'] ?? 0);
                    $rate  = $enableTax ? (float) ($item['tax_rate'] ?? 0) : 0;
                    $line  = $qty * $price;
                    $subtotal += $line;
                    $taxTotal += $line * $rate / 100;
                }

                $creditTotal = round($subtotal + $taxTotal - (float) $this->input('discount', 0), 2);
                // amount_due after restoring own prior application
                $effectiveDue = (float) $invoice->amount_due + $ownApplicationAmount;

                if ($creditTotal > $effectiveDue + 0.01) {
                    $fail(__('Le montant de l\'avoir (:credit) dépasse le reste à payer de la facture (:due).', [
                        'credit' => number_format($creditTotal, 2, ',', ' '),
                        'due'    => number_format($effectiveDue, 2, ',', ' '),
                    ]));
                }
            }],
            'items.*.label'           => ['required_with:items', 'string', 'max:255'],
            'items.*.description'     => ['nullable', 'string', 'max:1000'],
            'items.*.quantity'        => ['required_with:items', 'numeric', 'min:0.001'],
            'items.*.unit_price'      => ['required_with:items', 'numeric', 'min:0'],
            'items.*.tax_rate'        => ['nullable', 'numeric', 'min:0', 'max:100'],
            'items.*.product_id'      => ['nullable', 'uuid', Rule::exists('products', 'id')->where('tenant_id', $tenantId)],
            'items.*.invoice_item_id' => ['nullable', 'uuid', Rule::exists('invoice_items', 'id')],
        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.exists' => __('Le client sélectionné est invalide.'),
            'invoice_id.exists' => __('La facture sélectionnée est invalide.'),
            'items.min' => __('Au moins un article est obligatoire.'),
            'items.*.label.required_with' => __('Le libellé de l\'article est obligatoire.'),
            'items.*.quantity.required_with' => __('La quantité est obligatoire.'),
            'items.*.unit_price.required_with' => __('Le prix unitaire est obligatoire.'),
        ];
    }
}
