@extends('web.layout.app')

@section('title', 'Tarification')
@section('meta_description', 'Découvrez nos offres de facturation en ligne. Des plans adaptés à toutes les tailles d\'entreprise.')

@section('content')

    {{-- ===== HEADER ===== --}}
    <section class="public-hero text-center" style="padding: 50px 0;">
        <div class="container">
            <h1 class="fw-bold mb-2">Tarification simple et transparente</h1>
            <p class="text-muted">Choisissez le plan adapté à votre activité. Changez à tout moment.</p>
        </div>
    </section>

    {{-- ===== PLANS ===== --}}
    <section class="public-section pt-0">
        <div class="container">
            <div class="row justify-content-center g-4">
                @forelse($plans as $plan)
                    <div class="col-xl-3 col-lg-6 col-sm-12">
                        <div class="card border rounded mb-3 h-100 {{ $plan->is_popular ? 'border-primary' : '' }}">
                            <div class="card-body">
                                <div class="pricing-content mb-3">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h6 class="fs-14 mb-0">{{ $plan->name }}</h6>
                                        @if($plan->is_popular)
                                            <span class="badge badge-sm bg-pink text-white">Populaire</span>
                                        @endif
                                    </div>
                                    <div class="d-flex align-items-center mb-2 flex-wrap gap-2">
                                        <h3 class="d-flex align-items-center mb-0">
                                            {{ number_format($plan->price, 0, ',', ' ') }}€
                                            <span class="fs-14 fw-normal text-gray-9 me-2">/{{ $plan->interval === 'month' ? 'mois' : ($plan->interval === 'year' ? 'an' : '') }}</span>
                                        </h3>
                                        @if($plan->max_users)
                                            <span class="badge badge-sm bg-info text-white border px-1 rounded text-truncate">{{ $plan->formatLimit($plan->max_users) }} utilisateurs</span>
                                        @endif
                                    </div>
                                    @if($plan->description)
                                        <p class="mb-3 text-truncate line-clamb-2">{{ $plan->description }}</p>
                                    @endif
                                    <a href="{{ route('register', ['plan' => $plan->code]) }}" class="d-flex align-items-center justify-content-center btn {{ $plan->is_popular ? 'bg-primary text-white' : 'border taxt-gray-100' }} rounded w-100 mb-3">
                                        <i class="isax isax-shopping-cart me-1"></i> Choisir ce plan
                                    </a>
                                    @if($plan->trial_days > 0)
                                        <p class="text-center text-muted fs-12 mb-3">{{ $plan->trial_days }} jours d'essai gratuit</p>
                                    @endif
                                    <div class="price-hdr">
                                        <h6 class="fs-10 fw-semibold text-gray-9 me-2 ms-2 mb-0">FONCTIONNALITÉS</h6>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div>
                                        <span class="text-dark d-flex align-items-center mb-2">
                                            <i class="isax isax-tick-circle5 text-success me-2"></i>
                                            {{ $plan->formatLimit($plan->max_customers) }} clients
                                        </span>
                                        <span class="text-dark d-flex align-items-center mb-2">
                                            <i class="isax isax-tick-circle5 text-success me-2"></i>
                                            {{ $plan->formatLimit($plan->max_products) }} produits
                                        </span>
                                        <span class="text-dark d-flex align-items-center mb-2">
                                            <i class="isax isax-tick-circle5 text-success me-2"></i>
                                            {{ $plan->formatLimit($plan->max_invoices_per_month) }} factures/mois
                                        </span>
                                        <span class="text-dark d-flex align-items-center mb-2">
                                            <i class="isax isax-tick-circle5 text-success me-2"></i>
                                            {{ $plan->formatLimit($plan->max_quotes_per_month) }} devis/mois
                                        </span>
                                        <span class="text-dark d-flex align-items-center mb-2">
                                            <i class="isax isax-tick-circle5 text-success me-2"></i>
                                            {{ $plan->formatLimit($plan->max_warehouses) }} entrepôts
                                        </span>
                                        <span class="text-dark d-flex align-items-center mb-2">
                                            <i class="isax isax-tick-circle5 text-success me-2"></i>
                                            {{ $plan->formatLimit($plan->max_bank_accounts) }} comptes bancaires
                                        </span>
                                        @if($plan->features && is_array($plan->features))
                                            @foreach($plan->features as $feature)
                                                <span class="text-dark d-flex align-items-center mb-2">
                                                    <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                    {{ $feature }}
                                                </span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="mb-3">
                            <i class="isax isax-info-circle fs-48 text-muted"></i>
                        </div>
                        <h5 class="text-muted">Aucun plan disponible pour le moment</h5>
                        <p class="text-muted">Veuillez revenir plus tard ou nous contacter pour plus d'informations.</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary">Nous contacter</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===== FAQ ===== --}}
    <section class="public-section bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Questions fréquentes</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="pricingFaq">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Puis-je changer de plan à tout moment ?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#pricingFaq">
                                <div class="accordion-body">
                                    Oui, vous pouvez passer à un plan supérieur ou inférieur à tout moment depuis votre espace de gestion. Le changement prend effet immédiatement.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Y a-t-il une période d'essai gratuite ?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#pricingFaq">
                                <div class="accordion-body">
                                    Oui, chaque plan dispose d'une période d'essai gratuite. Aucune carte bancaire n'est requise pour commencer.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Mes données sont-elles sécurisées ?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#pricingFaq">
                                <div class="accordion-body">
                                    Absolument. Chaque entreprise dispose de son propre espace isolé. Vos données sont chiffrées et sauvegardées régulièrement.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Comment fonctionne la facturation ?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#pricingFaq">
                                <div class="accordion-body">
                                    Vous êtes facturé selon la période de votre plan (mensuel ou annuel). Vous pouvez annuler à tout moment sans frais.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
