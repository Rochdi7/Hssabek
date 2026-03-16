<td class="action-item">
    <a href="javascript:void(0);" data-bs-toggle="dropdown">
        <i class="fa-solid fa-ellipsis"></i>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"
                data-bs-toggle="modal" data-bs-target="#view_plan_{{ $plan->id }}"><i
                    class="isax isax-eye me-2"></i>{{ __('Voir') }}</a>
        </li>
        <li>
            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"
                data-bs-toggle="modal" data-bs-target="#edit_plan_{{ $plan->id }}"><i
                    class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
        </li>
        <li>
            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center text-danger"
                data-bs-toggle="modal" data-bs-target="#delete_plan_{{ $plan->id }}"><i
                    class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</a>
        </li>
    </ul>
</td>
