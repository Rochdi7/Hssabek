@extends('web.layout.app')

@section('title', 'Fonctionnalités')
@section('meta_description', 'Découvrez toutes les fonctionnalités de ' . config('app.name') . ' : facturation, devis, gestion clients, stock, achats, rapports et plus encore.')

@section('content')

    {{-- ===== HEADER ===== --}}
    <section class="public-hero text-center" style="padding: 50px 0;">
        <div class="container">
            <h1 class="fw-bold mb-2">Fonctionnalités complètes</h1>
            <p class="text-muted">Tout ce dont votre entreprise a besoin pour gérer sa facturation et son activité commerciale.</p>
        </div>
    </section>

    {{-- ===== FACTURATION & VENTES ===== --}}
    <section class="public-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-primary-transparent text-primary mb-2 px-3 py-2">Ventes</span>
                <h2 class="fw-bold">Facturation & Ventes</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-document-text fs-20 text-primary me-2"></i>
                                <h6 class="mb-0 fs-14">Factures</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Créez, envoyez et suivez vos factures. Paiements partiels, rappels automatiques et PDF professionnels.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-receipt-2 fs-20 text-success me-2"></i>
                                <h6 class="mb-0 fs-14">Devis</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Rédigez des devis et convertissez-les en factures d'un clic. Suivi de la validité et relance.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-money-recive fs-20 text-info me-2"></i>
                                <h6 class="mb-0 fs-14">Paiements</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Enregistrez les paiements, gérez les allocations sur factures et suivez les soldes en temps réel.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-note-remove fs-20 text-danger me-2"></i>
                                <h6 class="mb-0 fs-14">Avoirs</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Émettez des avoirs et appliquez-les directement sur les factures concernées.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-truck-fast fs-20 text-warning me-2"></i>
                                <h6 class="mb-0 fs-14">Bons de livraison</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Créez des bons de livraison liés à vos factures et suivez les expéditions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-receipt-minus fs-20 text-pink me-2"></i>
                                <h6 class="mb-0 fs-14">Remboursements</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Gérez les remboursements clients avec traçabilité complète.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-repeat fs-20 text-secondary me-2"></i>
                                <h6 class="mb-0 fs-14">Factures récurrentes</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Automatisez vos factures mensuelles ou périodiques. Génération et envoi automatiques.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-notification-bing fs-20 text-danger me-2"></i>
                                <h6 class="mb-0 fs-14">Rappels de paiement</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Configurez des rappels automatiques pour les factures impayées.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== CRM ===== --}}
    <section class="public-section bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-success-transparent text-success mb-2 px-3 py-2">CRM</span>
                <h2 class="fw-bold">Gestion des clients</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-people fs-20 text-primary me-2"></i>
                                <h6 class="mb-0 fs-14">Fiches clients</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Centralisez toutes les informations de vos clients : coordonnées, adresses, contacts multiples.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-location fs-20 text-success me-2"></i>
                                <h6 class="mb-0 fs-14">Adresses multiples</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Gérez plusieurs adresses de facturation et de livraison par client.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-chart-square fs-20 text-info me-2"></i>
                                <h6 class="mb-0 fs-14">Historique complet</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Consultez l'historique des factures, devis, paiements et interactions pour chaque client.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== ACHATS & STOCK ===== --}}
    <section class="public-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-warning-transparent text-warning mb-2 px-3 py-2">Opérations</span>
                <h2 class="fw-bold">Achats & Inventaire</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-shopping-bag fs-20 text-primary me-2"></i>
                                <h6 class="mb-0 fs-14">Bons de commande</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Créez des bons de commande fournisseur et suivez les réceptions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-user-octagon fs-20 text-success me-2"></i>
                                <h6 class="mb-0 fs-14">Fournisseurs</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Gérez vos fournisseurs, leurs factures et paiements.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-box fs-20 text-warning me-2"></i>
                                <h6 class="mb-0 fs-14">Gestion de stock</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Suivez vos niveaux de stock en temps réel, mouvements et transferts entre entrepôts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-building-4 fs-20 text-danger me-2"></i>
                                <h6 class="mb-0 fs-14">Entrepôts multiples</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Gérez plusieurs entrepôts et effectuez des transferts de stock entre eux.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== FINANCE & RAPPORTS ===== --}}
    <section class="public-section bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-danger-transparent text-danger mb-2 px-3 py-2">Finance</span>
                <h2 class="fw-bold">Finance & Rapports</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-bank fs-20 text-primary me-2"></i>
                                <h6 class="mb-0 fs-14">Comptes bancaires</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Gérez vos comptes bancaires, virements et rapprochements.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-money-send fs-20 text-danger me-2"></i>
                                <h6 class="mb-0 fs-14">Dépenses & Revenus</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Catégorisez et suivez toutes vos dépenses et revenus pour une vision claire de votre trésorerie.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-wallet-money fs-20 text-warning me-2"></i>
                                <h6 class="mb-0 fs-14">Prêts</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Suivez vos prêts, échéances et amortissements avec un tableau de bord dédié.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="isax isax-chart-2 fs-20 text-success me-2"></i>
                                <h6 class="mb-0 fs-14">Rapports détaillés</h6>
                            </div>
                            <p class="text-muted fs-13 mb-0">Rapports de ventes, achats, dépenses, profits, taxes, créances et bien plus encore.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== AUTRES FONCTIONNALITÉS ===== --}}
    <section class="public-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-info-transparent text-info mb-2 px-3 py-2">Et plus encore</span>
                <h2 class="fw-bold">Fonctionnalités supplémentaires</h2>
            </div>
            <div class="row g-3">
                @php
                    $extras = [
                        ['icon' => 'isax-document-copy', 'title' => '+40 modèles PDF', 'desc' => 'Templates de factures professionnels personnalisables.'],
                        ['icon' => 'isax-user-add', 'title' => 'Multi-utilisateurs', 'desc' => 'Invitez votre équipe avec des rôles et permissions.'],
                        ['icon' => 'isax-shield-tick', 'title' => 'Rôles & Permissions', 'desc' => 'Contrôle d\'accès granulaire par module et action.'],
                        ['icon' => 'isax-calculator', 'title' => 'TVA & Taxes', 'desc' => 'Gestion flexible des groupes de taxes et taux multiples.'],
                        ['icon' => 'isax-dollar-square', 'title' => 'Multi-devises', 'desc' => 'Facturez dans la devise de votre client avec taux de change.'],
                        ['icon' => 'isax-export-2', 'title' => 'Export PDF & CSV', 'desc' => 'Exportez vos données en PDF ou CSV en un clic.'],
                        ['icon' => 'isax-search-normal', 'title' => 'Recherche globale', 'desc' => 'Trouvez n\'importe quelle facture, client ou produit instantanément.'],
                        ['icon' => 'isax-trash', 'title' => 'Corbeille', 'desc' => 'Récupérez les éléments supprimés grâce à la suppression douce.'],
                    ];
                @endphp
                @foreach($extras as $extra)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="d-flex align-items-start p-3">
                            <i class="{{ $extra['icon'] }} fs-20 text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fs-14 mb-1">{{ $extra['title'] }}</h6>
                                <p class="text-muted fs-13 mb-0">{{ $extra['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== CTA ===== --}}
    <section class="public-section bg-light text-center">
        <div class="container">
            <h2 class="fw-bold mb-3">Convaincu ? Lancez-vous !</h2>
            <p class="text-muted mb-4">Créez votre compte gratuitement et découvrez toutes ces fonctionnalités par vous-même.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4">Commencer gratuitement</a>
                <a href="{{ route('pricing') }}" class="btn btn-outline-primary btn-lg px-4">Voir les tarifs</a>
            </div>
        </div>
    </section>

@endsection
