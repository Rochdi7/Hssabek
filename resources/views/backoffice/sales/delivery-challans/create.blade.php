<?php $page = 'delivery-challans'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.sales.delivery-challans.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>Bons de livraison</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Nouveau bon de livraison</h5>

                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <form action="{{ route('bo.sales.delivery-challans.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">Détails du bon</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Client <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('customer_id') is-invalid @enderror"
                                                    name="customer_id">
                                                    <option value="">— Sélectionner —</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}"
                                                            {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                                            {{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('customer_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Facture liée</label>
                                                <select class="form-select @error('invoice_id') is-invalid @enderror"
                                                    name="invoice_id">
                                                    <option value="">— Sélectionner —</option>
                                                    @foreach ($invoices as $invoice)
                                                        <option value="{{ $invoice->id }}"
                                                            {{ old('invoice_id') == $invoice->id ? 'selected' : '' }}>
                                                            {{ $invoice->number }}</option>
                                                    @endforeach
                                                </select>
                                                @error('invoice_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date du bon <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="date"
                                                    class="form-control @error('challan_date') is-invalid @enderror"
                                                    name="challan_date" value="{{ old('challan_date', date('Y-m-d')) }}">
                                                @error('challan_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Référence</label>
                                                <div class="mb-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode" id="ref_mode_manual" value="manual" checked
                                                            onchange="document.getElementById('reference_number').readOnly=false; document.getElementById('reference_number').value=''; document.getElementById('reference_number').focus();">
                                                        <label class="form-check-label" for="ref_mode_manual">Saisie manuelle</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode" id="ref_mode_auto" value="auto"
                                                            onchange="var d=new Date(); document.getElementById('reference_number').value='REF-'+d.getFullYear()+(''+(d.getMonth()+1)).padStart(2,'0')+(''+(d.getDate())).padStart(2,'0')+'-'+Math.floor(1000+Math.random()*9000); document.getElementById('reference_number').readOnly=true;">
                                                        <label class="form-check-label" for="ref_mode_auto">Générer automatiquement</label>
                                                    </div>
                                                </div>
                                                <input type="text" id="reference_number"
                                                    class="form-control @error('reference_number') is-invalid @enderror"
                                                    name="reference_number" value="{{ old('reference_number') }}">
                                                @error('reference_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Notes</label>
                                                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" rows="3">{{ old('notes') }}</textarea>
                                                @error('notes')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Articles --}}
                                    <div class="border-top pt-3 mb-3">
                                        <h6 class="mb-3">Articles</h6>
                                        <div class="table-responsive rounded border-bottom-0 border mb-3">
                                            <table class="table table-nowrap add-table m-0" id="items-table">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Produit</th>
                                                        <th>Description</th>
                                                        <th>Quantité</th>
                                                        <th>Prix unitaire</th>
                                                        <th>Taxe (%)</th>
                                                        <th>Montant</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="add-tbody">
                                                    <tr class="item-row">
                                                        <td>
                                                            <select name="items[0][product_id]" class="form-select" style="min-width: 150px;">
                                                                <option value="">— Produit —</option>
                                                                @foreach ($products as $product)
                                                                    <option value="{{ $product->id }}" {{ old('items.0.product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><input type="text" name="items[0][label]" class="form-control" value="{{ old('items.0.label') }}" placeholder="Description" style="min-width: 150px;"></td>
                                                        <td><input type="number" name="items[0][quantity]" class="form-control" value="{{ old('items.0.quantity', 1) }}" min="0.001" step="0.001" style="min-width: 80px;" required></td>
                                                        <td><input type="number" name="items[0][unit_price]" class="form-control" value="{{ old('items.0.unit_price', 0) }}" min="0" step="0.01" style="min-width: 100px;"></td>
                                                        <td><input type="number" name="items[0][tax_rate]" class="form-control" value="{{ old('items.0.tax_rate', 0) }}" min="0" max="100" step="0.01" style="min-width: 80px;"></td>
                                                        <td><input type="text" class="form-control item-total" value="0.00" readonly style="min-width: 90px;"></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" id="add-item-btn"><i class="isax isax-add-circle5 text-primary me-1"></i>Ajouter un article</a>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.sales.delivery-challans.index') }}"
                                            class="btn btn-outline-white">Annuler</a>
                                        <button type="submit" class="btn btn-primary">Enregistrer le bon</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let itemIndex = 1;
        const tbody = document.querySelector('#items-table .add-tbody');
        const addBtn = document.getElementById('add-item-btn');
        const productOptions = document.querySelector('[name="items[0][product_id]"]').innerHTML;

        addBtn.addEventListener('click', function() {
            const row = document.createElement('tr');
            row.className = 'item-row';
            row.innerHTML = `
                <td><select name="items[${itemIndex}][product_id]" class="form-select" style="min-width: 150px;">${productOptions}</select></td>
                <td><input type="text" name="items[${itemIndex}][label]" class="form-control" placeholder="Description" style="min-width: 150px;"></td>
                <td><input type="number" name="items[${itemIndex}][quantity]" class="form-control" value="1" min="0.001" step="0.001" style="min-width: 80px;" required></td>
                <td><input type="number" name="items[${itemIndex}][unit_price]" class="form-control" value="0" min="0" step="0.01" style="min-width: 100px;"></td>
                <td><input type="number" name="items[${itemIndex}][tax_rate]" class="form-control" value="0" min="0" max="100" step="0.01" style="min-width: 80px;"></td>
                <td><input type="text" class="form-control item-total" value="0.00" readonly style="min-width: 90px;"></td>
                <td><a href="javascript:void(0);" class="text-danger remove-item"><i class="isax isax-close-circle"></i></a></td>
            `;
            tbody.appendChild(row);
            itemIndex++;
        });

        tbody.addEventListener('click', function(e) {
            const removeBtn = e.target.closest('.remove-item');
            if (removeBtn) {
                removeBtn.closest('tr').remove();
            }
        });
    });
</script>
@endpush
