<?php $page = 'goods-receipts'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.purchases.goods-receipts.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>Réceptions de marchandises</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h5>Réception — {{ $goodsReceipt->number }}</h5>
                                    <div class="d-flex gap-2">
                                        @if ($goodsReceipt->status === 'draft')
                                            <form action="{{ route('bo.purchases.goods-receipts.confirm', $goodsReceipt) }}" method="POST"
                                                onsubmit="return confirm('Confirmer cette réception ? Le stock sera mis à jour.')">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="isax isax-tick-circle me-1"></i>Confirmer la réception
                                                </button>
                                            </form>
                                            <a href="{{ route('bo.purchases.goods-receipts.edit', $goodsReceipt) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="isax isax-edit me-1"></i>Modifier
                                            </a>
                                        @endif
                                        <a href="{{ route('bo.purchases.goods-receipts.download', $goodsReceipt) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="isax isax-document-download me-1"></i>Télécharger PDF
                                        </a>
                                    </div>
                                </div>

                                <div class="row gx-3 mb-4">
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">Bon de commande</label>
                                        <p class="fw-medium mb-0">{{ $goodsReceipt->purchaseOrder->number ?? '—' }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">Entrepôt</label>
                                        <p class="fw-medium mb-0">{{ $goodsReceipt->warehouse->name ?? '—' }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">Date de réception</label>
                                        <p class="fw-medium mb-0">
                                            {{ $goodsReceipt->received_at ? \Carbon\Carbon::parse($goodsReceipt->received_at)->format('d/m/Y') : '—' }}
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">Référence</label>
                                        <p class="fw-medium mb-0">{{ $goodsReceipt->reference_number ?? '—' }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">Statut</label>
                                        <p class="mb-0">
                                            @switch($goodsReceipt->status)
                                                @case('draft')
                                                    <span class="badge badge-soft-secondary">Brouillon</span>
                                                @break

                                                @case('received')
                                                    <span class="badge badge-soft-success">Reçue</span>
                                                @break

                                                @case('partial')
                                                    <span class="badge badge-soft-warning">Partielle</span>
                                                @break
                                            @endswitch
                                        </p>
                                    </div>
                                </div>

                                @if ($goodsReceipt->items && $goodsReceipt->items->count())
                                    <h6 class="mb-3">Articles reçus</h6>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Produit</th>
                                                    <th>Quantité reçue</th>
                                                    <th>Coût unitaire</th>
                                                    <th>Total ligne</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($goodsReceipt->items as $item)
                                                    <tr>
                                                        <td>{{ $item->product->name ?? '—' }}</td>
                                                        <td>{{ number_format($item->quantity, 3) }}</td>
                                                        <td>{{ number_format($item->unit_cost, 2) }}</td>
                                                        <td>{{ number_format($item->line_total, 2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <h6 class="mb-3">Articles reçus</h6>
                                    <p class="text-muted">Aucun article enregistré pour cette réception.</p>
                                @endif
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
