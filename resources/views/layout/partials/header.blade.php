
    <!-- Topbar Start -->
    <div class="header">						
        <div class="main-header">
            
            <!-- Logo -->
            <div class="header-left">
                <a href="{{url('index')}}" class="logo">
                    <img src="{{URL::asset('build/img/logo.svg')}}" alt="Logo">
                </a>
                <a href="{{url('index')}}" class="dark-logo">
                    <img src="{{URL::asset('build/img/logo-white.svg')}}" alt="Logo">
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <div class="header-user">
                <div class="nav user-menu nav-list">	
                    <div class="me-auto d-flex align-items-center" id="header-search">	

                        <!-- Add -->
                        <div class="dropdown me-3">
                            <a class="btn btn-primary bg-gradient btn-xs btn-icon rounded-circle d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                                <i class="isax isax-add text-white"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-start p-2">
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
                                    <a href="{{url('add-credit-notes')}}" class="dropdown-item d-flex align-items-center">
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

                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-divide mb-0">
                                @if(Route::is('index'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                @endif                                
                                @if(Route::is('account-settings'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('account-statement'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"> <a href="{{url('stock-summary')}}">Reports</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Account Statement Report</li>
                                @endif  
                                @if(Route::is('add-blog'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('blogs')}}">Blogs</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">All Blogs</li>
                                @endif 
                                @if(Route::is('add-credit-notes')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('credit-notes')}}">Credit Notes</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Add Credit Notes</li>
                                @endif 
                                @if(Route::is('add-customer')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('customers')}}">Customer</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Customer</li>
                                @endif 
                                @if(Route::is('add-debit-notes')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('debit-notes')}}">Debit Note</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Add Debit Note</li>
                                @endif 
                                @if(Route::is('add-delivery-challan')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('delivery-challans')}}">Delivery Challan</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Create New Delivery Challan</li>
                                @endif 
                                @if(Route::is('add-invoice')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('invoices')}}">Invoice</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Create New Invoice</li>
                                @endif 
                                @if(Route::is('add-product')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product</li>                           
                                @endif
                                @if(Route::is('add-purchases-orders')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('purchase-orders')}}">Purchase Orders</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Add Purchase Orders</li>
                                @endif 
                                @if(Route::is('add-purchases')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('purchases')}}">Purchase</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Add Purchase</li>
                                @endif 
                                @if(Route::is('add-quotation')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('quotations')}}">Quotations</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Add Quotations</li>
                                @endif 
                                @if(Route::is('admin-dashboard')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                @endif 
                                @if(Route::is('ai-configuration')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif 
                                @if(Route::is('annual-report')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('stock-summary')}}">Annual Report</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Annual Report</li>
                                @endif 
                                @if(Route::is('api-keys')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">API Key</li>
                                @endif 
                                @if(Route::is('appearance-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('authentication-settings'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings </li>
                                @endif
                                @if(Route::is('balance-sheet')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('stock-summary')}}">Reports</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Balance Sheet Report</li>
                                @endif
                                @if(Route::is('bank-accounts-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('bank-accounts-type')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('bank-accounts')}}">Bank Accounts</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Bank Accounts Type</li>
                                @endif
                                @if(Route::is('bank-accounts')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bank Accounts</li>
                                @endif
                                @if(Route::is('barcode-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('best-seller')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('stock-summary')}}">Report</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Best Seller Report</li>
                                @endif
                                @if(Route::is('best-categories')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('blogs')}}">Blogs</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Categories</li>
                                @endif
                                @if(Route::is('blog-comments'))    
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('blogs')}}">Blog</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Blog Comments</li>
                                @endif
                                @if(Route::is('blog-details')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('blogs')}}">Blogs</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">All Blogs</li>
                                @endif
                                @if(Route::is('blog-tags')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('blogs')}}">Blogs</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Tags</li>
                                @endif
                                @if(Route::is('blogs')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('blogs')}}"> Blogs</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">All Blogs</li>
                                @endif
                                @if(Route::is('calendar')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center">Applications </li>
                                <li class="breadcrumb-item active" aria-current="page">Calendar</li>
                                @endif
                                @if(Route::is('call-history')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center">Applications</li>
                                <li class="breadcrumb-item active" aria-current="page">Call History</li>
                                @endif
                                @if(Route::is('cash-flow'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('stock-summary')}}">Reports</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Cash Flow Report</li>
                                @endif
                                @if(Route::is('category')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Category</li>
                                @endif
                                @if(Route::is('chart-apex'))  
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center">Charts </li>
                                <li class="breadcrumb-item active" aria-current="page">Apex Charts</li>
                                @endif
                                @if(Route::is('chart-c3')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center">Charts</li>
                                <li class="breadcrumb-item active" aria-current="page">Chart C3</li>
                                @endif
                                @if(Route::is('chart-flot')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"> Charts </li>
                                <li class="breadcrumb-item active" aria-current="page">Flot Charts</li>
                                @endif
                                @if(Route::is('chart-js')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center">Charts</li>
                                <li class="breadcrumb-item active" aria-current="page">Chart JS</li>
                                @endif
                                @if(Route::is('chart-morris')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center">Charts</li>
                                <li class="breadcrumb-item active" aria-current="page">Morris Chart</li>
                                @endif
                                @if(Route::is('chart-peity')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center">Charts </li>
                                <li class="breadcrumb-item active" aria-current="page">Peity Charts</li>
                                @endif
                                @if(Route::is('chat')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center">Applications</li>
                                <li class="breadcrumb-item active" aria-current="page">Chat</li>
                                @endif
                                @if(Route::is('cities')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center">Locations </li>
                                <li class="breadcrumb-item active" aria-current="page">Cities</li>
                                @endif
                                @if(Route::is('clear-cache')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('companies')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Super Admin</li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                @endif
                                @if(Route::is('company-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('contact-messages')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Messages</li>
                                @endif
                                @if(Route::is('contacts')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center">Applications</li>
                                <li class="breadcrumb-item active" aria-current="page">Contacts</li>
                                @endif
                                @if(Route::is('countries')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                @endif
                                @if(Route::is('credit-notes')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Credit Notes</li>
                                @endif
                                @if(Route::is('cronjob')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('currencies')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('custom-css'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('custom-fields'))  
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('custom-js')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('customer-account-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('customer-add-quotation')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('customer-quotations')}}">Quotations</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Quotations</li>
                                @endif
                                @if(Route::is('customer-dashboard')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                @endif
                                @if(Route::is('customer-details')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Customers</li>
                                @endif
                                @if(Route::is('customer-due-report')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Customers Due Report</li>
                                @endif
                                @if(Route::is('customer-invoice-details')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Invoice Report</li>
                                @endif
                                @if(Route::is('customer-invoice-report')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Invoice Report</li>
                                @endif
                                @if(Route::is('customer-invoices')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Invoices</li>
                                @endif
                                @if(Route::is('customer-notification-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('customer-payment-summary')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Payment Summary Report</li>
                                @endif
                                @if(Route::is('customer-plans-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('customer-quotations')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quotations</li>
                                @endif
                                @if(Route::is('customer-recurring-invoices')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Reccuring Invoices</li>
                                @endif
                                @if(Route::is('customer-security-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('customer-transactions')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                                @endif
                                @if(Route::is('customers-report')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Customers Report</li>
                                @endif
                                @if(Route::is('customers')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Customers</li>
                                @endif
                                @if(Route::is('data-tables')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                                @endif
                                @if(Route::is('database-backup')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('debit-notes')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Debit Notes</li>
                                @endif
                                @if(Route::is('delete-account-request')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Delete Account Request</li>
                                @endif
                                @if(Route::is('delivery-challans')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Delivery Challans</li>
                                @endif
                                @if(Route::is('domain')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Super Admin</li>
                                <li class="breadcrumb-item active" aria-current="page">Domain</li>
                                @endif
                                @if(Route::is('edit-blog')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Blogs</li>
                                @endif
                                @if(Route::is('edit-credit-notes')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Credit Notes</li>
                                @endif
                                @if(Route::is('edit-customer')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Customer</li>
                                @endif
                                @if(Route::is('edit-debit-notes')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Debit Note</li>
                                @endif
                                @if(Route::is('edit-delivery-challan')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Delivery Challan</li>
                                @endif
                                @if(Route::is('edit-invoice')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item">
                                    <a href="{{url('invoices')}}">Invoice</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Invoice</li>
                                @endif
                                @if(Route::is('edit-product')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                                @endif
                                @if(Route::is('edit-purchases-orders')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Purchase Orders</li>
                                @endif
                                @if(Route::is('edit-purchases')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Purchase</li>
                                @endif
                                @if(Route::is('edit-quotation')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Quotations</li>
                                @endif
                                @if(Route::is('email-reply')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Applications</li>
                                <li class="breadcrumb-item active" aria-current="page">Email</li>                            
                                @endif
                                @if(Route::is('email-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Email Settings</li>
                                @endif
                                @if(Route::is('email-templates')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Email Templates</li>
                                @endif
                                @if(Route::is('email')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Email</li>
                                @endif
                                @if(Route::is('esignatures')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('expense-report')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Expense Report</li>
                                @endif
                                @if(Route::is('expenses'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Expenses</li>
                                @endif
                                @if(Route::is('extended-dragula')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dragula</li>
                                @endif
                                @if(Route::is('faq')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                @endif
                                @if(Route::is('file-manager')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Applications</li>
                                <li class="breadcrumb-item active" aria-current="page">File Manager</li>
                                @endif
                                @if(Route::is('form-basic-inputs')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Elements</li>
                                @endif
                                @if(Route::is('form-checkbox-radios'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Checks & Radios</li>                                
                                @endif
                                @if(Route::is('form-editors')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Editors</li>
                                @endif
                                @if(Route::is('form-elements')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Elements</li>
                                @endif
                                @if(Route::is('form-fileupload')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">File Upload</li>
                                @endif
                                @if(Route::is('form-floating-labels'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Floating Labels</li>
                                @endif
                                @if(Route::is('form-grid-gutters')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Grid Gutters</li>
                                @endif
                                @if(Route::is('form-horizontal')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Horizontal</li>
                                @endif
                                @if(Route::is('form-input-groups')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Input Groups</li>
                                @endif
                                @if(Route::is('form-mask')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Mask</li>
                                @endif
                                @if(Route::is('form-pickers')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Picker</li>
                                @endif
                                @if(Route::is('form-range-slider')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Range Slider</li>
                                @endif
                                @if(Route::is('form-select2')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Select</li>
                                @endif
                                @if(Route::is('form-validation')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Validation</li>
                                @endif
                                @if(Route::is('form-vertical')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Vertical</li>
                                @endif
                                @if(Route::is('form-wizard')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Wizard</li>
                                @endif
                                @if(Route::is('gallery')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                                @endif
                                @if(Route::is('gdpr-cookies')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('icon-bootstrap')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bootstrap Icons</li>
                                @endif
                                @if(Route::is('icon-feather')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Feather icons</li>
                                @endif
                                @if(Route::is('icon-flag')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Flag Icons</li>
                                @endif
                                @if(Route::is('icon-fontawesome')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Fontawesome Icons</li>
                                @endif
                                @if(Route::is('icon-ionic')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ionic Icons</li>
                                @endif
                                @if(Route::is('icon-material')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Material Icons</li>
                                @endif
                                @if(Route::is('icon-pe7')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pe7 Icons</li>
                                @endif
                                @if(Route::is('icon-remix')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Remix Icons</li>
                                @endif
                                @if(Route::is('icon-simpleline')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Simpleline Icons</li>
                                @endif
                                @if(Route::is('icon-tabler')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tabler Icons</li>
                                @endif
                                @if(Route::is('icon-themify')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Themify Icons</li>
                                @endif
                                @if(Route::is('icon-typicon')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Typicon Icons</li>
                                @endif
                                @if(Route::is('icon-weather')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Weather Icons</li>
                                @endif
                                @if(Route::is('income-report')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Income Reports</li>
                                @endif
                                @if(Route::is('incomes')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Income</li>
                                @endif
                                @if(Route::is('incoming-call')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item " aria-current="page">Applications</li>
                                <li class="breadcrumb-item active" aria-current="page">Incoming Call</li>
                                @endif
                                @if(Route::is('integrations-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('inventory-report')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Inventory Report</li>
                                @endif
                                @if(Route::is('inventory')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Inventory</li>
                                @endif
                                @if(Route::is('invoice-details')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Invoice Detail Admin</li>
                                @endif
                                @if(Route::is('invoice-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('invoice-templates-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('invoice-templates'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Invoice Templates</li>
                                @endif
                                @if(Route::is('invoice')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Invoices</li>
                                @endif
                                @if(Route::is('invoices')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Invoices</li>
                                @endif
                                @if(Route::is('kanban-view')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Application</li>
                                <li class="breadcrumb-item active" aria-current="page">Kanban View</li>
                                @endif
                                @if(Route::is('language-setting2')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('language-setting3')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('language-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('layout-default')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                @endif
                                @if(Route::is('layout-dark')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                @endif
                                @if(Route::is('layout-mini')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                @endif
                                @if(Route::is('layout-rtl')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}" class="d-inline-flex align-items-center"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                @endif
                                @if(Route::is('layout-single','layout-transparent','layout-without-header')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                @endif
                                @if(Route::is('localization-settings'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('low-stock')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Low Stock Report</li>
                                @endif
                                @if(Route::is('maintenance-mode')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('maps-leaflet')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Maps</li>
                                <li class="breadcrumb-item active" aria-current="page">Leaflet Maps</li>
                                @endif
                                @if(Route::is('maps-vector')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Maps</li>
                                <li class="breadcrumb-item active" aria-current="page">Vector Maps</li>
                                @endif
                                @if(Route::is('membership-addons')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Membership</li>
                                @endif
                                @if(Route::is('membership-plans')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Membership</li>
                                @endif
                                @if(Route::is('membership-transactions')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Membership</li>
                                <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                                @endif
                                @if(Route::is('money-transfer')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Money Transfer</li>
                                @endif
                                @if(Route::is('notes')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Applications</li>
                                <li class="breadcrumb-item active" aria-current="page">Notes</li>
                                @endif
                                @if(Route::is('notifications-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('outgoing-call')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Applications</li>
                                <li class="breadcrumb-item active" aria-current="page">Outgoing Call</li>
                                @endif
                                @if(Route::is('packages-grid')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Super Admin</li>
                                <li class="breadcrumb-item active" aria-current="page">Packages</li>
                                @endif
                                @if(Route::is('packages')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Super Admin</li>
                                <li class="breadcrumb-item active" aria-current="page">Packages</li>
                                @endif
                                @if(Route::is('payment-methods')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('payment-summary')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Payment Summary Report</li>
                                @endif
                                @if(Route::is('payments')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Payments</li>
                                @endif
                                @if(Route::is('permission'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Roles</li>
                                <li class="breadcrumb-item active" aria-current="page">Permissions</li>
                                @endif
                                @if(Route::is('plans-billings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('plugin-manager')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('preference-settings','prefixes-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('pricing')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                                @endif
                                @if(Route::is('privacy-policy'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                                @endif
                                @if(Route::is('products')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                                @endif
                                @if(Route::is('profile')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                @endif
                                @if(Route::is('profit-loss-report')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Profit & Loss Report</li>
                                @endif
                                @if(Route::is('purchase-order-report','purchase-orders-report')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Purchase Orders Report</li>
                                @endif
                                @if(Route::is('purchase-orders')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Purchases Orders</li>
                                @endif
                                @if(Route::is('purchase-return-report')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Purchase Return Report</li>
                                @endif
                                @if(Route::is('purchase-transaction')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Super Admin</li>
                                <li class="breadcrumb-item active" aria-current="page">Purchase Transaction</li>
                                @endif
                                @if(Route::is('purchases-report')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Purchases Report</li>
                                @endif
                                @if(Route::is('purchases')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Purchase</li>
                                @endif
                                @if(Route::is('quotation-report')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Quotation Report</li>
                                @endif
                                @if(Route::is('quotations')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quotations</li>
                                @endif
                                @if(Route::is('roles-permissions')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Roles & Permission</li>
                                @endif
                                @if(Route::is('sales-orders')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('stock-summary')}}">Reports</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sales Orders Report</li>
                                @endif
                                @if(Route::is('sales-report')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('stock-summary')}}">Reports</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sales Report</li>
                                @endif
                                @if(Route::is('sales-returns')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('stock-summary')}}">Reports</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sales Return Report</li>
                                @endif
                                @if(Route::is('sass-settings')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('search-list')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center">Applications</li>
                                <li class="breadcrumb-item active" aria-current="page">Search List</li>
                                @endif
                                @if(Route::is('security-settings','seo-setup','sitemap','sms-gateways','storage')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('social-feed')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Applications</li>
                                <li class="breadcrumb-item active" aria-current="page">Social Feed</li>
                                @endif
                                @if(Route::is('sold-stock')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('stock-summary')}}">Reports</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sold Stock Report</li>
                                @endif
                                @if(Route::is('starter')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Starter Page</li>
                                @endif
                                @if(Route::is('states')) 
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Locations</li>
                                <li class="breadcrumb-item active" aria-current="page">States</li>
                                @endif
                                @if(Route::is('stock-history'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Stock History Report</li>
                                @endif
                                @if(Route::is('stock-summary'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Stock Summary Report</li>
                                @endif
                                @if(Route::is('subscribers'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Membership</li>
                                <li class="breadcrumb-item active" aria-current="page">Subscribes</li>
                                @endif
                                @if(Route::is('subscriptions'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Super Admin</li>
                                <li class="breadcrumb-item active" aria-current="page">Subscriptions</li>
                                @endif
                                @if(Route::is('super-admin-dashboard'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Super Admin</li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                @endif
                                @if(Route::is('supplier-payments'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Supplier Payments</li>
                                @endif
                                @if(Route::is('supplier-report'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Supplier Report</li>
                                @endif
                                @if(Route::is('suppliers'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Supplier Report</li>
                                @endif
                                @if(Route::is('system-backup'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('system-update'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('tables-basic'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
                                @endif
                                @if(Route::is('tax-rates'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('tax-report'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item " aria-current="page">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Tax Report</li>
                                @endif
                                @if(Route::is('terms-condition'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Terms & Conditions</li>
                                @endif
                                @if(Route::is('testimonials'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
                                @endif
                                @if(Route::is('thermal-printer'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                @endif
                                @if(Route::is('ticket-details'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ticket Overview</li>
                                @endif
                                @if(Route::is('ticket-kanban'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tickets Kanban View</li>
                                @endif
                                @if(Route::is('tickets-list'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tickets List</li>
                                @endif
                                @if(Route::is('tickets'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tickets List</li>
                                @endif
                                @if(Route::is('timeline'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Timeline</li>
                                @endif
                                @if(Route::is('todo-list'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Applications </li>
                                <li class="breadcrumb-item active" aria-current="page">Todo </li>
                                @endif
                                @if(Route::is('todo'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Applications</li>
                                <li class="breadcrumb-item active" aria-current="page">Todo</li>
                                @endif
                                @if(Route::is('transactions'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                                @endif
                                @if(Route::is('trial-balance'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Reports</li>
                                <li class="breadcrumb-item active" aria-current="page">Trial Balance Report</li>
                                @endif
                                @if(Route::is('units'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Unit</li>
                                @endif
                                @if(Route::is('users'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Users</li>
                                @endif
                                @if(Route::is('video-call'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Applications</li>
                                <li class="breadcrumb-item active" aria-current="page">Video Call</li>
                                @endif
                                @if(Route::is('voice-call'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Applications</li>
                                <li class="breadcrumb-item active" aria-current="page">Voice Call</li>
                                @endif
                                @if (Route::is(['ui-accordion', 'ui-alerts', 'ui-avatar', 'ui-badges', 'ui-breadcrumb', 'ui-buttons', 'ui-buttons-group', 'ui-cards', 'ui-carousel', 'ui-collapse', 'ui-dropdowns', 'ui-ratio', 'ui-grid', 'ui-images', 'ui-links', 'ui-list-group', 'ui-modals', 'ui-offcanvas', 'ui-pagination', 'ui-placeholders', 'ui-popovers', 'ui-progress', 'ui-scrollspy', 'ui-spinner', 'ui-nav-tabs', 'ui-toasts', 'ui-tooltips', 'ui-typography', 'ui-utilities','ui-clipboard', 'ui-rangeslider', 'ui-sweetalerts', 'ui-lightbox', 'ui-rating', 'ui-counter', 'ui-scrollbar','ui-sortable','ui-colors']))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ Str::title(str_replace(['.', '-'], ' ', Str::after(Route::currentRouteName(), Str::startsWith(Route::currentRouteName(), 'ui-') ? 'ui-' : ''))) }}</li>
                                @endif      
                                @if(Route::is('blog-categories'))
                                <li class="breadcrumb-item d-flex align-items-center"><a href="{{url('index')}}"><i class="isax isax-home-2 me-1"></i>Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Blogs
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Categories</li>
                                @endif                                                              
                            </ol>
                        </nav>	                  
                    </div>

                    <div class="d-flex align-items-center">	

                        <!-- Search -->
                        <div class="input-icon-end position-relative me-2">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-icon-addon">
                                <i class="isax isax-search-normal"></i>
                            </span>
                        </div>
                        <!-- /Search -->

                        <!-- Language Dropdown -->
                        <div class="nav-item dropdown has-arrow flag-nav me-2">
                            <a class="btn btn-menubar" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                                <img src="{{URL::asset('build/img/flags/us.svg')}}" alt="Language" class="img-fluid">
                            </a>
                            <ul class="dropdown-menu p-2">

                                <!-- item-->
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <img src="{{URL::asset('build/img/flags/us.svg')}}" alt="flag" class="me-2">English
                                    </a>
                                </li>

                                <!-- item-->
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <img src="{{URL::asset('build/img/flags/de.svg')}}" alt="flag" class="me-2">German
                                    </a>
                                </li>

                                <!-- item-->
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <img src="{{URL::asset('build/img/flags/fr.svg')}}" alt="flag" class="me-2">French
                                    </a>
                                </li>

                                <!-- item-->
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <img src="{{URL::asset('build/img/flags/ae.svg')}}" alt="flag" class="me-2">Arabic
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <!-- Notification -->
                        <div class="notification_item me-2">
                            <a href="#" class="btn btn-menubar position-relative" id="notification_popup" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <i class="isax isax-notification-bing5"></i>
                                <span class="position-absolute badge bg-success border border-white"></span>
                            </a>
                            <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg" style="min-height: 300px;">
                        
                                <div class="p-2 border-bottom">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fs-16 fw-semibold"> Notifications</h6>
                                        </div>
                                        <div class="col-auto">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle drop-arrow-none link-dark" data-bs-toggle="dropdown" data-bs-offset="0,15" aria-expanded="false">
                                                    <i class="isax isax-setting-2 fs-16 text-body align-middle"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-bell-check me-1"></i>Mark as Read</a>
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-trash me-1"></i>Delete All</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Notification Dropdown -->
                                <div class="notification-body position-relative z-2 rounded-0" data-simplebar>
                                    
                                    <!-- Item-->
                                    <div class="dropdown-item notification-item py-2 text-wrap border-bottom" id="notification-1">
                                        <div class="d-flex">
                                            <div class="me-2 position-relative flex-shrink-0">
                                                <img src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" class="avatar-md rounded-circle" alt="">
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 fw-semibold text-dark">John Smith</p>
                                                <p class="mb-1 text-wrap fs-14">
                                                    A <span class="fw-semibold">new sale</span> has been recorded.
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="fs-12"><i class="isax isax-clock me-1"></i>4 min ago</span>
                                                    <div class="notification-action d-flex align-items-center float-end gap-2">
                                                        <a href="javascript:void(0);" class="notification-read rounded-circle bg-info" data-bs-toggle="tooltip" title="" data-bs-original-title="Make as Read" aria-label="Make as Read"></a>
                                                        <button class="btn rounded-circle text-danger p-0" data-dismissible="#notification-1">
                                                            <i class="isax isax-close-circle fs-12"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <!-- Item-->
                                    <div class="dropdown-item notification-item py-2 text-wrap border-bottom" id="notification-2">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm me-2">
                                                        <span class="avatar-title bg-soft-info text-info fs-18 rounded-circle">
                                                            D
                                                        </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 fw-semibold text-dark">Donoghue Susan</p>
                                                <p class="mb-0 text-wrap fs-14">
                                                    Switched to a lower-tier package
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="fs-12"><i class="isax isax-clock me-1"></i>4 min ago</span>
                                                    <div class="notification-action d-flex align-items-center float-end gap-2">
                                                        <a href="javascript:void(0);" class="notification-read rounded-circle bg-info" data-bs-toggle="tooltip" title="" data-bs-original-title="Make as Read" aria-label="Make as Read"></a>
                                                        <button class="btn rounded-circle text-danger p-0" data-dismissible="#notification-2">
                                                            <i class="isax isax-close-circle fs-12"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Item-->
                                    <div class="dropdown-item notification-item py-2 text-wrap border-bottom" id="notification-3">
                                        <div class="d-flex">
                                            <div class="me-2 position-relative flex-shrink-0">
                                                <img src="{{URL::asset('build/img/profiles/avatar-03.jpg')}}" class="avatar-md rounded-circle" alt="">
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 fw-semibold text-dark">Robert Fox </p>
                                                <p class="mb-1 text-wrap fs-14">
                                                    Completed payment for <span class="fw-semibold">#INV00025</span>
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="fs-12"><i class="isax isax-clock me-1"></i>4 min ago</span>
                                                    <div class="notification-action d-flex align-items-center float-end gap-2">
                                                        <a href="javascript:void(0);" class="notification-read rounded-circle bg-info" data-bs-toggle="tooltip" title="" data-bs-original-title="Make as Read" aria-label="Make as Read"></a>
                                                        <button class="btn rounded-circle text-danger p-0" data-dismissible="#notification-3">
                                                            <i class="isax isax-close-circle fs-12"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Item-->
                                    <div class="dropdown-item notification-item py-2 text-wrap border-bottom" id="notification-4">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm me-2">
                                                    <span class="avatar-title bg-soft-warning text-warning fs-18 rounded-circle">
                                                        <i class="isax isax-message"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 text-wrap fs-14">You have received <span class="fw-semibold">20</span> new messages in the conversation</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="fs-12"><i class="isax isax-clock me-1"></i>3 min ago</span>
                                                    <div class="notification-action d-flex align-items-center float-end gap-2">
                                                        <a href="javascript:void(0);" class="notification-read rounded-circle bg-info" data-bs-toggle="tooltip" title="" data-bs-original-title="Make as Read" aria-label="Make as Read"></a>
                                                        <button class="btn rounded-circle text-danger p-0" data-dismissible="#notification-4">
                                                            <i class="isax isax-close-circle fs-12"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Item-->
                                    <div class="dropdown-item notification-item py-2 text-wrap border-bottom" id="notification-5">
                                        <div class="d-flex">
                                            <div class="me-2 position-relative flex-shrink-0">
                                                <img src="{{URL::asset('build/img/profiles/avatar-17.jpg')}}" class="avatar-md rounded-circle" alt="">
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 fw-semibold text-dark">Charlotte Brown</p>
                                                <p class="mb-1 text-wrap fs-14">
                                                    New invoice generated <span class="fw-semibold"> #INV00028</span>
                                                </p>
                                                <div class="mb-1">
                                                    <a class="badge bg-success p-2 py-1 me-1" href="#">Approve</a>
                                                    <a class="badge bg-danger p-2 py-1" href="#">Deny</a>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="fs-12"><i class="isax isax-clock me-1"></i>45 min ago</span>
                                                    <div class="notification-action d-flex align-items-center float-end gap-2">
                                                        <a href="javascript:void(0);" class="notification-read rounded-circle bg-info" data-bs-toggle="tooltip" title="" data-bs-original-title="Make as Read" aria-label="Make as Read"></a>
                                                        <button class="btn rounded-circle text-danger p-0" data-dismissible="#notification-5">
                                                            <i class="isax isax-close-circle fs-12"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                </div>
                                
                                <!-- View All-->
                                <div class="p-2 rounded-bottom border-top text-center">
                                    <a href="{{url('notifications')}}" class="text-center fw-medium fs-14 mb-0">
                                        View All
                                    </a>
                                </div>
                                
                            </div>
                        </div>

                        <!-- Light/Dark Mode Button -->
                        <div class="me-2 theme-item">
                            <a href="javascript:void(0);" id="dark-mode-toggle" class="theme-toggle btn btn-menubar">
                                <i class="isax isax-moon"></i>
                            </a>
                            <a href="javascript:void(0);" id="light-mode-toggle" class="theme-toggle btn btn-menubar">
                                <i class="isax isax-sun-1"></i>
                            </a>
                        </div>

                        <!-- User Dropdown -->
                        <div class="dropdown profile-dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown"  data-bs-auto-close="outside">
                                <span class="avatar online">
                                    <img src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="Img" class="img-fluid rounded-circle">
                                </span>
                            </a>
                            <div class="dropdown-menu p-2">
                                <div class="d-flex align-items-center bg-light rounded-1 p-2 mb-2">
                                    <span class="avatar avatar-lg me-2">
                                        <img src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="img" class="rounded-circle" >
                                    </span>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-1">Jafna Cremson</h6>
                                        <p class="fs-13">Administrator</p>
                                    </div>
                                </div>

                                <!-- Item-->
                                <a class="dropdown-item d-flex align-items-center" href="{{url('account-settings')}}">
                                    <i class="isax isax-profile-circle me-2"></i>Profile Settings
                                </a>

                                <!-- Item-->
                                <a class="dropdown-item d-flex align-items-center" href="{{url('inventory-report')}}">
                                    <i class="isax isax-document-text me-2"></i>Reports
                                </a>

                                <!-- Item-->
                                <div class="form-check form-switch form-check-reverse d-flex align-items-center justify-content-between dropdown-item mb-0">
                                    <label class="form-check-label" for="notify"><i class="isax isax-notification me-2"></i>Notifications</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="notify">
                                </div>

                                <hr class="dropdown-divider my-2">

                                <!-- Item-->
                                <a class="dropdown-item logout d-flex align-items-center" href="{{url('login')}}">
                                    <i class="isax isax-logout me-2"></i>Sign Out
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="dropdown mobile-user-menu profile-dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown"  data-bs-auto-close="outside">
                    <span class="avatar avatar-md online">
                        <img src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="Img" class="img-fluid rounded-circle">
                    </span>
                </a>
                <div class="dropdown-menu p-2 mt-0">
                    <a class="dropdown-item d-flex align-items-center" href="{{url('profile')}}">
                        <i class="isax isax-profile-circle me-2"></i>Profile Settings
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="{{url('activity-summary')}}">
                        <i class="isax isax-document-text me-2"></i>Reports
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="{{url('account-settings')}}">
                        <i class="isax isax-setting me-2"></i>Settings
                    </a>
                    <a class="dropdown-item logout d-flex align-items-center" href="{{url('login')}}">
                        <i class="isax isax-logout me-2"></i>Signout
                    </a>
                </div>
            </div>
            <!-- /Mobile Menu -->

        </div>
    </div>
    <!-- Topbar End -->
