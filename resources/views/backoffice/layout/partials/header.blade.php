@auth
    <!-- Topbar Start -->
    <div class="header">
        <div class="main-header">

            <!-- Logo -->
            <div class="header-left">
                <a href="{{ url('index') }}" class="logo">
                    <img src="{{ URL::asset('assets/images/logo/logo-wide-white.svg') }}" alt="Logo">
                </a>
                <a href="{{ url('index') }}" class="dark-logo">
                    <img src="{{ URL::asset('assets/images/logo/logo-wide-cropped.svg') }}" alt="Logo">
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
                            <a class="btn btn-primary bg-gradient btn-xs btn-icon rounded-circle d-flex align-items-center justify-content-center"
                                data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                                <i class="isax isax-add text-white"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-start p-2">
                                <li>
                                    <a href="{{ url('add-invoice') }}" class="dropdown-item d-flex align-items-center">
                                        <i class="isax isax-document-text-1 me-2"></i>{{ __('Facture') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('expenses') }}" class="dropdown-item d-flex align-items-center">
                                        <i class="isax isax-money-send me-2"></i>{{ __('Dépense') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('add-credit-notes') }}" class="dropdown-item d-flex align-items-center">
                                        <i class="isax isax-money-add me-2"></i>{{ __('Avoirs') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('add-debit-notes') }}" class="dropdown-item d-flex align-items-center">
                                        <i class="isax isax-money-recive me-2"></i>{{ __('Notes de débit') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('add-purchases-orders') }}"
                                        class="dropdown-item d-flex align-items-center">
                                        <i class="isax isax-document me-2"></i>{{ __('Bon de commande') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('add-quotation') }}" class="dropdown-item d-flex align-items-center">
                                        <i class="isax isax-document-download me-2"></i>{{ __('Devis') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('add-delivery-challan') }}"
                                        class="dropdown-item d-flex align-items-center">
                                        <i class="isax isax-document-forward me-2"></i>{{ __('Bon de livraison') }}
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-divide mb-0">
                                @if (Route::is('index'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tableau de bord') }}</li>
                                @endif
                                @if (Route::is('account-settings', 'bo.account.settings.edit'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('account-statement'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"> <a
                                            href="{{ url('stock-summary') }}">{{ __('Rapports') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport de relevé de compte') }}</li>
                                @endif
                                @if (Route::is('add-blog'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('blogs') }}">{{ __('Blogs') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tous les blogs') }}</li>
                                @endif
                                @if (Route::is('add-credit-notes'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('credit-notes') }}">{{ __('Avoirs') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Ajouter des avoirs') }}</li>
                                @endif
                                @if (Route::is('add-customer'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('customers') }}">{{ __('Client') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Ajouter un nouveau client') }}</li>
                                @endif
                                @if (Route::is('add-debit-notes'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('debit-notes') }}">{{ __('Note de débit') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Ajouter une note de débit') }}</li>
                                @endif
                                @if (Route::is('add-delivery-challan'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('delivery-challans') }}">{{ __('Bon de livraison') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Créer un nouveau bon de livraison') }}</li>
                                @endif
                                @if (Route::is('add-invoice'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('invoices') }}">{{ __('Facture') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Créer une nouvelle facture') }}</li>
                                @endif
                                @if (Route::is('add-product'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Produit') }}</li>
                                @endif
                                @if (Route::is('add-purchases-orders'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('purchase-orders') }}">{{ __('Bons de commande') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Ajouter des bons de commande') }}</li>
                                @endif
                                @if (Route::is('add-purchases'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('purchases') }}">{{ __('Achat') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Ajouter un achat') }}</li>
                                @endif
                                @if (Route::is('add-quotation'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('quotations') }}">{{ __('Devis') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Ajouter des devis') }}</li>
                                @endif
                                @if (Route::is('admin-dashboard'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tableau de bord') }}</li>
                                @endif
                                @if (Route::is('ai-configuration'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('annual-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('stock-summary') }}">{{ __('Rapport annuel') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport annuel') }}</li>
                                @endif
                                @if (Route::is('api-keys'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Clé API') }}</li>
                                @endif
                                @if (Route::is('appearance-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('authentication-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }} </li>
                                @endif
                                @if (Route::is('balance-sheet'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('stock-summary') }}">{{ __('Rapports') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport du bilan') }}</li>
                                @endif
                                @if (Route::is('bank-accounts-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('bank-accounts-type'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('bank-accounts') }}">{{ __('Comptes bancaires') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Types de comptes bancaires') }}</li>
                                @endif
                                @if (Route::is('bank-accounts'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Comptes bancaires') }}</li>
                                @endif
                                @if (Route::is('barcode-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('best-seller'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('stock-summary') }}">{{ __('Rapport') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport des meilleures ventes') }}</li>
                                @endif
                                @if (Route::is('best-categories'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('blogs') }}">{{ __('Blogs') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Catégories') }}</li>
                                @endif
                                @if (Route::is('blog-comments'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('blogs') }}">{{ __('Blog') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Commentaires de blog') }}</li>
                                @endif
                                @if (Route::is('blog-details'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('blogs') }}">{{ __('Blogs') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tous les blogs') }}</li>
                                @endif
                                @if (Route::is('blog-tags'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('blogs') }}">{{ __('Blogs') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Étiquettes') }}</li>
                                @endif
                                @if (Route::is('blogs'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a href="{{ url('blogs') }}">
                                            Blogs</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tous les blogs') }}</li>
                                @endif
                                @if (Route::is('calendar'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center">{{ __('Applications') }} </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Calendrier') }}</li>
                                @endif
                                @if (Route::is('call-history'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center">{{ __('Applications') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Historique des appels') }}</li>
                                @endif
                                @if (Route::is('cash-flow'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('stock-summary') }}">{{ __('Rapports') }}</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport de flux de trésorerie') }}</li>
                                @endif
                                @if (Route::is('category'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Catégorie') }}</li>
                                @endif
                                @if (Route::is('chart-apex'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center">{{ __('Graphiques') }} </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Graphiques Apex') }}</li>
                                @endif
                                @if (Route::is('chart-c3'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center">{{ __('Graphiques') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Graphique C3') }}</li>
                                @endif
                                @if (Route::is('chart-flot'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"> {{ __('Graphiques') }} </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Graphiques Flot') }}</li>
                                @endif
                                @if (Route::is('chart-js'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center">{{ __('Graphiques') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Graphique JS') }}</li>
                                @endif
                                @if (Route::is('chart-morris'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center">{{ __('Graphiques') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Graphique Morris') }}</li>
                                @endif
                                @if (Route::is('chart-peity'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center">{{ __('Graphiques') }} </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Graphiques Peity') }}</li>
                                @endif
                                @if (Route::is('chat'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center">{{ __('Applications') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Discussion') }}</li>
                                @endif
                                @if (Route::is('cities'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center">{{ __('Localisations') }} </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Villes') }}</li>
                                @endif
                                @if (Route::is('clear-cache'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('companies'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Super Admin') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tableau de bord') }}</li>
                                @endif
                                @if (Route::is('company-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('contact-messages'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Messages de contact') }}</li>
                                @endif
                                @if (Route::is('contacts'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center">{{ __('Applications') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Contacts') }}</li>
                                @endif
                                @if (Route::is('countries'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tableau de bord') }}</li>
                                @endif
                                @if (Route::is('credit-notes'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Avoirs') }}</li>
                                @endif
                                @if (Route::is('cronjob'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('currencies'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('custom-css'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('custom-fields'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('custom-js'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('customer-account-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('customer-add-quotation'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('customer-quotations') }}">{{ __('Devis') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Ajouter des devis') }}</li>
                                @endif
                                @if (Route::is('customer-dashboard'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tableau de bord') }}</li>
                                @endif
                                @if (Route::is('customer-details'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Clients') }}</li>
                                @endif
                                @if (Route::is('customer-due-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item">Reports</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport des clients en retard') }}</li>
                                @endif
                                @if (Route::is('customer-invoice-details'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item">Reports</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport de factures') }}</li>
                                @endif
                                @if (Route::is('customer-invoice-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item">Reports</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport de factures') }}</li>
                                @endif
                                @if (Route::is('customer-invoices'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Factures') }}</li>
                                @endif
                                @if (Route::is('customer-notification-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('customer-payment-summary'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item">Reports</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport récapitulatif des paiements') }}</li>
                                @endif
                                @if (Route::is('customer-plans-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('customer-quotations'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Devis') }}</li>
                                @endif
                                @if (Route::is('customer-recurring-invoices'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Factures récurrentes') }}</li>
                                @endif
                                @if (Route::is('customer-security-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('customer-transactions'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Transactions') }}</li>
                                @endif
                                @if (Route::is('customers-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">Reports</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport des clients') }}</li>
                                @endif
                                @if (Route::is('customers'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Clients') }}</li>
                                @endif
                                @if (Route::is('data-tables'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tableaux de données') }}</li>
                                @endif
                                @if (Route::is('database-backup'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('debit-notes'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Notes de débit') }}</li>
                                @endif
                                @if (Route::is('delete-account-request'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Demande de suppression de compte') }}</li>
                                @endif
                                @if (Route::is('delivery-challans'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Bons de livraison') }}</li>
                                @endif
                                @if (Route::is('domain'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Super Admin') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Domaine') }}</li>
                                @endif
                                @if (Route::is('edit-blog'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Modifier les blogs') }}</li>
                                @endif
                                @if (Route::is('edit-credit-notes'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Avoirs') }}</li>
                                @endif
                                @if (Route::is('edit-customer'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Modifier le client') }}</li>
                                @endif
                                @if (Route::is('edit-debit-notes'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Modifier la note de débit') }}</li>
                                @endif
                                @if (Route::is('edit-delivery-challan'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Modifier le bon de livraison') }}</li>
                                @endif
                                @if (Route::is('edit-invoice'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('invoices') }}">{{ __('Facture') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Modifier la facture') }}</li>
                                @endif
                                @if (Route::is('edit-product'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Modifier le produit') }}</li>
                                @endif
                                @if (Route::is('edit-purchases-orders'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Modifier les bons de commande') }}</li>
                                @endif
                                @if (Route::is('edit-purchases'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Modifier l\'achat') }}</li>
                                @endif
                                @if (Route::is('edit-quotation'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Modifier les devis') }}</li>
                                @endif
                                @if (Route::is('email-reply'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Applications') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('E-mail') }}</li>
                                @endif
                                @if (Route::is('email-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres e-mail') }}</li>
                                @endif
                                @if (Route::is('email-templates'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Modèles d\'e-mail') }}</li>
                                @endif
                                @if (Route::is('email'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('E-mail') }}</li>
                                @endif
                                @if (Route::is('esignatures'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('expense-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport des dépenses') }}</li>
                                @endif
                                @if (Route::is('expenses'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Dépenses') }}</li>
                                @endif
                                @if (Route::is('extended-dragula'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Dragula') }}</li>
                                @endif
                                @if (Route::is('faq'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tableau de bord') }}</li>
                                @endif
                                @if (Route::is('file-manager'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Applications') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Gestionnaire de fichiers') }}</li>
                                @endif
                                @if (Route::is('form-basic-inputs'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Éléments de formulaire') }}</li>
                                @endif
                                @if (Route::is('form-checkbox-radios'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Cases à cocher et boutons radio') }}</li>
                                @endif
                                @if (Route::is('form-editors'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Éditeurs') }}</li>
                                @endif
                                @if (Route::is('form-elements'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Éléments de formulaire') }}</li>
                                @endif
                                @if (Route::is('form-fileupload'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Téléchargement de fichier') }}</li>
                                @endif
                                @if (Route::is('form-floating-labels'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Étiquettes flottantes') }}</li>
                                @endif
                                @if (Route::is('form-grid-gutters'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Gouttières de grille') }}</li>
                                @endif
                                @if (Route::is('form-horizontal'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Formulaire horizontal') }}</li>
                                @endif
                                @if (Route::is('form-input-groups'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Groupes de saisie') }}</li>
                                @endif
                                @if (Route::is('form-mask'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Masque') }}</li>
                                @endif
                                @if (Route::is('form-pickers'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Sélecteur de formulaire') }}</li>
                                @endif
                                @if (Route::is('form-range-slider'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Curseur de plage') }}</li>
                                @endif
                                @if (Route::is('form-select2'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Sélection de formulaire') }}</li>
                                @endif
                                @if (Route::is('form-validation'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Validation de formulaire') }}</li>
                                @endif
                                @if (Route::is('form-vertical'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Formulaire vertical') }}</li>
                                @endif
                                @if (Route::is('form-wizard'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Assistant de formulaire') }}</li>
                                @endif
                                @if (Route::is('gallery'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Galerie') }}</li>
                                @endif
                                @if (Route::is('gdpr-cookies'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('icon-bootstrap'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Icônes Bootstrap') }}</li>
                                @endif
                                @if (Route::is('icon-feather'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Icônes Feather') }}</li>
                                @endif
                                @if (Route::is('icon-flag'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Icônes de drapeaux') }}</li>
                                @endif
                                @if (Route::is('icon-fontawesome'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Icônes Fontawesome') }}</li>
                                @endif
                                @if (Route::is('icon-ionic'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Icônes Ionic') }}</li>
                                @endif
                                @if (Route::is('icon-material'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Icônes Material') }}</li>
                                @endif
                                @if (Route::is('icon-pe7'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Icônes Pe7') }}</li>
                                @endif
                                @if (Route::is('icon-remix'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Icônes Remix') }}</li>
                                @endif
                                @if (Route::is('icon-simpleline'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Icônes Simpleline') }}</li>
                                @endif
                                @if (Route::is('icon-tabler'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Icônes Tabler') }}</li>
                                @endif
                                @if (Route::is('icon-themify'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Icônes Themify') }}</li>
                                @endif
                                @if (Route::is('icon-typicon'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Icônes Typicon') }}</li>
                                @endif
                                @if (Route::is('icon-weather'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Icônes Weather') }}</li>
                                @endif
                                @if (Route::is('income-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">Reports</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapports de revenus') }}</li>
                                @endif
                                @if (Route::is('incomes'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Revenus') }}</li>
                                @endif
                                @if (Route::is('incoming-call'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item " aria-current="page">{{ __('Applications') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Appel entrant') }}</li>
                                @endif
                                @if (Route::is('integrations-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('inventory-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">Reports</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport d\'inventaire') }}</li>
                                @endif
                                @if (Route::is('inventory'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Inventaire') }}</li>
                                @endif
                                @if (Route::is('invoice-details'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Détail de facture admin') }}</li>
                                @endif
                                @if (Route::is('invoice-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('invoice-templates-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('invoice-templates'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Modèles de facture') }}</li>
                                @endif
                                @if (Route::is('invoice'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Factures') }}</li>
                                @endif
                                @if (Route::is('invoices'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Factures') }}</li>
                                @endif
                                @if (Route::is('kanban-view'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Application') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Vue Kanban') }}</li>
                                @endif
                                @if (Route::is('language-setting2'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('language-setting3'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('language-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('layout-default'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tableau de bord') }}</li>
                                @endif
                                @if (Route::is('layout-dark'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tableau de bord') }}</li>
                                @endif
                                @if (Route::is('layout-mini'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tableau de bord') }}</li>
                                @endif
                                @if (Route::is('layout-rtl'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a href="{{ url('index') }}"
                                            class="d-inline-flex align-items-center"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tableau de bord') }}</li>
                                @endif
                                @if (Route::is('layout-single', 'layout-transparent', 'layout-without-header'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tableau de bord') }}</li>
                                @endif
                                @if (Route::is('localization-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('low-stock'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Rapports') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport de stock faible') }}</li>
                                @endif
                                @if (Route::is('maintenance-mode'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('maps-leaflet'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Cartes') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Cartes Leaflet') }}</li>
                                @endif
                                @if (Route::is('maps-vector'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Cartes') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Cartes vectorielles') }}</li>
                                @endif
                                @if (Route::is('membership-addons'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Adhésion') }}</li>
                                @endif
                                @if (Route::is('membership-plans'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Adhésion') }}</li>
                                @endif
                                @if (Route::is('membership-transactions'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Adhésion') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Transactions') }}</li>
                                @endif
                                @if (Route::is('money-transfer'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Virement') }}</li>
                                @endif
                                @if (Route::is('notes'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Applications') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Notes') }}</li>
                                @endif
                                @if (Route::is('notifications-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('outgoing-call'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Applications') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Appel sortant') }}</li>
                                @endif
                                @if (Route::is('packages-grid'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Super Admin') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Forfaits') }}</li>
                                @endif
                                @if (Route::is('packages'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Super Admin') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Forfaits') }}</li>
                                @endif
                                @if (Route::is('payment-methods'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('payment-summary'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Rapports') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport récapitulatif des paiements') }}</li>
                                @endif
                                @if (Route::is('payments'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paiements') }}</li>
                                @endif
                                @if (Route::is('permission'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Rôles') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Permissions') }}</li>
                                @endif
                                @if (Route::is('plans-billings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('plugin-manager'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('preference-settings', 'prefixes-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('pricing'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tarification') }}</li>
                                @endif
                                @if (Route::is('privacy-policy'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Politique de confidentialité') }}</li>
                                @endif
                                @if (Route::is('products'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Produits') }}</li>
                                @endif
                                @if (Route::is('profile'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Profil') }}</li>
                                @endif
                                @if (Route::is('profit-loss-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Rapports') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport de pertes et profits') }}</li>
                                @endif
                                @if (Route::is('purchase-order-report', 'purchase-orders-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Rapports') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport des bons de commande') }}</li>
                                @endif
                                @if (Route::is('purchase-orders'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Bons de commande') }}</li>
                                @endif
                                @if (Route::is('purchase-return-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Rapports') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport des retours d\'achat') }}</li>
                                @endif
                                @if (Route::is('purchase-transaction'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Super Admin') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Transaction d\'achat') }}</li>
                                @endif
                                @if (Route::is('purchases-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Rapports') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport des achats') }}</li>
                                @endif
                                @if (Route::is('purchases'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Achat') }}</li>
                                @endif
                                @if (Route::is('quotation-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Rapports') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport des devis') }}</li>
                                @endif
                                @if (Route::is('quotations'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Devis') }}</li>
                                @endif
                                @if (Route::is('roles-permissions'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rôles et permissions') }}</li>
                                @endif
                                @if (Route::is('sales-orders'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('stock-summary') }}">{{ __('Rapports') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport des commandes de vente') }}</li>
                                @endif
                                @if (Route::is('sales-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('stock-summary') }}">{{ __('Rapports') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport des ventes') }}</li>
                                @endif
                                @if (Route::is('sales-returns'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('stock-summary') }}">{{ __('Rapports') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport des retours de vente') }}</li>
                                @endif
                                @if (Route::is('sass-settings'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('search-list'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item d-flex align-items-center">{{ __('Applications') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Liste de recherche') }}</li>
                                @endif
                                @if (Route::is('security-settings', 'seo-setup', 'sitemap', 'sms-gateways', 'storage'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('social-feed'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Applications') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Fil social') }}</li>
                                @endif
                                @if (Route::is('sold-stock'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('stock-summary') }}">{{ __('Rapports') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport de stock vendu') }}</li>
                                @endif
                                @if (Route::is('starter'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Page de démarrage') }}</li>
                                @endif
                                @if (Route::is('states'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Localisations') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('États/Régions') }}</li>
                                @endif
                                @if (Route::is('stock-history'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Rapports') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport d\'historique de stock') }}</li>
                                @endif
                                @if (Route::is('stock-summary'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Rapports') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport de synthèse de stock') }}</li>
                                @endif
                                @if (Route::is('subscribers'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Adhésion') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Abonnés') }}</li>
                                @endif
                                @if (Route::is('subscriptions'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Super Admin') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Abonnements') }}</li>
                                @endif
                                @if (Route::is('super-admin-dashboard'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Super Admin') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tableau de bord') }}</li>
                                @endif
                                @if (Route::is('supplier-payments'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paiements fournisseurs') }}</li>
                                @endif
                                @if (Route::is('supplier-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Rapports') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport fournisseurs') }}</li>
                                @endif
                                @if (Route::is('suppliers'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Rapports') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport fournisseurs') }}</li>
                                @endif
                                @if (Route::is('system-backup'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('system-update'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('tables-basic'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tableaux de base') }}</li>
                                @endif
                                @if (Route::is('tax-rates'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('tax-report'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item " aria-current="page">{{ __('Rapports') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport fiscal') }}</li>
                                @endif
                                @if (Route::is('terms-condition'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Conditions générales') }}</li>
                                @endif
                                @if (Route::is('testimonials'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Témoignages') }}</li>
                                @endif
                                @if (Route::is('thermal-printer'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Paramètres') }}</li>
                                @endif
                                @if (Route::is('ticket-details'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Aperçu du ticket') }}</li>
                                @endif
                                @if (Route::is('ticket-kanban'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Vue Kanban des tickets') }}</li>
                                @endif
                                @if (Route::is('tickets-list'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Liste des tickets') }}</li>
                                @endif
                                @if (Route::is('tickets'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Liste des tickets') }}</li>
                                @endif
                                @if (Route::is('timeline'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Chronologie') }}</li>
                                @endif
                                @if (Route::is('todo-list'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Applications') }} </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tâches') }} </li>
                                @endif
                                @if (Route::is('todo'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Applications') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tâches') }}</li>
                                @endif
                                @if (Route::is('transactions'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Transactions') }}</li>
                                @endif
                                @if (Route::is('trial-balance'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Rapports') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Rapport de balance générale') }}</li>
                                @endif
                                @if (Route::is('units'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Unité') }}</li>
                                @endif
                                @if (Route::is('users'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Utilisateurs') }}</li>
                                @endif
                                @if (Route::is('video-call'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Applications') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Appel vidéo') }}</li>
                                @endif
                                @if (Route::is('voice-call'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Applications') }}</li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Appel vocal') }}</li>
                                @endif
                                @if (Route::is([
                                        'ui-accordion',
                                        'ui-alerts',
                                        'ui-avatar',
                                        'ui-badges',
                                        'ui-breadcrumb',
                                        'ui-buttons',
                                        'ui-buttons-group',
                                        'ui-cards',
                                        'ui-carousel',
                                        'ui-collapse',
                                        'ui-dropdowns',
                                        'ui-ratio',
                                        'ui-grid',
                                        'ui-images',
                                        'ui-links',
                                        'ui-list-group',
                                        'ui-modals',
                                        'ui-offcanvas',
                                        'ui-pagination',
                                        'ui-placeholders',
                                        'ui-popovers',
                                        'ui-progress',
                                        'ui-scrollspy',
                                        'ui-spinner',
                                        'ui-nav-tabs',
                                        'ui-toasts',
                                        'ui-tooltips',
                                        'ui-typography',
                                        'ui-utilities',
                                        'ui-clipboard',
                                        'ui-rangeslider',
                                        'ui-sweetalerts',
                                        'ui-lightbox',
                                        'ui-rating',
                                        'ui-counter',
                                        'ui-scrollbar',
                                        'ui-sortable',
                                        'ui-colors',
                                    ]))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ Str::title(str_replace(['.', '-'], ' ', Str::after(Route::currentRouteName(), Str::startsWith(Route::currentRouteName(), 'ui-') ? 'ui-' : ''))) }}
                                    </li>
                                @endif
                                @if (Route::is('blog-categories'))
                                    <li class="breadcrumb-item d-flex align-items-center"><a
                                            href="{{ url('index') }}"><i
                                                class="isax isax-home-2 me-1"></i>{{ __('Accueil') }}</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Blogs
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Catégories') }}</li>
                                @endif
                            </ol>
                        </nav>
                    </div>

                    <div class="d-flex align-items-center">

                        <!-- Global Search -->
                        <div class="global-search-wrapper position-relative me-2">
                            <div class="input-icon-end position-relative">
                                <input type="text" class="form-control" id="globalSearchInput"
                                    placeholder="{{ __('Rechercher...') }}" autocomplete="off">
                                <span class="input-icon-addon">
                                    <i class="isax isax-search-normal"></i>
                                </span>
                            </div>
                            <!-- Search Results Dropdown -->
                            <div class="global-search-results shadow-lg rounded-3 border" id="globalSearchResults"
                                style="display:none; position:absolute; top:100%; left:0; right:0; z-index:1055;
                                   max-height:420px; overflow-y:auto; background:#fff; margin-top:4px; min-width:360px;">
                            </div>
                        </div>
                        <!-- /Global Search -->

                        <style>
                            .global-search-wrapper {
                                width: 280px;
                            }

                            .global-search-results::-webkit-scrollbar {
                                width: 5px;
                            }

                            .global-search-results::-webkit-scrollbar-thumb {
                                background: #d1d5db;
                                border-radius: 10px;
                            }

                            .global-search-item {
                                display: flex;
                                align-items: center;
                                padding: 8px 14px;
                                text-decoration: none;
                                color: inherit;
                                transition: background .15s;
                            }

                            .global-search-item:hover {
                                background: #f3f4f6;
                                color: inherit;
                            }

                            .global-search-item .search-icon {
                                width: 34px;
                                height: 34px;
                                min-width: 34px;
                                border-radius: 8px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-size: 16px;
                                margin-right: 10px;
                            }

                            .global-search-item .search-text .search-title {
                                font-weight: 500;
                                font-size: 13px;
                            }

                            .global-search-item .search-text .search-subtitle {
                                font-size: 11px;
                                color: #8b8fa7;
                            }

                            .search-category-label {
                                padding: 6px 14px;
                                font-size: 10px;
                                font-weight: 600;
                                text-transform: uppercase;
                                letter-spacing: .5px;
                                color: #8b8fa7;
                                background: #f9fafb;
                                border-bottom: 1px solid #f0f0f0;
                            }

                            .search-empty {
                                padding: 30px 14px;
                                text-align: center;
                                color: #8b8fa7;
                            }

                            .search-empty i {
                                font-size: 28px;
                                margin-bottom: 8px;
                                display: block;
                            }
                        </style>



                        <!-- Language Switcher -->
                        @php
                            $currentLocale = app()->getLocale();
                            $locales = [
                                'fr' => ['name' => 'Français', 'flag' => 'fr.svg'],
                                'en' => ['name' => 'English',  'flag' => 'us.svg'],
                                'ar' => ['name' => 'العربية',  'flag' => 'ae.svg'],
                            ];
                        @endphp
                        <div class="nav-item dropdown has-arrow flag-nav me-2">
                            <a class="btn btn-menubar" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                                <img src="{{ URL::asset('build/img/flags/' . ($locales[$currentLocale]['flag'] ?? 'fr.svg')) }}" alt="{{ __('Langue') }}" class="img-fluid" width="22">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end p-2">
                                @foreach ($locales as $code => $locale)
                                    <li>
                                        <form method="POST" action="{{ route('bo.locale.switch') }}">
                                            @csrf
                                            <input type="hidden" name="locale" value="{{ $code }}">
                                            <button type="submit" class="dropdown-item d-flex align-items-center {{ $currentLocale === $code ? 'active' : '' }}">
                                                <img src="{{ URL::asset('build/img/flags/' . $locale['flag']) }}" alt="{{ $locale['name'] }}" class="me-2" width="22">{{ $locale['name'] }}
                                            </button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Notification -->
                        @php
                            $headerNotifications = auth()->user()->unreadNotifications()->latest()->take(5)->get();
                            $unreadCount = auth()->user()->unreadNotifications()->count();
                        @endphp
                        <div class="notification_item me-2">
                            <a href="#" class="btn btn-menubar position-relative" id="notification_popup"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <i class="isax isax-notification-bing5"></i>
                                @if ($unreadCount > 0)
                                    <span class="position-absolute badge bg-success border border-white"></span>
                                @endif
                            </a>
                            <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg"
                                style="min-height: 300px;">

                                <div class="p-2 border-bottom">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fs-16 fw-semibold"> {{ __('Notifications') }} @if ($unreadCount > 0)
                                                    <span class="badge bg-primary ms-1">{{ $unreadCount }}</span>
                                                @endif
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle drop-arrow-none link-dark"
                                                    data-bs-toggle="dropdown" data-bs-offset="0,15"
                                                    aria-expanded="false">
                                                    <i class="isax isax-setting-2 fs-16 text-body align-middle"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <form method="POST"
                                                        action="{{ route('bo.notifications.markAllRead') }}">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item"><i
                                                                class="ti ti-bell-check me-1"></i>{{ __('Tout marquer comme lu') }}</button>
                                                    </form>
                                                    <!-- item-->
                                                    <form method="POST"
                                                        action="{{ route('bo.notifications.destroyAll') }}">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item"><i
                                                                class="ti ti-trash me-1"></i>{{ __('Tout supprimer') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Notification Dropdown -->
                                <div class="notification-body position-relative z-2 rounded-0" data-simplebar>

                                    @forelse($headerNotifications as $notification)
                                        <div class="dropdown-item notification-item py-2 text-wrap border-bottom"
                                            id="notification-{{ $notification->id }}">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-sm me-2">
                                                        <span
                                                            class="avatar-title bg-soft-{{ $notification->data['color'] ?? 'info' }} text-{{ $notification->data['color'] ?? 'info' }} fs-18 rounded-circle">
                                                            <i
                                                                class="isax isax-{{ $notification->data['icon'] ?? 'notification' }}"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    @if (!empty($notification->data['title']))
                                                        <p class="mb-0 fw-semibold text-dark">
                                                            {{ $notification->data['title'] }}</p>
                                                    @endif
                                                    <p class="mb-0 text-wrap fs-14">
                                                        {{ $notification->data['message'] ?? '' }}
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="fs-12"><i
                                                                class="isax isax-clock me-1"></i>{{ $notification->created_at->diffForHumans() }}</span>
                                                        <div
                                                            class="notification-action d-flex align-items-center float-end gap-2">
                                                            <form method="POST"
                                                                action="{{ route('bo.notifications.markAsRead', $notification->id) }}"
                                                                class="d-inline">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn p-0 border-0 bg-transparent"
                                                                    data-bs-toggle="tooltip" title="{{ __('Marquer comme lu') }}">
                                                                    <span
                                                                        class="notification-read rounded-circle bg-info d-inline-block"></span>
                                                                </button>
                                                            </form>
                                                            <form method="POST"
                                                                action="{{ route('bo.notifications.destroy', $notification->id) }}"
                                                                class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn rounded-circle text-danger p-0">
                                                                    <i class="isax isax-close-circle fs-12"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="dropdown-item py-4 text-center text-muted">
                                            <i class="isax isax-notification fs-24 d-block mb-2"></i>
                                            <p class="mb-0 fs-14">{{ __('Aucune notification') }}</p>
                                        </div>
                                    @endforelse

                                </div>

                                <!-- View All-->
                                <div class="p-2 rounded-bottom border-top text-center">
                                    <a href="{{ route('bo.notifications.index') }}"
                                        class="text-center fw-medium fs-14 mb-0">
                                        {{ __('Voir tout') }}
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
                            <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <span class="avatar online">
                                    <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}"
                                        class="img-fluid rounded-circle">
                                </span>
                            </a>
                            <div class="dropdown-menu p-2">
                                <div class="d-flex align-items-center bg-light rounded-1 p-2 mb-2">
                                    <span class="avatar avatar-lg me-2">
                                        <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}"
                                            class="rounded-circle">
                                    </span>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-1">{{ auth()->user()->name }}</h6>
                                        <p class="fs-13">{{ auth()->user()->roles->first()?->name ?? __('Utilisateur') }}</p>
                                    </div>
                                </div>

                                <!-- Item-->
                                <a class="dropdown-item d-flex align-items-center"
                                    href="{{ route('bo.account.settings.edit') }}">
                                    <i class="isax isax-profile-circle me-2"></i>{{ __('Paramètres du profil') }}
                                </a>

                                <!-- Item-->
                                <a class="dropdown-item d-flex align-items-center"
                                    href="{{ url('inventory-report') }}">
                                    <i class="isax isax-document-text me-2"></i>{{ __('Rapports') }}
                                </a>

                                <!-- Item-->
                                <div
                                    class="form-check form-switch form-check-reverse d-flex align-items-center justify-content-between dropdown-item mb-0">
                                    <label class="form-check-label" for="notify"><i
                                            class="isax isax-notification me-2"></i>{{ __('Notifications') }}</label>
                                    <input class="form-check-input" type="checkbox" role="switch" id="notify">
                                </div>

                                <hr class="dropdown-divider my-2">

                                <!-- Item-->
                                <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                                    @csrf
                                    <button type="submit"
                                        class="dropdown-item logout d-flex align-items-center border-0 bg-transparent w-100">
                                        <i class="isax isax-logout me-2"></i>{{ __('Déconnexion') }}
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="dropdown mobile-user-menu profile-dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <span class="avatar avatar-md online">
                        <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}"
                            class="img-fluid rounded-circle">
                    </span>
                </a>
                <div class="dropdown-menu p-2 mt-0">
                    <a class="dropdown-item d-flex align-items-center" href="{{ url('profile') }}">
                        <i class="isax isax-profile-circle me-2"></i>{{ __('Paramètres du profil') }}
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="{{ url('activity-summary') }}">
                        <i class="isax isax-document-text me-2"></i>{{ __('Rapports') }}
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('bo.account.settings.edit') }}">
                        <i class="isax isax-setting me-2"></i>{{ __('Paramètres') }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                        @csrf
                        <button type="submit"
                            class="dropdown-item logout d-flex align-items-center border-0 bg-transparent w-100">
                            <i class="isax isax-logout me-2"></i>{{ __('Déconnexion') }}
                        </button>
                    </form>
                </div>
            </div>
            <!-- /Mobile Menu -->

        </div>
    </div>
    <!-- Topbar End -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('globalSearchInput');
            var searchResults = document.getElementById('globalSearchResults');
            if (!searchInput || !searchResults) return;

            var searchTimer = null;
            var searchUrl = @json(route('bo.global-search'));

            // Color map for category icons
            var colorMap = {
                'primary': 'bg-primary-transparent text-primary',
                'success': 'bg-success-transparent text-success',
                'info': 'bg-info-transparent text-info',
                'warning': 'bg-warning-transparent text-warning',
                'danger': 'bg-danger-transparent text-danger',
                'secondary': 'bg-secondary-transparent text-secondary',
                'teal': 'bg-primary-transparent text-primary'
            };

            searchInput.addEventListener('input', function() {
                var query = this.value.trim();
                clearTimeout(searchTimer);

                if (query.length < 2) {
                    searchResults.style.display = 'none';
                    searchResults.innerHTML = '';
                    return;
                }

                searchTimer = setTimeout(function() {
                    fetch(searchUrl + '?q=' + encodeURIComponent(query), {
                            credentials: 'same-origin',
                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(function(r) {
                            return r.json();
                        })
                        .then(function(data) {
                            renderResults(data.results || [], query);
                        })
                        .catch(function() {
                            searchResults.innerHTML =
                                '<div class="search-empty"><i class="isax isax-warning-2"></i>{{ __("Erreur de recherche") }}</div>';
                            searchResults.style.display = 'block';
                        });
                }, 300);
            });

            function renderResults(results, query) {
                if (results.length === 0) {
                    searchResults.innerHTML = '<div class="search-empty">' +
                        '<i class="isax isax-search-normal"></i>' +
                        '{{ __("Aucun résultat pour") }} "<strong>' + escapeHtml(query) + '</strong>"</div>';
                    searchResults.style.display = 'block';
                    return;
                }

                // Group by category
                var groups = {};
                results.forEach(function(item) {
                    if (!groups[item.category]) groups[item.category] = [];
                    groups[item.category].push(item);
                });

                var html = '';
                for (var cat in groups) {
                    html += '<div class="search-category-label">' + escapeHtml(cat) + '</div>';
                    groups[cat].forEach(function(item) {
                        var cls = colorMap[item.color] || 'bg-light text-dark';
                        html += '<a href="' + escapeHtml(item.url) + '" class="global-search-item">' +
                            '<span class="search-icon ' + cls + '"><i class="' + escapeHtml(item.icon) +
                            '"></i></span>' +
                            '<div class="search-text">' +
                            '<div class="search-title">' + highlightMatch(item.title, query) + '</div>' +
                            (item.subtitle ? '<div class="search-subtitle">' + escapeHtml(item.subtitle) +
                                '</div>' : '') +
                            '</div></a>';
                    });
                }

                searchResults.innerHTML = html;
                searchResults.style.display = 'block';
            }

            function highlightMatch(text, query) {
                if (!text) return '';
                var escaped = escapeHtml(text);
                var regex = new RegExp('(' + escapeRegex(query) + ')', 'gi');
                return escaped.replace(regex,
                    '<mark style="background:#fef08a;padding:0 1px;border-radius:2px">$1</mark>');
            }

            function escapeHtml(str) {
                var div = document.createElement('div');
                div.appendChild(document.createTextNode(str || ''));
                return div.innerHTML;
            }

            function escapeRegex(str) {
                return str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
            }

            // Close dropdown on click outside
            document.addEventListener('click', function(e) {
                if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                    searchResults.style.display = 'none';
                }
            });

            // Re-open on focus if there's content
            searchInput.addEventListener('focus', function() {
                if (this.value.trim().length >= 2 && searchResults.innerHTML) {
                    searchResults.style.display = 'block';
                }
            });

            // Keyboard: Escape to close, Enter to go to first result
            searchInput.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    searchResults.style.display = 'none';
                    this.blur();
                }
                if (e.key === 'Enter') {
                    var first = searchResults.querySelector('.global-search-item');
                    if (first) {
                        e.preventDefault();
                        window.location.href = first.getAttribute('href');
                    }
                }
            });
        });
    </script>
@endauth
