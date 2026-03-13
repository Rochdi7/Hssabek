<?php $page = 'bank-accounts'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                Start Page Content
            ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6><a href="{{ route('bo.finance.bank-accounts.index') }}"><i class="isax isax-arrow-left fs-16 me-2"></i>{{ __('Comptes bancaires') }}</a></h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <a href="{{ route('bo.finance.bank-accounts.edit', $bankAccount) }}" class="btn btn-primary d-flex align-items-center fs-14 fw-semibold">
                        <i class="isax isax-edit-2 me-1"></i>{{ __('Modifier') }}
                    </a>
                </div>
            </div>
            <!-- End Page Header -->

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- start row -->
            <div class="row">
                <div class="col-xl-8">

                    <!-- Start Account Info -->
                    <div class="card bg-light customer-details-info position-relative overflow-hidden">
                        <div class="card-body position-relative z-1">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-3">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <div class="avatar avatar-xxl rounded-circle flex-shrink-0">
                                        <span class="avatar avatar-xxl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center border border-white border-2 fs-24 fw-bold">
                                            <i class="isax isax-bank"></i>
                                        </span>
                                    </div>
                                    <div class="">
                                        <p class="text-primary fs-14 fw-medium mb-1">
                                            {{ $bankAccount->account_number }}
                                        </p>
                                        <h6 class="mb-2"> {{ $bankAccount->account_holder_name }}
                                            @if($bankAccount->is_active)
                                                <span class="badge badge-soft-success ms-1">{{ __('Actif') }}</span>
                                            @else
                                                <span class="badge badge-soft-danger ms-1">{{ __('Inactif') }}</span>
                                            @endif
                                        </h6>
                                        <p class="fs-14 fw-regular"><i class="isax isax-building fs-14 me-1 text-gray-9"></i>
                                            {{ $bankAccount->bank_name }}
                                            @if($bankAccount->branch) — {{ $bankAccount->branch }}@endif
                                        </p>
                                    </div>
                                </div>
                                <a href="{{ route('bo.finance.bank-accounts.edit', $bankAccount) }}"
                                    class="btn btn-outline-white border border-1 border-grey border-sm bg-white"><i
                                        class="isax isax-edit-2 fs-13 fw-semibold text-dark me-1"></i> {{ __('Modifier') }} </a>
                            </div>

                            <div class="card border-0 shadow shadow-none mb-0 bg-white">
                                <div class="card-body border-0 shadow shadow-none">
                                    <ul
                                        class="d-flex justify-content-between align-items-center flex-wrap gap-2 p-0 m-0 list-unstyled">
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-money-recive fs-14 me-2"></i>{{ __('Solde actuel') }}</h6>
                                            <p class="fw-bold"> {{ number_format($bankAccount->current_balance, 2, ',', ' ') }} {{ $bankAccount->currency }} </p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-wallet-2 fs-14 me-2"></i>{{ __("Solde d'ouverture") }}</h6>
                                            <p> {{ number_format($bankAccount->opening_balance, 2, ',', ' ') }} {{ $bankAccount->currency }} </p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-calendar-1 fs-14 me-2"></i>{{ __('Créé le') }}</h6>
                                            <p> {{ $bankAccount->created_at->format('d/m/Y') }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- end card body -->
                        <img src="{{ URL::asset('build/img/icons/elements-01.svg') }}" alt="elements-01"
                            class="img-fluid customer-details-bg">
                    </div><!-- end card -->
                    <!-- End Account Info -->

                    <!-- Start Recent Expenses -->
                    <div class="card table-info">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Dépenses récentes') }}</h6>
                            <div class="table-responsive table-nowrap">
                                <table class="table border m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __('N°') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __('Montant') }}</th>
                                            <th>{{ __('Statut') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($bankAccount->expenses as $expense)
                                            <tr>
                                                <td><span class="fw-medium">{{ $expense->expense_number }}</span></td>
                                                <td>{{ \Carbon\Carbon::parse($expense->expense_date)->format('d/m/Y') }}</td>
                                                <td>{{ \Illuminate\Support\Str::limit($expense->description, 40) ?? '—' }}</td>
                                                <td class="fw-semibold text-danger">-{{ number_format($expense->amount, 2, ',', ' ') }}</td>
                                                <td>
                                                    @switch($expense->payment_status)
                                                        @case('paid')
                                                            <span class="badge badge-soft-success">{{ __('Payée') }}</span>
                                                            @break
                                                        @case('partial')
                                                            <span class="badge badge-soft-warning">{{ __('Partielle') }}</span>
                                                            @break
                                                        @default
                                                            <span class="badge badge-soft-danger">{{ __('Impayée') }}</span>
                                                    @endswitch
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center py-3">
                                                    <p class="text-muted mb-0">{{ __('Aucune dépense récente.') }}</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Recent Expenses -->

                    <!-- Start Recent Incomes -->
                    <div class="card table-info">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Revenus récents') }}</h6>
                            <div class="table-responsive table-nowrap">
                                <table class="table border m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __('N°') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __('Montant') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($bankAccount->incomes as $income)
                                            <tr>
                                                <td><span class="fw-medium">{{ $income->income_number }}</span></td>
                                                <td>{{ \Carbon\Carbon::parse($income->income_date)->format('d/m/Y') }}</td>
                                                <td>{{ \Illuminate\Support\Str::limit($income->description, 40) ?? '—' }}</td>
                                                <td class="fw-semibold text-success">+{{ number_format($income->amount, 2, ',', ' ') }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-3">
                                                    <p class="text-muted mb-0">{{ __('Aucun revenu récent.') }}</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Recent Incomes -->

                </div><!-- end col -->
                <div class="col-xl-4">
                    <!-- Start Info -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Informations') }}</h6>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Type de compte') }}</span>
                                    <span class="fw-semibold">
                                        @switch($bankAccount->account_type)
                                            @case('current') {{ __('Courant') }} @break
                                            @case('savings') {{ __('Épargne') }} @break
                                            @case('business') {{ __('Professionnel') }} @break
                                            @default {{ __('Autre') }}
                                        @endswitch
                                    </span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Devise') }}</span>
                                    <span class="fw-semibold">{{ $bankAccount->currency }}</span>
                                </li>
                                @if($bankAccount->ifsc_code)
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Code IFSC / SWIFT') }}</span>
                                    <span class="fw-semibold">{{ $bankAccount->ifsc_code }}</span>
                                </li>
                                @endif
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Créé le') }}</span>
                                    <span class="fw-semibold">{{ $bankAccount->created_at->format('d/m/Y') }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <span class="text-muted">{{ __('Dernière modification') }}</span>
                                    <span class="fw-semibold">{{ $bankAccount->updated_at->format('d/m/Y') }}</span>
                                </li>
                            </ul>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- End Info -->

                    @if($bankAccount->notes)
                    <!-- Start Notes -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Notes') }}</h6>
                            <p class="mb-0">{{ $bankAccount->notes }}</p>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- End Notes -->
                    @endif
                </div>
            </div>
            <!-- end row -->

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
                End Page Content
            ========================= -->
@endsection
