    <!-- Sidenav Menu Start -->
    <div class="two-col-sidebar" id="two-col-sidebar">
        <div class="twocol-mini">
            <!-- Add (placeholder — links will be activated per phase) -->
            @if (auth()->check() && auth()->user()->tenant_id !== null)
                <div class="dropdown">
                    <a class="btn btn-primary bg-gradient btn-sm btn-icon rounded-circle d-flex align-items-center justify-content-center"
                        data-bs-toggle="dropdown" href="javascript:void(0);" role="button" data-bs-display="static"
                        data-bs-reference="parent">
                        <i class="isax isax-add"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start">
                        @if (Route::has('bo.users.invite'))
                            <li>
                                <a href="{{ route('bo.users.invite') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-sms me-2"></i>{{ __('Inviter un utilisateur') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            @endif
            <!-- /Add -->

            <ul class="menu-list">
                @if (auth()->check() && auth()->user()->tenant_id !== null)
                    <li>
                        <a href="{{ route('bo.account.settings.edit') }}" data-bs-toggle="tooltip"
                            data-bs-placement="right" data-bs-title="{{ __('Paramètres') }}"><i
                                class="isax isax-setting-25"></i></a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('bo.documentation.index') }}" data-bs-toggle="tooltip" data-bs-placement="right"
                        data-bs-title="{{ __('Documentation') }}"><i class="isax isax-document-normal4"></i></a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="javascript:void(0);" onclick="this.closest('form').submit();" data-bs-toggle="tooltip"
                            data-bs-placement="right" data-bs-title="{{ __('Déconnexion') }}"><i class="isax isax-login-15"></i></a>
                    </form>
                </li>
            </ul>
        </div>
        <div class="sidebar" id="sidebar-two">

            <!-- Start Logo -->
            <div class="sidebar-logo">
                <a href="{{ route('dashboard') }}" class="logo logo-normal">
                    <img src="{{ URL::asset('assets/images/logo/logo-wide-cropped.svg') }}" alt="Logo">
                </a>
                <a href="{{ route('dashboard') }}" class="logo-small">
                    <img src="{{ URL::asset('assets/images/logo/favicon-cropped.svg') }}" alt="Logo">
                </a>
                <a href="{{ route('dashboard') }}" class="dark-logo">
                    <img src="{{ URL::asset('assets/images/logo/logo-wide-white-cropped.svg') }}" alt="Logo">
                </a>
                <a href="{{ route('dashboard') }}" class="dark-small">
                    <img src="{{ URL::asset('assets/images/logo/favicon-white-cropped.svg') }}" alt="Logo">
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
                    <input type="text" class="form-control" placeholder="{{ __('Rechercher') }}">
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
                            {{-- ─── PRINCIPAL ─── --}}
                            <li class="menu-title"><span>{{ __('Principal') }}</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->routeIs('sa.dashboard') ? 'active' : '' }}">
                                        <a href="{{ route('sa.dashboard') }}">
                                            <i class="isax isax-element-45"></i><span>{{ __('Tableau de bord') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── GESTION ─── --}}
                            <li class="menu-title"><span>{{ __('Gestion') }}</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->routeIs('sa.tenants.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.tenants.index') }}">
                                            <i class="isax isax-buildings-25"></i><span>{{ __('Tenants') }}</span>
                                        </a>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('sa.plans.*', 'sa.subscriptions.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-layer5"></i><span>{{ __('Facturation') }}</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('sa.plans.index') }}"
                                                    class="{{ request()->routeIs('sa.plans.*') ? 'active' : '' }}">{{ __('Plans') }}</a>
                                            </li>
                                            <li><a href="{{ route('sa.subscriptions.index') }}"
                                                    class="{{ request()->routeIs('sa.subscriptions.*') ? 'active' : '' }}">{{ __('Abonnements') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.delete-requests.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.delete-requests.index') }}">
                                            <i class="isax isax-trash"></i><span>{{ __('Demandes de suppression') }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.account-requests.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.account-requests.index') }}">
                                            <i class="isax isax-user-add"></i><span>{{ __('Demandes de compte') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── MODÈLES ─── --}}
                            <li class="menu-title"><span>{{ __('Modèles') }}</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->routeIs('sa.templates.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.templates.index') }}">
                                            <i class="isax isax-document-text"></i><span>{{ __('Modèles PDF') }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.template-catalog.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.template-catalog.index') }}">
                                            <i class="isax isax-additem"></i><span>{{ __('Catalogue modèles') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── COMMUNICATION ─── --}}
                            <li class="menu-title"><span>{{ __('Communication') }}</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->routeIs('sa.announcements.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.announcements.index') }}">
                                            <i class="isax isax-notification"></i><span>{{ __('Annonces') }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.contact-messages.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.contact-messages.index') }}">
                                            <i class="isax isax-sms"></i><span>{{ __('Messages de contact') }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.newsletter.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.newsletter.index') }}">
                                            <i class="isax isax-directbox-notif"></i><span>{{ __('Newsletter') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── SUPPORT ─── --}}
                            <li class="menu-title"><span>{{ __('Support') }}</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->routeIs('sa.support-tickets.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.support-tickets.index') }}">
                                            <i class="isax isax-ticket5"></i><span>{{ __('Tickets de support') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── SUPERVISION ─── --}}
                            <li class="menu-title"><span>{{ __('Supervision') }}</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->routeIs('sa.activity-logs.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.activity-logs.index') }}">
                                            <i class="isax isax-note-215"></i><span>{{ __("Journal d'activité") }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.access.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.access.roles.index') }}">
                                            <i class="isax isax-shield-tick5"></i><span>{{ __('Rôles & Permissions') }}</span>
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
                            {{-- ─── PRINCIPAL ─── --}}
                            <li class="menu-title"><span>{{ __('Principal') }}</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->routeIs('bo.dashboard') ? 'active' : '' }}">
                                        <a href="{{ route('bo.dashboard') }}">
                                            <i class="isax isax-element-45"></i><span>{{ __('Tableau de bord') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── VENTES ─── --}}
                            <li class="menu-title"><span>{{ __('Ventes') }}</span></li>
                            <li>
                                <ul>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.crm.customers.*', 'bo.sales.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-shopping-bag5"></i><span>{{ __('Ventes') }}</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.crm.customers.index') }}"
                                                    class="{{ request()->routeIs('bo.crm.customers.*') ? 'active' : '' }}">{{ __('Clients') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.quotes.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.quotes.*') ? 'active' : '' }}">{{ __('Devis') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.invoices.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.invoices.*') ? 'active' : '' }}">{{ __('Factures') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.delivery-challans.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.delivery-challans.*') ? 'active' : '' }}">{{ __('Bons de livraison') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.credit-notes.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.credit-notes.*') ? 'active' : '' }}">{{ __('Avoirs') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.refunds.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.refunds.*') ? 'active' : '' }}">{{ __('Remboursements') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.payments.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.payments.*') ? 'active' : '' }}">{{ __('Paiements clients') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── ACHATS ─── --}}
                            <li class="menu-title"><span>{{ __('Achats') }}</span></li>
                            <li>
                                <ul>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.purchases.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-bag-25"></i><span>{{ __('Achats') }}</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.purchases.suppliers.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.suppliers.*') ? 'active' : '' }}">{{ __('Fournisseurs') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.purchases.purchase-orders.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.purchase-orders.*') ? 'active' : '' }}">{{ __('Bons de commande') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.purchases.goods-receipts.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.goods-receipts.*') ? 'active' : '' }}">{{ __('Réceptions') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.purchases.vendor-bills.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.vendor-bills.*') ? 'active' : '' }}">{{ __('Factures fournisseurs') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.purchases.debit-notes.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.debit-notes.*') ? 'active' : '' }}">{{ __('Notes de débit') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.purchases.supplier-payments.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.supplier-payments.*') ? 'active' : '' }}">{{ __('Paiements fournisseurs') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── PRODUITS & STOCK ─── --}}
                            <li class="menu-title"><span>{{ __('Produits & Stock') }}</span></li>
                            <li>
                                <ul>
                                    {{-- Catalogue --}}
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.catalog.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-box-15"></i><span>{{ __('Catalogue') }}</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.catalog.products.index') }}"
                                                    class="{{ request()->routeIs('bo.catalog.products.*') ? 'active' : '' }}">{{ __('Produits') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.catalog.categories.index') }}"
                                                    class="{{ request()->routeIs('bo.catalog.categories.*') ? 'active' : '' }}">{{ __('Catégories') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.catalog.units.index') }}"
                                                    class="{{ request()->routeIs('bo.catalog.units.*') ? 'active' : '' }}">{{ __('Unités') }}</a>
                                            </li>
                                        </ul>
                                    </li>

                                    {{-- Inventaire --}}
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.inventory.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-building-45"></i><span>{{ __('Inventaire') }}</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.inventory.warehouses.index') }}"
                                                    class="{{ request()->routeIs('bo.inventory.warehouses.*') ? 'active' : '' }}">{{ __('Entrepôts') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.inventory.stock.index') }}"
                                                    class="{{ request()->routeIs('bo.inventory.stock.*') ? 'active' : '' }}">{{ __('Niveaux de stock') }}</a></li>
                                            <li><a href="{{ route('bo.inventory.movements.index') }}"
                                                    class="{{ request()->routeIs('bo.inventory.movements.*') ? 'active' : '' }}">{{ __('Mouvements') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.inventory.transfers.index') }}"
                                                    class="{{ request()->routeIs('bo.inventory.transfers.*') ? 'active' : '' }}">{{ __('Transferts') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── FINANCE ─── --}}
                            <li class="menu-title"><span>{{ __('Finance') }}</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->routeIs('bo.finance.bank-accounts.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.finance.bank-accounts.index') }}">
                                            <i class="isax isax-bank5"></i><span>{{ __('Comptes bancaires') }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('bo.finance.expenses.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.finance.expenses.index') }}">
                                            <i class="isax isax-money-send5"></i><span>{{ __('Dépenses') }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('bo.finance.incomes.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.finance.incomes.index') }}">
                                            <i class="isax isax-money-recive5"></i><span>{{ __('Revenus') }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('bo.finance.money-transfers.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.finance.money-transfers.index') }}">
                                            <i class="isax isax-arrange-square-25"></i><span>{{ __('Transferts') }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('bo.finance.categories.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.finance.categories.index') }}">
                                            <i class="isax isax-category-25"></i><span>{{ __('Catégories') }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('bo.finance.loans.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.finance.loans.index') }}">
                                            <i class="isax isax-percentage-square5"></i><span>{{ __('Prêts') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── RAPPORTS ─── --}}
                            <li class="menu-title"><span>{{ __('Rapports') }}</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->routeIs('bo.pro.rapports.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.pro.rapports.index') }}">
                                            <i class="isax isax-document-text5"></i><span>{{ __('Générer un rapport') }}</span>
                                        </a>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.reports.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-chart-215"></i><span>{{ __('Analyses') }}</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.reports.sales') }}"
                                                    class="{{ request()->routeIs('bo.reports.sales') ? 'active' : '' }}">{{ __('Ventes') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.reports.customers') }}"
                                                    class="{{ request()->routeIs('bo.reports.customers') ? 'active' : '' }}">{{ __('Clients') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.reports.purchases') }}"
                                                    class="{{ request()->routeIs('bo.reports.purchases') ? 'active' : '' }}">{{ __('Achats') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.reports.finance') }}"
                                                    class="{{ request()->routeIs('bo.reports.finance') ? 'active' : '' }}">{{ __('Finance') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.reports.inventory') }}"
                                                    class="{{ request()->routeIs('bo.reports.inventory') ? 'active' : '' }}">{{ __('Inventaire') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── SUPPORT ─── --}}
                            <li class="menu-title"><span>{{ __('Support') }}</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->routeIs('bo.support.tickets.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.support.tickets.index') }}">
                                            <i class="isax isax-ticket5"></i><span>{{ __('Tickets de support') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── ADMINISTRATION ─── --}}
                            <li class="menu-title"><span>{{ __('Administration') }}</span></li>
                            <li>
                                <ul>
                                    {{-- Utilisateurs --}}
                                    <li class="{{ request()->routeIs('bo.users.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.users.index') }}">
                                            <i class="isax isax-profile-2user5"></i><span>{{ __('Utilisateurs') }}</span>
                                        </a>
                                    </li>

                                    {{-- Rôles & Permissions --}}
                                    <li class="{{ request()->routeIs('bo.access.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.access.roles.index') }}">
                                            <i class="isax isax-shield-tick5"></i><span>{{ __('Rôles & Permissions') }}</span>
                                        </a>
                                    </li>

                                    {{-- Corbeille --}}
                                    <li class="{{ request()->routeIs('bo.trash.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.trash.index') }}">
                                            <i class="ti ti-trash"></i><span>{{ __('Corbeille') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── PARAMÈTRES ─── --}}
                            <li class="menu-title"><span>{{ __('Paramètres') }}</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->routeIs('bo.account.settings.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.account.settings.edit') }}">
                                            <i class="ti ti-user-circle"></i><span>{{ __('Mon compte') }}</span>
                                        </a>
                                    </li>
                                    
                                    <li class="{{ request()->routeIs('bo.pro.recurring-invoices.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.pro.recurring-invoices.index') }}">
                                            <i class="isax isax-repeat5"></i><span>{{ __('Factures récurrentes') }}</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>
                    @endif

                    <div class="sidebar-footer">
                        <div class="trial-item bg-white text-center border">
                            <div class="bg-light p-3 text-center upgrade-image">
                                <img src="{{ URL::asset('assets/images/250px-WhatsApp.svg.png') }}" alt="img" style="width: 40px; height: 40px;">
                            </div>
                            <div class="p-2">
                                <h6 class="fs-12 fw-semibold mb-1">{{ __('Besoin d\'aide ?') }}</h6>
                                <a href="https://wa.me/212632582096" target="_blank" class="btn btn-sm btn-success w-100 d-flex align-items-center justify-content-center"><i class="fa-brands fa-whatsapp me-1"></i>{{ __('WhatsApp') }}</a>
                            </div>
                            <a href="javascript:void(0);" class="close-icon fs-6"><i class="fa-solid fa-x"></i></a>
                        </div>
                        <ul class="menu-list">
                            @if (auth()->check() && auth()->user()->tenant_id !== null)
                                <li>
                                    <a href="{{ route('bo.account.settings.edit') }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="{{ __('Paramètres') }}"><i
                                            class="isax isax-setting-25"></i></a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('bo.documentation.index') }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="{{ __('Documentation') }}"><i
                                        class="isax isax-document-normal4"></i></a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="javascript:void(0);" onclick="this.closest('form').submit();"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="{{ __('Déconnexion') }}"><i class="isax isax-login-15"></i></a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidenav Menu End -->
