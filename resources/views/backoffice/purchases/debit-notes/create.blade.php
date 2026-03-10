<?php $page = 'debit-notes'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.purchases.debit-notes.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>Notes de débit</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Nouvelle note de débit</h5>
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
                                <form action="{{ route('bo.purchases.debit-notes.store') }}" method="POST">
                                    @csrf
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Fournisseur <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('supplier_id') is-invalid @enderror"
                                                    name="supplier_id">
                                                    <option value="">— Sélectionner —</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                                            {{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('supplier_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Facture fournisseur</label>
                                                <select class="form-select @error('vendor_bill_id') is-invalid @enderror"
                                                    name="vendor_bill_id">
                                                    <option value="">— Sélectionner —</option>
                                                    @foreach ($vendorBills as $bill)
                                                        <option value="{{ $bill->id }}"
                                                            {{ old('vendor_bill_id') == $bill->id ? 'selected' : '' }}>
                                                            {{ $bill->number ?? $bill->id }}</option>
                                                    @endforeach
                                                </select>
                                                @error('vendor_bill_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="date"
                                                    class="form-control @error('debit_note_date') is-invalid @enderror"
                                                    name="debit_note_date"
                                                    value="{{ old('debit_note_date', date('Y-m-d')) }}">
                                                @error('debit_note_date')
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
                                                            onchange="document.getElementById('reference_number').value='{{ $nextReference }}'; document.getElementById('reference_number').readOnly=true;">
                                                        <label class="form-check-label" for="ref_mode_auto">Générer automatiquement</label>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('reference_number') is-invalid @enderror"
                                                    name="reference_number" id="reference_number" value="{{ old('reference_number') }}">
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
                                                        <th>Libellé</th>
                                                        <th>Quantité</th>
                                                        <th>Prix unitaire</th>
                                                        <th>Taxe (%)</th>
                                                        <th>Montant</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="add-tbody">
                                                    <tr class="item-row">
                                                        <td><input type="text" name="items[0][label]" class="form-control" value="{{ old('items.0.label') }}" placeholder="Libellé" required></td>
                                                        <td><input type="number" name="items[0][quantity]" class="form-control" value="{{ old('items.0.quantity', 1) }}" min="0.001" step="0.001" style="min-width: 80px;" required></td>
                                                        <td><input type="number" name="items[0][unit_price]" class="form-control" value="{{ old('items.0.unit_price', 0) }}" min="0" step="0.01" style="min-width: 100px;" required></td>
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
                                        <a href="{{ route('bo.purchases.debit-notes.index') }}"
                                            class="btn btn-outline-white">Annuler</a>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
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

        addBtn.addEventListener('click', function() {
            const row = document.createElement('tr');
            row.className = 'item-row';
            row.innerHTML = `
                <td><input type="text" name="items[${itemIndex}][label]" class="form-control" placeholder="Libellé" required></td>
                <td><input type="number" name="items[${itemIndex}][quantity]" class="form-control" value="1" min="0.001" step="0.001" style="min-width: 80px;" required></td>
                <td><input type="number" name="items[${itemIndex}][unit_price]" class="form-control" value="0" min="0" step="0.01" style="min-width: 100px;" required></td>
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
