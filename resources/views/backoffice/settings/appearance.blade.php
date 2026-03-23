<?php $page = 'appearance-settings'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Apparence')
@section('description', 'Personnaliser l'apparence de l'application')
@section('content')
    <!-- ========================
                Start Page Content
            ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- start row-->
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <!-- start row -->
                    <div class=" row settings-wrapper d-flex">

                        <!-- Start settings sidebar -->
                        @component('backoffice.components.settings-sidebar')
                        @endcomponent
                        <!-- End settings sidebar -->

                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3 pb-3 border-bottom">
                                <h6 class="fw-bold mb-0">{{ __('Apparence') }}</h6>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></button>
                                </div>
                            @endif

                            <form action="{{ route('bo.settings.appearance.update') }}" method="POST" id="appearanceForm">
                                @csrf
                                @method('PUT')

                                @php
                                    $currentTheme = $appearance['theme'] ?? 'light';
                                    $currentLayout = $appearance['layout'] ?? 'default';
                                    $currentWidth = $appearance['layout_width'] ?? 'fluid';
                                    $currentSidebarColor = $appearance['sidebar_color'] ?? 'light';
                                    $currentSidebarSize = $appearance['sidebar_size'] ?? 'default';
                                    $currentTopbarColor = $appearance['topbar_color'] ?? 'white';
                                    $currentSidebarBg = $appearance['sidebar_bg'] ?? '';
                                    $currentThemeColor = $appearance['theme_color'] ?? 'primary';
                                    $currentFontFamily = $appearance['font_family'] ?? 'Instrument Sans';
                                @endphp

                                <div class="mb-3">

                                    <!-- Theme Mode (Light / Dark / Automatic) -->
                                    <div class="row align-items-center">
                                        <div class="col-xl-4 col-md-4">
                                            <div class="setting-info mb-3">
                                                <h6 class="fs-14 mb-1 fw-semibold">{{ __('Sélectionner le thème') }}</h6>
                                                <span>{{ __('Choisissez le thème du site') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-md-8">
                                            <div class="row theme-type-images d-flex align-items-center">
                                                <div class="col-md-4">
                                                    <div class="card theme-image">
                                                        <div class="card-body p-2">
                                                            <label class="d-block cursor-pointer">
                                                                <input type="radio" name="theme" value="light" class="d-none"
                                                                    {{ $currentTheme === 'light' ? 'checked' : '' }}>
                                                                <div class="border rounded border-gray mb-2 {{ $currentTheme === 'light' ? 'border-primary' : '' }}">
                                                                    <img src="{{ URL::asset('build/img/theme/light.jpg') }}"
                                                                        class="img-fluid rounded" alt="theme">
                                                                </div>
                                                                <p class="text-center fw-medium text-truncate">{{ __('Clair') }}</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card theme-image">
                                                        <div class="card-body p-2">
                                                            <label class="d-block cursor-pointer">
                                                                <input type="radio" name="theme" value="dark" class="d-none"
                                                                    {{ $currentTheme === 'dark' ? 'checked' : '' }}>
                                                                <div class="border rounded border-gray mb-2 {{ $currentTheme === 'dark' ? 'border-primary' : '' }}">
                                                                    <img src="{{ URL::asset('build/img/theme/dark.jpg') }}"
                                                                        class="img-fluid rounded" alt="theme">
                                                                </div>
                                                                <p class="text-center fw-medium text-truncate">{{ __('Sombre') }}</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card theme-image">
                                                        <div class="card-body p-2">
                                                            <label class="d-block cursor-pointer">
                                                                <input type="radio" name="theme" value="automatic" class="d-none"
                                                                    {{ $currentTheme === 'automatic' ? 'checked' : '' }}>
                                                                <div class="border rounded border-gray mb-2 {{ $currentTheme === 'automatic' ? 'border-primary' : '' }}">
                                                                    <img src="{{ URL::asset('build/img/theme/automatic.jpg') }}"
                                                                        class="img-fluid rounded" alt="theme">
                                                                </div>
                                                                <p class="text-center fw-medium text-truncate">{{ __('Automatique') }}</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Font Family -->
                                    <div class="row align-items-center justify-content-between mb-3">
                                        <div class="col-xl-4 col-md-4">
                                            <div class="">
                                                <h6 class="fs-14 mb-1 fw-semibold">{{ __('Police de caractères') }}</h6>
                                                <span>{{ __('Sélectionnez la police du site') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-4">
                                            <div class="d-flex align-items-center justify-content-end mt-2 mt-md-0">
                                                <select class="form-select" name="font_family">
                                                    <option value="Instrument Sans" {{ $currentFontFamily === 'Instrument Sans' ? 'selected' : '' }}>Instrument Sans</option>
                                                    <option value="Nunito" {{ $currentFontFamily === 'Nunito' ? 'selected' : '' }}>Nunito</option>
                                                    <option value="Poppins" {{ $currentFontFamily === 'Poppins' ? 'selected' : '' }}>Poppins</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- ============================================ -->
                                <!-- Theme Customizer (embedded from offcanvas)   -->
                                <!-- ============================================ -->
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h6 class="text-white mb-0">Theme Customizer</h6>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="themesettings-inner">
                                            <div class="accordion accordion-customicon1 accordions-items-seperate" id="settingtheme">

                                                <!-- Select Layouts -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button text-gray-9 fw-semibold fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#layoutsetting" aria-expanded="true">
                                                            Select Layouts 
                                                        </button>
                                                    </h2>
                                                    <div id="layoutsetting" class="accordion-collapse collapse show">
                                                        <div class="accordion-body">
                                                            <div class="theme-content">
                                                                <div class="row gx-3">
                                                                    <div class="col-4">
                                                                        <div class="theme-layout mb-3">
                                                                            <input type="radio" name="layout" id="defaultLayout" value="default" {{ $currentLayout === 'default' ? 'checked' : '' }}>
                                                                            <label for="defaultLayout">
                                                                                <span class="d-block mb-2 layout-img">
                                                                                    <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                                    <img src="{{ URL::asset('build/img/theme/default.svg') }}" alt="img">
                                                                                </span>
                                                                                <span class="layout-type">Default</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="theme-layout mb-3">
                                                                            <input type="radio" name="layout" id="singleLayout" value="single" {{ $currentLayout === 'single' ? 'checked' : '' }}>
                                                                            <label for="singleLayout">
                                                                                <span class="d-block mb-2 layout-img">
                                                                                    <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                                    <img src="{{ URL::asset('build/img/theme/single.svg') }}" alt="img">
                                                                                </span>
                                                                                <span class="layout-type">Single</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="theme-layout mb-3">
                                                                            <input type="radio" name="layout" id="miniLayout" value="mini" {{ $currentLayout === 'mini' ? 'checked' : '' }}>
                                                                            <label for="miniLayout">
                                                                                <span class="d-block mb-2 layout-img">
                                                                                    <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                                    <img src="{{ URL::asset('build/img/theme/mini.svg') }}" alt="img">
                                                                                </span>
                                                                                <span class="layout-type">Mini</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="theme-layout mb-3">
                                                                            <input type="radio" name="layout" id="transparentLayout" value="transparent" {{ $currentLayout === 'transparent' ? 'checked' : '' }}>
                                                                            <label for="transparentLayout">
                                                                                <span class="d-block mb-2 layout-img">
                                                                                    <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                                    <img src="{{ URL::asset('build/img/theme/transparent.svg') }}" alt="img">
                                                                                </span>
                                                                                <span class="layout-type">Transparent</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="theme-layout mb-3">
                                                                            <input type="radio" name="layout" id="without-headerLayout" value="without-header" {{ $currentLayout === 'without-header' ? 'checked' : '' }}>
                                                                            <label for="without-headerLayout">
                                                                                <span class="d-block mb-2 layout-img">
                                                                                    <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                                    <img src="{{ URL::asset('build/img/theme/without-header.svg') }}" alt="img">
                                                                                </span>
                                                                                <span class="layout-type">Without Header</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <a href="{{ url('layout-rtl') }}" class="theme-layout mb-3 text-center">
                                                                            <span class="d-block mb-2 layout-img">
                                                                                <img src="{{ URL::asset('build/img/theme/rtl.svg') }}" alt="img">
                                                                            </span>
                                                                            <span class="layout-type d-block">RTL</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Layout Width -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button text-gray-9 fw-semibold fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarsetting" aria-expanded="true">
                                                            Layout Width 
                                                        </button>
                                                    </h2>
                                                    <div id="sidebarsetting" class="accordion-collapse collapse show">
                                                        <div class="accordion-body">
                                                            <div class="theme-content">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="theme-width m-1 me-2">
                                                                        <input type="radio" name="layout_width" id="fluidWidth" value="fluid" {{ $currentWidth === 'fluid' ? 'checked' : '' }}>
                                                                        <label for="fluidWidth" class="d-flex align-items-center rounded fs-12"><i class="isax isax-row-vertical me-1"></i>Fluid Layout</label>
                                                                    </div>
                                                                    <div class="theme-width m-1">
                                                                        <input type="radio" name="layout_width" id="boxWidth" value="box" {{ $currentWidth === 'box' ? 'checked' : '' }}>
                                                                        <label for="boxWidth" class="d-flex align-items-center rounded fs-12"><i class="isax isax-slider-vertical me-1"></i>Boxed Layout</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Sidebar Color -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button text-gray-9 fw-semibold fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarcolorsetting" aria-expanded="true">
                                                            Sidebar Color 
                                                        </button>
                                                    </h2>
                                                    <div id="sidebarcolorsetting" class="accordion-collapse collapse show">
                                                        <div class="accordion-body">
                                                            <div class="theme-content">
                                                                <h6 class="fs-14 fw-medium mb-2">Solid Colors</h6>
                                                                <div class="d-flex align-items-center flex-wrap">
                                                                    <div class="theme-colorselect m-1 me-2">
                                                                        <input type="radio" name="sidebar_color" id="lightSidebar" value="light" {{ $currentSidebarColor === 'light' ? 'checked' : '' }}>
                                                                        <label for="lightSidebar" class="d-block rounded mb-2">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-colorselect m-1 me-2">
                                                                        <input type="radio" name="sidebar_color" id="sidebar2Sidebar" value="sidebar2" {{ $currentSidebarColor === 'sidebar2' ? 'checked' : '' }}>
                                                                        <label for="sidebar2Sidebar" class="d-block rounded bg-white mb-2">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-colorselect m-1 me-2">
                                                                        <input type="radio" name="sidebar_color" id="sidebar3Sidebar" value="sidebar3" {{ $currentSidebarColor === 'sidebar3' ? 'checked' : '' }}>
                                                                        <label for="sidebar3Sidebar" class="d-block rounded bg-dark mb-2">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-colorselect m-1 me-2">
                                                                        <input type="radio" name="sidebar_color" id="sidebar4Sidebar" value="sidebar4" {{ $currentSidebarColor === 'sidebar4' ? 'checked' : '' }}>
                                                                        <label for="sidebar4Sidebar" class="d-block rounded bg-primary mb-2">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-colorselect m-1 me-2">
                                                                        <input type="radio" name="sidebar_color" id="sidebar5Sidebar" value="sidebar5" {{ $currentSidebarColor === 'sidebar5' ? 'checked' : '' }}>
                                                                        <label for="sidebar5Sidebar" class="d-block rounded bg-secondary mb-2">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-colorselect m-1 me-2">
                                                                        <input type="radio" name="sidebar_color" id="sidebar6Sidebar" value="sidebar6" {{ $currentSidebarColor === 'sidebar6' ? 'checked' : '' }}>
                                                                        <label for="sidebar6Sidebar" class="d-block rounded bg-info mb-2">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-colorselect m-1 me-2">
                                                                        <input type="radio" name="sidebar_color" id="sidebar7Sidebar" value="sidebar7" {{ $currentSidebarColor === 'sidebar7' ? 'checked' : '' }}>
                                                                        <label for="sidebar7Sidebar" class="d-block rounded bg-success mb-2">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <h6 class="fs-14 fw-medium mb-2">Gradient Colors</h6>
                                                                <div class="d-flex align-items-center flex-wrap">
                                                                    <div class="theme-colorselect m-1 me-2">
                                                                        <input type="radio" name="sidebar_color" id="gradientsidebar1Sidebar" value="gradientsidebar1" {{ $currentSidebarColor === 'gradientsidebar1' ? 'checked' : '' }}>
                                                                        <label for="gradientsidebar1Sidebar" class="d-block rounded bg-primary bg-gradient mb-2">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-colorselect m-1 me-2">
                                                                        <input type="radio" name="sidebar_color" id="gradientsidebar2Sidebar" value="gradientsidebar2" {{ $currentSidebarColor === 'gradientsidebar2' ? 'checked' : '' }}>
                                                                        <label for="gradientsidebar2Sidebar" class="d-block rounded bg-secondary bg-gradient mb-2">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-colorselect m-1 me-2">
                                                                        <input type="radio" name="sidebar_color" id="gradientsidebar3Sidebar" value="gradientsidebar3" {{ $currentSidebarColor === 'gradientsidebar3' ? 'checked' : '' }}>
                                                                        <label for="gradientsidebar3Sidebar" class="d-block rounded bg-success bg-gradient mb-2">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-colorselect m-1 me-2">
                                                                        <input type="radio" name="sidebar_color" id="gradientsidebar4Sidebar" value="gradientsidebar4" {{ $currentSidebarColor === 'gradientsidebar4' ? 'checked' : '' }}>
                                                                        <label for="gradientsidebar4Sidebar" class="d-block rounded bg-info bg-gradient mb-2">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-colorselect m-1 me-2">
                                                                        <input type="radio" name="sidebar_color" id="gradientsidebar5Sidebar" value="gradientsidebar5" {{ $currentSidebarColor === 'gradientsidebar5' ? 'checked' : '' }}>
                                                                        <label for="gradientsidebar5Sidebar" class="d-block rounded bg-dark bg-gradient mb-2">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-colorselect m-1 me-2">
                                                                        <input type="radio" name="sidebar_color" id="gradientsidebar6Sidebar" value="gradientsidebar6" {{ $currentSidebarColor === 'gradientsidebar6' ? 'checked' : '' }}>
                                                                        <label for="gradientsidebar6Sidebar" class="d-block rounded bg-danger bg-gradient mb-2">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Sidebar Size -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button text-gray-9 fw-semibold fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#sizesetting" aria-expanded="true">
                                                            Sidebar Size 
                                                        </button>
                                                    </h2>
                                                    <div id="sizesetting" class="accordion-collapse collapse show">
                                                        <div class="accordion-body pb-0">
                                                            <div class="theme-content">
                                                                <div class="row gx-3">
                                                                    <div class="col-4">
                                                                        <div class="theme-layout mb-3">
                                                                            <input type="radio" name="sidebar_size" id="defaultSize" value="default" {{ $currentSidebarSize === 'default' ? 'checked' : '' }}>
                                                                            <label for="defaultSize">
                                                                                <span class="d-block mb-2 layout-img">
                                                                                    <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                                    <img src="{{ URL::asset('build/img/theme/default.svg') }}" alt="img">
                                                                                </span>
                                                                                <span class="layout-type">Default</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="theme-layout mb-3">
                                                                            <input type="radio" name="sidebar_size" id="singleSize" value="single" {{ $currentSidebarSize === 'single' ? 'checked' : '' }}>
                                                                            <label for="singleSize">
                                                                                <span class="d-block mb-2 layout-img">
                                                                                    <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                                    <img src="{{ URL::asset('build/img/theme/single.svg') }}" alt="img">
                                                                                </span>
                                                                                <span class="layout-type">Single</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="theme-layout mb-3">
                                                                            <input type="radio" name="sidebar_size" id="compactSize" value="compact" {{ $currentSidebarSize === 'compact' ? 'checked' : '' }}>
                                                                            <label for="compactSize">
                                                                                <span class="d-block mb-2 layout-img">
                                                                                    <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                                    <img src="{{ URL::asset('build/img/theme/mini.svg') }}" alt="img">
                                                                                </span>
                                                                                <span class="layout-type">Compact</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Top Bar Color -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button text-gray-9 fw-semibold fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#colorsetting" aria-expanded="true">
                                                            Top Bar Color 
                                                        </button>
                                                    </h2>
                                                    <div id="colorsetting" class="accordion-collapse collapse show">
                                                        <div class="accordion-body pb-1">
                                                            <div class="theme-content">
                                                                <h6 class="fs-14 fw-medium mb-2">Solid Colors</h6>
                                                                <div class="d-flex align-items-center flex-wrap topbar-background">
                                                                    <div class="theme-colorselect mb-3 me-3">
                                                                        <input type="radio" name="topbar_color" id="whiteTopbar" value="white" {{ $currentTopbarColor === 'white' ? 'checked' : '' }}>
                                                                        <label for="whiteTopbar" class="white-topbar">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-colorselect mb-3 me-3">
                                                                        <input type="radio" name="topbar_color" id="topbar1Topbar" value="topbar1" {{ $currentTopbarColor === 'topbar1' ? 'checked' : '' }}>
                                                                        <label for="topbar1Topbar" class="bg-light"><span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span></label>
                                                                    </div>
                                                                    <div class="theme-colorselect mb-3 me-3">
                                                                        <input type="radio" name="topbar_color" id="topbar2Topbar" value="topbar2" {{ $currentTopbarColor === 'topbar2' ? 'checked' : '' }}>
                                                                        <label for="topbar2Topbar" class="bg-dark"><span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span></label>
                                                                    </div>
                                                                    <div class="theme-colorselect mb-3 me-3">
                                                                        <input type="radio" name="topbar_color" id="topbar3Topbar" value="topbar3" {{ $currentTopbarColor === 'topbar3' ? 'checked' : '' }}>
                                                                        <label for="topbar3Topbar" class="bg-primary"><span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span></label>
                                                                    </div>
                                                                    <div class="theme-colorselect mb-3 me-3">
                                                                        <input type="radio" name="topbar_color" id="topbar4Topbar" value="topbar4" {{ $currentTopbarColor === 'topbar4' ? 'checked' : '' }}>
                                                                        <label for="topbar4Topbar" class="bg-secondary"><span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span></label>
                                                                    </div>
                                                                    <div class="theme-colorselect mb-3 me-3">
                                                                        <input type="radio" name="topbar_color" id="topbar5Topbar" value="topbar5" {{ $currentTopbarColor === 'topbar5' ? 'checked' : '' }}>
                                                                        <label for="topbar5Topbar" class="bg-info"><span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span></label>
                                                                    </div>
                                                                    <div class="theme-colorselect mb-3">
                                                                        <input type="radio" name="topbar_color" id="topbar6Topbar" value="topbar6" {{ $currentTopbarColor === 'topbar6' ? 'checked' : '' }}>
                                                                        <label for="topbar6Topbar" class="bg-success"><span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span></label>
                                                                    </div>
                                                                </div>
                                                                <h6 class="fs-14 fw-medium mb-2">Gradient Colors</h6>
                                                                <div class="d-flex align-items-center flex-wrap topbar-background">
                                                                    <div class="theme-colorselect mb-3 me-3">
                                                                        <input type="radio" name="topbar_color" id="gradienttopbar1Topbar" value="gradienttopbar1" {{ $currentTopbarColor === 'gradienttopbar1' ? 'checked' : '' }}>
                                                                        <label for="gradienttopbar1Topbar" class="bg-primary bg-gradient">
                                                                            <span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-colorselect mb-3 me-3">
                                                                        <input type="radio" name="topbar_color" id="gradienttopbar2Topbar" value="gradienttopbar2" {{ $currentTopbarColor === 'gradienttopbar2' ? 'checked' : '' }}>
                                                                        <label for="gradienttopbar2Topbar" class="bg-secondary bg-gradient"><span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span></label>
                                                                    </div>
                                                                    <div class="theme-colorselect mb-3 me-3">
                                                                        <input type="radio" name="topbar_color" id="gradienttopbar3Topbar" value="gradienttopbar3" {{ $currentTopbarColor === 'gradienttopbar3' ? 'checked' : '' }}>
                                                                        <label for="gradienttopbar3Topbar" class="bg-success bg-gradient"><span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span></label>
                                                                    </div>
                                                                    <div class="theme-colorselect mb-3 me-3">
                                                                        <input type="radio" name="topbar_color" id="gradienttopbar4Topbar" value="gradienttopbar4" {{ $currentTopbarColor === 'gradienttopbar4' ? 'checked' : '' }}>
                                                                        <label for="gradienttopbar4Topbar" class="bg-info bg-gradient"><span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span></label>
                                                                    </div>
                                                                    <div class="theme-colorselect mb-3 me-3">
                                                                        <input type="radio" name="topbar_color" id="gradienttopbar5Topbar" value="gradienttopbar5" {{ $currentTopbarColor === 'gradienttopbar5' ? 'checked' : '' }}>
                                                                        <label for="gradienttopbar5Topbar" class="bg-dark bg-gradient"><span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span></label>
                                                                    </div>
                                                                    <div class="theme-colorselect mb-3 me-3">
                                                                        <input type="radio" name="topbar_color" id="gradienttopbar6Topbar" value="gradienttopbar6" {{ $currentTopbarColor === 'gradienttopbar6' ? 'checked' : '' }}>
                                                                        <label for="gradienttopbar6Topbar" class="bg-danger bg-gradient"><span class="theme-check rounded-circle"><i class="fa-solid fa-check"></i></span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Sidebar Background -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button text-gray-9 fw-semibold fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarbgsetting" aria-expanded="true">
                                                            Sidebar Background 
                                                        </button>
                                                    </h2>
                                                    <div id="sidebarbgsetting" class="accordion-collapse collapse show">
                                                        <div class="accordion-body pb-1">
                                                            <div class="theme-content">
                                                                <h6 class="fs-14 fw-medium mb-2">Pattern</h6>
                                                                <div class="d-flex align-items-center flex-wrap">
                                                                    <div class="theme-sidebarbg me-3 mb-3">
                                                                        <input type="radio" name="sidebar_bg" id="sidebarBg1" value="sidebarbg1" {{ $currentSidebarBg === 'sidebarbg1' ? 'checked' : '' }}>
                                                                        <label for="sidebarBg1" class="d-block rounded">
                                                                            <span class="theme-check2 rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                            <img src="{{ URL::asset('build/img/theme/sidebar-bg-01.svg') }}" alt="img" class="rounded">
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-sidebarbg me-3 mb-3">
                                                                        <input type="radio" name="sidebar_bg" id="sidebarBg2" value="sidebarbg2" {{ $currentSidebarBg === 'sidebarbg2' ? 'checked' : '' }}>
                                                                        <label for="sidebarBg2" class="d-block rounded">
                                                                            <span class="theme-check2 rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                            <img src="{{ URL::asset('build/img/theme/sidebar-bg-02.svg') }}" alt="img" class="rounded">
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-sidebarbg me-3 mb-3">
                                                                        <input type="radio" name="sidebar_bg" id="sidebarBg3" value="sidebarbg3" {{ $currentSidebarBg === 'sidebarbg3' ? 'checked' : '' }}>
                                                                        <label for="sidebarBg3" class="d-block rounded">
                                                                            <span class="theme-check2 rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                            <img src="{{ URL::asset('build/img/theme/sidebar-bg-03.svg') }}" alt="img" class="rounded">
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-sidebarbg me-3 mb-3">
                                                                        <input type="radio" name="sidebar_bg" id="sidebarBg4" value="sidebarbg4" {{ $currentSidebarBg === 'sidebarbg4' ? 'checked' : '' }}>
                                                                        <label for="sidebarBg4" class="d-block rounded">
                                                                            <span class="theme-check2 rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                            <img src="{{ URL::asset('build/img/theme/sidebar-bg-04.svg') }}" alt="img" class="rounded">
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-sidebarbg me-3 mb-3">
                                                                        <input type="radio" name="sidebar_bg" id="sidebarBg5" value="sidebarbg5" {{ $currentSidebarBg === 'sidebarbg5' ? 'checked' : '' }}>
                                                                        <label for="sidebarBg5" class="d-block rounded">
                                                                            <span class="theme-check2 rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                            <img src="{{ URL::asset('build/img/theme/sidebar-bg-05.svg') }}" alt="img" class="rounded">
                                                                        </label>
                                                                    </div>
                                                                    <div class="theme-sidebarbg mb-3">
                                                                        <input type="radio" name="sidebar_bg" id="sidebarBg6" value="sidebarbg6" {{ $currentSidebarBg === 'sidebarbg6' ? 'checked' : '' }}>
                                                                        <label for="sidebarBg6" class="d-block rounded">
                                                                            <span class="theme-check2 rounded-circle"><i class="fa-solid fa-check"></i></span>
                                                                            <img src="{{ URL::asset('build/img/theme/sidebar-bg-06.svg') }}" alt="img" class="rounded">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Theme Colors -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button text-gray-9 fw-semibold fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarcolor" aria-expanded="true">
                                                            Theme Colors 
                                                        </button>
                                                    </h2>
                                                    <div id="sidebarcolor" class="accordion-collapse collapse show">
                                                        <div class="accordion-body pb-2">
                                                            <div class="theme-content">
                                                                <div class="d-flex align-items-center flex-wrap">
                                                                    <div class="theme-colorsset me-2 mb-2">
                                                                        <input type="radio" name="theme_color" id="primaryColor" value="primary" {{ $currentThemeColor === 'primary' ? 'checked' : '' }}>
                                                                        <label for="primaryColor" class="primary-clr"></label>
                                                                    </div>
                                                                    <div class="theme-colorsset me-2 mb-2">
                                                                        <input type="radio" name="theme_color" id="secondaryColor" value="secondary" {{ $currentThemeColor === 'secondary' ? 'checked' : '' }}>
                                                                        <label for="secondaryColor" class="secondary-clr"></label>
                                                                    </div>
                                                                    <div class="theme-colorsset me-2 mb-2">
                                                                        <input type="radio" name="theme_color" id="successColor" value="success" {{ $currentThemeColor === 'success' ? 'checked' : '' }}>
                                                                        <label for="successColor" class="success-clr"></label>
                                                                    </div>
                                                                    <div class="theme-colorsset me-2 mb-2">
                                                                        <input type="radio" name="theme_color" id="dangerColor" value="danger" {{ $currentThemeColor === 'danger' ? 'checked' : '' }}>
                                                                        <label for="dangerColor" class="danger-clr"></label>
                                                                    </div>
                                                                    <div class="theme-colorsset me-2 mb-2">
                                                                        <input type="radio" name="theme_color" id="infoColor" value="info" {{ $currentThemeColor === 'info' ? 'checked' : '' }}>
                                                                        <label for="infoColor" class="info-clr"></label>
                                                                    </div>
                                                                    <div class="theme-colorsset me-2 mb-2">
                                                                        <input type="radio" name="theme_color" id="warningColor" value="warning" {{ $currentThemeColor === 'warning' ? 'checked' : '' }}>
                                                                        <label for="warningColor" class="warning-clr"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Theme Customizer -->

                                <div
                                    class="text-end settings-bottom-btn mt-0 border-top d-flex align-items-center justify-content-between pt-4 mb-3">
                                    <button type="button" id="resetAppearance" class="btn btn-outline-white btn-md me-2"><i class="ti ti-restore me-1"></i>{{ __('Réinitialiser') }}</button>
                                    <button type="submit" class="btn btn-primary btn-md">{{ __('Enregistrer') }}</button>
                                </div>

                            </form>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                </div><!-- end col -->
            </div>
            <!-- end row-->
        </div>
        <!-- End Content -->

        @component('backoffice.components.footer')
        @endcomponent

    </div>

    <!-- ========================
                End Page Content
            ========================= -->
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var html = document.documentElement;
        var body = document.body;

        // Theme selection - highlight border on click + live preview
        document.querySelectorAll('input[name="theme"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.theme-type-images .border').forEach(function(el) {
                    el.classList.remove('border-primary');
                });
                this.closest('label').querySelector('.border').classList.add('border-primary');
                var theme = this.value;
                if (theme === 'automatic') {
                    theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                }
                html.setAttribute('data-bs-theme', theme);
            });
        });

        // Layout selection - live preview
        document.querySelectorAll('input[name="layout"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                var layout = this.value;
                html.setAttribute('data-layout', layout);
                body.classList.remove('mini-sidebar', 'menu-horizontal');
                if (layout === 'mini') body.classList.add('mini-sidebar');
            });
        });

        // Layout width - live preview
        document.querySelectorAll('input[name="layout_width"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                html.setAttribute('data-width', this.value);
                if (this.value === 'box') {
                    body.classList.add('layout-box-mode');
                } else {
                    body.classList.remove('layout-box-mode');
                }
            });
        });

        // Sidebar color - live preview
        document.querySelectorAll('input[name="sidebar_color"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                html.setAttribute('data-sidebar', this.value);
            });
        });

        // Sidebar size - live preview
        document.querySelectorAll('input[name="sidebar_size"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                html.setAttribute('data-size', this.value);
                body.classList.remove('mini-sidebar', 'expand-menu');
                if (this.value === 'compact') body.classList.add('mini-sidebar');
            });
        });

        // Topbar color - live preview
        document.querySelectorAll('input[name="topbar_color"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                html.setAttribute('data-topbar', this.value);
            });
        });

        // Sidebar background - live preview
        document.querySelectorAll('input[name="sidebar_bg"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                body.setAttribute('data-sidebarbg', this.value);
            });
        });

        // Theme colors - live preview
        document.querySelectorAll('input[name="theme_color"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                html.setAttribute('data-color', this.value);
            });
        });

        // Font family - live preview
        var fontSelect = document.querySelector('select[name="font_family"]');
        if (fontSelect) {
            fontSelect.addEventListener('change', function() {
                html.style.setProperty('--bs-body-font-family', this.value);
            });
        }

        // Reset button
        document.getElementById('resetAppearance').addEventListener('click', function() {
            // Reset radio buttons to defaults
            var defaults = {
                'theme': 'light',
                'layout': 'default',
                'layout_width': 'fluid',
                'sidebar_color': 'light',
                'sidebar_size': 'default',
                'topbar_color': 'white',
                'theme_color': 'primary'
            };
            for (var name in defaults) {
                var radio = document.querySelector('input[name="' + name + '"][value="' + defaults[name] + '"]');
                if (radio) {
                    radio.checked = true;
                    radio.dispatchEvent(new Event('change'));
                }
            }
            // Uncheck sidebar bg
            document.querySelectorAll('input[name="sidebar_bg"]').forEach(function(r) { r.checked = false; });
            body.removeAttribute('data-sidebarbg');

            // Reset font
            if (fontSelect) {
                fontSelect.value = 'Instrument Sans';
                fontSelect.dispatchEvent(new Event('change'));
            }

            // Reset theme image borders
            document.querySelectorAll('.theme-type-images .border').forEach(function(el) {
                el.classList.remove('border-primary');
            });
            var lightLabel = document.querySelector('input[name="theme"][value="light"]');
            if (lightLabel) lightLabel.closest('label').querySelector('.border').classList.add('border-primary');

            // Reset body classes
            body.classList.remove('mini-sidebar', 'layout-box-mode', 'expand-menu', 'menu-horizontal');

            // Clear localStorage
            localStorage.removeItem('sidebarBg');
        });

        // Sync to localStorage on form submit (before server redirect)
        document.getElementById('appearanceForm').addEventListener('submit', function() {
            var getValue = function(name) {
                var el = document.querySelector('input[name="' + name + '"]:checked');
                return el ? el.value : null;
            };

            var theme = getValue('theme');
            var layout = getValue('layout');
            var layoutWidth = getValue('layout_width');
            var sidebarColor = getValue('sidebar_color');
            var sidebarSize = getValue('sidebar_size');
            var topbarColor = getValue('topbar_color');
            var sidebarBg = getValue('sidebar_bg');
            var themeColor = getValue('theme_color');
            var font = fontSelect ? fontSelect.value : null;

            if (theme) {
                localStorage.setItem('theme', theme);
                if (theme === 'dark') localStorage.setItem('darkMode', 'enabled');
                else if (theme === 'light') localStorage.setItem('darkMode', 'disabled');
            }
            if (layout) localStorage.setItem('layout', layout);
            if (layoutWidth) localStorage.setItem('width', layoutWidth);
            if (sidebarColor) localStorage.setItem('sidebarTheme', sidebarColor);
            if (sidebarSize) localStorage.setItem('size', sidebarSize);
            if (topbarColor) localStorage.setItem('topbar', topbarColor);
            if (sidebarBg) {
                localStorage.setItem('sidebarBg', sidebarBg);
            } else {
                localStorage.removeItem('sidebarBg');
            }
            if (themeColor) localStorage.setItem('color', themeColor);
            if (font) localStorage.setItem('fontFamily', font);
        });
    });
</script>
@endpush
