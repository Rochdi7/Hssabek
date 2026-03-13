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
                        <li>
                            <a href="{{ route('bo.users.invite') }}" class="dropdown-item d-flex align-items-center">
                                <i class="isax isax-sms me-2"></i>{{ __('Inviter un utilisateur') }}
                            </a>
                        </li>
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
                            <li class="menu-title"><span>{{ __('Super Admin') }}</span></li>
                            <li>
                                <ul>
                                    <li class="{{ request()->routeIs('sa.dashboard') ? 'active' : '' }}">
                                        <a href="{{ route('sa.dashboard') }}">
                                            <i class="isax isax-home-25"></i><span>{{ __('Tableau de bord') }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.tenants.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.tenants.index') }}">
                                            <i class="isax isax-buildings-25"></i><span>{{ __('Tenants') }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.plans.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.plans.index') }}">
                                            <i class="isax isax-layer5"></i><span>{{ __('Plans') }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.subscriptions.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.subscriptions.index') }}">
                                            <i class="isax isax-receipt-text5"></i><span>{{ __('Abonnements') }}</span>
                                        </a>
                                    </li>
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
                                    <li class="{{ request()->routeIs('sa.delete-requests.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.delete-requests.index') }}">
                                            <i class="isax isax-trash"></i><span>{{ __('Demandes de suppression') }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.announcements.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.announcements.index') }}">
                                            <i class="isax isax-notification"></i><span>{{ __('Annonces') }}</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.activity-logs.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.activity-logs.index') }}">
                                            <i class="isax isax-note-215"></i><span>{{ __("Journal d'activité") }}</span>
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
                                    <li class="{{ request()->routeIs('sa.access.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.access.roles.index') }}">
                                            <i class="isax isax-shield-tick"></i><span>{{ __('Rôles & Permissions') }}</span>
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

                            {{-- ─── COMMERCE ─── --}}
                            <li class="menu-title"><span>{{ __('Commerce') }}</span></li>
                            <li>
                                <ul>
                                    {{-- Ventes --}}
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
                                            <li><a href="{{ route('bo.sales.invoices.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.invoices.*') ? 'active' : '' }}">{{ __('Factures') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.quotes.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.quotes.*') ? 'active' : '' }}">{{ __('Devis') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.payments.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.payments.*') ? 'active' : '' }}">{{ __('Paiements') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.credit-notes.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.credit-notes.*') ? 'active' : '' }}">{{ __('Avoirs') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.delivery-challans.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.delivery-challans.*') ? 'active' : '' }}">{{ __('Bons de livraison') }}</a></li>
                                            <li><a href="{{ route('bo.sales.refunds.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.refunds.*') ? 'active' : '' }}">{{ __('Remboursements') }}</a>
                                            </li>
                                        </ul>
                                    </li>

                                    {{-- Achats --}}
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
                                                    class="{{ request()->routeIs('bo.purchases.purchase-orders.*') ? 'active' : '' }}">{{ __('Bons de commande') }}</a></li>
                                            <li><a href="{{ route('bo.purchases.vendor-bills.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.vendor-bills.*') ? 'active' : '' }}">{{ __('Factures fournisseur') }}</a></li>
                                            <li><a href="{{ route('bo.purchases.goods-receipts.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.goods-receipts.*') ? 'active' : '' }}">{{ __('Réceptions') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.purchases.debit-notes.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.debit-notes.*') ? 'active' : '' }}">{{ __('Notes de débit') }}</a></li>
                                            <li><a href="{{ route('bo.purchases.supplier-payments.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.supplier-payments.*') ? 'active' : '' }}">{{ __('Paiements fournisseurs') }}</a></li>
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
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.finance.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-bank5"></i><span>{{ __('Finance') }}</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.finance.bank-accounts.index') }}"
                                                    class="{{ request()->routeIs('bo.finance.bank-accounts.*') ? 'active' : '' }}">{{ __('Comptes bancaires') }}</a></li>
                                            <li><a href="{{ route('bo.finance.expenses.index') }}"
                                                    class="{{ request()->routeIs('bo.finance.expenses.*') ? 'active' : '' }}">{{ __('Dépenses') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.finance.incomes.index') }}"
                                                    class="{{ request()->routeIs('bo.finance.incomes.*') ? 'active' : '' }}">{{ __('Revenus') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.finance.money-transfers.index') }}"
                                                    class="{{ request()->routeIs('bo.finance.money-transfers.*') ? 'active' : '' }}">{{ __('Transferts') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.finance.categories.index') }}"
                                                    class="{{ request()->routeIs('bo.finance.categories.*') ? 'active' : '' }}">{{ __('Catégories') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.finance.loans.index') }}"
                                                    class="{{ request()->routeIs('bo.finance.loans.*') ? 'active' : '' }}">{{ __('Prêts') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── PRO ─── --}}
                            <li class="menu-title"><span>{{ __('Pro') }}</span></li>
                            <li>
                                <ul>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.pro.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-crown-15"></i><span>{{ __('Pro') }}</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            {{-- Factures récurrentes - moved to Settings --}}
                                            {{-- Rappels de factures - moved to Settings > Notifications --}}
                                            {{-- V2: Succursales
                                            <li><a href="{{ route('bo.pro.branches.index') }}"
                                                    class="{{ request()->routeIs('bo.pro.branches.*') ? 'active' : '' }}">{{ __('Succursales') }}</a>
                                            </li> --}}
                                            <li><a href="{{ route('bo.pro.rapports.index') }}"
                                                    class="{{ request()->routeIs('bo.pro.rapports.*') ? 'active' : '' }}">{{ __('Rapports') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── ANALYSES ─── --}}
                            <li class="menu-title"><span>{{ __('Analyses') }}</span></li>
                            <li>
                                <ul>
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

                            {{-- ─── ADMINISTRATION ─── --}}
                            <li class="menu-title"><span>{{ __('Administration') }}</span></li>
                            <li>
                                <ul>
                                    {{-- Utilisateurs --}}
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.users.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-profile-2user5"></i><span>{{ __('Utilisateurs') }}</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.users.index') }}"
                                                    class="{{ request()->routeIs('bo.users.index', 'bo.users.edit', 'bo.users.activate', 'bo.users.deactivate') ? 'active' : '' }}">{{ __('Liste des utilisateurs') }}</a></li>
                                            <li><a href="{{ route('bo.users.invite') }}"
                                                    class="{{ request()->routeIs('bo.users.invite*') ? 'active' : '' }}">{{ __('Inviter un utilisateur') }}</a></li>
                                        </ul>
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
                                            <i class="isax isax-trash5"></i><span>{{ __('Corbeille') }}</span>
                                        </a>
                                    </li>

                                    {{-- Paramètres --}}
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.account.settings.*', 'bo.settings.*', 'bo.pro.recurring-invoices.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-setting-25"></i><span>{{ __('Paramètres') }}</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.account.settings.edit') }}"
                                                    class="{{ request()->routeIs('bo.account.settings.*') ? 'active' : '' }}">{{ __('Mon compte') }}</a></li>
                                            <li><a href="{{ route('bo.settings.company.edit') }}"
                                                    class="{{ request()->routeIs('bo.settings.company.*') ? 'active' : '' }}">{{ __('Entreprise') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.settings.invoice.edit') }}"
                                                    class="{{ request()->routeIs('bo.settings.invoice.*') ? 'active' : '' }}">{{ __('Facturation') }}</a>
                                            </li>
                                            <li><a href="{{ route('bo.pro.recurring-invoices.index') }}"
                                                    class="{{ request()->routeIs('bo.pro.recurring-invoices.*') ? 'active' : '' }}">{{ __('Factures récurrentes') }}</a></li>
                                            <li><a href="{{ route('bo.settings.locale.edit') }}"
                                                    class="{{ request()->routeIs('bo.settings.locale.*') ? 'active' : '' }}">{{ __('Localisation') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif

                    <div class="sidebar-footer">
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
