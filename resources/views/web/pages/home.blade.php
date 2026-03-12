@extends('web.layout.app')

@section('title', 'Accueil')
@section('meta_description', config('app.name') . ' — Logiciel de facturation et gestion commerciale en ligne. Créez vos factures, devis, et gérez vos clients facilement.')

@section('content')

    {{-- ===== HERO ===== --}}
    <section class="public-hero text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-5 fw-bold mb-3">Facturez, gérez et développez votre activité</h1>
                    <p class="lead text-muted mb-4">
                        {{ config('app.name') }} est la solution tout-en-un pour créer vos factures, devis, gérer vos clients,
                        suivre vos paiements et piloter votre activité commerciale — le tout en quelques clics.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4">
                            <i class="isax isax-flash-1 me-1"></i> Commencer gratuitement
                        </a>
                        <a href="{{ route('pricing') }}" class="btn btn-outline-primary btn-lg px-4">
                            Voir les tarifs
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== FONCTIONNALITÉS CLÉS ===== --}}
    <section class="public-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Tout ce dont vous avez besoin</h2>
                <p class="text-muted">Une plateforme complète pour gérer votre entreprise</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <span class="avatar avatar-lg bg-primary-transparent rounded-circle">
                                    <i class="isax isax-document-text fs-24 text-primary"></i>
                                </span>
                            </div>
                            <h5 class="mb-2">Facturation</h5>
                            <p class="text-muted mb-0">Créez des factures professionnelles en quelques secondes. Envoyez-les par email et suivez les paiements en temps réel.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <span class="avatar avatar-lg bg-success-transparent rounded-circle">
                                    <i class="isax isax-receipt-2 fs-24 text-success"></i>
                                </span>
                            </div>
                            <h5 class="mb-2">Devis</h5>
                            <p class="text-muted mb-0">Rédigez des devis attractifs, envoyez-les à vos clients et convertissez-les en factures d'un clic.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <span class="avatar avatar-lg bg-info-transparent rounded-circle">
                                    <i class="isax isax-people fs-24 text-info"></i>
                                </span>
                            </div>
                            <h5 class="mb-2">Gestion clients</h5>
                            <p class="text-muted mb-0">Centralisez vos contacts, adresses et historique client. Suivez les créances et relancez automatiquement.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <span class="avatar avatar-lg bg-warning-transparent rounded-circle">
                                    <i class="isax isax-box fs-24 text-warning"></i>
                                </span>
                            </div>
                            <h5 class="mb-2">Stock & Inventaire</h5>
                            <p class="text-muted mb-0">Gérez vos produits, niveaux de stock, entrepôts et transferts. Alertes de stock bas automatiques.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <span class="avatar avatar-lg bg-danger-transparent rounded-circle">
                                    <i class="isax isax-shopping-bag fs-24 text-danger"></i>
                                </span>
                            </div>
                            <h5 class="mb-2">Achats</h5>
                            <p class="text-muted mb-0">Bons de commande, factures fournisseur, réceptions et notes de débit. Maîtrisez vos dépenses.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <span class="avatar avatar-lg bg-pink-transparent rounded-circle">
                                    <i class="isax isax-chart-2 fs-24 text-pink"></i>
                                </span>
                            </div>
                            <h5 class="mb-2">Rapports</h5>
                            <p class="text-muted mb-0">Tableaux de bord, rapports de ventes, achats, dépenses et profits. Prenez des décisions éclairées.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== POURQUOI NOUS ===== --}}
    <section class="public-section bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-3">Pourquoi choisir {{ config('app.name') }} ?</h2>
                    <div class="d-flex mb-3">
                        <div class="me-3">
                            <span class="avatar avatar-sm bg-primary rounded-circle">
                                <i class="isax isax-tick-circle5 text-white"></i>
                            </span>
                        </div>
                        <div>
                            <h6 class="mb-1">Simple et intuitif</h6>
                            <p class="text-muted mb-0">Interface moderne et facile à prendre en main, même sans compétences techniques.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="me-3">
                            <span class="avatar avatar-sm bg-success rounded-circle">
                                <i class="isax isax-shield-tick5 text-white"></i>
                            </span>
                        </div>
                        <div>
                            <h6 class="mb-1">Sécurisé</h6>
                            <p class="text-muted mb-0">Vos données sont isolées et protégées. Chaque entreprise dispose de son propre espace sécurisé.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="me-3">
                            <span class="avatar avatar-sm bg-info rounded-circle">
                                <i class="isax isax-global5 text-white"></i>
                            </span>
                        </div>
                        <div>
                            <h6 class="mb-1">Accessible partout</h6>
                            <p class="text-muted mb-0">Accédez à votre espace depuis n'importe quel appareil, à tout moment.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="me-3">
                            <span class="avatar avatar-sm bg-warning rounded-circle">
                                <i class="isax isax-crown5 text-white"></i>
                            </span>
                        </div>
                        <div>
                            <h6 class="mb-1">Multi-utilisateurs & rôles</h6>
                            <p class="text-muted mb-0">Invitez votre équipe et attribuez des permissions granulaires à chaque membre.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <div class="display-1 text-primary mb-3">
                                <i class="isax isax-chart-success"></i>
                            </div>
                            <h4 class="mb-2">+40 modèles de facture</h4>
                            <p class="text-muted mb-0">Des templates professionnels pour impressionner vos clients et renforcer votre image de marque.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== CTA FINAL ===== --}}
    <section class="public-section text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">Prêt à simplifier votre facturation ?</h2>
                    <p class="text-muted mb-4">Créez votre compte gratuitement et commencez à facturer dès aujourd'hui. Aucune carte bancaire requise.</p>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5">
                        <i class="isax isax-login me-1"></i> Créer mon compte gratuit
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
