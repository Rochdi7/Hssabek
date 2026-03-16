@extends('frontoffice.layouts.app')

@section('title', __('Fonctionnalités'))
@section('meta_description', __('Découvrez toutes les fonctionnalités de') . ' ' . config('app.name') . ' : ' . __('facturation, devis, gestion clients, stock, achats, rapports et plus encore.'))

@section('hero')
<!-- Hero Section -->
<section class="hero-section" id="index">
	<div class="container banner-hero">
		<div class="home-banner">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<div class="banner-content" data-aos="fade-up">
						<span class="info-badge fw-medium mb-3">{{ __('Plateforme tout-en-un') }}</span>
						<div class="banner-title">
							<h1 class="mb-2">{{ __('Toutes les') }} <span class="head">{{ __('fonctionnalités') }}</span> {{ __('pour votre entreprise') }}</h1>
						</div>
						<p class="fw-medium">{{ __('Facturation, CRM, stock, achats, finance et rapports — une seule plateforme pour tout gérer.') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Hero Section -->
@endsection

@section('content')

<!-- User Empowerment Section -->
<section class="user-empowerment-sec" id="features">
	<div class="container">
		<div class="sec-bg-img">
			<img src="{{ url('build/img/bg/sec-bg-06.png') }}" class="vector-bg-one" alt="Bg">
			<img src="{{ url('build/img/bg/sec-bg-07.png') }}" class="vector-bg-two" alt="Bg">
			<img src="{{ url('build/img/bg/sec-bg-08.png') }}" class="vector-bg-three" alt="Bg">
		</div>
		<div class="section-heading" data-aos="fade-up" data-aos-delay="500">
			<span class="title-badge fs-14 mb-3">{{ __('Des fonctionnalités qui dépassent vos attentes') }}</span>
			<h2 class="mb-2">{{ __('Autonomisation des utilisateurs grâce à des') }} <span>{{ __('expériences personnalisées.') }}</span></h2>
			<p class="fw-medium">{{ __('Une gestion commerciale efficace est essentielle au succès d\'une entreprise.') }}</p>
		</div>
		<ul class="nav nav-pills inner-tab-button aos" id="pills-tab" role="tablist" data-aos="fade-up">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="pills-sales-tab" data-bs-toggle="pill" data-bs-target="#pills-sales" type="button" role="tab" aria-controls="pills-sales" aria-selected="true"><span>{{ __('Gestion des ventes') }}</span>{{ __('Factures, devis, paiements et retours') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-finance-tab" data-bs-toggle="pill" data-bs-target="#pills-finance" type="button" role="tab" aria-controls="pills-finance" aria-selected="false"><span>{{ __('Finance & Comptabilité') }}</span>{{ __('Dépenses, paiements et rapports financiers') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-ops-tab" data-bs-toggle="pill" data-bs-target="#pills-ops" type="button" role="tab" aria-controls="pills-ops" aria-selected="false"><span>{{ __('Achats & Inventaire') }}</span>{{ __('Fournisseurs, commandes et gestion de stock') }}</button>
			</li>
		</ul>
		<div class="tab-content inner-tab-items">
			<div class="tab-pane fade show active" id="pills-sales" role="tabpanel" aria-labelledby="pills-sales-tab">
				<div class="row align-items-center">
					<div class="col-lg-4" data-aos="fade-up">
						<div class="empowerment-page-info">
							<h3 class="mb-2">{{ __('Systèmes avancés de gestion des ventes') }}</h3>
							<p>{{ __('Supervisez votre équipe commerciale, définissez vos objectifs de vente, développez des stratégies et suivez les performances.') }}</p>
							<ul class="inner-page-features">
								<li><i class="isax isax-tick-circle5"></i>{{ __('Factures & PDF professionnels') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Devis convertibles en factures') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Retours de vente & avoirs') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Rappels de paiement automatiques') }}</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-8" data-aos="fade-left">
						<div class="inner-tab-img">
							<img src="{{ url('build/img/layouts/layout-04.svg') }}" class="img-fluid" alt="{{ __('Gestion des ventes') }}">
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-finance" role="tabpanel" aria-labelledby="pills-finance-tab">
				<div class="row align-items-center">
					<div class="col-lg-4">
						<div class="empowerment-page-info">
							<h3 class="mb-2">{{ __('Finance & comptabilité puissantes') }}</h3>
							<p>{{ __('La gestion financière implique la supervision des aspects financiers de votre organisation pour assurer sa santé financière.') }}</p>
							<ul class="inner-page-features">
								<li><i class="isax isax-tick-circle5"></i>{{ __('Suivi des dépenses') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Gestion des paiements') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Comptes bancaires multiples') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Rapports de profits & pertes') }}</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="inner-tab-img aos" data-aos="fade-left">
							<img src="{{ url('build/img/layouts/layout-05.svg') }}" class="img-fluid" alt="{{ __('Finance et comptabilité') }}">
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-ops" role="tabpanel" aria-labelledby="pills-ops-tab">
				<div class="row align-items-center">
					<div class="col-lg-4">
						<div class="empowerment-page-info">
							<h3 class="mb-2">{{ __('Achats & gestion d\'inventaire') }}</h3>
							<p>{{ __('Gérez vos fournisseurs, bons de commande et niveaux de stock en temps réel depuis une interface centralisée.') }}</p>
							<ul class="inner-page-features">
								<li><i class="isax isax-tick-circle5"></i>{{ __('Bons de commande fournisseur') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Gestion de stock multi-entrepôts') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Transferts de stock') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Alertes de stock bas') }}</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="inner-tab-img">
							<img src="{{ url('build/img/layouts/layout-06.svg') }}" class="img-fluid" alt="{{ __('Achats et inventaire') }}">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /User Empowerment Section -->

<!-- Advanced Module Section -->
<section class="advance-module-sec" id="modules">
	<div class="container">
		<div class="section-heading" data-aos="fade-up">
			<span class="title-badge">{{ __('Modules avancés') }}</span>
			<h2 class="mb-2">{{ __('Des modules') }} <span>{{ __('puissants et intuitifs') }}</span> {{ __('intégrés') }}</h2>
			<p class="fw-medium">{{ __('Automatisez les tâches répétitives, rationalisez les processus et améliorez la productivité.') }}</p>
		</div>
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="200">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-01.svg') }}" alt="{{ __('Client') }}">
					</div>
					<h6 class="mb-2">{{ __('Client') }}</h6>
					<p>{{ __('Fiches clients, adresses multiples, contacts et historique complet de la relation commerciale.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="300">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-02.svg') }}" alt="{{ __('Fournisseur') }}">
					</div>
					<h6 class="mb-2">{{ __('Fournisseur') }}</h6>
					<p>{{ __('Gestion des fournisseurs, suivi des factures d\'achat et des paiements fournisseur.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="400">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-03.svg') }}" alt="{{ __('Produit') }}">
					</div>
					<h6 class="mb-2">{{ __('Produit') }}</h6>
					<p>{{ __('Catalogue produits, catégories, prix d\'achat et de vente, gestion des variantes.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="500">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-04.svg') }}" alt="{{ __('Inventaire') }}">
					</div>
					<h6 class="mb-2">{{ __('Inventaire') }}</h6>
					<p>{{ __('Suivi des niveaux de stock en temps réel, mouvements et transferts entre entrepôts.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="600">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-05.svg') }}" alt="{{ __('Facture') }}">
					</div>
					<h6 class="mb-2">{{ __('Facture') }}</h6>
					<p>{{ __('Création, envoi par email et suivi des factures. Plus de 40 modèles PDF personnalisables.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="700">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-06.svg') }}" alt="{{ __('Devis') }}">
					</div>
					<h6 class="mb-2">{{ __('Devis') }}</h6>
					<p>{{ __('Création de devis professionnels et conversion en factures en un clic.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="800">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-07.svg') }}" alt="{{ __('Achat') }}">
					</div>
					<h6 class="mb-2">{{ __('Achat') }}</h6>
					<p>{{ __('Bons de commande, factures fournisseur, réceptions et gestion des retours d\'achat.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="900">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-08.svg') }}" alt="{{ __('Dépenses') }}">
					</div>
					<h6 class="mb-2">{{ __('Dépenses') }}</h6>
					<p>{{ __('Suivi et catégorisation des dépenses, rapports détaillés et export comptable.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="1000">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-09.svg') }}" alt="{{ __('Rapports') }}">
					</div>
					<h6 class="mb-2">{{ __('Rapports') }}</h6>
					<p>{{ __('Rapports de ventes, achats, profits, taxes et créances pour piloter votre activité.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="1100">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-10.svg') }}" alt="{{ __('Multi-utilisateurs') }}">
					</div>
					<h6 class="mb-2">{{ __('Multi-utilisateurs') }}</h6>
					<p>{{ __('Invitez votre équipe avec des rôles et permissions granulaires par module et action.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="1200">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-11.svg') }}" alt="{{ __('Modèles') }}">
					</div>
					<h6 class="mb-2">{{ __('Modèles PDF') }}</h6>
					<p>{{ __('Plus de 40 modèles de factures professionnels et personnalisables pour votre image de marque.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="1300">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-12.svg') }}" alt="{{ __('Export') }}">
					</div>
					<h6 class="mb-2">{{ __('Export & Intégrations') }}</h6>
					<p>{{ __('Export PDF, CSV et intégrations avec vos outils de comptabilité et paiement existants.') }}</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Advanced Module Section -->

<!-- Invoice Template Section -->
<section class="invoice-temp-sec">
	<img src="{{ url('build/img/icons/invoice-bg.png') }}" alt="bg" class="img-fluid invoice-bg1 d-none d-lg-flex">
	<img src="{{ url('build/img/icons/invoice-bg2.png') }}" alt="bg" class="img-fluid invoice-bg2 d-none d-lg-flex">
	<div class="container">
		<div class="section-heading" data-aos="fade-up">
			<span class="title-badge">{{ __('Modèles de factures') }}</span>
			<h2>{{ __('Sélectionnez votre') }} <span>{{ __('propre modèle de facture') }}</span></h2>
			<p class="fw-medium">{{ __('Des templates professionnels pour impressionner vos clients et renforcer votre image de marque.') }}</p>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="invoive-temp-slider owl-carousel">
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="600">
						<div class="invoice-img">
							<img src="{{ url('build/img/inner-pages/invoice-01.svg') }}" alt="{{ __('Facture classique') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Facture classique') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="700">
						<div class="invoice-img">
							<img src="{{ url('build/img/inner-pages/invoice-02.svg') }}" alt="{{ __('Facture moderne') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Facture moderne') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="800">
						<div class="invoice-img">
							<img src="{{ url('build/img/inner-pages/invoice-03.svg') }}" alt="{{ __('Facture créative') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Facture créative') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="900">
						<div class="invoice-img">
							<img src="{{ url('build/img/inner-pages/invoice-04.svg') }}" alt="{{ __('Facture élégante') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Facture élégante') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="900">
						<div class="invoice-img">
							<img src="{{ url('build/img/inner-pages/invoice-05.svg') }}" alt="{{ __('Facture premium') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Facture premium') }}</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="start-bussiness">
			<div class="section-bg-img">
				<img src="{{ url('build/img/bg/sec-bg-16.svg') }}" class="sec-bg-vector-one d-none d-lg-flex" alt="Bg">
				<img src="{{ url('build/img/bg/sec-bg-17.svg') }}" class="sec-bg-vector-two" alt="Bg">
			</div>
			<div class="section-title" data-aos="fade-up">
				<h2 class="mb-2">{{ __('Convaincu ? Lancez-vous !') }}</h2>
				<p>{{ __('Créez votre compte gratuitement et découvrez toutes ces fonctionnalités par vous-même.') }}
					{{ __('Aucune carte bancaire requise pour l\'essai gratuit.') }}
				</p>
			</div>
			<ul class="bussiness-info gap-3 flex-wrap" data-aos="fade-up">
				<li>
					<i class="fa-solid fa-circle-check text-success me-2"></i>
					{{ __('Essai gratuit 7 jours') }}
				</li>
				<li>
					<i class="fa-solid fa-circle-check text-success me-2"></i>
					{{ __('Sans carte bancaire') }}
				</li>
				<li>
					<i class="fa-solid fa-circle-check text-success me-2"></i>
					{{ __('Support inclus') }}
				</li>
			</ul>
		</div>
	</div>
</section>
<!-- /Invoice Template Section -->

<!-- CTA Section -->
<section class="faq-section bg-white">
	<div class="container">
		<div class="connect-with-us">
			<div class="section-title text-center" data-aos="fade-up">
				<h2 class="mb-2">{{ __('Démarrez avec') }} {{ config('app.name') }}</h2>
				<p class="mx-auto">{{ __('Créez votre compte gratuitement et découvrez toutes ces fonctionnalités par vous-même.') }}</p>
				<div class="d-flex flex-wrap justify-content-center gap-3">
					<a href="{{ route('register') }}" class="btn btn-primary btn-lg d-inline-flex align-items-center">{{ __('Commencer gratuitement') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
					<a href="{{ route('pricing') }}" class="btn btn-dark btn-lg d-inline-flex align-items-center">{{ __('Voir les tarifs') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /CTA Section -->

@endsection
