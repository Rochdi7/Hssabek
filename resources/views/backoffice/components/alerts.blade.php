@php
    $validationErrors = collect($errors->getBags())
        ->flatMap(fn ($bag) => $bag->all())
        ->filter()
        ->unique()
        ->values();

    $toastMessages = collect([
        ['type' => 'success', 'message' => session('success')],
        ['type' => 'error', 'message' => session('error')],
        ['type' => 'warning', 'message' => session('warning')],
        ['type' => 'info', 'message' => session('info')],
    ])->filter(fn ($toast) => filled($toast['message']))
        ->values();
@endphp

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof window.toastr === 'undefined') {
            return;
        }

        const showToast = function (type, message, title) {
            if (window.BackofficeToast && typeof window.BackofficeToast.show === 'function') {
                window.BackofficeToast.show(type, message, title);
                return;
            }

            if (!message || typeof toastr[type] !== 'function') {
                return;
            }

            toastr[type](message, title);
        };

        toastr.options = Object.assign({
            closeButton: true,
            progressBar: true,
            newestOnTop: true,
            positionClass: 'toast-top-right',
            preventDuplicates: true,
            timeOut: 5000,
            extendedTimeOut: 1500,
            escapeHtml: true,
        }, window.toastr.options || {});

        const flashMessages = @json($toastMessages);
        const validationErrors = @json($validationErrors);

        flashMessages.forEach(function (toast) {
            if (toast.type && toast.message) {
                showToast(toast.type, toast.message);
            }
        });

        validationErrors.forEach(function (message) {
            showToast('error', message, "{{ __('Erreur de validation') }}");
        });
    });
</script>
