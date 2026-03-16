<?php $page = 'subscriptions'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
               Start Page Content
              ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two">

            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Abonnements</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'subscriptions'])
                    <div>
                        <a href="javascript:void(0);" class="btn btn-primary d-flex align-items-center"
                            data-bs-toggle="modal" data-bs-target="#add_subscription"><i
                                class="isax isax-add-circle5 me-1"></i>Nouvel Abonnement</a>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <!-- start row -->
            <div class="row">
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div>
                                    <p class="fs-14 mb-1 text-truncate">Total Abonnements</p>
                                    <h4 class="fs-16 fw-semibold">{{ $totalSubscriptions }}</h4>
                                </div>
                            </div>
                            <div>
                                <span class="avatar avatar-lg bg-warning flex-shrink-0">
                                    <i class="isax isax-receipt-25 fs-32"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div>
                                    <p class="fs-14 mb-1 text-truncate">Abonnements Actifs</p>
                                    <h4 class="fs-16 fw-semibold">{{ $activeSubscriptions }}</h4>
                                </div>
                            </div>
                            <div>
                                <span class="avatar avatar-lg bg-success flex-shrink-0">
                                    <i class="isax isax-tick-circle5 fs-32"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div>
                                    <p class="fs-14 mb-1 text-truncate">En Période d'Essai</p>
                                    <h4 class="fs-16 fw-semibold">{{ $trialingSubscriptions }}</h4>
                                </div>
                            </div>
                            <div>
                                <span class="avatar avatar-lg bg-info flex-shrink-0">
                                    <i class="isax isax-timer-15 fs-32"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div>
                                    <p class="fs-14 mb-1 text-truncate">Annulés</p>
                                    <h4 class="fs-16 fw-semibold">{{ $cancelledSubscriptions }}</h4>
                                </div>
                            </div>
                            <div>
                                <span class="avatar avatar-lg bg-danger flex-shrink-0">
                                    <i class="isax isax-close-circle5 fs-32"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Start Table Search -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <a href="javascript:void(0);" class="btn-searchset"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        @include('backoffice.components.column-toggle', [
                            'columns' => ['Entreprise', 'Plan', 'Statut', 'Début', 'Fin', 'Prochaine facturation'],
                        ])
                        <div class="dropdown me-2">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center fw-medium"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-sort me-1"></i>Trier par : <span class="fw-normal ms-1">Plus
                                    récent</span>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">Plus récent</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">Plus ancien</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Table Search -->

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                </div>
            @endif

            <!-- Start Table List -->
            @include('backoffice.subscriptions.partials._table')
            <!-- End Table List -->

        </div>
        <!-- End Content -->

        @component('backoffice.components.footer')
        @endcomponent

    </div>

    <!-- Modals -->
    @include('backoffice.subscriptions.partials._modals')

    @if ($errors->any() && old('_modal') === 'add_subscription')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = new bootstrap.Modal(document.getElementById('add_subscription'));
                modal.show();
            });
        </script>
    @endif

    <!-- ========================
               End Page Content
              ========================= -->
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const plans = @json($plans->keyBy('id')->map(fn($p) => ['price' => $p->price, 'currency' => $p->currency, 'interval' => $p->interval]));

            // ========== Helper: parse dd-mm-yyyy to Date ==========
            function parseDateDMY(str) {
                if (!str) return null;
                const parts = str.split('-');
                if (parts.length !== 3) return null;
                return new Date(parseInt(parts[2]), parseInt(parts[0]) - 1, parseInt(parts[1]));
            }
            function formatDateDMY(d) {
                const dd = String(d.getDate()).padStart(2, '0');
                const mm = String(d.getMonth() + 1).padStart(2, '0');
                const yyyy = d.getFullYear();
                return dd + '-' + mm + '-' + yyyy;
            }

            // ========== Helper: compute end date based on interval ==========
            function computeEndDate(startStr, interval) {
                const d = parseDateDMY(startStr);
                if (!d) return '';
                if (interval === 'month') {
                    d.setMonth(d.getMonth() + 1);
                } else if (interval === 'year') {
                    d.setFullYear(d.getFullYear() + 1);
                } else {
                    return ''; // lifetime → no end date
                }
                return formatDateDMY(d);
            }

            // ========== Helper: toggle fields based on status ==========
            function toggleStatusFields(modal, status, prefix) {
                const endsWrap = modal.querySelector(prefix + 'ends-at-wrap');
                const endsRequired = modal.querySelector(prefix + 'ends-at-required');
                const trialWrap = modal.querySelector(prefix + 'trial-wrap');
                const cancelsWrap = modal.querySelector(prefix + 'cancels-wrap');

                // Hide all conditional fields
                if (endsWrap) endsWrap.style.display = 'none';
                if (endsRequired) endsRequired.style.display = 'none';
                if (trialWrap) trialWrap.style.display = 'none';
                if (cancelsWrap) cancelsWrap.style.display = 'none';

                if (status === 'active' || status === 'past_due') {
                    // Check plan interval — if lifetime, no end date needed
                    const planSelect = modal.querySelector('select[name="plan_id"]');
                    const planId = planSelect ? planSelect.value : '';
                    const interval = (planId && plans[planId]) ? plans[planId].interval : '';

                    if (interval !== 'lifetime') {
                        if (endsWrap) endsWrap.style.display = '';
                        if (endsRequired) endsRequired.style.display = '';
                    }
                } else if (status === 'trialing') {
                    if (trialWrap) trialWrap.style.display = '';
                } else if (status === 'cancelled') {
                    if (cancelsWrap) cancelsWrap.style.display = '';
                }
            }

            // ========== Helper: auto-compute end date ==========
            function autoComputeEnd(modal, prefix) {
                const planSelect = modal.querySelector('select[name="plan_id"]');
                const startsInput = modal.querySelector(prefix + 'starts-at') || modal.querySelector('input[name="starts_at"]');
                const endsInput = modal.querySelector(prefix + 'ends-at') || modal.querySelector('input[name="ends_at"]');

                if (!planSelect || !startsInput || !endsInput) return;

                const planId = planSelect.value;
                const interval = (planId && plans[planId]) ? plans[planId].interval : '';
                const startVal = startsInput.value;

                if (interval === 'lifetime') {
                    endsInput.value = '';
                } else if (startVal && interval) {
                    endsInput.value = computeEndDate(startVal, interval);
                }
            }

            // ========== ADD MODAL ==========
            const addModal = document.getElementById('add_subscription');
            if (addModal) {
                const planSelect = addModal.querySelector('select[name="plan_id"]');
                const statusSelect = addModal.querySelector('select[name="status"]');
                const discountInput = addModal.querySelector('input[name="discount"]');
                const priceHint = document.getElementById('add-sub-final-price');
                const startsInput = document.getElementById('add-starts-at');
                const endsInput = document.getElementById('add-ends-at');

                // Price hint
                function updatePrice() {
                    const planId = planSelect.value;
                    const discount = parseFloat(discountInput.value) || 0;
                    if (planId && plans[planId]) {
                        const plan = plans[planId];
                        const final_price = Math.max(0, plan.price - discount);
                        priceHint.textContent = 'Prix plan : ' + plan.price.toFixed(2) + ' ' + plan.currency +
                            ' → Prix final : ' + final_price.toFixed(2) + ' ' + plan.currency;
                    } else {
                        priceHint.textContent = '';
                    }
                }
                planSelect.addEventListener('change', updatePrice);
                discountInput.addEventListener('input', updatePrice);
                updatePrice();

                // Status toggle
                function onAddStatusChange() {
                    toggleStatusFields(addModal, statusSelect.value, '#add-');
                }
                statusSelect.addEventListener('change', onAddStatusChange);
                planSelect.addEventListener('change', function() {
                    onAddStatusChange();
                    autoComputeEnd(addModal, '#add-');
                });
                onAddStatusChange(); // initial state

                // Auto-compute end date on start date change
                if (startsInput) {
                    startsInput.addEventListener('change', function() {
                        autoComputeEnd(addModal, '#add-');
                    });
                    // Also handle flatpickr/datetimepicker
                    const observer = new MutationObserver(function() {
                        autoComputeEnd(addModal, '#add-');
                    });
                    observer.observe(startsInput, { attributes: true, attributeFilter: ['value'] });
                }
            }

            // ========== EDIT MODALS ==========
            document.querySelectorAll('[id^="edit_subscription_"]').forEach(function(editModal) {
                const statusSelect = editModal.querySelector('select[name="status"]');
                const planSelect = editModal.querySelector('select[name="plan_id"]');
                const startsInput = editModal.querySelector('.edit-starts-at');
                const endsInput = editModal.querySelector('.edit-ends-at');

                if (!statusSelect) return;

                function onEditStatusChange() {
                    toggleStatusFields(editModal, statusSelect.value, '.edit-');
                }
                statusSelect.addEventListener('change', onEditStatusChange);

                if (planSelect) {
                    planSelect.addEventListener('change', function() {
                        onEditStatusChange();
                        autoComputeEnd(editModal, '.edit-');
                    });
                }

                if (startsInput) {
                    startsInput.addEventListener('change', function() {
                        autoComputeEnd(editModal, '.edit-');
                    });
                }
            });
        });
    </script>
@endpush
