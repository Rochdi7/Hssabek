<?php $page = 'customers'; ?>
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
                    <h6><a href="{{ route('bo.crm.customers.index') }}"><i class="isax isax-arrow-left fs-16 me-2"></i>{{ __('Clients') }}</a></h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <a href="{{ route('bo.crm.customers.edit', $customer) }}" class="btn btn-primary d-flex align-items-center fs-14 fw-semibold">
                        <i class="isax isax-edit-2 me-1"></i>{{ __('Modifier') }}</a>
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

                    <!-- Start User -->
                    <div class="card bg-light customer-details-info position-relative overflow-hidden">
                        <div class="card-body position-relative z-1">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-3">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <div class="avatar avatar-xxl rounded-circle flex-shrink-0">
                                        <span class="avatar avatar-xxl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center border border-white border-2 fs-24 fw-bold">
                                            {{ strtoupper(substr($customer->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <div class="">
                                        <p class="text-primary fs-14 fw-medium mb-1">
                                            {{ $customer->type === 'company' ? __('Entreprise') : __('Particulier') }}
                                        </p>
                                        <h6 class="mb-2"> {{ $customer->name }}
                                            @if($customer->status === 'active')
                                                <span class="badge badge-soft-success ms-1">{{ __('Actif') }}</span>
                                            @else
                                                <span class="badge badge-soft-danger ms-1">{{ __('Inactif') }}</span>
                                            @endif
                                        </h6>
                                        @if($customer->addresses->first())
                                            <p class="fs-14 fw-regular"><i class="isax isax-location fs-14 me-1 text-gray-9"></i>
                                                {{ $customer->addresses->first()->line1 }}, {{ $customer->addresses->first()->city }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('bo.crm.customers.edit', $customer) }}"
                                    class="btn btn-outline-white border border-1 border-grey border-sm bg-white"><i
                                        class="isax isax-edit-2 fs-13 fw-semibold text-dark me-1"></i> {{ __('Modifier') }} </a>
                            </div>

                            <div class="card border-0 shadow shadow-none mb-0 bg-white">
                                <div class="card-body border-0 shadow shadow-none">
                                    <ul
                                        class="d-flex justify-content-between align-items-center flex-wrap gap-2 p-0 m-0 list-unstyled">
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-sms fs-14 me-2"></i>{{ __('E-mail') }}</h6>
                                            <p> {{ $customer->email ?? '—' }} </p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-call fs-14 me-2"></i>{{ __('Téléphone') }}</h6>
                                            <p> {{ $customer->phone ?? '—' }} </p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-receipt-text fs-14 me-2"></i>{{ __('Identifiant fiscal') }}</h6>
                                            <p> {{ $customer->tax_id ?? '—' }}</p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-dollar-circle fs-14 me-2"></i>{{ __('Devise') }}</h6>
                                            <p> {{ $customer->currency ?? '—' }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- end card body -->
                        <img src="{{ URL::asset('build/img/icons/elements-01.svg') }}" alt="elements-01"
                            class="img-fluid customer-details-bg">
                    </div><!-- end card -->
                    <!-- End User -->

                    <!-- Start Addresses -->
                    <div class="card table-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-1 border-bottom border-gray">
                                <h6>{{ __('Adresses') }}</h6>
                                <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                                    <i class="isax isax-add-circle me-1"></i>{{ __('Ajouter') }}</a>
                            </div>
                            <div class="table-responsive table-nowrap">
                                <table class="table border m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __('Type') }}</th>
                                            <th>{{ __('Adresse') }}</th>
                                            <th>{{ __('Ville') }}</th>
                                            <th>{{ __('Région') }}</th>
                                            <th>{{ __('Code postal') }}</th>
                                            <th>{{ __('Pays') }}</th>
                                            <th class="no-sort"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($customer->addresses as $address)
                                            <tr>
                                                <td>
                                                    <span class="badge badge-soft-info">{{ $address->type === 'billing' ? __('Facturation') : __('Livraison') }}</span>
                                                </td>
                                                <td>{{ $address->line1 }}{{ $address->line2 ? ', ' . $address->line2 : '' }}</td>
                                                <td>{{ $address->city }}</td>
                                                <td>{{ $address->region ?? '—' }}</td>
                                                <td>{{ $address->postal_code ?? '—' }}</td>
                                                <td>{{ $address->country }}</td>
                                                <td class="action-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"
                                                                data-bs-toggle="modal" data-bs-target="#editAddressModal{{ $address->id }}">
                                                                <i class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                                        </li>
                                                        <li>
                                                            <form method="POST" action="{{ route('bo.crm.addresses.destroy', $address) }}">
                                                                @csrf @method('DELETE')
                                                                <button class="dropdown-item d-flex align-items-center text-danger" type="submit"
                                                                    onclick="return confirm('{{ __("Supprimer cette adresse ?") }}')">
                                                                    <i class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center py-3">
                                                    <p class="text-muted mb-0">{{ __('Aucune adresse enregistrée.') }}</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Addresses -->

                    <!-- Start Contacts -->
                    <div class="card table-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-1 border-bottom border-gray">
                                <h6>{{ __('Contacts') }}</h6>
                                <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addContactModal">
                                    <i class="isax isax-add-circle me-1"></i>{{ __('Ajouter') }}</a>
                            </div>
                            <div class="table-responsive table-nowrap">
                                <table class="table border m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __('Nom') }}</th>
                                            <th>{{ __('E-mail') }}</th>
                                            <th>{{ __('Téléphone') }}</th>
                                            <th>{{ __('Poste') }}</th>
                                            <th>{{ __('Principal') }}</th>
                                            <th class="no-sort"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($customer->contacts as $contact)
                                            <tr>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email ?? '—' }}</td>
                                                <td>{{ $contact->phone ?? '—' }}</td>
                                                <td>{{ $contact->position ?? '—' }}</td>
                                                <td>
                                                    @if($contact->is_primary)
                                                        <span class="badge badge-soft-success">{{ __('Oui') }}</span>
                                                    @else
                                                        <span class="text-muted">—</span>
                                                    @endif
                                                </td>
                                                <td class="action-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"
                                                                data-bs-toggle="modal" data-bs-target="#editContactModal{{ $contact->id }}">
                                                                <i class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                                        </li>
                                                        <li>
                                                            <form method="POST" action="{{ route('bo.crm.contacts.destroy', $contact) }}">
                                                                @csrf @method('DELETE')
                                                                <button class="dropdown-item d-flex align-items-center text-danger" type="submit"
                                                                    onclick="return confirm('{{ __("Supprimer ce contact ?") }}')">
                                                                    <i class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center py-3">
                                                    <p class="text-muted mb-0">{{ __('Aucun contact enregistré.') }}</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Contacts -->

                    <!-- Start Invoices -->
                    <div class="card table-info">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray"> {{ __('Factures récentes') }} </h6>
                            <div class="table-responsive table-nowrap">
                                <table class="table border m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="no-sort">{{ __('N°') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Montant') }}</th>
                                            <th class="no-sort">{{ __('Statut') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($customer->invoices as $invoice)
                                            <tr>
                                                <td>
                                                    <span class="link-default">{{ $invoice->invoice_number ?? '—' }}</span>
                                                </td>
                                                <td>{{ $invoice->created_at->format('d/m/Y') }}</td>
                                                <td class="text-dark">{{ number_format($invoice->total ?? 0, 2, ',', ' ') }}</td>
                                                <td>
                                                    <span class="badge badge-soft-info badge-sm d-inline-flex align-items-center">{{ ucfirst($invoice->status ?? '—') }}</span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-3">
                                                    <p class="text-muted mb-0">{{ __('Aucune facture.') }}</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Invoices -->

                </div><!-- end col -->
                <div class="col-xl-4">
                    <!-- Start Notes -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray"> {{ __('Notes') }} </h6>
                            <p class="text-truncate line-clamb-3"> {{ $customer->notes ?? __('Aucune note.') }} </p>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- End Notes -->

                    <!-- Start Info -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray"> {{ __('Informations') }} </h6>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Délai de paiement') }}</span>
                                    <span class="fw-semibold">{{ $customer->payment_terms_days }} {{ __('jours') }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Nombre de factures') }}</span>
                                    <span class="fw-semibold">{{ $customer->invoices->count() }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Nombre de devis') }}</span>
                                    <span class="fw-semibold">{{ $customer->quotes->count() }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Créé le') }}</span>
                                    <span class="fw-semibold">{{ $customer->created_at->format('d/m/Y') }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <span class="text-muted">{{ __('Dernière modification') }}</span>
                                    <span class="fw-semibold">{{ $customer->updated_at->format('d/m/Y') }}</span>
                                </li>
                            </ul>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- End Info -->
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

    <!-- Add Address Modal -->
    <div class="modal fade" id="addAddressModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('Ajouter une adresse') }}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('bo.crm.customers.addresses.store', $customer) }}">
                    @csrf
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Type') }} <span class="text-danger">*</span></label>
                            <select class="form-select" name="type" required>
                                <option value="billing">{{ __('Facturation') }}</option>
                                <option value="shipping">{{ __('Livraison') }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Adresse ligne 1') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="line1" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Adresse ligne 2') }}</label>
                            <input type="text" class="form-control" name="line2">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Ville') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="city" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Région') }}</label>
                                    <input type="text" class="form-control" name="region">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Code postal') }}</label>
                                    <input type="text" class="form-control" name="postal_code">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Pays') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="country" value="MA" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Address Modals -->
    @foreach($customer->addresses as $address)
        <div class="modal fade" id="editAddressModal{{ $address->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ __('Modifier l\'adresse') }}</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="POST" action="{{ route('bo.crm.addresses.update', $address) }}">
                        @csrf @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Type') }} <span class="text-danger">*</span></label>
                                <select class="form-select" name="type" required>
                                    <option value="billing" {{ $address->type === 'billing' ? 'selected' : '' }}>{{ __('Facturation') }}</option>
                                    <option value="shipping" {{ $address->type === 'shipping' ? 'selected' : '' }}>{{ __('Livraison') }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Adresse ligne 1') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="line1" value="{{ $address->line1 }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Adresse ligne 2') }}</label>
                                <input type="text" class="form-control" name="line2" value="{{ $address->line2 }}">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Ville') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="city" value="{{ $address->city }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Région') }}</label>
                                        <input type="text" class="form-control" name="region" value="{{ $address->region }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Code postal') }}</label>
                                        <input type="text" class="form-control" name="postal_code" value="{{ $address->postal_code }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Pays') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="country" value="{{ $address->country }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Add Contact Modal -->
    <div class="modal fade" id="addContactModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('Ajouter un contact') }}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('bo.crm.customers.contacts.store', $customer) }}">
                    @csrf
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nom') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('E-mail') }}</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Téléphone') }}</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Poste') }}</label>
                            <input type="text" class="form-control" name="position">
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" name="is_primary" value="1" id="addContactPrimary">
                            <label class="form-check-label" for="addContactPrimary">{{ __('Contact principal') }}</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Contact Modals -->
    @foreach($customer->contacts as $contact)
        <div class="modal fade" id="editContactModal{{ $contact->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ __('Modifier le contact') }}</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="POST" action="{{ route('bo.crm.contacts.update', $contact) }}">
                        @csrf @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Nom') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{ $contact->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('E-mail') }}</label>
                                <input type="email" class="form-control" name="email" value="{{ $contact->email }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Téléphone') }}</label>
                                <input type="text" class="form-control" name="phone" value="{{ $contact->phone }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Poste') }}</label>
                                <input type="text" class="form-control" name="position" value="{{ $contact->position }}">
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" name="is_primary" value="1"
                                    id="editContactPrimary{{ $contact->id }}" {{ $contact->is_primary ? 'checked' : '' }}>
                                <label class="form-check-label" for="editContactPrimary{{ $contact->id }}">{{ __('Contact principal') }}</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
