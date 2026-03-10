<?php $page = 'money-transfers'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.finance.money-transfers.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>Transferts entre comptes</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Modifier le transfert</h5>

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

                                <form action="{{ route('bo.finance.money-transfers.update', $moneyTransfer) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">Détails du transfert</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Compte source <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select
                                                    class="form-select @error('from_bank_account_id') is-invalid @enderror"
                                                    name="from_bank_account_id">
                                                    <option value="">— Sélectionner le compte source —</option>
                                                    @foreach ($bankAccounts as $account)
                                                        <option value="{{ $account->id }}"
                                                            {{ old('from_bank_account_id', $moneyTransfer->from_bank_account_id) == $account->id ? 'selected' : '' }}>
                                                            {{ $account->bank_name }} — {{ $account->account_number }}
                                                            ({{ number_format($account->current_balance, 2, ',', ' ') }}
                                                            {{ $account->currency }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('from_bank_account_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Compte destination <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select
                                                    class="form-select @error('to_bank_account_id') is-invalid @enderror"
                                                    name="to_bank_account_id">
                                                    <option value="">— Sélectionner le compte destination —</option>
                                                    @foreach ($bankAccounts as $account)
                                                        <option value="{{ $account->id }}"
                                                            {{ old('to_bank_account_id', $moneyTransfer->to_bank_account_id) == $account->id ? 'selected' : '' }}>
                                                            {{ $account->bank_name }} — {{ $account->account_number }}
                                                            ({{ number_format($account->current_balance, 2, ',', ' ') }}
                                                            {{ $account->currency }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('to_bank_account_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Montant <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="number" step="0.01" min="0.01"
                                                    class="form-control @error('amount') is-invalid @enderror"
                                                    name="amount" value="{{ old('amount', $moneyTransfer->amount) }}">
                                                @error('amount')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date du transfert <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="date"
                                                    class="form-control @error('transfer_date') is-invalid @enderror"
                                                    name="transfer_date"
                                                    value="{{ old('transfer_date', $moneyTransfer->transfer_date?->format('Y-m-d') ?? $moneyTransfer->transfer_date) }}">
                                                @error('transfer_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Numéro de référence</label>
                                                <div class="mb-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode" id="ref_mode_manual" value="manual" checked
                                                            onchange="document.getElementById('reference_number').readOnly=false; document.getElementById('reference_number').focus();">
                                                        <label class="form-check-label" for="ref_mode_manual">Saisie manuelle</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode" id="ref_mode_auto" value="auto"
                                                            onchange="document.getElementById('reference_number').value='{{ $nextReference }}'; document.getElementById('reference_number').readOnly=true;">
                                                        <label class="form-check-label" for="ref_mode_auto">Générer automatiquement</label>
                                                    </div>
                                                </div>
                                                <input type="text" id="reference_number"
                                                    class="form-control @error('reference_number') is-invalid @enderror"
                                                    name="reference_number"
                                                    value="{{ old('reference_number', $moneyTransfer->reference_number) }}"
                                                    placeholder="Ex: TRA-00001">
                                                @error('reference_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Notes</label>
                                                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" rows="3">{{ old('notes', $moneyTransfer->notes) }}</textarea>
                                                @error('notes')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.finance.money-transfers.index') }}"
                                            class="btn btn-outline-white">Annuler</a>
                                        <button type="submit" class="btn btn-primary">Enregistrer les
                                            modifications</button>
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
