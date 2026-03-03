<div class="table-responsive no-pagination">
    <table class="table table-nowrap datatable">
        <thead class="thead-light">
            <tr>
                <th>Plan</th>
                <th>Code</th>
                <th>Intervalle</th>
                <th>Abonnés</th>
                <th>Prix</th>
                <th>Essai</th>
                <th>Créé le</th>
                <th>Statut</th>
                <th class="no-sort"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($plans as $plan)
                <tr>
                    <td>
                        <a href="javascript:void(0);" class="text-dark" data-bs-toggle="modal" data-bs-target="#view_plan_{{ $plan->id }}">
                            {{ $plan->name }}
                        </a>
                    </td>
                    <td><code>{{ $plan->code }}</code></td>
                    <td>
                        @switch($plan->interval)
                            @case('month') Mensuel @break
                            @case('year') Annuel @break
                            @case('lifetime') À vie @break
                            @default {{ $plan->interval }}
                        @endswitch
                    </td>
                    <td>{{ $plan->subscriptions_count ?? 0 }}</td>
                    <td>{{ number_format($plan->price, 2, ',', ' ') }} {{ $plan->currency }}</td>
                    <td>{{ $plan->trial_days ? $plan->trial_days . ' jours' : '—' }}</td>
                    <td>{{ $plan->created_at->format('d/m/Y') }}</td>
                    <td>
                        @if($plan->is_active)
                            <span class="badge badge-soft-success d-inline-flex align-items-center">Actif
                                <i class="isax isax-tick-circle ms-1"></i>
                            </span>
                        @else
                            <span class="badge badge-soft-danger d-inline-flex align-items-center">Inactif
                                <i class="isax isax-close-circle ms-1"></i>
                            </span>
                        @endif
                    </td>
                    @include('backoffice.plans.partials._actions', ['plan' => $plan])
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
