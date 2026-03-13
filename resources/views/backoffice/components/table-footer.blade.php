{{-- Server-side table footer: per-page selector + pagination --}}
{{-- Usage: @include('backoffice.components.table-footer', ['paginator' => $items]) --}}
@if ($paginator->hasPages() || $paginator->total() > 0)
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mt-3">
        {{-- Per-page selector (left) --}}
        <div class="dataTables_length">
            <form method="GET" action="{{ url()->current() }}" class="d-inline-flex align-items-center">
                @foreach (request()->except(['per_page', 'page']) as $key => $value)
                    @if (is_string($value))
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach
                <label class="d-flex align-items-center gap-2 mb-0">
                    {{ __('Lignes par page') }}
                    <select name="per_page" class="form-select form-select-sm" onchange="this.form.submit()">
                        @foreach ([10, 25, 50, 100] as $size)
                            <option value="{{ $size }}"
                                {{ (int) request('per_page', 10) === $size ? 'selected' : '' }}>{{ $size }}
                            </option>
                        @endforeach
                    </select>
                    {{ __('entrées') }}
                </label>
            </form>
        </div>

        {{-- Pagination (right) --}}
        <div class="dataTables_paginate paging_simple_numbers">
            <ul class="pagination mb-0">
                {{-- Previous --}}
                <li class="paginate_button page-item previous {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                    @if ($paginator->onFirstPage())
                        <a aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link">
                            <i class="isax isax-arrow-left"></i>
                        </a>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" role="link" data-dt-idx="previous"
                            tabindex="0" class="page-link">
                            <i class="isax isax-arrow-left"></i>
                        </a>
                    @endif
                </li>

                {{-- Page Numbers --}}
                @php
                    $currentPage = $paginator->currentPage();
                    $lastPage = $paginator->lastPage();
                    $start = max(1, $currentPage - 2);
                    $end = min($lastPage, $currentPage + 2);
                @endphp

                @if ($start > 1)
                    <li class="paginate_button page-item">
                        <a href="{{ $paginator->url(1) }}" role="link" data-dt-idx="0" tabindex="0"
                            class="page-link">1</a>
                    </li>
                    @if ($start > 2)
                        <li class="paginate_button page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif
                @endif

                @for ($i = $start; $i <= $end; $i++)
                    <li class="paginate_button page-item {{ $i === $currentPage ? 'active' : '' }}">
                        <a href="{{ $paginator->url($i) }}" role="link"
                            aria-current="{{ $i === $currentPage ? 'page' : '' }}" data-dt-idx="{{ $i - 1 }}"
                            tabindex="0" class="page-link">{{ $i }}</a>
                    </li>
                @endfor

                @if ($end < $lastPage)
                    @if ($end < $lastPage - 1)
                        <li class="paginate_button page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif
                    <li class="paginate_button page-item">
                        <a href="{{ $paginator->url($lastPage) }}" role="link" data-dt-idx="{{ $lastPage - 1 }}"
                            tabindex="0" class="page-link">{{ $lastPage }}</a>
                    </li>
                @endif

                {{-- Next --}}
                <li class="paginate_button page-item next {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" role="link" data-dt-idx="next" tabindex="0"
                            class="page-link">
                            <i class="isax isax-arrow-right-1"></i>
                        </a>
                    @else
                        <a aria-disabled="true" role="link" data-dt-idx="next" tabindex="-1" class="page-link">
                            <i class="isax isax-arrow-right-1"></i>
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
@endif
