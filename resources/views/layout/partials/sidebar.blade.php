    <!-- Sidenav Menu Start -->
    <div class="two-col-sidebar" id="two-col-sidebar">
        <div class="twocol-mini">
            <!-- Add -->
            <div class="dropdown">
                <a class="btn btn-primary bg-gradient btn-sm btn-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" href="javascript:void(0);" role="button"  data-bs-display="static" data-bs-reference="parent">
                    <i class="isax isax-add"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-start">
                    <li>
                        <a href="{{url('add-invoice')}}" class="dropdown-item d-flex align-items-center">
                            <i class="isax isax-document-text-1 me-2"></i>Invoice
                        </a>
                    </li>
                    <li>
                        <a href="{{url('expenses')}}" class="dropdown-item d-flex align-items-center">
                            <i class="isax isax-money-send me-2"></i>Expense
                        </a>
                    </li>
                    <li>
                        <a href="{{url('add-credit-notes', 'add-credit-notes', 'edit-credit-notes')}}" class="dropdown-item d-flex align-items-center">
                            <i class="isax isax-money-add me-2"></i>Credit Notes
                        </a>
                    </li>
                    <li>
                        <a href="{{url('add-debit-notes')}}" class="dropdown-item d-flex align-items-center">
                            <i class="isax isax-money-recive me-2"></i>Debit Notes
                        </a>
                    </li>
                    <li>
                        <a href="{{url('add-purchases-orders')}}" class="dropdown-item d-flex align-items-center">
                            <i class="isax isax-document me-2"></i>Purchase Order
                        </a>
                    </li>
                    <li>
                        <a href="{{url('add-quotation')}}" class="dropdown-item d-flex align-items-center">
                            <i class="isax isax-document-download me-2"></i>Quotation
                        </a>
                    </li>
                    <li>
                        <a href="{{url('add-delivery-challan')}}" class="dropdown-item d-flex align-items-center">
                            <i class="isax isax-document-forward me-2"></i>Delivery Challan
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /Add -->

            <ul class="menu-list">
                <li>
                    <a href="{{url('account-settings')}}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Settings"><i class="isax isax-setting-25"></i></a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Documentation"><i class="isax isax-document-normal4"></i></a>						
                </li>
                <li>
                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Changelog"><i class="isax isax-cloud-change5"></i></a>						
                </li>
                <li>
                    <a href="{{url('login')}}"><i class="isax isax-login-15"></i></a>				
                </li>
            </ul>
        </div>
        <div class="sidebar" id="sidebar-two">

            <!-- Start Logo -->
            <div class="sidebar-logo">
                <a href="{{url('index')}}" class="logo logo-normal">
                    <img src="{{URL::asset('build/img/logo.svg')}}" alt="Logo">
                </a>
                <a href="{{url('index')}}" class="logo-small">
                    <img src="{{URL::asset('build/img/logo-small.svg')}}" alt="Logo">
                </a>
                <a href="{{url('index')}}" class="dark-logo">
                    <img src="{{URL::asset('build/img/logo-white.svg')}}" alt="Logo">
                </a>
                <a href="{{url('index')}}" class="dark-small">
                    <img src="{{URL::asset('build/img/logo-small-white.svg')}}" alt="Logo">
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
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-icon-addon">
                        <i class="isax isax-search-normal"></i>
                    </span>
                </div>
            </div>
            <!-- /Search -->

            <!--- Sidenav Menu -->
            <div class="sidebar-inner" data-simplebar>
                <div id="sidebar-menu" class="sidebar-menu">
                    @if (!Route::is(['customer-dashboard', 'customer-quotations', 'customer-add-quotation', 'customer-invoices', 'customer-invoice-details', 'customer-recurring-invoices', 'customer-transactions', 'customer-payment-summary', 'customer-invoice-report', 'customer-account-settings', 'customer-security-settings', 'customer-plans-settings', 'customer-notification-settings', 'super-admin-dashboard', 'companies', 'subscriptions', 'packages', 'domain', 'purchase-transaction']))
                    <ul>
                        <li class="menu-title"><span>Main</span></li>
                        <li>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('index', '/', 'admin-dashboard') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-element-45"></i><span>Dashboard</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('index')}}" class="{{ Request::is('index', '/') ? 'active' : '' }}">Admin Dashboard</a></li>
                                        <li><a href="{{url('admin-dashboard')}}" class="{{ Request::is('admin-dashboard') ? 'active' : '' }}">Admin Dashboard 2</a></li>
                                        <li><a href="{{url('customer-dashboard')}}">Customer Dashboard</a></li>
                                        <li><a href="{{url('super-admin-dashboard')}}">Super Admin Dashboard</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);">
                                        <i class="isax isax-shapes5"></i><span>Super Admin</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('super-admin-dashboard')}}">Dashboard</a></li>
                                        <li><a href="{{url('companies')}}">Companies</a></li>
                                        <li><a href="{{url('subscriptions')}}">Subscriptions</a></li>
                                        <li><a href="{{url('packages')}}">Packages</a></li>
                                        <li><a href="{{url('domain')}}">Domain</a></li>
                                        <li><a href="{{url('purchase-transaction')}}">Purchase Transaction</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('chat', 'voice-call', 'video-call', 'outgoing-call', 'incoming-call', 'call-history', 'calendar', 'email', 'email-reply', 'todo', 'notes', 'social-feed', 'file-manager', 'kanban-view', 'contacts', 'invoice', 'search-list') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-category-25"></i><span>Applications</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('chat')}}" class="{{ Request::is('chat') ? 'active' : '' }}">Chat</a></li>
                                        <li class="submenu submenu-two">
                                            <a href="{{url('javascript:void(0);')}}" class="{{ Request::is('voice-call', 'video-call', 'outgoing-call', 'incoming-call', 'call-history') ? 'active subdrop' : '' }}">Calls<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="{{url('voice-call')}}" class="{{ Request::is('voice-call') ? 'active' : '' }}">Voice Call</a></li>
                                                <li><a href="{{url('video-call')}}" class="{{ Request::is('video-call') ? 'active' : '' }}">Video Call</a></li>
                                                <li><a href="{{url('outgoing-call')}}" class="{{ Request::is('outgoing-call') ? 'active' : '' }}">Outgoing Call</a></li>
                                                <li><a href="{{url('incoming-call')}}" class="{{ Request::is('incoming-call') ? 'active' : '' }}">Incoming Call</a></li>
                                                <li><a href="{{url('call-history')}}" class="{{ Request::is('call-history') ? 'active' : '' }}">Call History</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{url('calendar')}}" class="{{ Request::is('calendar') ? 'active' : '' }}">Calendar</a></li>
                                        <li><a href="{{url('email')}}" class="{{ Request::is('email', 'email-reply') ? 'active' : '' }}">Email</a></li>
                                        <li><a href="{{url('todo')}}" class="{{ Request::is('todo') ? 'active' : '' }}">To Do</a></li>
                                        <li><a href="{{url('notes')}}" class="{{ Request::is('notes') ? 'active' : '' }}">Notes</a></li>
                                        <li><a href="{{url('social-feed')}}" class="{{ Request::is('social-feed') ? 'active' : '' }}">Social Feed</a></li>
                                        <li><a href="{{url('file-manager')}}" class="{{ Request::is('file-manager') ? 'active' : '' }}">File Manager</a></li>
                                        <li><a href="{{url('kanban-view')}}" class="{{ Request::is('kanban-view') ? 'active' : '' }}">Kanban</a></li>
                                        <li><a href="{{url('contacts')}}" class="{{ Request::is('contacts') ? 'active' : '' }}">Contacts</a></li>											
                                        <li><a href="{{url('invoice')}}" class="{{ Request::is('invoice') ? 'active' : '' }}">Invoices</a></li>
                                        <li><a href="{{url('search-list')}}" class="{{ Request::is('search-list') ? 'active' : '' }}">Search List</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-title"><span>Inventory & Sales</span></li>
                        <li>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('products', 'add-product', 'edit-product', 'category', 'units') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-box5"></i><span>Product / Services</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('products')}}" class="{{ Request::is('products', 'add-product', 'edit-product') ? 'active' : '' }}">Products</a></li>
                                        <li><a href="{{url('category')}}" class="{{ Request::is('category') ? 'active' : '' }}">Category</a></li>
                                        <li><a href="{{url('units')}}" class="{{ Request::is('units') ? 'active' : '' }}">Units</a></li>
                                    </ul>
                                </li>
                                <li class="{{ Request::is('inventory') ? 'active' : '' }}">
                                    <a href="{{url('inventory')}}">
                                        <i class="isax isax-lifebuoy5"></i><span>Inventory</span>
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('invoices', 'edit-invoice', 'add-invoice', 'invoice-details', 'invoice-templates', 'recurring-invoices') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-receipt-item5"></i><span>Invoices</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('invoices')}}" class="{{ Request::is('invoices', 'edit-invoice') ? 'active' : '' }}">Invoices</a></li>
                                        <li><a href="{{url('add-invoice')}}" class="{{ Request::is('add-invoice') ? 'active' : '' }}">Create Invoice</a></li>
                                        <li><a href="{{url('invoice-details')}}" class="{{ Request::is('invoice-details') ? 'active' : '' }}">Invoice Details</a></li>
                                        <li><a href="{{url('invoice-templates')}}" class="{{ Request::is('invoice-templates') ? 'active' : '' }}">Invoice Templates</a></li>
                                        <li><a href="{{url('recurring-invoices')}}" class="{{ Request::is('recurring-invoices') ? 'active' : '' }}">Recurring Invoices</a></li>
                                    </ul>
                                </li>
                                <li class="{{ Request::is('credit-notes') ? 'active' : '' }}">
                                    <a href="{{url('credit-notes')}}">
                                        <i class="isax isax-note5"></i><span>Credit Notes</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('quotations', 'add-quotation', 'edit-quotation') ? 'active' : '' }}">
                                    <a href="{{url('quotations')}}">
                                        <i class="isax isax-strongbox5"></i><span>Quotations</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('delivery-challans', 'add-delivery-challan', 'edit-delivery-challan') ? 'active' : '' }}">
                                    <a href="{{url('delivery-challans')}}">
                                        <i class="isax isax-bookmark-25"></i><span>Delivery Challans</span>
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('customers', 'add-customer', 'edit-customer', 'customer-details') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-profile-2user5"></i><span>Customers</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('customers')}}" class="{{ Request::is('customers', 'add-customer', 'edit-customer') ? 'active' : '' }}">Customers</a></li>
                                        <li><a href="{{url('customer-details')}}" class="{{ Request::is('customer-details') ? 'active' : '' }}">Customer Details</a></li>
                                    </ul>
                                </li>
                            </ul>							
                        </li>
                        <li class="menu-title"><span>Purchases</span></li>
                        <li>
                            <ul>
                                <li class="{{ Request::is('purchases', 'add-purchases', 'edit-purchases') ? 'active' : '' }}">
                                    <a href="{{url('purchases')}}">
                                        <i class="isax isax-bag-tick-25"></i><span>Purchases</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('purchase-orders', 'add-purchases-orders', 'edit-purchases-orders') ? 'active' : '' }}">
                                    <a href="{{url('purchase-orders')}}">
                                        <i class="isax isax-document-forward5"></i><span>Purchase Orders</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('debit-notes', 'add-debit-notes', 'edit-debit-notes') ? 'active' : '' }}">
                                    <a href="{{url('debit-notes')}}">
                                        <i class="isax isax-document-text5"></i><span>Debit Notes</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('suppliers') ? 'active' : '' }}">
                                    <a href="{{url('suppliers')}}">
                                        <i class="isax isax-security-user5"></i><span>Suppliers</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('supplier-payments') ? 'active' : '' }}">
                                    <a href="{{url('supplier-payments')}}">
                                        <i class="isax isax-coin-15"></i><span>Supplier Payments</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-title"><span>Finance & Accounts</span></li>
                        <li>
                            <ul>
                                <li class="{{ Request::is('expenses') ? 'active' : '' }}">
                                    <a href="{{url('expenses')}}">
                                        <i class="isax isax-money-send5"></i><span>Expenses</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('incomes') ? 'active' : '' }}">
                                    <a href="{{url('incomes')}}">
                                        <i class="isax isax-money-recive5"></i><span>Incomes</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('payments') ? 'active' : '' }}">
                                    <a href="{{url('payments')}}">
                                        <i class="isax isax-money-tick5"></i><span>Payments</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('transactions') ? 'active' : '' }}">
                                    <a href="{{url('transactions')}}">
                                        <i class="isax isax-moneys5"></i><span>Transactions</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('bank-accounts') ? 'active' : '' }}">
                                    <a href="{{url('bank-accounts')}}">
                                        <i class="isax isax-card-tick-15"></i><span>Bank Accounts</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('money-transfer') ? 'active' : '' }}">
                                    <a href="{{url('money-transfer')}}">
                                        <i class="isax isax-convert-card5"></i><span>Money Transfer</span>
                                    </a>
                                </li>
                            </ul>
                        </li>						
                        <li class="menu-title"><span>Manage</span></li>
                        <li>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('users', 'roles-permissions', 'delete-account-request') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-profile-2user5"></i><span>Manage Users</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('users')}}" class="{{ Request::is('users') ? 'active' : '' }}">Users</a></li>
                                        <li><a href="{{url('roles-permissions')}}" class="{{ Request::is('roles-permissions') ? 'active' : '' }}">Roles & Permissions</a></li>
                                        <li><a href="{{url('delete-account-request')}}" class="{{ Request::is('delete-account-request') ? 'active' : '' }}">Delete Account Request</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('membership-plans', 'membership-addons', 'subscribers', 'membership-transactions') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-star-15"></i><span>Membership</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('membership-plans')}}" class="{{ Request::is('membership-plans') ? 'active' : '' }}">Membership Plans</a></li>
                                        <li><a href="{{url('membership-addons')}}" class="{{ Request::is('membership-addons') ? 'active' : '' }}">Membership Addons</a></li>
                                        <li><a href="{{url('subscribers')}}" class="{{ Request::is('subscribers') ? 'active' : '' }}">Subscribers</a></li>
                                        <li><a href="{{url('membership-transactions')}}" class="{{ Request::is('membership-transactions') ? 'active' : '' }}">Transactions</a></li>
                                    </ul>
                                </li>
                                <li class="{{ Request::is('contact-messages') ? 'active' : '' }}">
                                    <a href="{{url('contact-messages')}}">
                                        <i class="isax isax-messages-25"></i><span>Contact Messages</span>
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('tickets', 'ticket-kanban', 'ticket-details') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-ticket-25"></i><span>Tickets</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('tickets')}}" class="{{ Request::is('tickets') ? 'active' : '' }}">Ticket Lists</a></li>
                                        <li><a href="{{url('ticket-kanban')}}" class="{{ Request::is('ticket-kanban') ? 'active' : '' }}">Ticket Kanban</a></li>
                                        <li><a href="{{url('ticket-details')}}" class="{{ Request::is('ticket-details') ? 'active' : '' }}">Ticket Details</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>			
                        <li class="menu-title"><span>Administration</span></li>
                        <li>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('stock-summary', 'inventory-report', 'best-seller', 'low-stock', 'stock-history', 'sold-stock', 'sales-report', 'sales-returns', 'sales-orders', 'purchases-report', 'purchase-return-report', 'purchase-orders-report', 'quotation-report', 'payment-summary', 'tax-report', 'expense-report', 'income-report', 'profit-loss-report', 'annual-report', 'balance-sheet', 'trial-balance', 'cash-flow', 'account-statement', 'customers-report', 'customer-due-report', 'supplier-report') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-chart-35"></i><span>Reports</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);" class="{{ Request::is('stock-summary', 'inventory-report', 'best-seller', 'low-stock', 'stock-history', 'sold-stock') ? 'active subdrop' : '' }}">Item Reports<span class="menu-arrow"></span></a>
                                            <ul>
                                                <li><a href="{{url('stock-summary')}}" class="{{ Request::is('stock-summary') ? 'active' : '' }}">Stock Summary</a></li>
                                                <li><a href="{{url('inventory-report')}}" class="{{ Request::is('inventory-report') ? 'active' : '' }}">Inventory</a></li>
                                                <li><a href="{{url('best-seller')}}" class="{{ Request::is('best-seller') ? 'active' : '' }}">Best Seller</a></li>
                                                <li><a href="{{url('low-stock')}}" class="{{ Request::is('low-stock') ? 'active' : '' }}">Low Stock</a></li>
                                                <li><a href="{{url('stock-history')}}" class="{{ Request::is('stock-history') ? 'active' : '' }}">Stock History</a></li>
                                                <li><a href="{{url('sold-stock')}}" class="{{ Request::is('sold-stock') ? 'active' : '' }}">Sold Stock</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);" class="{{ Request::is('sales-report', 'sales-returns', 'sales-orders', 'purchases-report', 'purchase-return-report', 'purchase-orders-report', 'quotation-report') ? 'active subdrop' : '' }}">Transaction Reports<span class="menu-arrow"></span></a>
                                            <ul>
                                                <li><a href="{{url('sales-report')}}" class="{{ Request::is('sales-report') ? 'active' : '' }}">Sales</a></li>
                                                <li><a href="{{url('sales-returns')}}" class="{{ Request::is('sales-returns') ? 'active' : '' }}">Sales Return</a></li>
                                                <li><a href="{{url('sales-orders')}}" class="{{ Request::is('sales-orders') ? 'active' : '' }}">Sales Orders</a></li>
                                                <li><a href="{{url('purchases-report')}}" class="{{ Request::is('purchases-report') ? 'active' : '' }}">Purchases</a></li>
                                                <li><a href="{{url('purchase-return-report')}}" class="{{ Request::is('purchase-return-report') ? 'active' : '' }}">Purchase Return</a></li>
                                                <li><a href="{{url('purchase-orders-report')}}" class="{{ Request::is('purchase-orders-report') ? 'active' : '' }}">Purchase Orders</a></li>
                                                <li><a href="{{url('quotation-report')}}" class="{{ Request::is('quotation-report') ? 'active' : '' }}">Quotation</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);" class="{{ Request::is('payment-summary', 'tax-report') ? 'active subdrop' : '' }}">Finance Reports<span class="menu-arrow"></span></a>
                                            <ul>
                                                <li><a href="{{url('payment-summary')}}" class="{{ Request::is('payment-summary') ? 'active' : '' }}">Payment Summary</a></li>
                                                <li><a href="{{url('tax-report')}}" class="{{ Request::is('tax-report') ? 'active' : '' }}">Taxes</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);" class="{{ Request::is('expense-report', 'income-report', 'profit-loss-report', 'annual-report', 'balance-sheet', 'trial-balance', 'cash-flow', 'account-statement') ? 'active subdrop' : '' }}">Accounting Reports<span class="menu-arrow"></span></a>
                                            <ul>
                                                <li><a href="{{url('expense-report')}}" class="{{ Request::is('expense-report') ? 'active' : '' }}">Expenses</a></li>
                                                <li><a href="{{url('income-report')}}" class="{{ Request::is('income-report') ? 'active' : '' }}">Income</a></li>
                                                <li><a href="{{url('profit-loss-report')}}" class="{{ Request::is('profit-loss-report') ? 'active' : '' }}">Profit & Loss</a></li>
                                                <li><a href="{{url('annual-report')}}" class="{{ Request::is('annual-report') ? 'active' : '' }}">Annual Report</a></li>
                                                <li><a href="{{url('balance-sheet')}}" class="{{ Request::is('balance-sheet') ? 'active' : '' }}">Balance Sheet</a></li>
                                                <li><a href="{{url('trial-balance')}}" class="{{ Request::is('trial-balance') ? 'active' : '' }}">Trial Balance</a></li>
                                                <li><a href="{{url('cash-flow')}}" class="{{ Request::is('cash-flow') ? 'active' : '' }}">Cash Flow</a></li>
                                                <li><a href="{{url('account-statement')}}" class="{{ Request::is('account-statement') ? 'active' : '' }}">Account Statement</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);" class="{{ Request::is('customers-report', 'customer-due-report', 'supplier-report') ? 'active subdrop' : '' }}">User Reports<span class="menu-arrow"></span></a>
                                            <ul>
                                                <li>
                                                    <a href="{{url('customers-report')}}" class="{{ Request::is('customers-report') ? 'active' : '' }}">Customers</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('customer-due-report')}}" class="{{ Request::is('customer-due-report') ? 'active' : '' }}">Customer Due Report</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('supplier-report')}}" class="{{ Request::is('supplier-report') ? 'active' : '' }}">Supplier</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('account-settings', 'security-settings', 'plans-settings', 'notifications-settings', 'integrations-settings', 'company-settings', 'localization-settings', 'prefixes-settings', 'seo-setup', 'language-settings', 'language-setting2', 'language-setting3', 'maintenance-mode', 'authentication-settings', 'ai-configuration', 'appearance-settings', 'plugin-manager', 'invoice-settings', 'invoice-templates-settings', 'esignatures', 'barcode-settings', 'thermal-printer', 'custom-fields', 'sass-settings', 'email-settings', 'email-templates', 'sms-gateways', 'gdpr-cookies', 'payment-methods', 'bank-accounts-settings', 'tax-rates', 'currencies', 'custom-css', 'custom-js', 'sitemap', 'clear-cache', 'storage', 'cronjob', 'system-backup', 'database-backup', 'system-update') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-setting-25"></i><span>Settings</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);" class="{{ Request::is('account-settings', 'security-settings', 'plans-settings', 'notifications-settings', 'integrations-settings') ? 'active subdrop' : '' }}">General Settings<span class="menu-arrow"></span></a>
                                            <ul>
                                                <li><a href="{{url('account-settings')}}" class="{{ Request::is('account-settings') ? 'active' : '' }}">Account Settings</a></li>
                                                <li><a href="{{url('security-settings')}}" class="{{ Request::is('security-settings') ? 'active' : '' }}">Security</a></li>
                                                <li><a href="{{url('plans-billings')}}" class="{{ Request::is('plans-billings') ? 'active' : '' }}">Plans & Billing</a></li>
                                                <li><a href="{{url('notifications-settings')}}" class="{{ Request::is('notifications-settings') ? 'active' : '' }}">Notifications</a></li>
                                                <li><a href="{{url('integrations-settings')}}" class="{{ Request::is('integrations-settings') ? 'active' : '' }}">Integrations</a></li>
                                            </ul> 
                                        </li>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);" class="{{ Request::is('company-settings', 'localization-settings', 'prefixes-settings', 'seo-setup', 'language-settings', 'language-setting2', 'language-setting3', 'maintenance-mode', 'authentication-settings', 'ai-configuration', 'appearance-settings', 'plugin-manager') ? 'active subdrop' : '' }}">Website Settings<span class="menu-arrow"></span></a>
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
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);" class="{{ Request::is('invoice-settings', 'invoice-templates-settings', 'esignatures', 'barcode-settings', 'thermal-printer', 'custom-fields', 'sass-settings') ? 'active subdrop' : '' }}">App Settings<span class="menu-arrow"></span></a>
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
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);" class="{{ Request::is('email-settings', 'email-templates', 'sms-gateways', 'gdpr-cookies') ? 'active subdrop' : '' }}">System Settings<span class="menu-arrow"></span></a>
                                            <ul>
                                                <li><a href="{{url('email-settings')}}" class="{{ Request::is('email-settings') ? 'active' : '' }}">Email Settings</a></li>
                                                <li><a href="{{url('email-templates')}}" class="{{ Request::is('email-templates') ? 'active' : '' }}">Email Templates</a></li>
                                                <li><a href="{{url('sms-gateways')}}" class="{{ Request::is('sms-gateways') ? 'active' : '' }}">SMS Gateways</a></li>
                                                <li><a href="{{url('gdpr-cookies')}}" class="{{ Request::is('gdpr-cookies') ? 'active' : '' }}">GDPR Cookies</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);" class="{{ Request::is('payment-methods', 'bank-accounts-settings', 'tax-rates', 'currencies') ? 'active subdrop' : '' }}">Finance Settings<span class="menu-arrow"></span></a>
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
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);" class="{{ Request::is('custom-css', 'custom-js', 'sitemap', 'clear-cache', 'storage', 'cronjob', 'system-backup', 'database-backup', 'system-update') ? 'active subdrop' : '' }}">Other Settings<span class="menu-arrow"></span></a>
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
                        </li>
                        <li class="menu-title"><span>Layout</span></li>
                        <li>
                            <ul>
                                <li class="{{ Request::is('layout-default') ? 'active' : '' }}">
                                    <a href="{{url('layout-default')}}">
                                        <i class="isax isax-row-horizontal5"></i><span>Default</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('layout-single') ? 'active' : '' }}">
                                    <a href="{{url('layout-single')}}">
                                        <i class="isax isax-grid-95"></i><span>Single</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('layout-mini') ? 'active' : '' }}">
                                    <a href="{{url('layout-mini')}}">
                                        <i class="isax isax-grid-45"></i><span>Mini</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('layout-transparent') ? 'active' : '' }}">
                                    <a href="{{url('layout-transparent')}}">
                                        <i class="isax isax-grid-25"></i><span>Transparent</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('layout-without-header') ? 'active' : '' }}">
                                    <a href="{{url('layout-without-header')}}">
                                        <i class="isax isax-slider-vertical-15"></i><span>Without Header</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('layout-rtl') ? 'active' : '' }}">
                                    <a href="{{url('layout-rtl')}}">
                                        <i class="isax isax-sidebar-left5"></i><span>RTL</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('layout-dark') ? 'active' : '' }}">
                                    <a href="{{url('layout-dark')}}">
                                        <i class="isax isax-moon5"></i><span>Dark</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-title"><span>Content</span></li>
                        <li>
                            <ul>
                                <li class="{{ Request::is('pages') ? 'active' : '' }}">
                                    <a href="{{url('pages')}}" >
                                        <i class="isax isax-document-15"></i><span>Pages</span>
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('blogs', 'add-blog', 'edit-blog', 'blog-categories', 'blog-tags', 'blog-comments') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-book5"></i><span>Blogs</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('blogs')}}" class="{{ Request::is('blogs', 'add-blog', 'edit-blog') ? 'active' : '' }}">All Blogs</a></li>
                                        <li><a href="{{url('blog-categories')}}" class="{{ Request::is('blog-categories') ? 'active' : '' }}">Categories</a></li>
                                        <li><a href="{{url('blog-tags')}}" class="{{ Request::is('blog-tags') ? 'active' : '' }}">Blog Tags</a></li>
                                        <li><a href="{{url('blog-comments')}}" class="{{ Request::is('blog-comments') ? 'active' : '' }}">Comments</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('countries', 'countries', 'cities') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-map5"></i><span>Locations</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('countries')}}" class="{{ Request::is('countries') ? 'active' : '' }}">Countries</a></li>
                                        <li><a href="{{url('states')}}" class="{{ Request::is('states') ? 'active' : '' }}">States</a></li>
                                        <li><a href="{{url('cities')}}" class="{{ Request::is('cities') ? 'active' : '' }}">Cities</a></li>
                                    </ul>
                                </li>
                                <li class="{{ Request::is('testimonials') ? 'active' : '' }}">
                                    <a href="{{url('testimonials')}}">
                                        <i class="isax isax-messages-15"></i><span>Testimonials</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('faq') ? 'active' : '' }}">
                                    <a href="{{url('faq')}}">
                                        <i class="isax isax-message-question5"></i><span>FAQ’S</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-title"><span>Pages</span></li>
                        <li>
                            <ul>
                                <li class="{{ Request::is('profile') ? 'active' : '' }}">
                                    <a href="{{url('profile')}}">
                                        <i class="isax isax-profile-tick5"></i><span>Profile</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('starter') ? 'active' : '' }}">
                                    <a href="{{url('starter')}}" >
                                        <i class="isax isax-document-favorite5"></i><span>Starter Page</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('gallery') ? 'active' : '' }}">
                                    <a href="{{url('gallery')}}">
                                        <i class="isax isax-image5"></i><span>Gallery</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('pricing') ? 'active' : '' }}">
                                    <a href="{{url('pricing')}}">
                                        <i class="isax isax-money-45"></i><span>Pricing</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('timeline') ? 'active' : '' }}">
                                    <a href="{{url('timeline')}}">
                                        <i class="isax isax-timer-pause5"></i><span>Timeline</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('coming-soon') ? 'active' : '' }}">
                                    <a href="{{url('coming-soon')}}">
                                        <i class="isax isax-security-time5"></i><span>Coming Soon</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('under-maintenance') ? 'active' : '' }}">
                                    <a href="{{url('under-maintenance')}}">
                                        <i class="isax isax-paintbucket5"></i><span>Under Maintenance</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('under-construction') ? 'active' : '' }}">
                                    <a href="{{url('under-construction')}}">
                                        <i class="isax isax-forward-item5"></i><span>Under Construction</span>
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('error-404', 'error-500') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-device-message5"></i><span>Error Pages</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('error-404')}}" class="{{ Request::is('error-404') ? 'active' : '' }}">Error 404</a></li>
                                        <li><a href="{{url('error-500')}}" class="{{ Request::is('error-500') ? 'active' : '' }}">Error 500</a></li>
                                    </ul>
                                </li>
                                <li class="{{ Request::is('api-keys') ? 'active' : '' }}">
                                    <a href="{{url('api-keys')}}">
                                        <i class="isax isax-key-square5"></i><span>API Keys</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('privacy-policy') ? 'active' : '' }}">
                                    <a href="{{url('privacy-policy')}}">
                                        <i class="isax isax-document-copy5"></i><span>Privacy Policy</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('terms-condition') ? 'active' : '' }}">
                                    <a href="{{url('terms-condition')}}">
                                        <i class="isax isax-note-15"></i><span>Terms & Conditions</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-title"><span>Authentication</span></li>
                        <li>
                            <ul>
                                <li>
                                    <a href="{{url('login')}}">
                                        <i class="isax isax-login-15"></i><span>Login</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('register')}}">
                                        <i class="isax isax-lock-15"></i><span>Register</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('forgot-password')}}">
                                        <i class="isax isax-password-check5"></i><span>Forgot Password</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('reset-password')}}">
                                        <i class="isax isax-refresh-right-square5"></i><span>Reset Password</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('email-verification')}}">
                                        <i class="isax isax-sms-tracking5"></i><span>Email Verification</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('two-step-verification')}}">
                                        <i class="isax isax-security5"></i><span>2 Step Verification</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('lock-screen')}}">
                                        <i class="isax isax-lock-circle5"></i><span>Lock Screen</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-title"><span>UI Interface</span></li>
                        <li>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('ui-accordion', 'ui-alerts', 'ui-avatar', 'ui-badges', 'ui-breadcrumb', 'ui-buttons', 'ui-buttons-group', 'ui-cards', 'ui-carousel', 'ui-collapse', 'ui-dropdowns', 'ui-ratio', 'ui-grid', 'ui-images', 'ui-links', 'ui-list-group', 'ui-modals', 'ui-offcanvas', 'ui-pagination', 'ui-placeholders', 'ui-popovers', 'ui-progress', 'ui-scrollspy', 'ui-spinner', 'ui-nav-tabs', 'ui-toasts', 'ui-tooltips', 'ui-typography', 'ui-utilities') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-designtools5"></i><span>Base UI</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('ui-accordion')}}" class="{{ Request::is('ui-accordion') ? 'active' : '' }}">Accordion</a></li>
                                        <li><a href="{{url('ui-alerts')}}" class="{{ Request::is('ui-alerts') ? 'active' : '' }}">Alerts</a></li>
                                        <li><a href="{{url('ui-avatar')}}" class="{{ Request::is('ui-avatar') ? 'active' : '' }}">Avatar</a></li>
                                        <li><a href="{{url('ui-badges')}}" class="{{ Request::is('ui-badges') ? 'active' : '' }}">Badges</a></li>
                                        <li><a href="{{url('ui-breadcrumb')}}" class="{{ Request::is('ui-breadcrumb') ? 'active' : '' }}">Breadcrumb</a></li>
                                        <li><a href="{{url('ui-buttons')}}" class="{{ Request::is('ui-buttons') ? 'active' : '' }}">Buttons</a></li>
                                        <li><a href="{{url('ui-buttons-group')}}" class="{{ Request::is('ui-buttons-group') ? 'active' : '' }}">Button Group</a></li>
                                        <li><a href="{{url('ui-cards')}}" class="{{ Request::is('ui-cards') ? 'active' : '' }}">Card</a></li>
                                        <li><a href="{{url('ui-carousel')}}" class="{{ Request::is('ui-carousel') ? 'active' : '' }}">Carousel</a></li>
                                        <li><a href="{{url('ui-collapse')}}" class="{{ Request::is('ui-collapse') ? 'active' : '' }}">Collapse</a></li>
                                        <li><a href="{{url('ui-dropdowns')}}" class="{{ Request::is('ui-dropdowns') ? 'active' : '' }}">Dropdowns</a></li>
                                        <li><a href="{{url('ui-ratio')}}" class="{{ Request::is('ui-ratio') ? 'active' : '' }}">Ratio</a></li>
                                        <li><a href="{{url('ui-grid')}}" class="{{ Request::is('ui-grid') ? 'active' : '' }}">Grid</a></li>
                                        <li><a href="{{url('ui-images')}}" class="{{ Request::is('ui-images') ? 'active' : '' }}">Images</a></li>
                                        <li><a href="{{url('ui-links')}}" class="{{ Request::is('ui-links') ? 'active' : '' }}">Links</a></li>
                                        <li><a href="{{url('ui-list-group')}}" class="{{ Request::is('ui-list-group') ? 'active' : '' }}">List Group</a></li>
                                        <li><a href="{{url('ui-modals')}}" class="{{ Request::is('ui-modals') ? 'active' : '' }}">Modals</a></li>
                                        <li><a href="{{url('ui-offcanvas')}}" class="{{ Request::is('ui-offcanvas') ? 'active' : '' }}">Offcanvas</a></li>
                                        <li><a href="{{url('ui-pagination')}}" class="{{ Request::is('ui-pagination') ? 'active' : '' }}">Pagination</a></li>
                                        <li><a href="{{url('ui-placeholders')}}" class="{{ Request::is('ui-placeholders') ? 'active' : '' }}">Placeholders</a></li>
                                        <li><a href="{{url('ui-popovers')}}" class="{{ Request::is('ui-popovers') ? 'active' : '' }}">Popovers</a></li>
                                        <li><a href="{{url('ui-progress')}}" class="{{ Request::is('ui-progress') ? 'active' : '' }}">Progress</a></li>
                                        <li><a href="{{url('ui-scrollspy')}}" class="{{ Request::is('ui-scrollspy') ? 'active' : '' }}">Scrollspy</a></li>
                                        <li><a href="{{url('ui-spinner')}}" class="{{ Request::is('ui-spinner') ? 'active' : '' }}">Spinner</a></li>
                                        <li><a href="{{url('ui-nav-tabs')}}" class="{{ Request::is('ui-nav-tabs') ? 'active' : '' }}">Tabs</a></li>
                                        <li><a href="{{url('ui-toasts')}}" class="{{ Request::is('ui-toasts') ? 'active' : '' }}">Toasts</a></li>
                                        <li><a href="{{url('ui-tooltips')}}" class="{{ Request::is('ui-tooltips') ? 'active' : '' }}">Tooltips</a></li>
                                        <li><a href="{{url('ui-typography')}}" class="{{ Request::is('ui-typography') ? 'active' : '' }}">Typography</a></li>
                                        <li><a href="{{url('ui-utilities')}}" class="{{ Request::is('ui-utilities') ? 'active' : '' }}">Utilities</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('extended-dragula', 'ui-clipboard', 'ui-rangeslider', 'ui-sweetalerts', 'ui-lightbox', 'ui-rating', 'ui-counter', 'ui-scrollbar') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-pen-tool5"></i><span>Advanced UI</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('extended-dragula')}}" class="{{ Request::is('extended-dragula') ? 'active' : '' }}">Dragula</a></li>
                                        <li><a href="{{url('ui-clipboard')}}" class="{{ Request::is('ui-clipboard') ? 'active' : '' }}">Clipboard</a></li>
                                        <li><a href="{{url('ui-rangeslider')}}" class="{{ Request::is('ui-rangeslider') ? 'active' : '' }}">Range Slider</a></li>
                                        <li><a href="{{url('ui-sweetalerts')}}" class="{{ Request::is('ui-sweetalerts') ? 'active' : '' }}">Sweet Alerts</a></li>
                                        <li><a href="{{url('ui-lightbox')}}" class="{{ Request::is('ui-lightbox') ? 'active' : '' }}">Lightbox</a></li>
                                        <li><a href="{{url('ui-rating')}}" class="{{ Request::is('ui-rating') ? 'active' : '' }}">Rating</a></li>
                                        <li><a href="{{url('ui-counter')}}" class="{{ Request::is('ui-counter') ? 'active' : '' }}">Counter</a></li>
                                        <li><a href="{{url('ui-scrollbar')}}" class="{{ Request::is('ui-scrollbar') ? 'active' : '' }}">Scrollbar</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('form-basic-inputs', 'form-checkbox-radios', 'form-input-groups', 'form-grid-gutters', 'form-mask', 'form-fileupload', 'form-horizontal', 'form-vertical', 'form-floating-labels', 'form-validation', 'form-select2', 'form-wizard', 'form-pickers') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-password-check5"></i><span>Forms</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);" class="{{ Request::is('form-basic-inputs', 'form-checkbox-radios', 'form-input-groups', 'form-grid-gutters', 'form-mask', 'form-fileupload') ? 'active subdrop' : '' }}">Form Elements<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="{{url('form-basic-inputs')}}" class="{{ Request::is('form-basic-inputs') ? 'active' : '' }}">Basic Inputs</a></li>
                                                <li><a href="{{url('form-checkbox-radios')}}" class="{{ Request::is('form-checkbox-radios') ? 'active' : '' }}">Checkbox & Radios</a></li>
                                                <li><a href="{{url('form-input-groups')}}" class="{{ Request::is('form-input-groups') ? 'active' : '' }}">Input Groups</a></li>
                                                <li><a href="{{url('form-grid-gutters')}}" class="{{ Request::is('form-grid-gutters') ? 'active' : '' }}">Grid & Gutters</a></li>
                                                <li><a href="{{url('form-mask')}}" class="{{ Request::is('form-mask') ? 'active' : '' }}">Input Masks</a></li>
                                                <li><a href="{{url('form-fileupload')}}" class="{{ Request::is('form-fileupload') ? 'active' : '' }}">File Uploads</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);" class="{{ Request::is('form-horizontal', 'form-vertical', 'form-floating-labels') ? 'active subdrop' : '' }}">Layouts<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="{{url('form-horizontal')}}" class="{{ Request::is('form-horizontal') ? 'active' : '' }}">Horizontal Form</a></li>
                                                <li><a href="{{url('form-vertical')}}" class="{{ Request::is('form-vertical') ? 'active' : '' }}">Vertical Form</a></li>
                                                <li><a href="{{url('form-floating-labels')}}" class="{{ Request::is('form-floating-labels') ? 'active' : '' }}">Floating Labels</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{url('form-validation')}}" class="{{ Request::is('form-validation') ? 'active' : '' }}">Form Validation</a></li>
                                        <li><a href="{{url('form-select2')}}" class="{{ Request::is('form-select2') ? 'active' : '' }}">Select2</a></li>
                                        <li><a href="{{url('form-wizard')}}" class="{{ Request::is('form-wizard') ? 'active' : '' }}">Form Wizard</a></li>
                                        <li><a href="{{url('form-pickers')}}" class="{{ Request::is('form-pickers') ? 'active' : '' }}">Form Picker</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('tables-basic', 'data-tables') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-grid-75"></i><span>Tables</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('tables-basic')}}" class="{{ Request::is('tables-basic') ? 'active' : '' }}">Basic Tables </a></li>
                                        <li><a href="{{url('data-tables')}}" class="{{ Request::is('data-tables') ? 'active' : '' }}">Data Table </a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('chart-apex', 'chart-c3', 'chart-js', 'chart-morris', 'chart-flot', 'chart-peity') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-designtools5"></i>
                                        <span>Charts</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('chart-apex')}}" class="{{ Request::is('chart-apex') ? 'active' : '' }}">Apex Charts</a></li>
                                        <li><a href="{{url('chart-c3')}}" class="{{ Request::is('chart-c3') ? 'active' : '' }}">Chart C3</a></li>
                                        <li><a href="{{url('chart-js')}}" class="{{ Request::is('chart-js') ? 'active' : '' }}">Chart Js</a></li>
                                        <li><a href="{{url('chart-morris')}}" class="{{ Request::is('chart-morris') ? 'active' : '' }}">Morris Charts</a></li>
                                        <li><a href="{{url('chart-flot')}}" class="{{ Request::is('chart-flot') ? 'active' : '' }}">Flot Charts</a></li>
                                        <li><a href="{{url('chart-peity')}}" class="{{ Request::is('chart-peity') ? 'active' : '' }}">Peity Charts</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('icon-fontawesome', 'icon-tabler', 'icon-bootstrap', 'icon-remix', 'icon-feather', 'icon-ionic', 'icon-material', 'icon-pe7', 'icon-simpleline', 'icon-themify', 'icon-weather', 'icon-typicon', 'icon-flag') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-shapes-15"></i>
                                        <span>Icons</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('icon-fontawesome')}}" class="{{ Request::is('icon-fontawesome') ? 'active' : '' }}">Fontawesome Icons</a></li>
                                        <li><a href="{{url('icon-tabler')}}" class="{{ Request::is('icon-tabler') ? 'active' : '' }}">Tabler Icons</a></li>
                                        <li><a href="{{url('icon-bootstrap')}}" class="{{ Request::is('icon-bootstrap') ? 'active' : '' }}">Bootstrap Icons</a></li>
                                        <li><a href="{{url('icon-remix')}}" class="{{ Request::is('icon-remix') ? 'active' : '' }}">Remix Icons</a></li>
                                        <li><a href="{{url('icon-feather')}}" class="{{ Request::is('icon-feather') ? 'active' : '' }}">Feather Icons</a></li>
                                        <li><a href="{{url('icon-ionic')}}" class="{{ Request::is('icon-ionic') ? 'active' : '' }}">Ionic Icons</a></li>
                                        <li><a href="{{url('icon-material')}}" class="{{ Request::is('icon-material') ? 'active' : '' }}">Material Icons</a></li>
                                        <li><a href="{{url('icon-pe7')}}" class="{{ Request::is('icon-pe7') ? 'active' : '' }}">Pe7 Icons</a></li>
                                        <li><a href="{{url('icon-simpleline')}}" class="{{ Request::is('icon-simpleline') ? 'active' : '' }}">Simpleline Icons</a></li>
                                        <li><a href="{{url('icon-themify')}}" class="{{ Request::is('icon-themify') ? 'active' : '' }}">Themify Icons</a></li>
                                        <li><a href="{{url('icon-weather')}}" class="{{ Request::is('icon-weather') ? 'active' : '' }}">Weather Icons</a></li>
                                        <li><a href="{{url('icon-typicon')}}" class="{{ Request::is('icon-typicon') ? 'active' : '' }}">Typicon Icons</a></li>
                                        <li><a href="{{url('icon-flag')}}" class="{{ Request::is('icon-flag') ? 'active' : '' }}">Flag Icons</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('maps-vector', 'maps-leaflet') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-map-15"></i>
                                        <span>Maps</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{url('maps-vector')}}" class="{{ Request::is('maps-vector') ? 'active' : '' }}">Vector</a>
                                        </li>
                                        <li>
                                            <a href="{{url('maps-leaflet')}}" class="{{ Request::is('maps-leaflet') ? 'active' : '' }}">Leaflet</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-title"><span>Help</span></li>
                        <li>
                            <ul>
                                <li>
                                    <a href="https://kanakku.dreamstechnologies.com/documentation/laravel.html" target="_blank"><i class="isax isax-document-code-25"></i><span>Documentation</span></a>
                                </li>
                                <li>
                                    <a href="https://kanakku.dreamstechnologies.com/documentation/changelog.html" target="_blank"><i class="isax isax-programming-arrows5"></i><span>Changelog</span><span class="badge bg-primary ms-2 badge-sm text-white fs-12 fw-medium">v2.1.2</span></a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);">
                                        <i class="isax isax-layer5"></i><span>Multi Level</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="javascript:void(0);">Multilevel 1</a></li>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);">Multilevel 2<span
                                                    class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="javascript:void(0);">Multilevel 2.1</a></li>
                                                <li class="submenu submenu-two submenu-three">
                                                    <a href="javascript:void(0);">Multilevel 2.2<span
                                                            class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                                                    <ul>
                                                        <li><a href="javascript:void(0);">Multilevel 2.2.1</a></li>
                                                        <li><a href="javascript:void(0);">Multilevel 2.2.2</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0);">Multilevel 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endif
                    @if (Route::is(['customer-dashboard', 'customer-quotations', 'customer-add-quotation', 'customer-invoices', 'customer-invoice-details', 'customer-recurring-invoices', 'customer-transactions', 'customer-payment-summary', 'customer-invoice-report', 'customer-account-settings', 'customer-security-settings', 'customer-plans-settings', 'customer-notification-settings']))
                    <ul>
                        <li>
                            <ul>
                                <li class="{{ Request::is('customer-dashboard') ? 'active' : '' }}">
                                    <a href="{{url('customer-dashboard')}}">
                                        <i class="isax isax-home-25 text-dark"></i><span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('customer-quotations', 'customer-add-quotation') ? 'active' : '' }}">
                                    <a href="{{url('customer-quotations')}}">
                                        <i class="isax isax-document-normal4 text-dark"></i><span>Quotations</span>
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('customer-invoices', 'customer-invoice-details', 'customer-recurring-invoices') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-document-text5 text-dark"></i><span>Invoices</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('customer-invoices')}}" class="{{ Request::is('customer-invoices', 'customer-invoice-details') ? 'active' : '' }}">Invoices</a></li>
                                        <li><a href="{{url('customer-recurring-invoices')}}" class="{{ Request::is('customer-recurring-invoices') ? 'active' : '' }}">Recurring Invoices</a></li>
                                    </ul>
                                </li>
                                <li class="{{ Request::is('customer-transactions') ? 'active' : '' }}">
                                    <a href="{{url('customer-transactions')}}">
                                        <i class="isax isax-document-forward5 text-dark"></i><span>Transactions</span>
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('customer-payment-summary', 'customer-invoice-report') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-document-upload5 text-dark"></i><span>Reports</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('customer-payment-summary')}}" class="{{ Request::is('customer-payment-summary') ? 'active' : '' }}">Payment Summary</a></li>
                                        <li><a href="{{url('customer-invoice-report')}}" class="{{ Request::is('customer-invoice-report') ? 'active' : '' }}">Invoice Report</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="{{ Request::is('customer-account-settings', 'customer-security-settings', 'customer-plans-settings', 'customer-notification-settings') ? 'active subdrop' : '' }}">
                                        <i class="isax isax-setting-5 text-dark"></i><span>Settings</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="{{url('customer-account-settings')}}" class="{{ Request::is('customer-account-settings') ? 'active' : '' }}">Account Settings</a></li>
                                        <li><a href="{{url('customer-security-settings')}}" class="{{ Request::is('customer-security-settings') ? 'active' : '' }}">Security</a></li>
                                        <li><a href="{{url('customer-plans-settings')}}" class="{{ Request::is('customer-plans-settings') ? 'active' : '' }}">Plans & Billings</a></li>
                                        <li><a href="{{url('customer-notification-settings')}}" class="{{ Request::is('customer-notification-settings') ? 'active' : '' }}">Notifications</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endif
                    @if (Route::is(['super-admin-dashboard', 'companies', 'subscriptions', 'packages', 'domain', 'purchase-transaction']))
                    <ul>
                        <li>
                            <ul>
                                <li class="{{ Request::is('super-admin-dashboard') ? 'active' : '' }}">
                                    <a href="{{url('super-admin-dashboard')}}">
                                        <i class="isax isax-home-25 text-dark"></i><span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('companies') ? 'active' : '' }}">
                                    <a href="{{url('companies')}}">
                                        <i class="isax isax-buildings-25 text-dark"></i><span>Companies</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('subscriptions') ? 'active' : '' }}">
                                    <a href="{{url('subscriptions')}}">
                                        <i class="isax isax-receipt-text5 text-dark"></i><span>Subscriptions</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('packages') ? 'active' : '' }}">
                                    <a href="{{url('packages')}}">
                                        <i class="isax isax-layer5 text-dark"></i><span>Packages</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('domain') ? 'active' : '' }}">
                                    <a href="{{url('domain')}}">
                                        <i class="isax isax-global5 text-dark"></i><span>Domain</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('purchase-transaction') ? 'active' : '' }}">
                                    <a href="{{url('purchase-transaction')}}">
                                        <i class="isax isax-document-text5 text-dark"></i><span>Purchase Transaction</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endif
                    <div class="sidebar-footer">
                        <div class="trial-item bg-white text-center border">
                            <div class="bg-light p-3 text-center">
                                <img src="{{URL::asset('build/img/icons/upgrade.svg')}}" alt="img">
                            </div>
                            <div class="p-2">
                                <h6 class="fs-14 fw-semibold mb-1">Upgrade to More</h6>
                                <p class="fs-13 mb-2">Subscribe to get more with Premium Features</p>
                                <a href="{{url('plans-billings')}}" class="btn btn-sm btn-primary w-100 d-flex align-items-center justify-content-center"><i class="isax isax-crown5 me-1"></i>Upgrade</a>
                            </div>
                            <a href="javascript:void(0);" class="close-icon"><i class="fa-solid fa-x"></i></a>
                        </div>
                        <ul class="menu-list">
                            <li>
                                <a href="{{url('account-settings')}}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Settings"><i class="isax isax-setting-25"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Documentation"><i class="isax isax-document-normal4"></i></a>						
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Changelog"><i class="isax isax-cloud-change5"></i></a>						
                            </li>
                            <li>
                                <a href="{{url('login')}}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Login"><i class="isax isax-login-15"></i></a>				
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidenav Menu End -->