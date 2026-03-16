<div class="table-responsive">
    <table class="table table-nowrap datatable">
        <thead class="thead-light">
            <tr>
                <th class="no-sort">
                    <div class="form-check form-check-md">
                        <input class="form-check-input" type="checkbox" id="select-all">
                    </div>
                </th>
                <th class="no-sort">{{ __('Nom') }}</th>
                <th>{{ __('Utilisateurs') }}</th>
                <th>{{ __('Créé le') }}</th>
                <th class="no-sort">{{ __('Statut') }}</th>
                <th class="no-sort"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tenants as $tenant)
                <tr>
                    <td>
                        <div class="form-check form-check-md">
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0);"
                                class="avatar avatar-sm rounded-circle me-2 flex-shrink-0 overflow-hidden"
                                data-bs-toggle="modal" data-bs-target="#view_tenant_{{ $tenant->id }}">
                                @if ($tenant->getFirstMediaUrl('logo'))
                                    <img src="{{ $tenant->logo_url }}" alt="{{ $tenant->name }}"
                                        class="w-100 h-100 object-fit-cover rounded-circle">
                                @else
                                    <span
                                        class="avatar avatar-sm bg-soft-info rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="isax isax-buildings-25 text-info"></i>
                                    </span>
                                @endif
                            </a>
                            <div>
                                <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#view_tenant_{{ $tenant->id }}">{{ $tenant->name }}</a></h6>
                            </div>
                        </div>
                    </td>
                    <td>{{ $tenant->users_count ?? 0 }}</td>
                    <td>{{ $tenant->created_at->format('d/m/Y') }}</td>
                    <td>
                        @if ($tenant->status === 'active')
                            <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Actif') }}
                                <i class="isax isax-tick-circle ms-1"></i>
                            </span>
                        @elseif($tenant->status === 'suspended')
                            <span class="badge badge-soft-warning d-inline-flex align-items-center">{{ __('Suspendu') }}
                                <i class="isax isax-slash ms-1"></i>
                            </span>
                        @else
                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Inactif') }}
                                <i class="isax isax-close-circle ms-1"></i>
                            </span>
                        @endif
                    </td>
                    @include('backoffice.tenants.partials._actions', ['tenant' => $tenant])
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('backoffice.components.table-footer', ['paginator' => $tenants])
