    <div class="col-xl-3 col-lg-4">
        <div class="card settings-card">
            <div class="card-header">
                <h6 class="mb-0">Paramètres</h6>
            </div>
            <div class="card-body">
                <div class="sidebars settings-sidebar">
                    <div class="sidebar-inner">
                        <div class="sidebar-menu p-0">
                            <ul>
                                <li class="submenu-open">
                                    <ul>
                                        {{-- Paramètres généraux --}}
                                        <li class="submenu">
                                            <a href="javascript:void(0);"
                                                class="{{ request()->routeIs('bo.account.settings.*', 'bo.settings.security.*') ? 'active subdrop' : '' }}">
                                                <i class="isax isax-setting-2 fs-18"></i>
                                                <span class="fs-14 fw-medium ms-2">Paramètres généraux</span>
                                                <span class="isax isax-arrow-down-1 arrow-menu ms-auto"></span>
                                            </a>
                                            <ul>
                                                <li><a href="{{ route('bo.account.settings.edit') }}"
                                                        class="{{ request()->routeIs('bo.account.settings.*') ? 'active' : '' }}">Paramètres du compte</a></li>
                                                <li><a href="{{ route('bo.settings.security.index') }}"
                                                        class="{{ request()->routeIs('bo.settings.security.*') ? 'active' : '' }}">Sécurité</a></li>
                                                <li><a href="{{ route('bo.settings.notifications.edit') }}"
                                                        class="{{ request()->routeIs('bo.settings.notifications.*') ? 'active' : '' }}">Notifications</a></li>
                                            </ul>
                                        </li>

                                        {{-- Paramètres du site --}}
                                        <li class="submenu">
                                            <a href="javascript:void(0);"
                                                class="{{ request()->routeIs('bo.settings.company.*', 'bo.settings.locale.*', 'bo.settings.currencies.*') ? 'active subdrop' : '' }}">
                                                <i class="isax isax-global fs-18"></i>
                                                <span class="fs-14 fw-medium ms-2">Paramètres du site</span>
                                                <span class="isax isax-arrow-down-1 arrow-menu ms-auto"></span>
                                            </a>
                                            <ul>
                                                <li><a href="{{ route('bo.settings.company.edit') }}"
                                                        class="{{ request()->routeIs('bo.settings.company.*') ? 'active' : '' }}">Paramètres de l'entreprise</a></li>
                                                <li><a href="{{ route('bo.settings.locale.edit') }}"
                                                        class="{{ request()->routeIs('bo.settings.locale.*') ? 'active' : '' }}">Localisation</a>
                                                </li>
                                                <li><a href="{{ route('bo.settings.currencies.index') }}"
                                                        class="{{ request()->routeIs('bo.settings.currencies.*') ? 'active' : '' }}">Devises</a></li>
                                            </ul>
                                        </li>

                                        {{-- Paramètres de l'application --}}
                                        <li class="submenu">
                                            <a href="javascript:void(0);"
                                                class="{{ request()->routeIs('bo.settings.invoice.*', 'bo.settings.invoice-templates.*', 'bo.settings.tax-rates.*', 'bo.settings.signatures.*', 'bo.settings.barcode.*') ? 'active subdrop' : '' }}">
                                                <i class="isax isax-shapes fs-18"></i>
                                                <span class="fs-14 fw-medium ms-2">Paramètres de l'application</span>
                                                <span class="isax isax-arrow-down-1 arrow-menu ms-auto"></span>
                                            </a>
                                            <ul>
                                                <li><a href="{{ route('bo.settings.invoice.edit') }}"
                                                        class="{{ request()->routeIs('bo.settings.invoice.*') ? 'active' : '' }}">Paramètres de facturation</a></li>
                                                <li><a href="{{ route('bo.settings.invoice-templates.index') }}"
                                                        class="{{ request()->routeIs('bo.settings.invoice-templates.*') ? 'active' : '' }}">Modèles de factures</a></li>
                                                <li><a href="{{ route('bo.settings.tax-rates.index') }}"
                                                        class="{{ request()->routeIs('bo.settings.tax-rates.*') ? 'active' : '' }}">Taux de taxes</a></li>
                                                <li><a href="{{ route('bo.settings.signatures.index') }}"
                                                        class="{{ request()->routeIs('bo.settings.signatures.*') ? 'active' : '' }}">Signatures électroniques</a></li>
                                                <li><a href="{{ route('bo.settings.barcode.edit') }}"
                                                        class="{{ request()->routeIs('bo.settings.barcode.*') ? 'active' : '' }}">Code-barres</a></li>
                                            </ul>
                                        </li>

                                        {{-- Abonnement --}}
                                        <li class="submenu">
                                            <a href="javascript:void(0);"
                                                class="{{ request()->routeIs('bo.settings.plans-billings.*') ? 'active subdrop' : '' }}">
                                                <i class="isax isax-crown fs-18"></i>
                                                <span class="fs-14 fw-medium ms-2">Abonnement</span>
                                                <span class="isax isax-arrow-down-1 arrow-menu ms-auto"></span>
                                            </a>
                                            <ul>
                                                <li><a href="{{ route('bo.settings.plans-billings.index') }}"
                                                        class="{{ request()->routeIs('bo.settings.plans-billings.*') ? 'active' : '' }}">Plans & Facturation</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
