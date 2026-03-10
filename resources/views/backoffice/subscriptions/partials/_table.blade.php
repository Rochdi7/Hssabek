<div class="table-responsive">
    <table class="table table-nowrap datatable">
        <thead class="thead-light">
            <tr>
                <th class="no-sort">
                    <div class="form-check form-check-md">
                        <input class="form-check-input" type="checkbox" id="select-all">
                    </div>
                </th>
                <th class="no-sort">Entreprise</th>
                <th>Plan</th>
                <th>Cycle</th>
                <th>Fournisseur</th>
                <th>Quantité</th>
                <th>Remise</th>
                <th>Début</th>
                <th>Fin</th>
                <th class="no-sort">Statut</th>
                <th class="no-sort"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriptions as $subscription)
                <tr>
                    <td>
                        <div class="form-check form-check-md">
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <span
                                class="avatar avatar-sm bg-soft-info rounded-circle me-2 flex-shrink-0 d-flex align-items-center justify-content-center">
                                <i class="isax isax-buildings-25 text-info"></i>
                            </span>
                            <div>
                                <h6 class="fs-14 fw-medium mb-0">{{ $subscription->tenant?->name ?? '—' }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>{{ $subscription->plan?->name ?? '—' }}</td>
                    <td>
                        @if ($subscription->plan)
                            @switch($subscription->plan->interval)
                                @case('month')
                                    Mensuel
                                @break

                                @case('year')
                                    Annuel
                                @break

                                @case('lifetime')
                                    À vie
                                @break

                                @default
                                    {{ $subscription->plan->interval }}
                            @endswitch
                        @else
                            —
                        @endif
                    </td>
                    <td>
                        @if ($subscription->provider === 'stripe')
                            <span class="badge badge-soft-info">Stripe</span>
                        @else
                            <span class="badge badge-soft-warning">Manuel</span>
                        @endif
                    </td>
                    <td>{{ $subscription->quantity }}</td>
                    <td>
                        @if (($subscription->discount ?? 0) > 0)
                            <span class="text-danger">-{{ number_format($subscription->discount, 2) }}</span>
                        @else
                            —
                        @endif
                    </td>
                    <td>{{ $subscription->starts_at?->format('d/m/Y') ?? '—' }}</td>
                    <td>{{ $subscription->ends_at?->format('d/m/Y') ?? '—' }}</td>
                    <td>
                        @switch($subscription->status)
                            @case('active')
                                <span class="badge badge-soft-success d-inline-flex align-items-center">Actif
                                    <i class="isax isax-tick-circle ms-1"></i>
                                </span>
                            @break

                            @case('trialing')
                                <span class="badge badge-soft-info d-inline-flex align-items-center">Essai
                                    <i class="isax isax-timer-1 ms-1"></i>
                                </span>
                            @break

                            @case('past_due')
                                <span class="badge badge-soft-warning d-inline-flex align-items-center">Impayé
                                    <i class="isax isax-warning-2 ms-1"></i>
                                </span>
                            @break

                            @case('cancelled')
                                <span class="badge badge-soft-danger d-inline-flex align-items-center">Annulé
                                    <i class="isax isax-close-circle ms-1"></i>
                                </span>
                            @break

                            @default
                                <span class="badge badge-soft-secondary">{{ ucfirst($subscription->status) }}</span>
                        @endswitch
                    </td>
                    @include('backoffice.subscriptions.partials._actions', [
                        'subscription' => $subscription,
                    ])
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('backoffice.components.table-footer', ['paginator' => $subscriptions])
