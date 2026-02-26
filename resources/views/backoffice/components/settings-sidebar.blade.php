    <div class="col-xl-3 col-lg-4">
        <div class="card settings-card">
            <div class="card-header">
                <h6 class="mb-0">Settings</h6>
            </div>
            <div class="card-body">
                <div class="sidebars settings-sidebar">
                    <div class="sidebar-inner">
                        <div class="sidebar-menu p-0">
                            <ul>
                                <li class="submenu-open">
                                    <ul>
                                        <li class="submenu">
                                            <a href="javascript:void(0);" class="{{ Request::is('account-settings', 'security-settings', 'plans-settings', 'notifications-settings', 'integrations-settings') ? 'active subdrop' : '' }}">
                                                <i class="isax isax-setting-2 fs-18"></i>
                                                <span class="fs-14 fw-medium ms-2">General Settings</span>
                                                <span class="isax isax-arrow-down-1 arrow-menu ms-auto"></span>
                                            </a>
                                            <ul>
                                                <li><a href="{{url('account-settings')}}" class="{{ Request::is('account-settings') ? 'active' : '' }}">Account Settings</a></li>
                                                <li><a href="{{url('security-settings')}}" class="{{ Request::is('security-settings') ? 'active' : '' }}">Security</a></li>
                                                <li><a href="{{url('plans-billings')}}" class="{{ Request::is('plans-billings') ? 'active' : '' }}">Plans & Billing</a></li>
                                                <li><a href="{{url('notifications-settings')}}" class="{{ Request::is('notifications-settings') ? 'active' : '' }}">Notifications</a></li>
                                                <li><a href="{{url('integrations-settings')}}" class="{{ Request::is('integrations-settings') ? 'active' : '' }}">Integrations</a></li>
                                            </ul>                                                                    
                                        </li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);" class="{{ Request::is('company-settings', 'localization-settings', 'prefixes-settings', 'seo-setup', 'language-settings', 'language-setting2', 'language-setting3', 'maintenance-mode', 'authentication-settings', 'ai-configuration', 'appearance-settings', 'plugin-manager','preference-settings') ? 'active subdrop' : '' }}">
                                                <i class="isax isax-global fs-18"></i>
                                                <span class="fs-14 fw-medium ms-2">Website Settings</span>
                                                <span class="isax isax-arrow-down-1 arrow-menu ms-auto"></span>
                                            </a>
                                            <ul>
                                                <li><a href="{{url('company-settings')}}" class="{{ Request::is('company-settings') ? 'active' : '' }}">Company Settings</a></li>
                                                <li><a href="{{url('localization-settings')}}" class="{{ Request::is('localization-settings') ? 'active' : '' }}">Localization</a></li>
                                                <li><a href="{{url('prefixes-settings')}}" class="{{ Request::is('prefixes-settings') ? 'active' : '' }}">Prefixes</a></li>
                                                <li><a href="{{url('preference-settings')}}" class="{{ Request::is('preference-settings') ? 'active' : '' }}">Preference</a></li>
                                                <li><a href="{{url('seo-setup')}}" class="{{ Request::is('seo-setup') ? 'active' : '' }}">SEO Setup</a></li>
                                                <li><a href="{{url('language-settings')}}" class="{{ Request::is('language-settings', 'language-setting2', 'language-setting3') ? 'active' : '' }}">Language</a></li>
                                                <li><a href="{{url('maintenance-mode')}}" class="{{ Request::is('maintenance-mode') ? 'active' : '' }}">Maintenance Mode</a></li>
                                                <li><a href="{{url('authentication-settings')}}" class="{{ Request::is('authentication-settings') ? 'active' : '' }}">Authentication</a></li>
                                                <li><a href="{{url('ai-configuration')}}" class="{{ Request::is('ai-configuration') ? 'active' : '' }}">AI Configuration</a></li>
                                                <li><a href="{{url('appearance-settings')}}" class="{{ Request::is('appearance-settings') ? 'active' : '' }}">Appearance</a></li>
                                                <li><a href="{{url('plugin-manager')}}" class="{{ Request::is('plugin-manager') ? 'active' : '' }}">Plugin Manager</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);" class="{{ Request::is('invoice-settings', 'invoice-templates-settings', 'esignatures', 'barcode-settings', 'thermal-printer', 'custom-fields', 'sass-settings') ? 'active subdrop' : '' }}">
                                                <i class="isax isax-shapes fs-18"></i>
                                                <span class="fs-14 fw-medium ms-2">App Settings</span>
                                                <span class="isax isax-arrow-down-1 arrow-menu ms-auto"></span>
                                            </a>
                                            <ul>
                                                <li><a href="{{url('invoice-settings')}}" class="{{ Request::is('invoice-settings') ? 'active' : '' }}">Invoice Settings</a></li>
                                                <li><a href="{{url('invoice-templates-settings')}}" class="{{ Request::is('invoice-templates-settings') ? 'active' : '' }}">Invoice Templates</a></li>
                                                <li><a href="{{url('esignatures')}}" class="{{ Request::is('esignatures') ? 'active' : '' }}">eSignatures</a></li>
                                                <li><a href="{{url('barcode-settings')}}" class="{{ Request::is('barcode-settings') ? 'active' : '' }}">Barcode</a></li>
                                                <li><a href="{{url('thermal-printer')}}" class="{{ Request::is('thermal-printer') ? 'active' : '' }}">Thermal Printer</a></li>
                                                <li><a href="{{url('custom-fields')}}" class="{{ Request::is('custom-fields') ? 'active' : '' }}">Custom Fields</a></li>
                                                <li><a href="{{url('sass-settings')}}" class="{{ Request::is('sass-settings') ? 'active' : '' }}">SaaS Settings</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);" class="{{ Request::is('payment-methods', 'bank-accounts-settings', 'tax-rates', 'currencies') ? 'active subdrop' : '' }}">
                                                <i class="isax isax-money-3 fs-18"></i>
                                                <span class="fs-14 fw-medium ms-2">Finance Settings</span>
                                                <span class="isax isax-arrow-down-1 arrow-menu ms-auto"></span>
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="{{url('payment-methods')}}" class="{{ Request::is('payment-methods') ? 'active' : '' }}">Payment Methods</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('bank-accounts-settings')}}" class="{{ Request::is('bank-accounts-settings') ? 'active' : '' }}">Bank Accounts</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('tax-rates')}}" class="{{ Request::is('tax-rates') ? 'active' : '' }}">Tax Rates</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('currencies')}}" class="{{ Request::is('currencies') ? 'active' : '' }}">Currencies</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);" class="{{ Request::is('email-settings', 'email-templates', 'sms-gateways', 'gdpr-cookies') ? 'active subdrop' : '' }}">
                                                <i class="isax isax-more-2 fs-18"></i>
                                                <span class="fs-14 fw-medium ms-2">System Settings</span>
                                                <span class="isax isax-arrow-down-1 arrow-menu ms-auto"></span>
                                            </a>
                                            <ul>
                                                <li><a href="{{url('email-settings')}}" class="{{ Request::is('email-settings') ? 'active' : '' }}">Email Settings</a></li>
                                                <li><a href="{{url('email-templates')}}" class="{{ Request::is('email-templates') ? 'active' : '' }}">Email Templates</a></li>
                                                <li><a href="{{url('sms-gateways')}}" class="{{ Request::is('sms-gateways') ? 'active' : '' }}">SMS Gateways</a></li>
                                                <li><a href="{{url('gdpr-cookies')}}" class="{{ Request::is('gdpr-cookies') ? 'active' : '' }}">GDPR Cookies</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);" class="{{ Request::is('custom-css', 'custom-js', 'sitemap', 'clear-cache', 'storage', 'cronjob', 'system-backup', 'database-backup', 'system-update') ? 'active subdrop' : '' }}">
                                                <i class="isax isax-document fs-18"></i>
                                                <span class="fs-14 fw-medium ms-2">Other Settings</span>
                                                <span class="isax isax-arrow-down-1 arrow-menu ms-auto"></span>
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="{{url('custom-css')}}" class="{{ Request::is('custom-css') ? 'active' : '' }}">Custom CSS</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('custom-js')}}" class="{{ Request::is('custom-js') ? 'active' : '' }}">Custom JS</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('sitemap')}}" class="{{ Request::is('sitemap') ? 'active' : '' }}">Sitemap</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('clear-cache')}}" class="{{ Request::is('clear-cache') ? 'active' : '' }}">Clear Cache</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('storage')}}" class="{{ Request::is('storage') ? 'active' : '' }}">Storage</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('cronjob')}}" class="{{ Request::is('cronjob') ? 'active' : '' }}">Cronjob</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('system-backup')}}" class="{{ Request::is('system-backup') ? 'active' : '' }}">System Backup</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('database-backup')}}" class="{{ Request::is('database-backup') ? 'active' : '' }}">Database Backup</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('system-update')}}" class="{{ Request::is('system-update') ? 'active' : '' }}">System Update</a>
                                                </li>
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