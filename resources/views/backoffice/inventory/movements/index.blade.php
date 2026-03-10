<?php $page = 'stock-movements'; ?>
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
                    <h6>Mouvements de stock</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'stock-movements'])
                    <div>
                        <a href="{{ route('bo.inventory.movements.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>Nouveau mouvement
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.inventory.movements.index') }}" method="GET" class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control" placeholder="Rechercher un produit..." value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset" onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                                @if(request('warehouse_id'))
                                    <input type="hidden" name="warehouse_id" value="{{ request('warehouse_id') }}">
                                @endif
                                @if(request('movement_type'))
                                    <input type="hidden" name="movement_type" value="{{ request('movement_type') }}">
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <!-- Warehouse Filter -->
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-building-4 me-1"></i>Entrepôt : <span class="fw-normal ms-1">{{ request('warehouse_id') ? $warehouses->firstWhere('id', request('warehouse_id'))?->name ?? 'Tous' : 'Tous' }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.inventory.movements.index', array_merge(request()->except('warehouse_id', 'page'))) }}" class="dropdown-item">Tous</a>
                                </li>
                                @foreach($warehouses as $warehouse)
                                    <li>
                                        <a href="{{ route('bo.inventory.movements.index', array_merge(request()->except('page'), ['warehouse_id' => $warehouse->id])) }}" class="dropdown-item">{{ $warehouse->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Type Filter -->
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-filter me-1"></i>Type : <span class="fw-normal ms-1">
                                    @switch(request('movement_type'))
                                        @case('stock_in') Entrée @break
                                        @case('stock_out') Sortie @break
                                        @case('adjustment_in') Ajust. + @break
                                        @case('adjustment_out') Ajust. - @break
                                        @case('transfer_in') Trans. entrée @break
                                        @case('transfer_out') Trans. sortie @break
                                        @case('purchase_in') Achat @break
                                        @case('sale_out') Vente @break
                                        @default Tous
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.inventory.movements.index', array_merge(request()->except('movement_type', 'page'))) }}" class="dropdown-item">Tous</a>
                                </li>
                                <li><a href="{{ route('bo.inventory.movements.index', array_merge(request()->except('page'), ['movement_type' => 'stock_in'])) }}" class="dropdown-item">Entrée</a></li>
                                <li><a href="{{ route('bo.inventory.movements.index', array_merge(request()->except('page'), ['movement_type' => 'stock_out'])) }}" class="dropdown-item">Sortie</a></li>
                                <li><a href="{{ route('bo.inventory.movements.index', array_merge(request()->except('page'), ['movement_type' => 'adjustment_in'])) }}" class="dropdown-item">Ajustement +</a></li>
                                <li><a href="{{ route('bo.inventory.movements.index', array_merge(request()->except('page'), ['movement_type' => 'adjustment_out'])) }}" class="dropdown-item">Ajustement -</a></li>
                                <li><a href="{{ route('bo.inventory.movements.index', array_merge(request()->except('page'), ['movement_type' => 'transfer_in'])) }}" class="dropdown-item">Transfert entrée</a></li>
                                <li><a href="{{ route('bo.inventory.movements.index', array_merge(request()->except('page'), ['movement_type' => 'transfer_out'])) }}" class="dropdown-item">Transfert sortie</a></li>
                                <li><a href="{{ route('bo.inventory.movements.index', array_merge(request()->except('page'), ['movement_type' => 'purchase_in'])) }}" class="dropdown-item">Achat</a></li>
                                <li><a href="{{ route('bo.inventory.movements.index', array_merge(request()->except('page'), ['movement_type' => 'sale_out'])) }}" class="dropdown-item">Vente</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table Search End -->

            <!-- Table List -->
            <div class="table-responsive">
                <table class="table table-nowrap table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th>Produit</th>
                            <th>Entrepôt</th>
                            <th>Type</th>
                            <th>Quantité</th>
                            <th>Note</th>
                            <th>Par</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movements as $movement)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0">{{ $movement->product->name ?? '—' }}</h6>
                                            <span class="fs-12 text-muted">{{ $movement->product->code ?? '' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $movement->warehouse->name ?? '—' }}</td>
                                <td>
                                    @php
                                        $typeLabels = [
                                            'stock_in' => ['Entrée', 'badge-soft-success'],
                                            'stock_out' => ['Sortie', 'badge-soft-danger'],
                                            'adjustment_in' => ['Ajust. +', 'badge-soft-info'],
                                            'adjustment_out' => ['Ajust. -', 'badge-soft-warning'],
                                            'transfer_in' => ['Trans. entrée', 'badge-soft-success'],
                                            'transfer_out' => ['Trans. sortie', 'badge-soft-danger'],
                                            'return_in' => ['Retour +', 'badge-soft-success'],
                                            'return_out' => ['Retour -', 'badge-soft-danger'],
                                            'reserve' => ['Réservation', 'badge-soft-warning'],
                                            'unreserve' => ['Libération', 'badge-soft-info'],
                                            'purchase_in' => ['Achat', 'badge-soft-success'],
                                            'sale_out' => ['Vente', 'badge-soft-danger'],
                                        ];
                                        $label = $typeLabels[$movement->movement_type] ?? [$movement->movement_type, 'badge-soft-secondary'];
                                    @endphp
                                    <span class="badge {{ $label[1] }} d-inline-flex align-items-center">{{ $label[0] }}</span>
                                </td>
                                <td>
                                    @if(str_contains($movement->movement_type, 'in') || $movement->movement_type === 'unreserve')
                                        <span class="text-success fw-semibold">+{{ number_format($movement->quantity, 2, ',', ' ') }}</span>
                                    @else
                                        <span class="text-danger fw-semibold">-{{ number_format($movement->quantity, 2, ',', ' ') }}</span>
                                    @endif
                                </td>
                                <td>{{ \Illuminate\Support\Str::limit($movement->note, 30) ?? '—' }}</td>
                                <td>{{ $movement->createdBy->name ?? '—' }}</td>
                                <td>{{ $movement->moved_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Table List -->

            @include('backoffice.components.table-footer', ['paginator' => $movements])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
      End Page Content
     ========================= -->
@endsection
