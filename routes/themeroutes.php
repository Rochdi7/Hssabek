<?php

use Illuminate\Support\Facades\Route;

//this route is for theme ui only so do not forget her and dont get carre of it 

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/notifications', function () {
    return view('notifications');
})->name('notifications');

Route::get('/inventory', function () {
    return view('inventory');
})->name('inventory');

Route::get('/income-report', function () {
    return view('income-report');
})->name('income-report');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/account-settings', function () {
    return view('account-settings');
})->name('account-settings');

Route::get('/account-statement', function () {
    return view('account-statement');
})->name('account-statement');

Route::get('/add-blog', function () {
    return view('add-blog');
})->name('add-blog');

Route::get('/add-customer', function () {
    return view('add-customer');
})->name('add-customer');

Route::get('/add-credit-notes', function () {
    return view('add-credit-notes');
})->name('add-credit-notes');

Route::get('/add-delivery-challan', function () {
    return view('add-delivery-challan');
})->name('add-delivery-challan');

Route::get('/add-invoice', function () {
    return view('add-invoice');
})->name('add-invoice');

Route::get('/add-product', function () {
    return view('add-product');
})->name('add-product');

Route::get('/add-purchases-orders', function () {
    return view('add-purchases-orders');
})->name('add-purchases-orders');

Route::get('/add-purchases', function () {
    return view('add-purchases');
})->name('add-purchases');

Route::get('/add-quotation', function () {
    return view('add-quotation');
})->name('add-quotation');

Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
})->name('admin-dashboard');

Route::get('/ai-configuration', function () {
    return view('ai-configuration');
})->name('ai-configuration');

Route::get('/annual-report', function () {
    return view('annual-report');
})->name('annual-report');

Route::get('/api-keys', function () {
    return view('api-keys');
})->name('api-keys');

Route::get('/appearance-settings', function () {
    return view('appearance-settings');
})->name('appearance-settings');

Route::get('/authentication-settings', function () {
    return view('authentication-settings');
})->name('authentication-settings');

Route::get('/balance-sheet', function () {
    return view('balance-sheet');
})->name('balance-sheet');

Route::get('/bank-accounts-settings', function () {
    return view('bank-accounts-settings');
})->name('bank-accounts-settings');

Route::get('/bank-accounts-type', function () {
    return view('bank-accounts-type');
})->name('bank-accounts-type');

Route::get('/bank-accounts', function () {
    return view('bank-accounts');
})->name('bank-accounts');

Route::get('/database-backup', function () {
    return view('database-backup');
})->name('database-backup');

Route::get('/debit-notes', function () {
    return view('debit-notes');
})->name('debit-notes');

Route::get('/delete-account-request', function () {
    return view('delete-account-request');
})->name('delete-account-request');

Route::get('/delivery-challans', function () {
    return view('delivery-challans');
})->name('delivery-challans');

Route::get('/domain-hosting-invoice', function () {
    return view('domain-hosting-invoice');
})->name('domain-hosting-invoice');

Route::get('/domain', function () {
    return view('domain');
})->name('domain');

Route::get('/ecommerce-invoice', function () {
    return view('ecommerce-invoice');
})->name('ecommerce-invoice');

Route::get('/edit-blog', function () {
    return view('edit-blog');
})->name('edit-blog');

Route::get('/edit-credit-notes', function () {
    return view('edit-credit-notes');
})->name('edit-credit-notes');

Route::get('/edit-customer', function () {
    return view('edit-customer');
})->name('edit-customer');

Route::get('/edit-debit-notes', function () {
    return view('edit-debit-notes');
})->name('edit-debit-notes');

Route::get('/edit-delivery-challan', function () {
    return view('edit-delivery-challan');
})->name('edit-delivery-challan');

Route::get('/edit-invoice', function () {
    return view('edit-invoice');
})->name('edit-invoice');

Route::get('/edit-purchases-orders', function () {
    return view('edit-purchases-orders');
})->name('edit-purchases-orders');

Route::get('/edit-purchases', function () {
    return view('edit-purchases');
})->name('edit-purchases');

Route::get('/edit-product', function () {
    return view('edit-product');
})->name('edit-product');

Route::get('/edit-quotation', function () {
    return view('edit-quotation');
})->name('edit-quotation');

Route::get('/email-reply', function () {
    return view('email-reply');
})->name('email-reply');

Route::get('/email-settings', function () {
    return view('email-settings');
})->name('email-settings');

Route::get('/email-templates', function () {
    return view('email-templates');
})->name('email-templates');

Route::get('/email-verification', function () {
    return view('email-verification');
})->name('email-verification');

Route::get('/email', function () {
    return view('email');
})->name('email');

Route::get('/error-404', function () {
    return view('error-404');
})->name('error-404');

Route::get('/error-500', function () {
    return view('error-500');
})->name('error-500');

Route::get('/esignatures', function () {
    return view('esignatures');
})->name('esignatures');

Route::get('/expense-report', function () {
    return view('expense-report');
})->name('expense-report');

Route::get('/expenses', function () {
    return view('expenses');
})->name('expenses');

Route::get('/extended-dragula', function () {
    return view('extended-dragula');
})->name('extended-dragula');

Route::get('/kanban-view', function () {
    return view('kanban-view');
})->name('kanban-view');

Route::get('/language-setting2', function () {
    return view('language-setting2');
})->name('language-setting2');

Route::get('/language-setting3', function () {
    return view('language-setting3');
})->name('language-setting3');

Route::get('/language-settings', function () {
    return view('language-settings');
})->name('language-settings');

Route::get('/layout-dark', function () {
    return view('layout-dark');
})->name('layout-dark');

Route::get('/layout-default', function () {
    return view('layout-default');
})->name('layout-default');

Route::get('/layout-mini', function () {
    return view('layout-mini');
})->name('layout-mini');

Route::get('/layout-rtl', function () {
    return view('layout-rtl');
})->name('layout-rtl');

Route::get('/layout-single', function () {
    return view('layout-single');
})->name('layout-single');

Route::get('/layout-transparent', function () {
    return view('layout-transparent');
})->name('layout-transparent');

Route::get('/layout-without-header', function () {
    return view('layout-without-header');
})->name('layout-without-header');

Route::get('/localization-settings', function () {
    return view('localization-settings');
})->name('localization-settings');

Route::get('/lock-screen', function () {
    return view('lock-screen');
})->name('lock-screen');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/low-stock', function () {
    return view('low-stock');
})->name('low-stock');

Route::get('/maintenance-mode', function () {
    return view('maintenance-mode');
})->name('maintenance-mode');

Route::get('/membership-addons', function () {
    return view('membership-addons');
})->name('membership-addons');

Route::get('/membership-plans', function () {
    return view('membership-plans');
})->name('membership-plans');

Route::get('/membership-transactions', function () {
    return view('membership-transactions');
})->name('membership-transactions');

Route::get('/money-exchange-invoice', function () {
    return view('money-exchange-invoice');
})->name('money-exchange-invoice');

Route::get('/money-transfer', function () {
    return view('money-transfer');
})->name('money-transfer');

Route::get('/movie-ticket-booking-invoice', function () {
    return view('movie-ticket-booking-invoice');
})->name('movie-ticket-booking-invoice');

Route::get('/notes', function () {
    return view('notes');
})->name('notes');

Route::get('/notifications-settings', function () {
    return view('notifications-settings');
})->name('notifications-settings');

Route::get('/outgoing-call', function () {
    return view('outgoing-call');
})->name('outgoing-call');

Route::get('/sales-orders', function () {
    return view('sales-orders');
})->name('sales-orders');

Route::get('/sales-report', function () {
    return view('sales-report');
})->name('sales-report');

Route::get('/sales-returns', function () {
    return view('sales-returns');
})->name('sales-returns');

Route::get('/sass-settings', function () {
    return view('sass-settings');
})->name('sass-settings');

Route::get('/search-list', function () {
    return view('search-list');
})->name('search-list');

Route::get('/security-settings', function () {
    return view('security-settings');
})->name('security-settings');

Route::get('/seo-setup', function () {
    return view('seo-setup');
})->name('seo-setup');

Route::get('/sitemap', function () {
    return view('sitemap');
})->name('sitemap');

Route::get('/sms-gateways', function () {
    return view('sms-gateways');
})->name('sms-gateways');

Route::get('/social-feed', function () {
    return view('social-feed');
})->name('social-feed');

Route::get('/sold-stock', function () {
    return view('sold-stock');
})->name('sold-stock');

Route::get('/starter', function () {
    return view('starter');
})->name('starter');

Route::get('/stock-history', function () {
    return view('stock-history');
})->name('stock-history');

Route::get('/states', function () {
    return view('states');
})->name('states');

Route::get('/stock-summary', function () {
    return view('stock-summary');
})->name('stock-summary');

Route::get('/storage', function () {
    return view('storage');
})->name('storage');

Route::get('/student-billing-invoice', function () {
    return view('student-billing-invoice');
})->name('student-billing-invoice');

Route::get('/subscribers', function () {
    return view('subscribers');
})->name('subscribers');

Route::get('/subscriptions', function () {
    return view('subscriptions');
})->name('subscriptions');

Route::get('/success', function () {
    return view('success');
})->name('success');

Route::get('/super-admin-dashboard', function () {
    return view('super-admin-dashboard');
})->name('super-admin-dashboard');

Route::get('/supplier-payments', function () {
    return view('supplier-payments');
})->name('supplier-payments');

Route::get('/supplier-report', function () {
    return view('supplier-report');
})->name('supplier-report');

Route::get('/suppliers', function () {
    return view('suppliers');
})->name('suppliers');

Route::get('/system-backup', function () {
    return view('system-backup');
})->name('system-backup');

Route::get('/system-update', function () {
    return view('system-update');
})->name('system-update');

Route::get('/tax-rates', function () {
    return view('tax-rates');
})->name('tax-rates');

Route::get('/tax-report', function () {
    return view('tax-report');
})->name('tax-report');

Route::get('/terms-condition', function () {
    return view('terms-condition');
})->name('terms-condition');

Route::get('/testimonials', function () {
    return view('testimonials');
})->name('testimonials');

Route::get('/thermal-printer', function () {
    return view('thermal-printer');
})->name('thermal-printer');

Route::get('/ticket-details', function () {
    return view('ticket-details');
})->name('ticket-details');

Route::get('/ticket-kanban', function () {
    return view('ticket-kanban');
})->name('ticket-kanban');

Route::get('/tickets-list', function () {
    return view('tickets-list');
})->name('tickets-list');

Route::get('/tickets', function () {
    return view('tickets');
})->name('tickets');

Route::get('/timeline', function () {
    return view('timeline');
})->name('timeline');

Route::get('/todo-list', function () {
    return view('todo-list');
})->name('todo-list');

Route::get('/todo', function () {
    return view('todo');
})->name('todo');

Route::get('/transactions', function () {
    return view('transactions');
})->name('transactions');

Route::get('/train-ticket-invoice', function () {
    return view('train-ticket-invoice');
})->name('train-ticket-invoice');

Route::get('/trial-balance', function () {
    return view('trial-balance');
})->name('trial-balance');

Route::get('/two-step-verification', function () {
    return view('two-step-verification');
})->name('two-step-verification');

Route::get('/ui-accordion', function () {
    return view('ui-accordion');
})->name('ui-accordion');

Route::get('/ui-alerts', function () {
    return view('ui-alerts');
})->name('ui-alerts');

Route::get('/ui-avatar', function () {
    return view('ui-avatar');
})->name('ui-avatar');

Route::get('/ui-badges', function () {
    return view('ui-badges');
})->name('ui-badges');

Route::get('/ui-breadcrumb', function () {
    return view('ui-breadcrumb');
})->name('ui-breadcrumb');

Route::get('/ui-buttons-group', function () {
    return view('ui-buttons-group');
})->name('ui-buttons-group');

Route::get('/ui-buttons', function () {
    return view('ui-buttons');
})->name('ui-buttons');

Route::get('/ui-cards', function () {
    return view('ui-cards');
})->name('ui-cards');

Route::get('/ui-carousel', function () {
    return view('ui-carousel');
})->name('ui-carousel');

Route::get('/ui-clipboard', function () {
    return view('ui-clipboard');
})->name('ui-clipboard');

Route::get('/ui-collapse', function () {
    return view('ui-collapse');
})->name('ui-collapse');

Route::get('/ui-colors', function () {
    return view('ui-colors');
})->name('ui-colors');

Route::get('/ui-counter', function () {
    return view('ui-counter');
})->name('ui-counter');

Route::get('/ui-dropdowns', function () {
    return view('ui-dropdowns');
})->name('ui-dropdowns');

Route::get('/ui-grid', function () {
    return view('ui-grid');
})->name('ui-grid');

Route::get('/ui-images', function () {
    return view('ui-images');
})->name('ui-images');

Route::get('/ui-lightbox', function () {
    return view('ui-lightbox');
})->name('ui-lightbox');

Route::get('/ui-links', function () {
    return view('ui-links');
})->name('ui-links');

Route::get('/ui-list-group', function () {
    return view('ui-list-group');
})->name('ui-list-group');

Route::get('/ui-modals', function () {
    return view('ui-modals');
})->name('ui-modals');

Route::get('/ui-nav-tabs', function () {
    return view('ui-nav-tabs');
})->name('ui-nav-tabs');

Route::get('/ui-notifications', function () {
    return view('ui-notifications');
})->name('ui-notifications');

Route::get('/ui-offcanvas', function () {
    return view('ui-offcanvas');
})->name('ui-offcanvas');

Route::get('/ui-pagination', function () {
    return view('ui-pagination');
})->name('ui-pagination');

Route::get('/ui-placeholders', function () {
    return view('ui-placeholders');
})->name('ui-placeholders');

Route::get('/ui-popovers', function () {
    return view('ui-popovers');
})->name('ui-popovers');

Route::get('/ui-progress', function () {
    return view('ui-progress');
})->name('ui-progress');

Route::get('/ui-rangeslider', function () {
    return view('ui-rangeslider');
})->name('ui-rangeslider');

Route::get('/ui-rating', function () {
    return view('ui-rating');
})->name('ui-rating');

Route::get('/ui-ratio', function () {
    return view('ui-ratio');
})->name('ui-ratio');

Route::get('/ui-scrollbar', function () {
    return view('ui-scrollbar');
})->name('ui-scrollbar');

Route::get('/ui-scrollspy', function () {
    return view('ui-scrollspy');
})->name('ui-scrollspy');

Route::get('/ui-sortable', function () {
    return view('ui-sortable');
})->name('ui-sortable');

Route::get('/ui-spinner', function () {
    return view('ui-spinner');
})->name('ui-spinner');

Route::get('/ui-sweetalerts', function () {
    return view('ui-sweetalerts');
})->name('ui-sweetalerts');

Route::get('/ui-toasts', function () {
    return view('ui-toasts');
})->name('ui-toasts');

Route::get('/ui-tooltips', function () {
    return view('ui-tooltips');
})->name('ui-tooltips');

Route::get('/ui-typography', function () {
    return view('ui-typography');
})->name('ui-typography');

Route::get('/ui-utilities', function () {
    return view('ui-utilities');
})->name('ui-utilities');

Route::get('/under-construction', function () {
    return view('under-construction');
})->name('under-construction');

Route::get('/under-maintenance', function () {
    return view('under-maintenance');
})->name('under-maintenance');

Route::get('/units', function () {
    return view('units');
})->name('units');

Route::get('/users', function () {
    return view('users');
})->name('users');

Route::get('/video-call', function () {
    return view('video-call');
})->name('video-call');

Route::get('/voice-call', function () {
    return view('voice-call');
})->name('voice-call');

Route::get('/chart-apex', function () {
    return view('chart-apex');
})->name('chart-apex');

Route::get('/chart-js', function () {
    return view('chart-js');
})->name('chart-js');

Route::get('/chart-morris', function () {
    return view('chart-morris');
})->name('chart-morris');

Route::get('/chart-flot', function () {
    return view('chart-flot');
})->name('chart-flot');

Route::get('/chart-peity', function () {
    return view('chart-peity');
})->name('chart-peity');

Route::get('/chart-c3', function () {
    return view('chart-c3');
})->name('chart-c3');

Route::get('/form-basic-inputs', function () {
    return view('form-basic-inputs');
})->name('form-basic-inputs');

Route::get('/form-checkbox-radios', function () {
    return view('form-checkbox-radios');
})->name('form-checkbox-radios');

Route::get('/form-elements', function () {
    return view('form-elements');
})->name('form-elements');

Route::get('/form-fileupload', function () {
    return view('form-fileupload');
})->name('form-fileupload');

Route::get('/form-floating-labels', function () {
    return view('form-floating-labels');
})->name('form-floating-labels');

Route::get('/form-grid-gutters', function () {
    return view('form-grid-gutters');
})->name('form-grid-gutters');

Route::get('/form-horizontal', function () {
    return view('form-horizontal');
})->name('form-horizontal');

Route::get('/form-input-groups', function () {
    return view('form-input-groups');
})->name('form-input-groups');

Route::get('/form-mask', function () {
    return view('form-mask');
})->name('form-mask');

Route::get('/form-pickers', function () {
    return view('form-pickers');
})->name('form-pickers');

Route::get('/form-select2', function () {
    return view('form-select2');
})->name('form-select2');

Route::get('/form-validation', function () {
    return view('form-validation');
})->name('form-validation');

Route::get('/form-vertical', function () {
    return view('form-vertical');
})->name('form-vertical');

Route::get('/form-wizard', function () {
    return view('form-wizard');
})->name('form-wizard');

Route::get('/icon-bootstrap', function () {
    return view('icon-bootstrap');
})->name('icon-bootstrap');

Route::get('/icon-fontawesome', function () {
    return view('icon-fontawesome');
})->name('icon-fontawesome');

Route::get('/icon-feather', function () {
    return view('icon-feather');
})->name('icon-feather');

Route::get('/icon-ionic', function () {
    return view('icon-ionic');
})->name('icon-ionic');

Route::get('/icon-material', function () {
    return view('icon-material');
})->name('icon-material');

Route::get('/icon-pe7', function () {
    return view('icon-pe7');
})->name('icon-pe7');

Route::get('/icon-simpleline', function () {
    return view('icon-simpleline');
})->name('icon-simpleline');

Route::get('/icon-themify', function () {
    return view('icon-themify');
})->name('icon-themify');

Route::get('/icon-weather', function () {
    return view('icon-weather');
})->name('icon-weather');

Route::get('/icon-typicon', function () {
    return view('icon-typicon');
})->name('icon-typicon');

Route::get('/icon-flag', function () {
    return view('icon-flag');
})->name('icon-flag');

Route::get('/icon-remix', function () {
    return view('icon-remix');
})->name('icon-remix');

Route::get('/icon-tabler', function () {
    return view('icon-tabler');
})->name('icon-tabler');

Route::get('/maps-leaflet', function () {
    return view('maps-leaflet');
})->name('maps-leaflet');

Route::get('/maps-vector', function () {
    return view('maps-vector');
})->name('maps-vector');

Route::get('/tables-basic', function () {
    return view('tables-basic');
})->name('tables-basic');

Route::get('/data-tables', function () {
    return view('data-tables');
})->name('data-tables');

Route::get('/barcode-settings', function () {
    return view('barcode-settings');
})->name('barcode-settings');

Route::get('/blog-categories', function () {
    return view('blog-categories');
})->name('blog-categories');

Route::get('/blog-comments', function () {
    return view('blog-comments');
})->name('blog-comments');

Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog-details');

Route::get('/blogs', function () {
    return view('blogs');
})->name('blogs');

Route::get('/blog-tags', function () {
    return view('blog-tags');
})->name('blog-tags');

Route::get('/bus-booking-invoice', function () {
    return view('bus-booking-invoice');
})->name('bus-booking-invoice');

Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');

Route::get('/call-history', function () {
    return view('call-history');
})->name('call-history');

Route::get('/car-booking-invoice', function () {
    return view('car-booking-invoice');
})->name('car-booking-invoice');

Route::get('/cash-flow', function () {
    return view('cash-flow');
})->name('cash-flow');

Route::get('/category', function () {
    return view('category');
})->name('category');

Route::get('/chat', function () {
    return view('chat');
})->name('chat');

Route::get('/cities', function () {
    return view('cities');
})->name('cities');

Route::get('/clear-cache', function () {
    return view('clear-cache');
})->name('clear-cache');

Route::get('/coffee-shop-invoice', function () {
    return view('coffee-shop-invoice');
})->name('coffee-shop-invoice');

Route::get('/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');

Route::get('/companies', function () {
    return view('companies');
})->name('companies');

Route::get('/company-settings', function () {
    return view('company-settings');
})->name('company-settings');

Route::get('/contact-messages', function () {
    return view('contact-messages');
})->name('contact-messages');

Route::get('/best-seller', function () {
    return view('best-seller');
})->name('best-seller');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/countries', function () {
    return view('countries');
})->name('countries');

Route::get('/credit-notes', function () {
    return view('credit-notes');
})->name('credit-notes');

Route::get('/cronjob', function () {
    return view('cronjob');
})->name('cronjob');

Route::get('/currencies', function () {
    return view('currencies');
})->name('currencies');

Route::get('/custom-css', function () {
    return view('custom-css');
})->name('custom-css');

Route::get('/customer-account-settings', function () {
    return view('customer-account-settings');
})->name('customer-account-settings');

Route::get('/customer-add-quotation', function () {
    return view('customer-add-quotation');
})->name('customer-add-quotation');

Route::get('/customer-dashboard', function () {
    return view('customer-dashboard');
})->name('customer-dashboard');

Route::get('/customer-details', function () {
    return view('customer-details');
})->name('customer-details');

Route::get('/customer-due-report', function () {
    return view('customer-due-report');
})->name('customer-due-report');

Route::get('/customer-invoice-details', function () {
    return view('customer-invoice-details');
})->name('customer-invoice-details');

Route::get('/customer-invoice-report', function () {
    return view('customer-invoice-report');
})->name('customer-invoice-report');

Route::get('/customer-invoices', function () {
    return view('customer-invoices');
})->name('customer-invoices');

Route::get('/customer-notification-settings', function () {
    return view('customer-notification-settings');
})->name('customer-notification-settings');

Route::get('/customer-payment-summary', function () {
    return view('customer-payment-summary');
})->name('customer-payment-summary');

Route::get('/customer-plans-settings', function () {
    return view('customer-plans-settings');
})->name('customer-plans-settings');

Route::get('/customer-quotations', function () {
    return view('customer-quotations');
})->name('customer-quotations');

Route::get('/customer-recurring-invoices', function () {
    return view('customer-recurring-invoices');
})->name('customer-recurring-invoices');

Route::get('/customers', function () {
    return view('customers');
})->name('customers');

Route::get('/companies', function () {
    return view('companies');
})->name('companies');

Route::get('/customer-security-settings', function () {
    return view('customer-security-settings');
})->name('customer-security-settings');

Route::get('/customers-report', function () {
    return view('customers-report');
})->name('customers-report');

Route::get('/customer-transactions', function () {
    return view('customer-transactions');
})->name('customer-transactions');

Route::get('/custom-fields', function () {
    return view('custom-fields');
})->name('custom-fields');

Route::get('/custom-js', function () {
    return view('custom-js');
})->name('custom-js');

Route::get('/file-manager', function () {
    return view('file-manager');
})->name('file-manager');

Route::get('/fitness-center-invoice', function () {
    return view('fitness-center-invoice');
})->name('fitness-center-invoice');

Route::get('/flight-booking-invoice', function () {
    return view('flight-booking-invoice');
})->name('flight-booking-invoice');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

Route::get('/free-trial', function () {
    return view('free-trial');
})->name('free-trial');

Route::get('/form-editors', function () {
    return view('form-editors');
})->name('form-editors');

Route::get('/form-range-slider', function () {
    return view('form-range-slider');
})->name('form-range-slider');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/gdpr-cookies', function () {
    return view('gdpr-cookies');
})->name('gdpr-cookies');

Route::get('/general-invoice-1', function () {
    return view('general-invoice-1');
})->name('general-invoice-1');

Route::get('/general-invoice-1a', function () {
    return view('general-invoice-1a');
})->name('general-invoice-1a');

Route::get('/general-invoice-2', function () {
    return view('general-invoice-2');
})->name('general-invoice-2');

Route::get('/general-invoice-2a', function () {
    return view('general-invoice-2a');
})->name('general-invoice-2a');

Route::get('/general-invoice-3', function () {
    return view('general-invoice-3');
})->name('general-invoice-3');

Route::get('/general-invoice-4', function () {
    return view('general-invoice-4');
})->name('general-invoice-4');

Route::get('/general-invoice-5', function () {
    return view('general-invoice-5');
})->name('general-invoice-5');

Route::get('/general-invoice-6', function () {
    return view('general-invoice-6');
})->name('general-invoice-6');

Route::get('/general-invoice-7', function () {
    return view('general-invoice-7');
})->name('general-invoice-7');

Route::get('/general-invoice-8', function () {
    return view('general-invoice-8');
})->name('general-invoice-8');

Route::get('/general-invoice-9', function () {
    return view('general-invoice-9');
})->name('general-invoice-9');

Route::get('/general-invoice-10', function () {
    return view('general-invoice-10');
})->name('general-invoice-10');

Route::get('/hotel-booking-invoice', function () {
    return view('hotel-booking-invoice');
})->name('hotel-booking-invoice');

Route::get('/incomes', function () {
    return view('incomes');
})->name('incomes');

Route::get('/incoming-call', function () {
    return view('incoming-call');
})->name('incoming-call');

Route::get('/integrations-settings', function () {
    return view('integrations-settings');
})->name('integrations-settings');

Route::get('/internet-billing-invoice', function () {
    return view('internet-billing-invoice');
})->name('internet-billing-invoice');

Route::get('/inventory-report', function () {
    return view('inventory-report');
})->name('inventory-report');

Route::get('/invoice-details', function () {
    return view('invoice-details');
})->name('invoice-details');

Route::get('/invoice-medical', function () {
    return view('invoice-medical');
})->name('invoice-medical');

Route::get('/invoice-settings', function () {
    return view('invoice-settings');
})->name('invoice-settings');

Route::get('/invoice-templates-settings', function () {
    return view('invoice-templates-settings');
})->name('invoice-templates-settingsomes');

Route::get('/invoice-templates', function () {
    return view('invoice-templates');
})->name('invoice-templates');

Route::get('/invoice', function () {
    return view('invoice');
})->name('invoice');

Route::get('/invoices', function () {
    return view('invoices');
})->name('invoices');

Route::get('/packages-grid', function () {
    return view('packages-grid');
})->name('packages-grid');

Route::get('/packages', function () {
    return view('packages');
})->name('packages');

Route::get('/pages', function () {
    return view('pages');
})->name('pages');

Route::get('/payment-methods', function () {
    return view('payment-methods');
})->name('payment-methods');

Route::get('/payment-summary', function () {
    return view('payment-summary');
})->name('payment-summary');

Route::get('/payments', function () {
    return view('payments');
})->name('payments');

Route::get('/permission', function () {
    return view('permission');
})->name('permission');

Route::get('/plans-billings', function () {
    return view('plans-billings');
})->name('plans-billings');

Route::get('/plugin-manager', function () {
    return view('plugin-manager');
})->name('plugin-manager');

Route::get('/preference-settings', function () {
    return view('preference-settings');
})->name('preference-settings');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/profit-loss-report', function () {
    return view('profit-loss-report');
})->name('profit-loss-report');

Route::get('/purchase-order-report', function () {
    return view('purchase-order-report');
})->name('purchase-order-report');

Route::get('/purchase-orders-report', function () {
    return view('purchase-orders-report');
})->name('purchase-orders-report');

Route::get('/purchase-orders', function () {
    return view('purchase-orders');
})->name('purchase-orders');

Route::get('/purchase-return-report', function () {
    return view('purchase-return-report');
})->name('purchase-return-report');

Route::get('/purchase-transaction', function () {
    return view('purchase-transaction');
})->name('purchase-transaction');

Route::get('/purchases-report', function () {
    return view('purchases-report');
})->name('purchases-report');

Route::get('/purchases', function () {
    return view('purchases');
})->name('purchases');

Route::get('/quotation-report', function () {
    return view('quotation-report');
})->name('quotation-report');

Route::get('/quotations', function () {
    return view('quotations');
})->name('quotations');

Route::get('/receipt-invoice-1', function () {
    return view('receipt-invoice-1');
})->name('receipt-invoice-1');

Route::get('/receipt-invoice-2', function () {
    return view('receipt-invoice-2');
})->name('receipt-invoice-2');

Route::get('/receipt-invoice-3', function () {
    return view('receipt-invoice-3');
})->name('receipt-invoice-3');

Route::get('/receipt-invoice-4', function () {
    return view('receipt-invoice-4');
})->name('receipt-invoice-4');

Route::get('/recurring-invoices', function () {
    return view('recurring-invoices');
})->name('recurring-invoices');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/reset-password', function () {
    return view('reset-password');
})->name('reset-password');

Route::get('/restaurants-invoice', function () {
    return view('restaurants-invoice');
})->name('restaurants-invoice');

Route::get('/roles-permissions', function () {
    return view('roles-permissions');
})->name('roles-permissions');
Route::get('/prefixes-settings', function () {
    return view('prefixes-settings');
})->name('prefixes-settings');
Route::get('/add-debit-notes', function () {
    return view('add-debit-notes');
})->name('add-debit-notes');
