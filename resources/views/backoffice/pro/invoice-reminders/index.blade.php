<?php $page = 'invoice-reminders'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Rappels de factures</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'invoice-reminders'])
                    <div>
                        <a href="{{ route('bo.pro.invoice-reminders.create') }}"
                            class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>Nouveau rappel
                        </a>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button
                        type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ session('error') }}<button
                        type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
            @endif

            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.pro.invoice-reminders.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Rechercher par n° facture..." value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-nowrap table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md"><input class="form-check-input" type="checkbox"
                                        id="select-all"></div>
                            </th>
                            <th>Facture</th>
                            <th>Client</th>
                            <th>Type</th>
                            <th>Canal</th>
                            <th>Planifié le</th>
                            <th class="no-sort">Statut</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reminders as $reminder)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md"><input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td><span class="fw-medium">{{ $reminder->invoice->number ?? '—' }}</span></td>
                                <td>{{ $reminder->invoice->customer->name ?? '—' }}</td>
                                <td>
                                    @switch($reminder->type)
                                        @case('before_due')
                                            Avant échéance
                                        @break

                                        @case('on_due')
                                            Jour d'échéance
                                        @break

                                        @case('after_due')
                                            Après échéance
                                        @break

                                        @default
                                            {{ ucfirst($reminder->type) }}
                                    @endswitch
                                </td>
                                <td>{{ $reminder->channel === 'email' ? 'E-mail' : ($reminder->channel === 'sms' ? 'SMS' : ucfirst($reminder->channel)) }}
                                </td>
                                <td>{{ $reminder->scheduled_at ? \Carbon\Carbon::parse($reminder->scheduled_at)->format('d/m/Y H:i') : '—' }}
                                </td>
                                <td>
                                    @switch($reminder->status)
                                        @case('pending')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">En
                                                attente</span>
                                        @break

                                        @case('sent')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">Envoyé</span>
                                        @break

                                        @case('failed')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">Échoué</span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown"><i
                                            class="isax isax-more"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('bo.pro.invoice-reminders.edit', $reminder) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>Modifier</a></li>
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.pro.invoice-reminders.destroy', $reminder) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit" onclick="return confirm('Supprimer ce rappel ?')">
                                                    <i class="isax isax-trash me-2"></i>Supprimer
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('backoffice.components.table-footer', ['paginator' => $reminders])
            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
