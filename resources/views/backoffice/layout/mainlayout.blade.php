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

{{-- PWA install button: login page only --}}
@if($isAuth)

<!-- Floating install button -->
<button id="pwa-install-btn" onclick="pwaInstallClick()" title="Installer l'application" style="
    display:none;position:fixed;bottom:24px;right:24px;z-index:9999;
    width:56px;height:56px;border-radius:50%;border:none;
    background:#4361ee;color:#fff;
    box-shadow:0 4px 18px rgba(67,97,238,0.5);
    cursor:pointer;align-items:center;justify-content:center;
    transition:transform 0.15s,box-shadow 0.15s;
">
    <i class="isax isax-mobile" style="font-size:24px;pointer-events:none;"></i>
</button>

<!-- Backdrop -->
<div id="pwa-backdrop" onclick="pwaCloseBanner()" style="
    display:none;position:fixed;inset:0;z-index:10001;background:rgba(0,0,0,0.45);
"></div>

<!-- Bottom sheet -->
<div id="pwa-banner" style="
    display:none;position:fixed;bottom:0;left:0;right:0;
    z-index:10002;background:#fff;color:#222;
    border-top-left-radius:24px;border-top-right-radius:24px;
    box-shadow:0 -4px 30px rgba(0,0,0,0.18);
    padding:16px 20px 40px;
    transform:translateY(100%);transition:transform 0.3s cubic-bezier(.32,.72,0,1);
">
    <div style="width:40px;height:4px;background:#e0e0e0;border-radius:4px;margin:0 auto 20px;"></div>

    {{-- iOS Safari steps --}}
    <div id="pwa-ios-steps">
        <p style="font-weight:700;font-size:18px;text-align:center;margin:0 0 20px;">📲 Installer Hssabek</p>

        <div style="background:#f0f3ff;border-radius:14px;padding:14px 16px;margin-bottom:12px;display:flex;align-items:center;gap:14px;">
            <span style="flex-shrink:0;width:32px;height:32px;border-radius:50%;background:#4361ee;color:#fff;font-weight:700;font-size:14px;display:flex;align-items:center;justify-content:center;">1</span>
            <span>Appuyez sur
                <svg style="vertical-align:middle;margin:0 3px;" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4361ee" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" y1="2" x2="12" y2="15"/></svg>
                <strong>Partager</strong> en bas de Safari
            </span>
        </div>

        <div style="background:#f0f3ff;border-radius:14px;padding:14px 16px;margin-bottom:24px;display:flex;align-items:center;gap:14px;">
            <span style="flex-shrink:0;width:32px;height:32px;border-radius:50%;background:#4361ee;color:#fff;font-weight:700;font-size:14px;display:flex;align-items:center;justify-content:center;">2</span>
            <span>Appuyez sur <strong>« Sur l'écran d'accueil »</strong> ➕</span>
        </div>

        <button onclick="pwaCloseBanner()" style="width:100%;border:none;background:#4361ee;color:#fff;border-radius:14px;padding:15px;font-size:16px;font-weight:700;cursor:pointer;">Compris</button>
    </div>

    {{-- Already installed fallback --}}
    <div id="pwa-installed-msg" style="display:none;text-align:center;">
        <div style="font-size:44px;margin-bottom:12px;">✅</div>
        <div style="font-weight:700;font-size:17px;margin-bottom:8px;">Déjà installée</div>
        <div style="color:#666;margin-bottom:24px;">Ouvrez Hssabek depuis votre écran d'accueil.</div>
        <button onclick="pwaCloseBanner()" style="width:100%;border:none;background:#4361ee;color:#fff;border-radius:14px;padding:15px;font-size:16px;font-weight:700;cursor:pointer;">OK</button>
    </div>
</div>

<script>
var _pwaDeferred = null;
var _pwaIsIos = /iphone|ipad|ipod/i.test(navigator.userAgent)
             && /^((?!chrome|android|crios|fxios).)*safari/i.test(navigator.userAgent)
             && !navigator.standalone;

function pwaOpenBanner(mode) {
    var b = document.getElementById('pwa-banner');
    var bd = document.getElementById('pwa-backdrop');
    if (!b) return;
    document.getElementById('pwa-ios-steps').style.display    = mode === 'ios'       ? '' : 'none';
    document.getElementById('pwa-installed-msg').style.display = mode === 'installed' ? '' : 'none';
    bd.style.display = 'block';
    b.style.display  = 'block';
    requestAnimationFrame(function(){ b.style.transform = 'translateY(0)'; });
}

function pwaCloseBanner() {
    var b = document.getElementById('pwa-banner');
    var bd = document.getElementById('pwa-backdrop');
    if (!b) return;
    b.style.transform = 'translateY(100%)';
    setTimeout(function(){ b.style.display = 'none'; bd.style.display = 'none'; }, 320);
}

function pwaInstallClick() {
    if (_pwaDeferred) {
        _pwaDeferred.prompt();
        _pwaDeferred.userChoice.then(function(c) {
            _pwaDeferred = null;
            if (c.outcome === 'accepted')
                document.getElementById('pwa-install-btn').style.display = 'none';
        });
    } else if (_pwaIsIos) {
        pwaOpenBanner('ios');
    } else {
        pwaOpenBanner('installed');
    }
}

(function() {
    if ('serviceWorker' in navigator)
        navigator.serviceWorker.register('/sw.js').catch(function(){});

    var btn = document.getElementById('pwa-install-btn');

    if (_pwaIsIos) {
        if (btn) btn.style.display = 'flex';
    } else {
        window.addEventListener('beforeinstallprompt', function(e) {
            e.preventDefault();
            _pwaDeferred = e;
            if (btn) btn.style.display = 'flex';
        });
        window.addEventListener('appinstalled', function() {
            _pwaDeferred = null;
            if (btn) btn.style.display = 'none';
        });
    }
})();
</script>

@endif

</body>

</html>
