@php
    // ============================================================
    // Dynamic Page Categories — based on $page variable set in each view
    // Instead of hardcoded Route::is() from the theme, we use $page
    // ============================================================
    $page = $page ?? 'index';

    // Auth pages: full-screen, no header/sidebar, white bg, auth-bg wrapper
    $authPages = [
        'login',
        'register',
        'forgot-password',
        'reset-password',
        'lock-screen',
        'two-step-verification',
        'two-step-verifcation',
        'email-verification',
        'free-trial',
        'success',
    ];

    // Error / status pages: white bg, no header/sidebar
    $statusPages = ['error-403', 'error-404', 'error-500', 'under-construction', 'under-maintenance', 'coming-soon'];

    // Invoice print pages: no header/sidebar
    $invoicePages = [
        'general-invoice-1',
        'general-invoice-1a',
        'general-invoice-2',
        'general-invoice-2a',
        'general-invoice-3',
        'general-invoice-4',
        'general-invoice-5',
        'general-invoice-6',
        'general-invoice-7',
        'general-invoice-8',
        'general-invoice-9',
        'general-invoice-10',
        'hotel-booking-invoice',
        'domain-hosting-invoice',
        'ecommerce-invoice',
        'internet-billing-invoice',
        'invoice-medical',
        'receipt-invoice-1',
        'receipt-invoice-2',
        'receipt-invoice-3',
        'receipt-invoice-4',
        'money-exchange-invoice',
        'movie-ticket-booking-invoice',
        'student-billing-invoice',
        'train-ticket-invoice',
        'bus-booking-invoice',
        'car-booking-invoice',
        'coffee-shop-invoice',
        'fitness-center-invoice',
        'flight-booking-invoice',
        'restaurants-invoice',
    ];

    // Layout variants
    $layoutMini = $page === 'layout-mini';
    $layoutRtl = $page === 'layout-rtl';
    $layoutSingle = $page === 'layout-single';
    $layoutTransparent = $page === 'layout-transparent';
    $layoutWithoutHeader = $page === 'layout-without-header';
    $layoutDark = $page === 'layout-dark';

    // Computed booleans
    $isAuth = in_array($page, $authPages);
    $isStatus = in_array($page, $statusPages);
    $isInvoice = in_array($page, $invoicePages);
    $isFullscreen = $isAuth || $isStatus || $isInvoice;
    $hideHeaderSidebar = $isFullscreen;
@endphp
<!DOCTYPE html>
@php $isRtl = app()->getLocale() === 'ar'; @endphp
@if ($layoutMini)
    <html lang="{{ app()->getLocale() }}" @if($isRtl) dir="rtl" @endif data-layout="mini">
@elseif ($layoutDark)
    <html lang="{{ app()->getLocale() }}" @if($isRtl) dir="rtl" @endif data-bs-theme="dark" data-sidebar="light" data-color="primary" data-topbar="white"
        data-layout="default" data-size="default" data-width="fluid">
@elseif ($layoutRtl)
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@elseif ($layoutSingle)
    <html lang="{{ app()->getLocale() }}" @if($isRtl) dir="rtl" @endif data-layout="single">
@elseif ($layoutTransparent)
    <html lang="{{ app()->getLocale() }}" @if($isRtl) dir="rtl" @endif data-layout="transparent">
@elseif ($layoutWithoutHeader)
    <html lang="{{ app()->getLocale() }}" @if($isRtl) dir="rtl" @endif data-layout="without-header">
@else
    <html lang="{{ app()->getLocale() }}" @if($isRtl) dir="rtl" @endif>
@endif

@include('backoffice.components.title-meta')

@if ($isAuth)
<body class="bg-white @if($isRtl) layout-mode-rtl @endif">
@elseif ($isStatus)
<body class="bg-white coming-soon @if($isRtl) layout-mode-rtl @endif">
@elseif ($page === 'general-invoice-5')
<body class="bg-dark">
@elseif ($layoutMini)
<body class="mini-sidebar">
@elseif ($layoutRtl)
<body class="layout-mode-rtl">
@elseif ($isRtl)
<body class="layout-mode-rtl">
@else
<body>
@endif

<!-- Start Main Wrapper -->
@if ($isAuth || $isStatus)
    <div class="main-wrapper auth-bg">
    @else
        <div class="main-wrapper">
@endif

<!-- Global Alerts -->
@include('backoffice.components.alerts')

@if (auth()->check() && !$hideHeaderSidebar)
    @include('backoffice.layout.partials.header')
    @include('backoffice.layout.partials.sidebar')
@endif

@yield('content')

@component('backoffice.components.modal-popup')
@endcomponent

</div>
<!-- End Main Wrapper -->

@include('backoffice.layout.partials.footer-scripts')

<!-- PWA Install Button -->
<button id="pwa-install-btn" title="Installer l'application" style="
    display: none;
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 9999;
    width: 52px;
    height: 52px;
    border-radius: 50%;
    border: none;
    background: #4361ee;
    color: #fff;
    font-size: 22px;
    box-shadow: 0 4px 18px rgba(67,97,238,0.45);
    cursor: pointer;
    align-items: center;
    justify-content: center;
    transition: transform 0.2s, box-shadow 0.2s;
" onmouseover="this.style.transform='scale(1.1)';this.style.boxShadow='0 6px 24px rgba(67,97,238,0.6)'"
   onmouseout="this.style.transform='scale(1)';this.style.boxShadow='0 4px 18px rgba(67,97,238,0.45)'">
    <i class="isax isax-mobile" style="font-size:22px;"></i>
</button>

<!-- iOS Safari install tooltip -->
<div id="ios-install-tooltip" style="
    display: none;
    position: fixed;
    bottom: 88px;
    right: 12px;
    z-index: 10000;
    background: #fff;
    color: #333;
    border-radius: 12px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.18);
    padding: 14px 16px;
    max-width: 240px;
    font-size: 13px;
    line-height: 1.5;
    text-align: center;
">
    <div style="font-weight:600;margin-bottom:6px;">Installer l'application</div>
    <div>Appuyez sur <strong>Partager</strong> <span style="font-size:16px;">⬆️</span> puis <strong>« Sur l'écran d'accueil »</strong></div>
    <button onclick="document.getElementById('ios-install-tooltip').style.display='none'" style="
        margin-top:10px;border:none;background:#4361ee;color:#fff;
        border-radius:8px;padding:5px 16px;cursor:pointer;font-size:12px;
    ">OK</button>
    <!-- Arrow pointing down-right toward the button -->
    <div style="
        position:absolute;bottom:-10px;right:24px;
        width:0;height:0;
        border-left:10px solid transparent;
        border-right:10px solid transparent;
        border-top:10px solid #fff;
    "></div>
</div>

<script>
(function () {
    // Register service worker
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function () {
            navigator.serviceWorker.register('/sw.js').catch(function () {});
        });
    }

    var installBtn = document.getElementById('pwa-install-btn');
    var iosTooltip  = document.getElementById('ios-install-tooltip');

    // Detect iOS Safari (not Chrome/Firefox on iOS which also have /iPhone|iPad/)
    var isIos = /iphone|ipad|ipod/i.test(navigator.userAgent);
    var isSafari = /^((?!chrome|android|crios|fxios).)*safari/i.test(navigator.userAgent);
    var isInStandaloneMode = ('standalone' in navigator) && navigator.standalone;

    if (isIos && isSafari && !isInStandaloneMode) {
        // Show button immediately on iOS Safari — beforeinstallprompt never fires here
        if (installBtn) installBtn.style.display = 'flex';

        if (installBtn) {
            installBtn.addEventListener('click', function () {
                if (iosTooltip) {
                    iosTooltip.style.display = iosTooltip.style.display === 'none' ? 'block' : 'none';
                }
            });
        }
    } else {
        // Android / Desktop Chrome — use native install prompt
        var deferredPrompt = null;

        window.addEventListener('beforeinstallprompt', function (e) {
            e.preventDefault();
            deferredPrompt = e;
            if (installBtn) installBtn.style.display = 'flex';
        });

        if (installBtn) {
            installBtn.addEventListener('click', function () {
                if (!deferredPrompt) return;
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then(function () {
                    deferredPrompt = null;
                    installBtn.style.display = 'none';
                });
            });
        }

        window.addEventListener('appinstalled', function () {
            if (installBtn) installBtn.style.display = 'none';
            deferredPrompt = null;
        });
    }
})();
</script>

</body>

</html>
