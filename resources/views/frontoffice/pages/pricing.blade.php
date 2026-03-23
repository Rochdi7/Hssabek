@extends('frontoffice.layouts.app')

@section('title', __('Tarifs Logiciel Facturation Maroc — Plans dès 0 DH pour PME & Auto-Entrepreneurs'))
@section('meta_description', __('Comparez nos tarifs de facturation en ligne au Maroc dès 0 DH/mois. Plans adaptés auto-entrepreneurs, PME et grandes entreprises. Facturation électronique conforme DGI. Essai gratuit sans carte bancaire.'))
@section('meta_keywords', 'meilleur application de facturation gratuit, application pour facturation gratuit, logiciel facturation gratuit maroc, logiciel de facturation gratuit maroc, logiciel gestion commerciale maroc gratuit, prix logiciel facturation maroc, tarif facturation en ligne maroc, abonnement facturation maroc, comparatif logiciel facturation maroc, plan facturation pme maroc, logiciel facturation auto entrepreneur prix, essai gratuit facturation maroc, facturation pas cher maroc, logiciel facture gratuit maroc')

@section('structured_data')
<script type="application/ld+json">
{
	"@@context": "https://schema.org",
	"@@type": "BreadcrumbList",
	"itemListElement": [
		{"@@type": "ListItem", "position": 1, "name": "Accueil", "item": "{{ route('home') }}"},
		{"@@type": "ListItem", "position": 2, "name": "Tarifs"}
	]
}
</script>
@endsection

@section('hero')
<!-- Hero Section -->
<section class="hero-section" id="index">
	<div class="container banner-hero">
		<div class="home-banner">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<div class="banner-content" data-aos="fade-up">
						<span class="info-badge fw-medium mb-3">{{ __('Sans engagement') }}</span>
						<div class="banner-title">
							<h1 class="mb-2">{{ __('Tarification simple') }} <span class="head">{{ __('et transparente') }}</span></h1>
						</div>
						<p class="fw-medium">{{ __('Choisissez le plan adapté à votre activité. Changez ou annulez à tout moment. Aucune carte bancaire requise pour l\'essai gratuit.') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Hero Section -->
@endsection

@section('content')

<!-- Pricing & Plans Section -->
<section class="pricing-section" id="pricing">
	<div class="container">
		<div class="sec-bg-img">
			<img src="{{ url('build/img/icons/pricing-bg-01.svg') }}" class="pricing-bg-one d-none d-lg-flex" alt="Bg">
			<img src="{{ url('build/img/bg/sec-bg-10.png') }}" class="pricing-bg-two" alt="Bg">
		</div>
		<div class="section-heading">
			<span class="title-badge bg-white">{{ __('Tarifs & Plans') }}</span>
			<h2>{{ __('Choisissez le plan parfait') }} <span>{{ __('adapté à vos besoins.') }}</span></h2>
			<p class="fw-medium">{{ __('Que vous soyez un indépendant, une petite équipe ou une entreprise en croissance, nous avons un plan qui correspond parfaitement à vos objectifs.') }}</p>
		</div>

		@if($plans->count() > 0)
		<div class="row justify-content-center">
			@foreach($plans as $plan)
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 500 + $loop->index * 100 }}">
				<div class="packages-card">
					<div class="package-header d-flex justify-content-between">
						<div class="d-flex justify-content-between w-100">
							<div>
								<h6>{{ $plan->interval === 'month' ? __('Mensuel') : ($plan->interval === 'year' ? __('Annuel') : __('À vie')) }}</h6>
								<h4>{{ $plan->name }}</h4>
							</div>
							<span class="icon-frame d-flex align-items-center justify-content-center">
								<img src="{{ url('build/img/icons/price-0' . min($loop->iteration, 4) . '.svg') }}" alt="icône">
							</span>
						</div>
					</div>
					@if($plan->description)
					<p>{{ $plan->description }}</p>
					@endif
					<span class="plan-price">{{ number_format($plan->price, 0, ',', ' ') }}€</span>
					<h5>{{ __('Ce qui est inclus') }}</h5>
					<ul class="plan-features">
						<li><i class="fa-solid fa-circle-check"></i>{{ $plan->formatLimit($plan->max_users) }} {{ __('Utilisateurs') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ $plan->formatLimit($plan->max_customers) }} {{ __('Clients') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ $plan->formatLimit($plan->max_products) }} {{ __('Produits') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ $plan->formatLimit($plan->max_invoices_per_month) }} {{ __('Factures/mois') }}</li>
						@if($plan->features && is_array($plan->features))
							@foreach($plan->features as $feature)
								<li><i class="fa-solid fa-circle-check"></i>{{ $feature }}</li>
							@endforeach
						@endif
					</ul>
					<div class="package-btn">
						<a class="btn btn-dark btn-lg d-inline-flex align-items-center justify-content-center" href="{{ route('request-account') }}">{{ __('Choisir ce plan') }} <i class="isax isax-arrow-right-3 ms-2"></i></a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		@else
		<div class="text-center py-5">
			<h5 class="text-muted">{{ __('Aucun plan disponible pour le moment') }}</h5>
			<p class="text-muted mb-4">{{ __('Veuillez revenir plus tard ou nous contacter pour plus d\'informations.') }}</p>
			<a href="{{ route('contact') }}" class="btn btn-primary btn-lg">{{ __('Nous contacter') }}</a>
		</div>
		@endif
	</div>
</section>
<!-- /Pricing & Plans Section -->

<!-- Faq Section -->
<section class="faq-section bg-white" id="faq">
	<div class="container">
		<div class="sec-bg-img">
			<img src="{{ url('build/img/bg/sec-bg-11.png') }}" class="faq-bg-one" alt="Bg">
			<img src="{{ url('build/img/bg/sec-bg-12.png') }}" class="faq-bg-two" alt="Bg">
			<img src="{{ url('build/img/bg/sec-bg-13.png') }}" class="faq-bg-three" alt="Bg">
			<img src="{{ url('build/img/icons/faq-bg.svg') }}" class="faq-bg-four" alt="Bg">
		</div>
		<div class="row align-items-center">
			<div class="col-lg-5">
				<div class="section-heading" data-aos="fade-up">
					<span class="title-badge">FAQ</span>
					<h2 class="mb-2">{{ __('Questions') }} <span>{{ __('fréquentes') }}</span></h2>
					<p class="fw-medium">{{ __('Réponses rapides aux questions les plus posées sur nos tarifs et nos plans.') }}</p>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="faq-set" id="accordionPricing">
					<div class="faq-card aos" data-aos="fade-up" data-aos-delay="600">
						<h4 class="faq-title">
							<a data-bs-toggle="collapse" href="#pFaqOne" aria-expanded="false">{{ __('Puis-je changer de plan à tout moment ?') }}</a>
						</h4>
						<div id="pFaqOne" class="card-collapse collapse show" data-bs-parent="#accordionPricing">
							<p>{{ __('Oui, vous pouvez passer à un plan supérieur ou inférieur à tout moment depuis votre espace de gestion. Le changement prend effet immédiatement.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#pFaqTwo" aria-expanded="false">{{ __('Y a-t-il une période d\'essai gratuite ?') }}</a>
						</h4>
						<div id="pFaqTwo" class="card-collapse collapse" data-bs-parent="#accordionPricing">
							<p>{{ __('Oui, chaque plan dispose d\'une période d\'essai gratuite. Aucune carte bancaire n\'est requise pour commencer.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#pFaqThree" aria-expanded="false">{{ __('Mes données sont-elles sécurisées ?') }}</a>
						</h4>
						<div id="pFaqThree" class="card-collapse collapse" data-bs-parent="#accordionPricing">
							<p>{{ __('Absolument. Chaque entreprise dispose de son propre espace isolé. Vos données sont chiffrées et sauvegardées régulièrement.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#pFaqFour" aria-expanded="false">{{ __('Comment fonctionne la facturation ?') }}</a>
						</h4>
						<div id="pFaqFour" class="card-collapse collapse" data-bs-parent="#accordionPricing">
							<p>{{ __('Vous êtes facturé selon la période de votre plan (mensuel ou annuel). Vous pouvez annuler à tout moment sans frais.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#pFaqFive" aria-expanded="false">{{ __('Puis-je exporter mes données ?') }}</a>
						</h4>
						<div id="pFaqFive" class="card-collapse collapse" data-bs-parent="#accordionPricing">
							<p>{{ __('Oui, vous pouvez exporter toutes vos données (factures, clients, produits) en PDF ou CSV à tout moment. Vos données vous appartiennent.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#pFaqSix" aria-expanded="false">{{ __('Le support est-il inclus ?') }}</a>
						</h4>
						<div id="pFaqSix" class="card-collapse collapse" data-bs-parent="#accordionPricing">
							<p>{{ __('Oui, le support par email est inclus dans tous les plans. Les plans supérieurs bénéficient d\'un support prioritaire.') }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="connect-with-us">
			<div class="section-title text-center" data-aos="fade-up">
				<h2 class="mb-2">{{ __('Prêt à commencer ?') }}</h2>
				<p class="mx-auto">{{ __('Essayez') }} {{ config('app.name') }} {{ __('gratuitement. Aucune carte bancaire requise.') }}</p>
				<a href="{{ route('request-account') }}" class="btn btn-primary btn-lg d-inline-flex align-items-center">{{ __('Demander un accès gratuit') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
			</div>
		</div>
	</div>
</section>
<!-- /Faq Section -->

@endsection
