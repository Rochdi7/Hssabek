{{-- ============================================ --}}
{{-- Mobile-only toggle button (opens offcanvas)   --}}
{{-- ============================================ --}}
<div class="col-12 d-lg-none mb-3">
    <button class="btn btn-primary w-100 d-flex align-items-center justify-content-between"
            type="button" data-bs-toggle="offcanvas"
            data-bs-target="#settingsMobileOffcanvas"
            aria-controls="settingsMobileOffcanvas">
        <span><i class="isax isax-setting-2 me-2"></i>{{ __('Menu des paramètres') }}</span>
        <i class="isax isax-menu"></i>
    </button>
</div>

{{-- ============================================ --}}
{{-- Desktop sidebar column (>= lg)                --}}
{{-- ============================================ --}}
<div class="col-xl-3 col-lg-4 d-none d-lg-block">
    <div class="card settings-card">
        <div class="card-header">
            <h6 class="mb-0">{{ __('Paramètres') }}</h6>
        </div>
        <div class="card-body">
            <div class="sidebars settings-sidebar">
                <div class="sidebar-inner">
                    @include('backoffice.components.partials.settings-menu')
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ============================================ --}}
{{-- Mobile offcanvas (< lg)                       --}}
{{-- ============================================ --}}
<div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="settingsMobileOffcanvas"
     aria-labelledby="settingsMobileOffcanvasLabel" style="width: 85%; max-width: 320px;">
    <div class="offcanvas-header border-bottom">
        <h6 class="offcanvas-title mb-0" id="settingsMobileOffcanvasLabel">
            <i class="isax isax-setting-2 me-2"></i>{{ __('Paramètres') }}
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-2">
        <div class="settings-sidebar-mobile-inner">
            @include('backoffice.components.partials.settings-menu')
        </div>
    </div>
</div>
