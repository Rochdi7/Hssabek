@extends('frontoffice.layouts.app')

@section('title', __('Support Technique — Assistance Rapide'))
@section('meta_description', __('Support technique') . ' ' . config('app.name') . '. ' . __('Réponse sous 24h. Assistance par email, centre d\'aide et FAQ pour résoudre tous vos problèmes de facturation.'))
@section('meta_keywords', 'support technique facturation, assistance logiciel comptable, aide en ligne maroc, support hssabek')

@section('hero')
<!-- Hero Section -->
<section class="hero-section" id="index">
	<div class="container banner-hero">
		<div class="home-banner">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<div class="banner-content" data-aos="fade-up">
						<span class="info-badge fw-medium mb-3">{{ __('Support technique') }}</span>
						<div class="banner-title">
							<h1 class="mb-2">{{ __('Notre équipe est') }} <span class="head">{{ __('à votre écoute') }}</span></h1>
						</div>
						<p class="fw-medium">{{ __('Un problème technique ou une question ? Nous sommes là pour vous accompagner et vous aider à réussir.') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Hero Section -->
@endsection

@section('content')

<!-- Support Options -->
<section class="saas-app-section">
	<div class="container">
		<div class="section-heading aos" data-aos="fade-up">
			<span class="title-badge">{{ __('Nos canaux') }}</span>
			<h2 class="mb-2">{{ __('Comment nous') }} <span>{{ __('contacter ?') }}</span></h2>
			<p class="fw-medium">{{ __('Choisissez le canal qui vous convient le mieux. Nous sommes disponibles du lundi au vendredi, de 9h à 18h.') }}</p>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6" data-aos="fade-up">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-01.svg') }}" alt="{{ __('Email') }}">
					</div>
					<div class="app-content">
						<h6 class="mb-1">{{ __('Support par email') }}</h6>
						<p>{{ __('Envoyez-nous un email et recevez une réponse sous 24h ouvrées. Idéal pour les questions détaillées.') }}</p>
						<a href="{{ route('contact') }}" class="btn btn-dark btn-sm d-inline-flex align-items-center mt-2">{{ __('Envoyer un email') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-02.svg') }}" alt="{{ __('Centre d\'aide') }}">
					</div>
					<div class="app-content">
						<h6 class="mb-1">{{ __('Centre d\'aide') }}</h6>
						<p>{{ __('Parcourez nos guides et tutoriels pour trouver des réponses instantanées à vos questions.') }}</p>
						<a href="{{ route('help-center') }}" class="btn btn-dark btn-sm d-inline-flex align-items-center mt-2">{{ __('Consulter les guides') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-03.svg') }}" alt="{{ __('FAQ') }}">
					</div>
					<div class="app-content">
						<h6 class="mb-1">{{ __('FAQ') }}</h6>
						<p>{{ __('Les réponses aux questions les plus fréquemment posées par nos utilisateurs.') }}</p>
						<a href="{{ route('faq') }}" class="btn btn-dark btn-sm d-inline-flex align-items-center mt-2">{{ __('Voir la FAQ') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Support Options -->

<!-- Support Levels -->
<section class="invoice-temp-sec">
	<div class="container">
		<div class="section-heading" data-aos="fade-up">
			<span class="title-badge">{{ __('Niveaux de support') }}</span>
			<h2>{{ __('Un support adapté') }} <span>{{ __('à chaque plan') }}</span></h2>
			<p class="fw-medium">{{ __('Plus votre plan est avancé, plus votre support est prioritaire.') }}</p>
		</div>
		<div class="row justify-content-center">
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
				<div class="packages-card">
					<div class="package-header d-flex justify-content-between">
						<div class="d-flex justify-content-between w-100">
							<div>
								<h6>{{ __('Support') }}</h6>
								<h4>{{ __('Gratuit') }}</h4>
							</div>
							<span class="icon-frame d-flex align-items-center justify-content-center"><img src="{{ url('build/img/icons/price-01.svg') }}" alt="{{ __('icône') }}"></span>
						</div>
					</div>
					<p>{{ __('Support communautaire et documentation en ligne.') }}</p>
					<h5>{{ __('Inclus') }}</h5>
					<ul class="plan-features">
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Centre d\'aide') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('FAQ complète') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Réponse sous 48h') }}</li>
					</ul>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
				<div class="packages-card">
					<div class="package-header d-flex justify-content-between">
						<div class="d-flex justify-content-between w-100">
							<div>
								<h6>{{ __('Support') }}</h6>
								<h4>{{ __('Standard') }}</h4>
							</div>
							<span class="icon-frame d-flex align-items-center justify-content-center"><img src="{{ url('build/img/icons/price-02.svg') }}" alt="{{ __('icône') }}"></span>
						</div>
					</div>
					<p>{{ __('Support par email avec temps de réponse garanti.') }}</p>
					<h5>{{ __('Inclus') }}</h5>
					<ul class="plan-features">
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Tout du plan Gratuit') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Support email dédié') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Réponse sous 24h') }}</li>
					</ul>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
				<div class="packages-card">
					<div class="package-header d-flex justify-content-between">
						<div class="d-flex justify-content-between w-100">
							<div>
								<h6>{{ __('Support') }}</h6>
								<h4>{{ __('Prioritaire') }}</h4>
							</div>
							<span class="icon-frame d-flex align-items-center justify-content-center"><img src="{{ url('build/img/icons/price-03.svg') }}" alt="{{ __('icône') }}"></span>
						</div>
					</div>
					<p>{{ __('Support prioritaire avec assistance personnalisée.') }}</p>
					<h5>{{ __('Inclus') }}</h5>
					<ul class="plan-features">
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Tout du plan Standard') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Support prioritaire') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Réponse sous 4h') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Appel d\'onboarding') }}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Support Levels -->

<!-- CTA -->
<section class="faq-section bg-white">
	<div class="container">
		<div class="connect-with-us">
			<div class="section-title text-center" data-aos="fade-up">
				<h2 class="mb-2">{{ __('Besoin d\'aide maintenant ?') }}</h2>
				<p class="mx-auto">{{ __('Contactez notre équipe de support. Nous nous engageons à vous répondre dans les meilleurs délais.') }}</p>
				<a href="{{ route('contact') }}" class="btn btn-primary btn-lg d-inline-flex align-items-center">{{ __('Contacter le support') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
			</div>
		</div>
	</div>
</section>

@endsection
