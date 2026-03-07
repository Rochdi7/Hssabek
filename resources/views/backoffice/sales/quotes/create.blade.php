<?php $page = 'add-quotation'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                    Start Page Content
                ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- Start row  -->
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.sales.quotes.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>Devis</a></h6>
                        </div>

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

                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-3">Détails du devis</h6>
                                <form action="{{ route('bo.sales.quotes.store') }}" method="POST">
                                    @csrf
                                    <div class="border-bottom mb-3 pb-1">
                                        <div class="row justify-content-between">
                                            <div class="col-xl-5 col-lg-7">
                                                <div class="row gx-3">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">N° Devis</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Généré automatiquement" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
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
                                                            <input type="text" name="reference_number" id="reference_number"
                                                                class="form-control @error('reference_number') is-invalid @enderror"
                                                                value="{{ old('reference_number') }}"
                                                                placeholder="Référence externe">
                                                            @error('reference_number')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Date d'émission <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" name="issue_date"
                                                                class="form-control @error('issue_date') is-invalid @enderror"
                                                                value="{{ old('issue_date', date('Y-m-d')) }}">
                                                            @error('issue_date')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Date d'expiration</label>
                                                            <input type="date" name="expiry_date"
                                                                class="form-control @error('expiry_date') is-invalid @enderror"
                                                                value="{{ old('expiry_date') }}">
                                                            @error('expiry_date')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-5">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Devise</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}"
                                                                readonly disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between border rounded p-2 mb-3">
                                                            <div class="form-check form-switch me-4">
                                                                <input class="form-check-input" type="checkbox"
                                                                    role="switch" name="enable_tax" id="enable_tax"
                                                                    value="1"
                                                                    {{ old('enable_tax', '1') == '1' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="enable_tax">Activer la
                                                                    taxe</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-bottom mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card shadow-none">
                                                    <div class="card-body">
                                                        <h6 class="mb-3">Client</h6>
                                                        <div>
                                                            <label class="form-label">Client <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="customer_id"
                                                                class="select @error('customer_id') is-invalid @enderror">
                                                                <option value="">Sélectionner un client</option>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-bottom mb-3 pb-3">
                                        <h6 class="mb-3">Articles</h6>
                                        <div class="table-responsive rounded border-bottom-0 border mb-3">
                                            <table class="table table-nowrap add-table m-0" id="items-table">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Libellé</th>
                                                        <th>Quantité</th>
                                                        <th>Unité</th>
                                                        <th>Prix unitaire</th>
                                                        <th>Remise</th>
                                                        <th>Taxe (%)</th>
                                                        <th>Montant</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="add-tbody">
                                                    <tr class="item-row">
                                                        <td><input type="text" name="items[0][label]"
                                                                class="form-control" value="{{ old('items.0.label') }}"
                                                                placeholder="Nom de l'article" required></td>
                                                        <td><input type="number" name="items[0][quantity]"
                                                                class="form-control"
                                                                value="{{ old('items.0.quantity', 1) }}" min="0.001"
                                                                step="0.001" style="min-width: 80px;" required></td>
                                                        <td>
                                                            <select name="items[0][unit_id]" class="form-select"
                                                                style="min-width: 90px;">
                                                                <option value="">—</option>
                                                                @foreach ($units as $unit)
                                                                    <option value="{{ $unit->id }}">
                                                                        {{ $unit->short_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><input type="number" name="items[0][unit_price]"
                                                                class="form-control"
                                                                value="{{ old('items.0.unit_price', 0) }}" min="0"
                                                                step="0.01" style="min-width: 100px;" required></td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-1"
                                                                style="min-width: 130px;">
                                                                <select name="items[0][discount_type]" class="form-select"
                                                                    style="width: 60px;">
                                                                    <option value="none">—</option>
                                                                    <option value="percentage">%</option>
                                                                    <option value="fixed">Fixe</option>
                                                                </select>
                                                                <input type="number" name="items[0][discount_value]"
                                                                    class="form-control"
                                                                    value="{{ old('items.0.discount_value', 0) }}"
                                                                    min="0" step="0.01" style="width: 70px;">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <select name="items[0][tax_group_id]" class="form-select"
                                                                style="min-width: 100px;">
                                                                <option value="">0%</option>
                                                                @foreach ($taxGroups as $tg)
                                                                    <option value="{{ $tg->id }}">
                                                                        {{ $tg->name }}
                                                                        ({{ $tg->rates->sum('rate') }}%)
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control" value="0.00"
                                                                readonly style="min-width: 90px;"></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center"
                                                id="add-item-btn"><i
                                                    class="isax isax-add-circle5 text-primary me-1"></i>Ajouter un
                                                article</a>
                                        </div>
                                    </div>

                                    <div class="border-bottom mb-3">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="mb-3">
                                                    <h6 class="mb-3">Informations supplémentaires</h6>
                                                    <div>
                                                        <ul class="nav nav-tabs nav-solid-primary tab-style-1 border-0 p-0 d-flex flex-wrap gap-3 mb-3"
                                                            role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <a class="nav-link active d-inline-flex align-items-center border fs-12 fw-semibold rounded-2"
                                                                    data-bs-toggle="tab" data-bs-target="#notes"
                                                                    href="javascript:void(0);"><i
                                                                        class="isax isax-document-text me-1"></i>Notes</a>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <a class="nav-link d-inline-flex align-items-center border fs-12 fw-semibold rounded-2"
                                                                    data-bs-toggle="tab" data-bs-target="#terms"
                                                                    href="javascript:void(0);"><i
                                                                        class="isax isax-document me-1"></i>Conditions</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active show" id="notes"
                                                                role="tabpanel">
                                                                <label class="form-label">Notes additionnelles</label>
                                                                <textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
                                                            </div>
                                                            <div class="tab-pane fade" id="terms" role="tabpanel">
                                                                <label class="form-label">Conditions générales</label>
                                                                <textarea name="terms" class="form-control" rows="3">{{ old('terms') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <h6 class="fs-14 fw-semibold">Sous-total</h6>
                                                        <h6 class="fs-14 fw-semibold">0,00</h6>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                                        <h6>Total</h6>
                                                        <h6>0,00</h6>
                                                    </div>
                                                    <p class="text-muted fs-12">Les totaux seront calculés automatiquement
                                                        côté serveur.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="{{ route('bo.sales.quotes.index') }}"
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
        <!-- End Content -->
    </div>

    <!-- ========================
                    End Page Content
                ========================= -->
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let itemIndex = 1;
            const tbody = document.querySelector('#items-table .add-tbody');
            const addBtn = document.getElementById('add-item-btn');

            addBtn.addEventListener('click', function() {
                const units = @json($units);
                const taxGroups = @json($taxGroups);

                let unitOptions = '<option value="">—</option>';
                units.forEach(u => {
                    unitOptions += `<option value="${u.id}">${u.short_name}</option>`;
                });

                let taxOptions = '<option value="">0%</option>';
                taxGroups.forEach(tg => {
                    const rate = tg.rates.reduce((s, r) => s + parseFloat(r.rate), 0);
                    taxOptions += `<option value="${tg.id}">${tg.name} (${rate}%)</option>`;
                });

                const row = document.createElement('tr');
                row.className = 'item-row';
                row.innerHTML = `
                <td><input type="text" name="items[${itemIndex}][label]" class="form-control" placeholder="Nom de l'article" required></td>
                <td><input type="number" name="items[${itemIndex}][quantity]" class="form-control" value="1" min="0.001" step="0.001" style="min-width: 80px;" required></td>
                <td><select name="items[${itemIndex}][unit_id]" class="form-select" style="min-width: 90px;">${unitOptions}</select></td>
                <td><input type="number" name="items[${itemIndex}][unit_price]" class="form-control" value="0" min="0" step="0.01" style="min-width: 100px;" required></td>
                <td>
                    <div class="d-flex align-items-center gap-1" style="min-width: 130px;">
                        <select name="items[${itemIndex}][discount_type]" class="form-select" style="width: 60px;">
                            <option value="none">—</option><option value="percentage">%</option><option value="fixed">Fixe</option>
                        </select>
                        <input type="number" name="items[${itemIndex}][discount_value]" class="form-control" value="0" min="0" step="0.01" style="width: 70px;">
                    </div>
                </td>
                <td><select name="items[${itemIndex}][tax_group_id]" class="form-select" style="min-width: 100px;">${taxOptions}</select></td>
                <td><input type="text" class="form-control" value="0.00" readonly style="min-width: 90px;"></td>
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
