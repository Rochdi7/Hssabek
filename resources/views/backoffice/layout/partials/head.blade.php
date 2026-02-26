    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('build/img/apple-touch-icon.png') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('build/img/favicon.png') }}">

@if(!Route::is(['signin', 'signup','coming-soon', 'error-404', 'error-500','free-trial', 'under-construction', 'bus-booking-invoice', 'car-booking-invoice','change-password','forgot-password','lock-screen','general-invoice-1', 'general-invoice-1a', 'general-invoice-2', 'general-invoice-2a', 'general-invoice-3', 'general-invoice-4', 'general-invoice-5', 'general-invoice-6', 'general-invoice-7', 'general-invoice-8', 'general-invoice-9', 'general-invoice-10', 'domain-hosting-invoice', 'coffee-shop-invoice', 'ecommerce-invoice','invoice-medical','domain-hosting-invoice', 'ecommerce-invoice', 'email-verification', 'error-404', 'error-500', 'layout-default', 'layout-dark', 'layout-mini', 'layout-rtl', 'layout-single', 'layout-transparent', 'layout-without-header', 'lock-screen', 'login', 'money-exchange-invoice', 'movie-ticket-booking-invoice', 'change-password','forgot-password','general-invoice-1', 'student-billing-invoice', 'success', 'train-ticket-invoice', 'two-step-verification', 'under-construction', 'under-maintenance', 'fitness-center-invoice', 'flight-booking-invoice', 'hotel-booking-invoice','restaurants-invoice','reset-password','register','receipt-invoice-1','receipt-invoice-2','receipt-invoice-3','receipt-invoice-4', 'internet-billing-invoice'])) 
    <!-- Theme Script js -->
    <script src="{{URL::asset('build/js/theme-script.js')}}"></script>
@endif

@if (!Route::is(['layout-rtl']))
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('build/css/bootstrap.min.css') }}">
@endif

@if (Route::is(['layout-rtl']))
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{URL::asset('build/css/bootstrap.rtl.min.css')}}">
@endif

@if (Route::is('form-horizontal', 'form-vertical', 'tables-basic'))
    <!-- Feather CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/css/feather.css')}}">
@endif

@if (Route::is(['icon-feather', 'notes']))
    <!-- Feather CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/icons/feather/feather.css')}}">
@endif

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/tabler-icons/tabler-icons.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ url('build/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('build/plugins/fontawesome/css/all.min.css') }}">

    <!-- Iconsax CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/css/iconsax.css')}}">

    <!-- Simplebar CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/simplebar/simplebar.min.css')}}">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/css/dataTables.bootstrap5.min.css')}}">

@if (Route::is(['add-blog', 'admin-dashboard', 'clear-cache', 'cronjob', 'currencies', 'customer-css', 'customer-js', 'customer-dashboard', 'database-backup', 'edit-blog', 'email-reply', 'email-settings', 'email-templates', 'email', 'gdpr-cookies', 'localization-settings', 'maintenance-mode', 'preference-settings', 'prefixes-settings', 'seo-setup', 'sitemap', 'sms-gateways', 'storage', 'super-admin-dashboard', 'system-backup', 'system-update','blog-tags']))
    <!-- Bootstrap Tagsinput CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
@endif

@if (Route::is(['contact-messages', 'security-settings', 'suppliers', 'users']))
    <!-- intltelinput CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/intltelinput/css/intlTelInput.min.css')}}">
@endif

@if (Route::is(['add-blog', 'add-product', 'bank-account-settings', 'barcode-settings', 'custom-fields', 'edit-blog', 'edit-customer', 'edit-product', 'esignatures', 'file-manager', 'form-editors', 'invoice-settings', 'invoice-templates-settings', 'invoice-templates', 'maintenance-mode', 'payment-methods', 'sass-settings', 'seo-setup', 'tax-rates', 'thermal-printer', 'todo-list', 'todo']))
    <!-- Quill CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/quill/quill.snow.css')}}">
@endif

@if (Route::is(['gdpr-cookies']))
    <!-- Summernote CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/summernote/summernote-lite.min.css')}}">
@endif

@if (Route::is(['icon-bootstrap']))
    <!-- Bootstrap Icon CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/icons/bootstrap/bootstrap-icons.min.css')}}">
@endif

@if (Route::is(['icon-flag']))
    <!-- Flag CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/icons/flags/flags.css')}}">
@endif

@if (Route::is(['icon-ionic']))
    <!-- Ionic CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/icons/ionic/ionicons.css')}}">
@endif

@if (Route::is(['icon-material']))
    <!-- Material CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/material/materialdesignicons.css')}}">
@endif

@if (Route::is(['icon-pe7']))
    <!-- Pe7 CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/icons/pe7/pe-icon-7.css')}}">
@endif

@if (Route::is(['icon-remix']))
    <!-- Remix Icon CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/icons/remix/remixicon.css')}}">
@endif

@if (Route::is(['icon-simpleline']))
    <!-- Simpleline CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/simpleline/simple-line-icons.css')}}">
@endif

@if (Route::is(['icon-themify']))
    <!-- Themify CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/icons/themify/themify.css')}}">
@endif

@if (Route::is(['icon-typicon']))
    <!-- Typicon CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/icons/typicons/typicons.css')}}">
@endif

@if (Route::is(['icon-weather']))
    <!-- Weather CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/icons/weather/weathericons.css')}}">
@endif

    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/daterangepicker/daterangepicker.css')}}">

@if (Route::is(['account-settings', 'add-credit-notes', 'add-debit-notes', 'add-delivery-challan', 'add-invoice', 'add-purchases-orders', 'add-purchases', 'add-quotation', 'calendar', 'companies', 'customer-account-settings', 'customer-add-quotation', 'customer-details', 'customer-invoice-details', 'customer-invoices', 'customer-plans-settings', 'customer-security-settings', 'customers', 'edit-credit-notes', 'edit-debit-notes', 'edit-delivery-challan', 'edit-invoice', 'edit-purchases-orders', 'edit-purchases', 'edit-quotation', 'expenses', 'incomes', 'index', 'invoice', 'layout-default', 'layout-dark', 'layout-mini', 'layout-rtl', 'layout-single', 'layout-transparent', 'layout-without-header', 'membership-addons', 'notes', 'payments', 'plans-billing', 'profile', 'security-settings', 'social-feed', 'super-admin-dashboard', 'supplier-payments', 'suppliers', 'tickets-list', 'todo-list', 'todo']))
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="{{URL::asset('build/css/bootstrap-datetimepicker.min.css')}}">
@endif

@if (Route::is(['email-reply', 'file-manager', 'gallery', 'search-list', 'social-feed']))
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/fancybox/jquery.fancybox.min.css')}}">
@endif

@if (Route::is(['file-manager', 'notes', 'social-feed']))
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{URL::asset('build/css/owl.carousel.min.css')}}">
@endif

@if (Route::is(['file-manager']))
    <!-- Player CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/css/plyr.css')}}">
@endif

@if (Route::is(['chart-c3']))
    <!-- ChartC3 CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/c3-chart/c3.min.css')}}">
@endif

@if (Route::is(['chart-morris']))    
    <!-- Morris CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/morris/morris.css')}}">
@endif

@if (Route::is(['form-pickers', 'maps-leaflet', 'ui-clipboard', 'ui-drag-drop', 'ui-sortable', 'ui-swiperjs']))
    <!-- Dragula CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/dragula/css/dragula.min.css')}}">
@endif

@if (Route::is(['form-editors']))
    <!-- Quill css -->
    <link href="{{URL::asset('build/plugins/quill/quill.core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('build/plugins/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('build/plugins/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
@endif

@if (Route::is(['form-pickers', 'form-range-slider']))
    <!-- Vendor css -->
    <link href="{{URL::asset('build/css/vendor.min.css')}}" rel="stylesheet">
@endif

@if (Route::is(['form-range-slider']))
    <!-- nouisliderribute css -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/nouislider/nouislider.min.css')}}">
@endif

@if (Route::is(['form-wizard']))
    <!-- Wizard CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/twitter-bootstrap-wizard/form-wizard.css')}}">
@endif

@if (Route::is(['maps-leaflet']))
    <!-- Leaflet Maps CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/leaflet/leaflet.css')}}">
@endif

@if (Route::is(['maps-vector']))
    <!-- Jsvector Maps -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/jsvectormap/css/jsvectormap.min.css')}}">
@endif

@if (Route::is(['ui-lightbox']))
    <!-- Glightbox CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/lightbox/glightbox.min.css')}}">
@endif

@if (Route::is(['ui-sortable','ui-swiperjs']))
    <link rel="stylesheet" href="{{URL::asset('build/plugins/swiper/swiper-bundle.min.css')}}">
@endif

@if (Route::is(['ui-toasts']))
    <!-- Toatr CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/toastr/toatr.css')}}">
@endif

@if (Route::is(['account-statement', 'add-credit-notes', 'annual-report', 'balance-sheet', 'bank-accounts-settings', 'bank-accounts', 'best-seller', 'blogs', 'cash-flow', 'cities', 'countries', 'credit-notes', 'customer-details', 'customer-due-report', 'customer-invoice-report', 'customer-payment-summary', 'customer-recurring-invoices', 'customer-transactions', 'customers-report', 'customers', 'edit-credit-notes', 'expense-report', 'expenses', 'faq', 'income-report', 'incomes', 'inventory-report', 'low-stock', 'membership-addons', 'membership-transactions', 'money-transfer', 'payment-summary', 'payments', 'profit-loss-report', 'purchase-order-report', 'purchase-orders-report', 'purchase-return-report', 'purchases-report', 'recurring-invoices', 'sales-orders', 'sales-report', 'sales-returns', 'sold-stock', 'states', 'stock-history', 'stock-summary', 'supplier-payments', 'supplier-report', 'suppliers', 'tax-report', 'testimonials', 'transactions', 'trial-balance', 'ui-rangeslider', 'ui-rating']))
    <!-- Rangeslider CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet" href="{{URL::asset('build/plugins/ion-rangeslider/css/ion.rangeSlider.min.css')}}">
@endif

@if (Route::is(['ui-stickynote']))
    <!-- Sticky CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/stickynote/sticky.css')}}">
@endif

@if (Route::is(['form-select2']))
    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/choices.js/public/assets/styles/choices.min.css')}}">
@endif

    <!-- Select CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/select2/css/select2.min.css')}}">

    <!-- animation CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/css/animate.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ url('build/css/style.css') }}">