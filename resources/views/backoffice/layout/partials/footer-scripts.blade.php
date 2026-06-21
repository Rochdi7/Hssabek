<!-- jQuery -->
<script src="{{ URL::asset('build/js/jquery-3.7.1.min.js') }}"></script>

<!-- Feather JS -->
<script src="{{ URL::asset('build/js/feather.min.js') }}"></script>

<!-- Daterangepicker JS -->
<script src="{{ URL::asset('build/js/moment.min.js') }}"></script>
<script src="{{ URL::asset('build/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- Simplebar JS -->
<script src="{{ URL::asset('build/plugins/simplebar/simplebar.min.js') }}"></script>

<!-- Datatable JS -->
<script src="{{ URL::asset('build/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('build/js/dataTables.bootstrap5.min.js') }}"></script>

<!-- Select2 JS -->
<script src="{{ URL::asset('build/plugins/select2/js/select2.min.js') }}"></script>

<!-- Bootstrap Datetimepicker JS -->
<script src="{{ URL::asset('build/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ URL::asset('build/js/bootstrap.bundle.min.js') }}"></script>

@php
    $toastrJsVersion = file_exists(public_path('build/plugins/toastr/toastr.min.js'))
        ? filemtime(public_path('build/plugins/toastr/toastr.min.js'))
        : now()->timestamp;
@endphp

<!-- Toastr JS -->
<script src="{{ URL::asset('build/plugins/toastr/toastr.min.js') }}?v={{ $toastrJsVersion }}"></script>
<script>
toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-top-right',
    timeOut: 4000,
    extendedTimeOut: 1500,
    showEasing: 'swing',
    hideEasing: 'linear',
    showMethod: 'fadeIn',
    hideMethod: 'fadeOut',
    escapeHtml: true,
    preventDuplicates: false,
    newestOnTop: true
};
</script>

<script>
window.BackofficeToast = window.BackofficeToast || {
    normalizeMessages: function(message) {
        if (message === null || typeof message === 'undefined') {
            return [];
        }

        if (Array.isArray(message)) {
            return message
                .flatMap((item) => this.normalizeMessages(item))
                .filter(Boolean);
        }

        if (typeof message === 'object') {
            return Object.values(message)
                .flatMap((item) => this.normalizeMessages(item))
                .filter(Boolean);
        }

        const normalized = String(message).replace(/\s+/g, ' ').trim();

        return normalized !== '' ? [normalized] : [];
    },
    show: function(type, message, title) {
        if (typeof window.toastr === 'undefined' || typeof window.toastr[type] !== 'function') {
            return;
        }

        this.normalizeMessages(message).forEach(function(entry) {
            window.toastr[type](entry, title || undefined);
        });
    },
    success: function(message, title) { this.show('success', message, title); },
    error: function(message, title) { this.show('error', message, title); },
    warning: function(message, title) { this.show('warning', message, title); },
    info: function(message, title) { this.show('info', message, title); },
    fromJsonError: function(payload, fallbackMessage) {
        const errors = payload && payload.errors ? payload.errors : {};
        const hasErrors = errors && typeof errors === 'object' && Object.keys(errors).length > 0;

        if (hasErrors) {
            Object.values(errors).forEach(function(messages) {
                window.BackofficeToast.error(messages, "{{ __('Erreur de validation') }}");
            });
            return;
        }

        window.BackofficeToast.error((payload && payload.message) || fallbackMessage);
    }
};

(function() {
    const defaultErrorMessage = "{{ __('Une erreur inattendue est survenue. Veuillez reessayer.') }}";
    const originalFetch = window.fetch ? window.fetch.bind(window) : null;

    if (originalFetch) {
        window.fetch = function(input, init) {
            init = init || {};

            const headers = new Headers(init.headers || (input instanceof Request ? input.headers : undefined));

            if (!headers.has('X-Requested-With')) {
                headers.set('X-Requested-With', 'XMLHttpRequest');
            }

            if (!headers.has('Accept')) {
                headers.set('Accept', 'application/json');
            }

            return originalFetch(input, Object.assign({}, init, { headers: headers }))
                .then(function(response) {
                    if (!response.ok) {
                        response.clone()
                            .json()
                            .then(function(payload) {
                                window.BackofficeToast.fromJsonError(payload, defaultErrorMessage);
                            })
                            .catch(function() {
                                window.BackofficeToast.error(defaultErrorMessage);
                            });
                    }

                    return response;
                });
        };
    }

    if (window.jQuery) {
        $(document).ajaxError(function(event, jqxhr) {
            if (jqxhr && jqxhr.responseJSON) {
                window.BackofficeToast.fromJsonError(jqxhr.responseJSON, defaultErrorMessage);
                return;
            }

            window.BackofficeToast.error(defaultErrorMessage);
        });
    }
})();
</script>

{{-- Page-specific scripts pushed from individual views --}}
@stack('scripts')

{{-- Bank account balance display on select change --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('select[name="bank_account_id"], select[name="from_bank_account_id"], select[name="to_bank_account_id"]').forEach(function (select) {
        var info = select.parentElement.querySelector('.bank-balance-info');
        if (!info) return;
        function updateBalance() {
            var opt = select.options[select.selectedIndex];
            if (opt && opt.value) {
                info.innerHTML = 'Solde actuel : <strong>' + opt.getAttribute('data-balance') + ' ' + opt.getAttribute('data-currency') + '</strong>';
                info.style.display = 'block';
            } else {
                info.style.display = 'none';
            }
        }
        select.addEventListener('change', updateBalance);
        updateBalance();
    });
});
</script>

<!-- Custom JS -->
<script src="{{ URL::asset('build/js/script.js') }}"></script>
