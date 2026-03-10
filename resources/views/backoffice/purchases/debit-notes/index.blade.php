<?php $page = 'debit-notes'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Notes de débit</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'debit-notes'])
                    <div>
                        <a href="{{ route('bo.purchases.debit-notes.create') }}"
                            class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>Nouvelle note de débit
                        </a>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.purchases.debit-notes.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Rechercher une note de débit..." value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-filter me-1"></i>Statut : <span class="fw-normal ms-1">
                                    @switch(request('status'))
                                        @case('draft')
                                            Brouillon
                                        @break

                                        @case('sent')
                                            Envoyée
                                        @break

                                        @case('applied')
                                            Appliquée
                                        @break

                                        @default
                                            Tous
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="{{ route('bo.purchases.debit-notes.index', request()->except('status', 'page')) }}"
                                        class="dropdown-item">Tous</a></li>
                                <li><a href="{{ route('bo.purchases.debit-notes.index', array_merge(request()->except('page'), ['status' => 'draft'])) }}"
                                        class="dropdown-item">Brouillon</a></li>
                                <li><a href="{{ route('bo.purchases.debit-notes.index', array_merge(request()->except('page'), ['status' => 'sent'])) }}"
                                        class="dropdown-item">Envoyée</a></li>
                                <li><a href="{{ route('bo.purchases.debit-notes.index', array_merge(request()->except('page'), ['status' => 'applied'])) }}"
                                        class="dropdown-item">Appliquée</a></li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => ['N° Note', 'Date', 'Fournisseur', 'Montant', 'Statut'],
                        ])
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-nowrap table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th>N° Note</th>
                            <th>Date</th>
                            <th>Fournisseur</th>
                            <th>Montant</th>
                            <th class="no-sort">Statut</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($debitNotes as $note)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td><span class="fw-medium">{{ $note->number }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($note->debit_note_date)->format('d/m/Y') }}</td>
                                <td>{{ $note->supplier->name ?? '—' }}</td>
                                <td class="fw-semibold">{{ number_format($note->total_amount ?? 0, 2, ',', ' ') }}</td>
                                <td>
                                    @switch($note->status)
                                        @case('draft')
                                            <span
                                                class="badge badge-soft-secondary d-inline-flex align-items-center">Brouillon</span>
                                        @break

                                        @case('sent')
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">Envoyée</span>
                                        @break

                                        @case('applied')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">Appliquée</span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.purchases.debit-notes.show', $note) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>Voir</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bo.purchases.debit-notes.edit', $note) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>Modifier</a>
                                        </li>
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.purchases.debit-notes.destroy', $note) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette note de débit ?')">
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

            @include('backoffice.components.table-footer', ['paginator' => $debitNotes])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
