	<!-- jQuery -->
	<script src="{{URL::asset('build/js/jquery-3.7.1.min.js')}}"></script>

	<!-- Feather JS -->
	<script src="{{URL::asset('build/js/feather.min.js')}}"></script>

@if (Route::is(['chat', 'email-reply', 'email', 'video-call']))
	<!-- Slimscroll JS -->
	<script src="{{URL::asset('build/js/jquery.slimscroll.min.js')}}"></script>
@endif
	
@if (!Route::is(['form-select2']))
	<!-- Daterangepikcer JS -->
	<script src="{{URL::asset('build/js/moment.min.js')}}"></script>
	<script src="{{URL::asset('build/plugins/daterangepicker/daterangepicker.js')}}"></script>
@endif

	<!-- Simplebar JS -->
	<script src="{{URL::asset('build/plugins/simplebar/simplebar.min.js')}}"></script>

@if (Route::is(['account-settings', 'add-credit-notes', 'add-debit-notes', 'add-delivery-challan', 'add-invoice', 'add-purchases-orders', 'add-purchases', 'add-quotation', 'calendar', 'companies', 'customer-account-settings', 'customer-add-quotation', 'customer-details', 'customer-invoice-details', 'customer-invoices', 'customer-plans-settings', 'customer-security-settings', 'customers', 'edit-credit-notes', 'edit-debit-notes', 'edit-delivery-challan', 'edit-invoice', 'edit-purchases-orders', 'edit-purchases', 'edit-quotation', 'expenses', 'incomes', 'index', 'invoice', 'layout-default', 'layout-dark', 'layout-mini', 'layout-rtl', 'layout-single', 'layout-transparent', 'layout-without-header', 'membership-addons', 'notes', 'payments', 'plans-billing', 'profile', 'security-settings', 'social-feed', 'super-admin-dashboard', 'supplier-payments', 'suppliers', 'tickets-list', 'todo-list', 'todo']))
	<!-- Datetimepicker JS -->
	<script src="{{URL::asset('build/js/bootstrap-datetimepicker.min.js')}}"></script>
@endif

@if (!Route::is(['form-select2']))
	<!-- Datatable JS -->
	<script src="{{URL::asset('build/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::asset('build/js/dataTables.bootstrap5.min.js')}}"></script>
@endif    
 
@if (Route::is(['add-blog', 'add-product', 'bank-account-settings', 'barcode-settings', 'custom-fields', 'edit-blog', 'edit-customer', 'edit-product', 'esignatures', 'file-manager', 'form-editors', 'invoice-settings', 'invoice-templates-settings', 'invoice-templates', 'maintenance-mode', 'payment-methods', 'sass-settings', 'seo-setup', 'tax-rates', 'thermal-printer', 'todo-list', 'todo']))
    <!-- Quill JS -->
    <script src="{{URL::asset('build/plugins/quill/quill.min.js')}}"></script>
@endif

@if (Route::is(['gdpr-cookies']))
    <!-- Summernote JS -->
    <script src="{{URL::asset('build/plugins/summernote/summernote-lite.min.js')}}"></script>
@endif

@if (Route::is(['add-blog', 'admin-dashboard', 'clear-cache', 'cronjob', 'currencies', 'customer-css', 'customer-js', 'customer-dashboard', 'database-backup', 'edit-blog', 'email-reply', 'email-settings', 'email-templates', 'email', 'gdpr-cookies', 'localization-settings', 'maintenance-mode', 'preference-settings', 'prefixes-settings', 'seo-setup', 'sitemap', 'sms-gateways', 'storage', 'super-admin-dashboard', 'system-backup', 'system-update','blog-tags']))
    <!-- Bootstrap Tagsinput JS -->
    <script src="{{URL::asset('build/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
@endif

@if (Route::is(['contact-messages', 'security-settings', 'suppliers', 'users']))
    <!-- intel Input -->
    <script src="{{URL::asset('build/plugins/intltelinput/js/intlTelInput.js')}}"></script>
@endif

@if (Route::is(['email-reply', 'file-manager', 'gallery', 'search-list', 'social-feed']))
    <!-- Fancybox JS -->
    <script src="{{URL::asset('build/plugins/fancybox/jquery.fancybox.min.js')}}"></script>
@endif

@if (Route::is(['account-statement', 'add-credit-notes', 'annual-report', 'balance-sheet', 'bank-accounts-settings', 'bank-accounts', 'best-seller', 'cash-flow', 'credit-notes', 'customer-details', 'customer-due-report', 'customer-invoice-report', 'customer-payment-summary', 'customer-recurring-invoices', 'customer-transactions', 'customers-report', 'customers', 'edit-credit-notes', 'expense-report', 'expenses', 'income-report', 'incomes', 'inventory-report', 'low-stock', 'membership-addons', 'membership-transactions', 'money-transfer', 'payment-summary', 'payments', 'profit-loss-report', 'purchase-order-report', 'purchase-orders-report', 'purchase-return-report', 'purchases-report', 'reccuring-invoices', 'sales-orders', 'sales-report', 'sales-returns', 'sold-stock', 'stock-history', 'stock-summary', 'supplier-payments', 'supplier-report', 'suppliers', 'tax-report', 'transactions', 'trial-balance', 'ui-rangeslider']))
    <!-- Rangeslider JS -->
    <script src="{{URL::asset('build/plugins/ion-rangeslider/js/ion.rangeSlider.js')}}"></script>
    <script src="{{URL::asset('build/plugins/ion-rangeslider/js/custom-rangeslider.js')}}"></script>
    <script src="{{URL::asset('build/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
@endif

@if (Route::is(['file-manager', 'notes', 'social-feed']))
    <!-- Owl Carousel -->
    <script src="{{URL::asset('build/js/owl.carousel.min.js')}}"></script>
@endif

@if (Route::is(['file-manager']))
    <!-- Player Js-->
    <script src="{{URL::asset('build/js/plyr-js.js')}}"></script>
@endif

@if (Route::is(['extended-dragula']))
    <!-- Dragula js-->
    <script src="{{URL::asset('build/plugins/dragula/dragula.min.js')}}"></script>

    <!-- Dragula Demo Component js -->
    <script src="{{URL::asset('build/js/dragula.js')}}"></script>
@endif

@if (Route::is(['calendar', 'email-reply', 'email', 'todo-list', 'todo']))
    <!-- Fullcalendar JS -->
    <script src="{{URL::asset('build/plugins/fullcalendar/index.global.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/fullcalendar/calendar-data.js')}}"></script>
@endif

@if (Route::is(['kanban-view', 'ticket-kanban', 'ui-stickynote']))
    <!-- Drag Card -->
    <script src="{{URL::asset('build/js/jquery-ui.min.js')}}"></script>
    <script src="{{URL::asset('build/js/jquery.ui.touch-punch.min.js')}}"></script>
@endif

@if (Route::is(['form-editors']))
	<!-- Quill Demo js -->
    <script src="{{URL::asset('build/js/form-quilljs.js')}}"></script>
@endif

@if (Route::is(['form-fileupload']))
    <!-- Dropzone File Js -->
    <script src="{{URL::asset('build/plugins/dropzone/dropzone-min.js')}}"></script>

    <!-- File Upload Demo js -->
    <script src="{{URL::asset('build/js/form-fileupload.js')}}"></script>
@endif

@if (Route::is(['form-mask']))
    <!-- Mask JS -->
    <script src="{{URL::asset('build/js/jquery.maskedinput.min.js')}}"></script>
    <script src="{{URL::asset('build/js/mask.js')}}"></script>
@endif

@if (Route::is(['form-pickers']))
    <!-- Vendor js -->
    <script src="{{URL::asset('build/js/vendor.min.js')}}"></script>
@endif

@if (Route::is(['form-range-slider']))
    <!-- noUiSlider js -->
    <script src="{{URL::asset('build/plugins/nouislider/nouislider.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/wnumb/wNumb.min.js')}}"></script>

    <!-- Plugins only -->
    <script src="{{URL::asset('build/js/extended-range-slider.js')}}"></script>
@endif


@if (Route::is(['form-validation']))
	<script src="{{URL::asset('build/js/form-validation.js')}}"></script>
@endif

@if (Route::is(['ui-pagination']))
	<!-- Iconify JS -->
	<script src="{{URL::asset('build/plugins/iconify-icon/iconify-icon.min.js')}}"></script>
@endif

@if (Route::is(['form-wizard']))
	<!-- Wizrd JS -->
	<script src="{{URL::asset('build/plugins/vanilla-wizard/js/wizard.min.js')}}"></script>

    <!-- Wizard JS -->
    <script src="{{URL::asset('build/js/form-wizard.js')}}"></script>
@endif

@if (Route::is(['admin-dashboard', 'chart-apex', 'clear-cache', 'cronjob', 'currencies', 'customer-css', 'customer-js', 'customer-dashboard', 'database-backup', 'email-settings', 'email-templates', 'expense-report', 'file-manager', 'form-elements', 'gdpr-cookies', 'index', 'layout-default', 'layout-dark', 'layout-mini', 'layout-rtl', 'layout-single', 'layout-transparent', 'layout-without-header', 'payment-summary', 'purchase-orders-report', 'purchase-return-report', 'purchases-report', 'sales-returns', 'sitemap', 'sms-gateways', 'storage', 'super-admin-dashboard', 'system-backup', 'system-update', 'tax-report', 'trial-balance', 'ui-breadcrumb', 'ui-buttons-group', 'ui-offcanvas']))
	<!-- Chart JS -->
	<script src="{{URL::asset('build/plugins/apexchart/apexcharts.min.js')}}"></script>
	<script src="{{URL::asset('build/plugins/apexchart/chart-data.js')}}"></script>
@endif

@if (Route::is(['chart-c3']))
    <!-- Chart JS -->
    <script src="{{URL::asset('build/plugins/c3-chart/d3.v5.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/c3-chart/c3.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/c3-chart/chart-data.js')}}"></script>
@endif

@if (Route::is(['chart-flot']))
    <!-- Chart JS -->
    <script src="{{URL::asset('build/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('build/plugins/flot/jquery.flot.fillbetween.js')}}"></script>
    <script src="{{URL::asset('build/plugins/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::asset('build/plugins/flot/chart-data.js')}}"></script>
@endif

@if (Route::is(['admin-dashboard', 'chart-js', 'clear-cache', 'cronjob', 'currencies', 'custom-js', 'custom-css', 'database-backup', 'email-settings', 'email-templates', 'gdpr-cookies', 'sitemaps', 'sms-gateways', 'storage', 'system-backup', 'system-update', 'tax-report']))
    <!-- Chart JS -->
    <script src="{{URL::asset('build/plugins/chartjs/chart.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/chartjs/chart-data.js')}}"></script>
@endif

@if (Route::is(['chart-morris']))
    <!-- Chart JS -->
    <script src="{{URL::asset('build/plugins/morris/raphael-min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/morris/morris.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/morris/chart-data.js')}}"></script>
@endif

@if (Route::is(['account-statement', 'cash-flow', 'chart-peity', 'subscriptions']))
    <!-- Chart JS -->
    <script src="{{URL::asset('build/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/peity/chart-data.js')}}"></script>
@endif

@if (Route::is(['maps-leaflet']))
    <!-- Leaflet Maps JS -->
    <script src="{{URL::asset('build/plugins/leaflet/leaflet.js')}}"></script>
    <script src="{{URL::asset('build/js/leaflet.js')}}"></script>
@endif

@if (Route::is(['maps-vector']))
    <!-- JSVector Maps MapsJS -->
    <script src="{{URL::asset('build/plugins/jsvectormap/js/jsvectormap.min.js')}}"></script>

    <script src="{{URL::asset('build/plugins/jsvectormap/maps/world-merc.js')}}"></script>
    <script src="{{URL::asset('build/js/us-merc-en.js')}}"></script>
    <script src="{{URL::asset('build/js/russia.js')}}"></script>
    <script src="{{URL::asset('build/js/spain.js')}}"></script>
    <script src="{{URL::asset('build/js/canada.js')}}"></script>
    <script src="{{URL::asset('build/js/jsvectormap.js')}}"></script>
@endif

@if (Route::is('ui-rating'))
    <!-- Rater JS -->
    <script src="{{URL::asset('build/plugins/rater-js/index.js')}}"></script>

    <!-- Internal Ratings JS -->
    <script src="{{URL::asset('build/js/ratings.js')}}"></script>
@endif

@if (Route::is(['ui-clipboard']))
    <!-- Clipboard JS -->
    <script src="{{URL::asset('build/plugins/clipboard/clipboard.min.js')}}"></script>

    <script src="{{URL::asset('build/js/clipboard.js')}}"></script>
@endif

@if (Route::is(['ui-counter']))
    <!-- Counter JS -->
    <script src="{{URL::asset('build/plugins/countup/jquery.counterup.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/countup/jquery.waypoints.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/countup/jquery.missofis-countdown.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{URL::asset('build/js/counter.js')}}"></script>
@endif

@if (Route::is(['ui-drag-drop']))
    <!-- Dragula JS -->
    <script src="{{URL::asset('build/plugins/dragula/js/dragula.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/dragula/js/drag-drop.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/dragula/js/draggable-cards.js')}}"></script>
@endif

@if (Route::is(['ui-lightbox']))
    <!-- Alertify JS -->
    <script src="{{URL::asset('build/plugins/lightbox/glightbox.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/lightbox/lightbox.js')}}"></script>
@endif

@if (Route::is(['ui-scrollbar', 'ui-scrollspy']))
    <!-- Plyr JS -->
    <script src="{{URL::asset('build/plugins/scrollbar/scrollbar.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/scrollbar/custom-scroll.js')}}"></script>
@endif

@if (Route::is(['ui-sortable']))
    <!-- Sortable JS -->
    <script src="{{URL::asset('build/plugins/sortablejs/Sortable.min.js')}}"></script>

    <!-- Internal Sortable JS -->
    <script src="{{URL::asset('build/js/sortable.js')}}"></script>
@endif

@if (Route::is(['ui-sweetalerts']))
    <!-- Sweetalert JS -->
    <script src="{{URL::asset('build/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/sweetalert/sweetalerts.min.js')}}"></script>
@endif

@if (Route::is(['ui-swiperjs']))
    <!-- Swiper JS -->
    <script src="{{URL::asset('build/plugins/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Internal Swiper JS -->
    <script src="{{URL::asset('build/js/swiper.js')}}"></script>
@endif

@if (Route::is(['ui-toasts']))
    <!-- Toast JS -->
    <script src="{{URL::asset('build/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/toastr/toastr.js')}}"></script>
@endif

@if (Route::is(['ui-tooltips']))
    <!-- Custom JS -->
    <script src="{{URL::asset('build/js/popover.js')}}"></script>
@endif

    <!-- Select2 JS -->
    <script src="{{URL::asset('build/plugins/select2/js/select2.min.js')}}"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{URL::asset('build/js/bootstrap.bundle.min.js')}}"></script>    

@if (Route::is(['form-select2']))
    <!-- Custom Select JS -->
    <script src="{{URL::asset('build/js/moment.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/choices.js/public/assets/scripts/choices.min.js')}}"></script>
@endif

@if (Route::is(['chat']))
    <!-- Chat JS -->
    <script src="{{URL::asset('build/js/chat.js')}}"></script>
@endif

@if (Route::is(['coming-soon']))
	<!-- Coming Soon JS -->
	<script src="{{URL::asset('build/js/coming-soon.js')}}"></script>
@endif

@if (Route::is(['email-reply', 'email', 'social-feed']))
	<!-- Email JS -->
    <script src="{{URL::asset('build/js/email.js')}}"></script>
@endif

@if (Route::is(['file-manager']))
    <!-- File Manager JS -->
    <script src="{{URL::asset('build/js/file-manager.js')}}"></script>
@endif

@if (Route::is(['kanban-view']))
	<!-- Kanban JS -->
    <script src="{{URL::asset('build/js/kanban.js')}}"></script>
@endif

@if (Route::is(['notes']))
	<!-- Notes JS -->
    <script src="{{URL::asset('build/js/notes.js')}}"></script>
@endif

@if (Route::is(['social-feed']))
    <!-- Sticky Sidebar JS -->
    <script src="{{URL::asset('build/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
    <script src="{{URL::asset('build/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>

	<!-- Notes JS -->
    <script src="{{URL::asset('build/js/social-feed.js')}}"></script>
@endif

@if (Route::is(['todo-list', 'todo']))
    <!-- Custom JS -->
    <script src="{{URL::asset('build/js/todo.js')}}"></script>
@endif

@if (Route::is(['two-step-verification']))
	<!-- Custom JS -->
	<script src="{{URL::asset('build/js/otp.js')}}"></script>
@endif

@if (Route::is(['form-pickers', 'form-select2', 'ui-popovers']))
    <!-- App js -->
    <script src="{{URL::asset('build/js/app.js')}}"></script>
@endif

	<!-- Custom JS -->
	<script src="{{URL::asset('build/js/script.js')}}"></script>
	
