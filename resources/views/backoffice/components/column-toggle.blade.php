{{--
    Column Toggle Dropdown Component
    Usage: @include('backoffice.components.column-toggle', ['columns' => ['Nom', 'E-mail', 'Statut']])

    - $columns: array of visible column names (excluding checkbox & actions columns)
    - The component auto-targets the closest .table-responsive table
--}}
<div class="dropdown column-toggle-dropdown">
    <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
        data-bs-toggle="dropdown" data-bs-auto-close="outside">
        <i class="isax isax-grid-3 me-1"></i>{{ __('Colonnes') }}
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        @foreach ($columns as $index => $colName)
            <li>
                <label class="dropdown-item d-flex align-items-center form-switch">
                    <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                    <input class="form-check-input m-0 me-2 js-col-toggle" type="checkbox" checked
                        data-col-index="{{ $index }}">
                    <span>{{ $colName }}</span>
                </label>
            </li>
        @endforeach
    </ul>
</div>

@pushOnce('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.column-toggle-dropdown').forEach(function(dropdown) {
                // Find the associated table — walk up to the common parent, then find .table-responsive table
                var container = dropdown.closest('.content, .content-two, .page-wrapper');
                if (!container) container = document.body;
                var table = container.querySelector('.table-responsive table');
                if (!table) return;

                // The first column is always the checkbox (index 0 in <th>), then data columns, then last is actions.
                // We offset by 1 (skip checkbox col). Actions column is the last <th> which is also skipped.
                var headerCells = table.querySelectorAll('thead tr th');
                var hasCheckbox = headerCells.length > 0 && headerCells[0].querySelector(
                    '.form-check-input');
                var colOffset = hasCheckbox ? 1 : 0;

                dropdown.querySelectorAll('.js-col-toggle').forEach(function(checkbox) {
                    checkbox.addEventListener('change', function() {
                        var colIdx = parseInt(this.dataset.colIndex) + colOffset;
                        var show = this.checked;

                        // Toggle header
                        if (headerCells[colIdx]) {
                            headerCells[colIdx].style.display = show ? '' : 'none';
                        }

                        // Toggle body cells
                        table.querySelectorAll('tbody tr').forEach(function(row) {
                            var cells = row.querySelectorAll('td');
                            if (cells[colIdx]) {
                                cells[colIdx].style.display = show ? '' : 'none';
                            }
                        });
                    });
                });
            });
        });
    </script>
@endPushOnce
