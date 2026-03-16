    <div class="col-xl-3 col-lg-4">
        <div class="card settings-card">
            <div class="card-header">
                <h6 class="mb-0">{{ __('Paramètres') }}</h6>
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
                                                <span class="fs-14 fw-medium ms-2">{{ __('Paramètres généraux') }}</span>
                                                <span class="isax isax-arrow-down-1 arrow-menu ms-auto"></span>
                                            </a>
                                            <ul>
                                                <li><a href="{{ route('bo.account.settings.edit') }}"
                                                        class="{{ request()->routeIs('bo.account.settings.*') ? 'active' : '' }}">{{ __('Paramètres du compte') }}</a></li>
                                                <li><a href="{{ route('bo.settings.security.index') }}"
                                                        class="{{ request()->routeIs('bo.settings.security.*') ? 'active' : '' }}">{{ __('Sécurité') }}</a></li>
                                                <li><a href="{{ route('bo.settings.notifications.edit') }}"
                                                        class="{{ request()->routeIs('bo.settings.notifications.*') ? 'active' : '' }}">{{ __('Notifications') }}</a></li>
                                            </ul>
                                        </li>

                                        {{-- Paramètres du site --}}
                                        <li class="submenu">
                                            <a href="javascript:void(0);"
                                                class="{{ request()->routeIs('bo.settings.company.*', 'bo.settings.locale.*', 'bo.settings.currencies.*', 'bo.settings.appearance.*') ? 'active subdrop' : '' }}">
                                                <i class="isax isax-global fs-18"></i>
                                                <span class="fs-14 fw-medium ms-2">{{ __('Paramètres du site') }}</span>
                                                <span class="isax isax-arrow-down-1 arrow-menu ms-auto"></span>
                                            </a>
                                            <ul>
                                                <li><a href="{{ route('bo.settings.company.edit') }}"
                                                        class="{{ request()->routeIs('bo.settings.company.*') ? 'active' : '' }}">{{ __("Paramètres de l'entreprise") }}</a></li>
                                                <li><a href="{{ route('bo.settings.locale.edit') }}"
                                                        class="{{ request()->routeIs('bo.settings.locale.*') ? 'active' : '' }}">{{ __('Localisation') }}</a>
                                                </li>
                                                <li><a href="{{ route('bo.settings.currencies.index') }}"
                                                        class="{{ request()->routeIs('bo.settings.currencies.*') ? 'active' : '' }}">{{ __('Devises') }}</a></li>
                                                <li><a href="{{ route('bo.settings.appearance.edit') }}"
                                                        class="{{ request()->routeIs('bo.settings.appearance.*') ? 'active' : '' }}">{{ __('Apparence') }}</a></li>
                                            </ul>
                                        </li>

                                        {{-- Paramètres de l'application --}}
                                        <li class="submenu">
                                            <a href="javascript:void(0);"
                                                class="{{ request()->routeIs('bo.settings.invoice.*', 'bo.settings.invoice-templates.*', 'bo.settings.email-templates.*', 'bo.catalog.tax-rates.*', 'bo.catalog.tax-categories.*', 'bo.catalog.tax-groups.*', 'bo.settings.signatures.*', 'bo.settings.barcode.*', 'bo.settings.payment-methods.*') ? 'active subdrop' : '' }}">
                                                <i class="isax isax-shapes fs-18"></i>
                                                <span class="fs-14 fw-medium ms-2">{{ __("Paramètres de l'application") }}</span>
                                                <span class="isax isax-arrow-down-1 arrow-menu ms-auto"></span>
                                            </a>
                                            <ul>
                                                <li><a href="{{ route('bo.settings.invoice.edit') }}"
                                                        class="{{ request()->routeIs('bo.settings.invoice.*') ? 'active' : '' }}">{{ __('Paramètres de facturation') }}</a></li>
                                                <li><a href="{{ route('bo.settings.invoice-templates.index') }}"
                                                        class="{{ request()->routeIs('bo.settings.invoice-templates.*') ? 'active' : '' }}">{{ __('Modèles de documents') }}</a></li>
                                                <li><a href="{{ route('bo.catalog.tax-rates.index') }}"
                                                        class="{{ request()->routeIs('bo.catalog.tax-rates.*', 'bo.catalog.tax-categories.*', 'bo.catalog.tax-groups.*') ? 'active' : '' }}">{{ __('Taux de taxes') }}</a></li>
                                                <li><a href="{{ route('bo.settings.signatures.index') }}"
                                                        class="{{ request()->routeIs('bo.settings.signatures.*') ? 'active' : '' }}">{{ __('Signatures électroniques') }}</a></li>
                                                <li><a href="{{ route('bo.settings.payment-methods.index') }}"
                                                        class="{{ request()->routeIs('bo.settings.payment-methods.*') ? 'active' : '' }}">{{ __('Modes de paiement') }}</a></li>
                                                <li><a href="javascript:void(0);" class="d-flex align-items-center">{{ __("Modèles d'email") }}
                                                        <span class="badge bg-soft-warning text-warning ms-2" style="font-size: 10px;">{{ __('Bientôt') }}</span></a></li>
                                                <li><a href="javascript:void(0);" class="d-flex align-items-center">{{ __('Code-barres') }}
                                                        <span class="badge bg-soft-warning text-warning ms-2" style="font-size: 10px;">{{ __('Bientôt') }}</span></a></li>
                                            </ul>
                                        </li>

                                        {{-- Abonnement --}}
                                        <li class="submenu">
                                            <a href="javascript:void(0);"
                                                class="{{ request()->routeIs('bo.settings.plans-billings.*') ? 'active subdrop' : '' }}">
                                                <i class="isax isax-crown fs-18"></i>
                                                <span class="fs-14 fw-medium ms-2">{{ __('Abonnement') }}</span>
                                                <span class="isax isax-arrow-down-1 arrow-menu ms-auto"></span>
                                            </a>
                                            <ul>
                                                <li><a href="{{ route('bo.settings.plans-billings.index') }}"
                                                        class="{{ request()->routeIs('bo.settings.plans-billings.*') ? 'active' : '' }}">{{ __('Plans & Facturation') }}</a></li>
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
