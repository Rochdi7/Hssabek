    <!-- Sidenav Menu Start -->
    <div class="two-col-sidebar" id="two-col-sidebar">
        <div class="twocol-mini">
            <!-- Add (placeholder — links will be activated per phase) -->
            @if(auth()->check() && auth()->user()->tenant_id !== null)
                <div class="dropdown">
                    <a class="btn btn-primary bg-gradient btn-sm btn-icon rounded-circle d-flex align-items-center justify-content-center"
                        data-bs-toggle="dropdown" href="javascript:void(0);" role="button" data-bs-display="static"
                        data-bs-reference="parent">
                        <i class="isax isax-add"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start">
                        <li>
                            <a href="{{ route('bo.users.invite') }}" class="dropdown-item d-flex align-items-center">
                                <i class="isax isax-sms me-2"></i>Inviter un utilisateur
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
            <!-- /Add -->

            <ul class="menu-list">
                @if(auth()->check() && auth()->user()->tenant_id !== null)
                    <li>
                        <a href="{{ route('bo.account.settings.edit') }}" data-bs-toggle="tooltip" data-bs-placement="right"
                            data-bs-title="Paramètres"><i class="isax isax-setting-25"></i></a>
                    </li>
                @endif
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="javascript:void(0);" onclick="this.closest('form').submit();"
                            data-bs-toggle="tooltip" data-bs-placement="right"
                            data-bs-title="Déconnexion"><i class="isax isax-login-15"></i></a>
                    </form>
                </li>
            </ul>
        </div>
        <div class="sidebar" id="sidebar-two">

            <!-- Start Logo -->
            <div class="sidebar-logo">
                <a href="{{ route('dashboard') }}" class="logo logo-normal">
                    <img src="{{ URL::asset('build/img/logo.svg') }}" alt="Logo">
                </a>
                <a href="{{ route('dashboard') }}" class="logo-small">
                    <img src="{{ URL::asset('build/img/logo-small.svg') }}" alt="Logo">
                </a>
                <a href="{{ route('dashboard') }}" class="dark-logo">
                    <img src="{{ URL::asset('build/img/logo-white.svg') }}" alt="Logo">
                </a>
                <a href="{{ route('dashboard') }}" class="dark-small">
                    <img src="{{ URL::asset('build/img/logo-small-white.svg') }}" alt="Logo">
                </a>

                <!-- Sidebar Hover Menu Toggle Button -->
                <a id="toggle_btn" href="javascript:void(0);">
                    <i class="isax isax-menu-1"></i>
                </a>
            </div>
            <!-- End Logo -->

            <!-- Search -->
            <div class="sidebar-search">
                <div class="input-icon-end position-relative">
                    <input type="text" class="form-control" placeholder="Rechercher">
                    <span class="input-icon-addon">
                        <i class="isax isax-search-normal"></i>
                    </span>
                </div>
            </div>
            <!-- /Search -->

            <!--- Sidenav Menu -->
            <div class="sidebar-inner" data-simplebar>
                <div id="sidebar-menu" class="sidebar-menu">

                    {{-- ============================================================ --}}
                    {{-- 👑 SUPER ADMIN SIDEBAR (user with tenant_id === null)         --}}
                    {{-- ============================================================ --}}
                    @if (auth()->check() && auth()->user()->tenant_id === null)
                        <ul>
                            <li class="menu-title"><span>Super Admin</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->routeIs('sa.dashboard') ? 'active' : '' }}">
                                        <a href="{{ route('sa.dashboard') }}">
                                            <i class="isax isax-home-25"></i><span>Tableau de bord</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.tenants.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.tenants.index') }}">
                                            <i class="isax isax-buildings-25"></i><span>Tenants</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.plans.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.plans.index') }}">
                                            <i class="isax isax-layer5"></i><span>Plans</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.subscriptions.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.subscriptions.index') }}">
                                            <i class="isax isax-receipt-text5"></i><span>Abonnements</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.access.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.access.roles.index') }}">
                                            <i class="isax isax-shield-tick"></i><span>Rôles & Permissions</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif

                    {{-- ============================================================ --}}
                    {{-- 🏢 TENANT BACKOFFICE SIDEBAR (regular tenant users)           --}}
                    {{-- ============================================================ --}}
                    @if (auth()->check() && auth()->user()->tenant_id !== null)
                        <ul>
                            {{-- ─── MAIN ─── --}}
                            <li class="menu-title"><span>Principal</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->routeIs('bo.dashboard') ? 'active' : '' }}">
                                        <a href="{{ route('bo.dashboard') }}">
                                            <i class="isax isax-element-45"></i><span>Tableau de bord</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── GESTION ─── --}}
                            <li class="menu-title"><span>Gestion</span></li>
                            <li>
                                <ul>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.users.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-profile-2user5"></i><span>Utilisateurs</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.users.index') }}"
                                                    class="{{ request()->routeIs('bo.users.index', 'bo.users.edit', 'bo.users.activate', 'bo.users.deactivate') ? 'active' : '' }}">Liste des utilisateurs</a></li>
                                            <li><a href="{{ route('bo.users.invite') }}"
                                                    class="{{ request()->routeIs('bo.users.invite*') ? 'active' : '' }}">Inviter un utilisateur</a></li>
                                        </ul>
                                    </li>
                                    <li class="{{ request()->routeIs('bo.access.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.access.roles.index') }}">
                                            <i class="isax isax-shield-tick5"></i><span>Rôles & Permissions</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── PARAMÈTRES ─── --}}
                            <li class="menu-title"><span>Paramètres</span></li>
                            <li>
                                <ul>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.account.settings.*', 'bo.settings.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-setting-25"></i><span>Paramètres</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.account.settings.edit') }}"
                                                    class="{{ request()->routeIs('bo.account.settings.*') ? 'active' : '' }}">Mon compte</a></li>
                                            <li><a href="{{ route('bo.settings.company.edit') }}"
                                                    class="{{ request()->routeIs('bo.settings.company.*') ? 'active' : '' }}">Entreprise</a></li>
                                            <li><a href="{{ route('bo.settings.invoice.edit') }}"
                                                    class="{{ request()->routeIs('bo.settings.invoice.*') ? 'active' : '' }}">Facturation</a></li>
                                            <li><a href="{{ route('bo.settings.locale.edit') }}"
                                                    class="{{ request()->routeIs('bo.settings.locale.*') ? 'active' : '' }}">Localisation</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif

                    <div class="sidebar-footer">
                        <ul class="menu-list">
                            @if(auth()->check() && auth()->user()->tenant_id !== null)
                                <li>
                                    <a href="{{ route('bo.account.settings.edit') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Paramètres"><i
                                            class="isax isax-setting-25"></i></a>
                                </li>
                            @endif
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="javascript:void(0);" onclick="this.closest('form').submit();"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Déconnexion"><i class="isax isax-login-15"></i></a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidenav Menu End -->
