<td class="action-item">
    <a href="javascript:void(0);" data-bs-toggle="dropdown">
        <i class="fa-solid fa-ellipsis"></i>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"
                data-bs-toggle="modal" data-bs-target="#view_tenant_{{ $tenant->id }}"><i
                    class="isax isax-eye me-2"></i>{{ __('Voir') }}</a>
        </li>
        <li>
            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"
                data-bs-toggle="modal" data-bs-target="#edit_tenant_{{ $tenant->id }}"><i
                    class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
        </li>
        <li>
            <a href="{{ route('sa.tenants.usage', $tenant) }}" class="dropdown-item d-flex align-items-center"><i
                    class="isax isax-chart me-2"></i>{{ __('Utilisation & Limites') }}</a>
        </li>
        @if($tenant->status === 'active')
            <li>
                <form method="POST" action="{{ route('sa.tenants.suspend', $tenant) }}">
                    @csrf
                    <button type="submit" class="dropdown-item d-flex align-items-center text-warning">
                        <i class="isax isax-slash me-2"></i>{{ __('Suspendre') }}
                    </button>
                </form>
            </li>
        @elseif($tenant->status === 'suspended')
            <li>
                <form method="POST" action="{{ route('sa.tenants.activate', $tenant) }}">
                    @csrf
                    <button type="submit" class="dropdown-item d-flex align-items-center text-success">
                        <i class="isax isax-tick-circle me-2"></i>{{ __('Activer') }}
                    </button>
                </form>
            </li>
        @endif
        <li>
            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center text-danger"
                data-bs-toggle="modal" data-bs-target="#delete_tenant_{{ $tenant->id }}"><i
                    class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</a>
        </li>
    </ul>
</td>
