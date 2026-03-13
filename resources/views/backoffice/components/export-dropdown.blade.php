<div class="dropdown me-1">
    <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center"
        data-bs-toggle="dropdown">
        <i class="isax isax-export-1 me-1"></i>{{ __('Exporter') }}
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{ route('bo.export', ['type' => $exportType, 'format' => 'pdf']) }}{{ request()->getQueryString() ? '&' . request()->getQueryString() : '' }}">{{ __('Télécharger en PDF') }}</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('bo.export', ['type' => $exportType, 'format' => 'excel']) }}{{ request()->getQueryString() ? '&' . request()->getQueryString() : '' }}">{{ __('Télécharger en Excel') }}</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('bo.export', ['type' => $exportType, 'format' => 'csv']) }}{{ request()->getQueryString() ? '&' . request()->getQueryString() : '' }}">{{ __('Télécharger en CSV') }}</a>
        </li>
    </ul>
</div>
