<?php

namespace App\Http\Requests\Sales\Store;

use App\Models\Sales\Invoice;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCreditNoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $tenantId = TenantContext::id();

        return [
            'customer_id' => ['required', 'uuid', Rule::exists('customers', 'id')->where('tenant_id', $tenantId)],
            'invoice_id' => ['nullable', 'uuid', Rule::exists('invoices', 'id')->where('tenant_id', $tenantId)],
            'issue_date' => ['required', 'date'],
            'enable_tax' => ['nullable', 'boolean'],
            'reference_number' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string', 'max:2000'],

            // Over-credit guard: credit note total must not exceed invoice amount_due
            'items' => ['required', 'array', 'min:1', function ($_attribute, $value, $fail) {
                $invoiceId = $this->input('invoice_id');
                if (!$invoiceId) return;

                $invoice = Invoice::find($invoiceId);
                if (!$invoice) return;

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
                $amountDue   = (float) $invoice->amount_due;

                if ($creditTotal > $amountDue + 0.01) {
                    $fail(__('Le montant de l\'avoir (:credit) dépasse le reste à payer de la facture (:due).', [
                        'credit' => number_format($creditTotal, 2, ',', ' '),
                        'due'    => number_format($amountDue, 2, ',', ' '),
                    ]));
                }
            }],
            'items.*.label'           => ['required', 'string', 'max:255'],
            'items.*.description'     => ['nullable', 'string', 'max:1000'],
            'items.*.quantity'        => ['required', 'numeric', 'min:0.001'],
            'items.*.unit_price'      => ['required', 'numeric', 'min:0'],
            'items.*.tax_rate'        => ['nullable', 'numeric', 'min:0', 'max:100'],
            'items.*.product_id'      => ['nullable', 'uuid', Rule::exists('products', 'id')->where('tenant_id', $tenantId)],
            'items.*.invoice_item_id' => ['nullable', 'uuid', Rule::exists('invoice_items', 'id')],
        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.required' => __('Le client est obligatoire.'),
            'customer_id.exists' => __('Le client sélectionné est invalide.'),
            'invoice_id.exists' => __('La facture sélectionnée est invalide.'),
            'issue_date.required' => __('La date d\'émission est obligatoire.'),
            'items.required' => __('Au moins un article est obligatoire.'),
            'items.min' => __('Au moins un article est obligatoire.'),
            'items.*.label.required' => __('Le libellé de l\'article est obligatoire.'),
            'items.*.quantity.required' => __('La quantité est obligatoire.'),
            'items.*.unit_price.required' => __('Le prix unitaire est obligatoire.'),
        ];
    }
}
