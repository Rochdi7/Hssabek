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
                                <i class="isax isax-sms me-2"></i>Inviter un utilisateur
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
                            data-bs-placement="right" data-bs-title="Paramètres"><i
                                class="isax isax-setting-25"></i></a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('bo.documentation.index') }}" data-bs-toggle="tooltip" data-bs-placement="right"
                        data-bs-title="Documentation"><i class="isax isax-document-normal4"></i></a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="javascript:void(0);" onclick="this.closest('form').submit();" data-bs-toggle="tooltip"
                            data-bs-placement="right" data-bs-title="Déconnexion"><i class="isax isax-login-15"></i></a>
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
                                    <li class="{{ request()->routeIs('sa.templates.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.templates.index') }}">
                                            <i class="isax isax-document-text"></i><span>Modèles PDF</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.template-catalog.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.template-catalog.index') }}">
                                            <i class="isax isax-additem"></i><span>Catalogue modèles</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.delete-requests.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.delete-requests.index') }}">
                                            <i class="isax isax-trash"></i><span>Demandes de suppression</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('sa.announcements.*') ? 'active' : '' }}">
                                        <a href="{{ route('sa.announcements.index') }}">
                                            <i class="isax isax-notification"></i><span>Annonces</span>
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
                            {{-- ─── PRINCIPAL ─── --}}
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

                            {{-- ─── COMMERCE ─── --}}
                            <li class="menu-title"><span>Commerce</span></li>
                            <li>
                                <ul>
                                    {{-- Ventes --}}
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.crm.customers.*', 'bo.sales.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-shopping-bag5"></i><span>Ventes</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.crm.customers.index') }}"
                                                    class="{{ request()->routeIs('bo.crm.customers.*') ? 'active' : '' }}">Clients</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.invoices.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.invoices.*') ? 'active' : '' }}">Factures</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.quotes.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.quotes.*') ? 'active' : '' }}">Devis</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.payments.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.payments.*') ? 'active' : '' }}">Paiements</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.credit-notes.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.credit-notes.*') ? 'active' : '' }}">Avoirs</a>
                                            </li>
                                            <li><a href="{{ route('bo.sales.delivery-challans.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.delivery-challans.*') ? 'active' : '' }}">Bons
                                                    de livraison</a></li>
                                            <li><a href="{{ route('bo.sales.refunds.index') }}"
                                                    class="{{ request()->routeIs('bo.sales.refunds.*') ? 'active' : '' }}">Remboursements</a>
                                            </li>
                                        </ul>
                                    </li>

                                    {{-- Achats --}}
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.purchases.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-bag-25"></i><span>Achats</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.purchases.suppliers.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.suppliers.*') ? 'active' : '' }}">Fournisseurs</a>
                                            </li>
                                            <li><a href="{{ route('bo.purchases.purchase-orders.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.purchase-orders.*') ? 'active' : '' }}">Bons
                                                    de commande</a></li>
                                            <li><a href="{{ route('bo.purchases.vendor-bills.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.vendor-bills.*') ? 'active' : '' }}">Factures
                                                    fournisseur</a></li>
                                            <li><a href="{{ route('bo.purchases.goods-receipts.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.goods-receipts.*') ? 'active' : '' }}">Réceptions</a>
                                            </li>
                                            <li><a href="{{ route('bo.purchases.debit-notes.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.debit-notes.*') ? 'active' : '' }}">Notes
                                                    de débit</a></li>
                                            <li><a href="{{ route('bo.purchases.supplier-payments.index') }}"
                                                    class="{{ request()->routeIs('bo.purchases.supplier-payments.*') ? 'active' : '' }}">Paiements
                                                    fournisseurs</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── PRODUITS & STOCK ─── --}}
                            <li class="menu-title"><span>Produits & Stock</span></li>
                            <li>
                                <ul>
                                    {{-- Catalogue --}}
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.catalog.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-box-15"></i><span>Catalogue</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.catalog.products.index') }}"
                                                    class="{{ request()->routeIs('bo.catalog.products.*') ? 'active' : '' }}">Produits</a>
                                            </li>
                                            <li><a href="{{ route('bo.catalog.categories.index') }}"
                                                    class="{{ request()->routeIs('bo.catalog.categories.*') ? 'active' : '' }}">Catégories</a>
                                            </li>
                                            <li><a href="{{ route('bo.catalog.units.index') }}"
                                                    class="{{ request()->routeIs('bo.catalog.units.*') ? 'active' : '' }}">Unités</a>
                                            </li>
                                        </ul>
                                    </li>

                                    {{-- Inventaire --}}
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.inventory.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-building-45"></i><span>Inventaire</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.inventory.warehouses.index') }}"
                                                    class="{{ request()->routeIs('bo.inventory.warehouses.*') ? 'active' : '' }}">Entrepôts</a>
                                            </li>
                                            <li><a href="{{ route('bo.inventory.stock.index') }}"
                                                    class="{{ request()->routeIs('bo.inventory.stock.*') ? 'active' : '' }}">Niveaux
                                                    de stock</a></li>
                                            <li><a href="{{ route('bo.inventory.movements.index') }}"
                                                    class="{{ request()->routeIs('bo.inventory.movements.*') ? 'active' : '' }}">Mouvements</a>
                                            </li>
                                            <li><a href="{{ route('bo.inventory.transfers.index') }}"
                                                    class="{{ request()->routeIs('bo.inventory.transfers.*') ? 'active' : '' }}">Transferts</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── FINANCE ─── --}}
                            <li class="menu-title"><span>Finance</span></li>
                            <li>
                                <ul>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.finance.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-bank5"></i><span>Finance</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.finance.bank-accounts.index') }}"
                                                    class="{{ request()->routeIs('bo.finance.bank-accounts.*') ? 'active' : '' }}">Comptes
                                                    bancaires</a></li>
                                            <li><a href="{{ route('bo.finance.expenses.index') }}"
                                                    class="{{ request()->routeIs('bo.finance.expenses.*') ? 'active' : '' }}">Dépenses</a>
                                            </li>
                                            <li><a href="{{ route('bo.finance.incomes.index') }}"
                                                    class="{{ request()->routeIs('bo.finance.incomes.*') ? 'active' : '' }}">Revenus</a>
                                            </li>
                                            <li><a href="{{ route('bo.finance.money-transfers.index') }}"
                                                    class="{{ request()->routeIs('bo.finance.money-transfers.*') ? 'active' : '' }}">Transferts</a>
                                            </li>
                                            <li><a href="{{ route('bo.finance.categories.index') }}"
                                                    class="{{ request()->routeIs('bo.finance.categories.*') ? 'active' : '' }}">Catégories</a>
                                            </li>
                                            <li><a href="{{ route('bo.finance.loans.index') }}"
                                                    class="{{ request()->routeIs('bo.finance.loans.*') ? 'active' : '' }}">Prêts</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── PRO ─── --}}
                            <li class="menu-title"><span>Pro</span></li>
                            <li>
                                <ul>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.pro.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-crown-15"></i><span>Pro</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.pro.recurring-invoices.index') }}"
                                                    class="{{ request()->routeIs('bo.pro.recurring-invoices.*') ? 'active' : '' }}">Factures
                                                    récurrentes</a></li>
                                            <li><a href="{{ route('bo.pro.invoice-reminders.index') }}"
                                                    class="{{ request()->routeIs('bo.pro.invoice-reminders.*') ? 'active' : '' }}">Rappels
                                                    de factures</a></li>
                                            <li><a href="{{ route('bo.pro.branches.index') }}"
                                                    class="{{ request()->routeIs('bo.pro.branches.*') ? 'active' : '' }}">Succursales</a>
                                            </li>
                                            <li><a href="{{ route('bo.pro.rapports.index') }}"
                                                    class="{{ request()->routeIs('bo.pro.rapports.*') ? 'active' : '' }}">Rapports</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── ANALYSES ─── --}}
                            <li class="menu-title"><span>Analyses</span></li>
                            <li>
                                <ul>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.reports.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-chart-215"></i><span>Analyses</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.reports.sales') }}"
                                                    class="{{ request()->routeIs('bo.reports.sales') ? 'active' : '' }}">Ventes</a>
                                            </li>
                                            <li><a href="{{ route('bo.reports.customers') }}"
                                                    class="{{ request()->routeIs('bo.reports.customers') ? 'active' : '' }}">Clients</a>
                                            </li>
                                            <li><a href="{{ route('bo.reports.purchases') }}"
                                                    class="{{ request()->routeIs('bo.reports.purchases') ? 'active' : '' }}">Achats</a>
                                            </li>
                                            <li><a href="{{ route('bo.reports.finance') }}"
                                                    class="{{ request()->routeIs('bo.reports.finance') ? 'active' : '' }}">Finance</a>
                                            </li>
                                            <li><a href="{{ route('bo.reports.inventory') }}"
                                                    class="{{ request()->routeIs('bo.reports.inventory') ? 'active' : '' }}">Inventaire</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            {{-- ─── ADMINISTRATION ─── --}}
                            <li class="menu-title"><span>Administration</span></li>
                            <li>
                                <ul>
                                    {{-- Utilisateurs --}}
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.users.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-profile-2user5"></i><span>Utilisateurs</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.users.index') }}"
                                                    class="{{ request()->routeIs('bo.users.index', 'bo.users.edit', 'bo.users.activate', 'bo.users.deactivate') ? 'active' : '' }}">Liste
                                                    des utilisateurs</a></li>
                                            <li><a href="{{ route('bo.users.invite') }}"
                                                    class="{{ request()->routeIs('bo.users.invite*') ? 'active' : '' }}">Inviter
                                                    un utilisateur</a></li>
                                        </ul>
                                    </li>

                                    {{-- Rôles & Permissions --}}
                                    <li class="{{ request()->routeIs('bo.access.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.access.roles.index') }}">
                                            <i class="isax isax-shield-tick5"></i><span>Rôles & Permissions</span>
                                        </a>
                                    </li>

                                    {{-- Corbeille --}}
                                    <li class="{{ request()->routeIs('bo.trash.*') ? 'active' : '' }}">
                                        <a href="{{ route('bo.trash.index') }}">
                                            <i class="isax isax-trash5"></i><span>Corbeille</span>
                                        </a>
                                    </li>

                                    {{-- Paramètres --}}
                                    <li class="submenu">
                                        <a href="javascript:void(0);"
                                            class="{{ request()->routeIs('bo.account.settings.*', 'bo.settings.*') ? 'active subdrop' : '' }}">
                                            <i class="isax isax-setting-25"></i><span>Paramètres</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('bo.account.settings.edit') }}"
                                                    class="{{ request()->routeIs('bo.account.settings.*') ? 'active' : '' }}">Mon
                                                    compte</a></li>
                                            <li><a href="{{ route('bo.settings.company.edit') }}"
                                                    class="{{ request()->routeIs('bo.settings.company.*') ? 'active' : '' }}">Entreprise</a>
                                            </li>
                                            <li><a href="{{ route('bo.settings.invoice.edit') }}"
                                                    class="{{ request()->routeIs('bo.settings.invoice.*') ? 'active' : '' }}">Facturation</a>
                                            </li>
                                            <li><a href="{{ route('bo.settings.locale.edit') }}"
                                                    class="{{ request()->routeIs('bo.settings.locale.*') ? 'active' : '' }}">Localisation</a>
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
                                        data-bs-placement="top" data-bs-title="Paramètres"><i
                                            class="isax isax-setting-25"></i></a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('bo.documentation.index') }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Documentation"><i
                                        class="isax isax-document-normal4"></i></a>
                            </li>
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
