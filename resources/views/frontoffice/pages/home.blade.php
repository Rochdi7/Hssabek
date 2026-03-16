@extends('frontoffice.layouts.app')

@section('title', __('Accueil'))
@section('meta_description', config('app.name') . ' — Logiciel de facturation et gestion commerciale en ligne. Créez vos factures, devis, et gérez vos clients facilement.')

@section('hero')
<!-- Hero Section -->
<section class="hero-section" id="index">
	<div class="container banner-hero pe-lg-0">
		<div class="home-banner">
			<div class="row align-items-center">
				<div class="col-lg-7">
					<div class="banner-content pe-xl-5">
						<div class="banner-content" data-aos="fade-up">
							<span class="info-badge fw-medium mb-3">{{ __('Application intelligente de comptabilité & finance') }}</span>
							<div class="banner-title">
								<h1 class="mb-2">{{ __('Boostez vos') }} <span class="head">{{ __('Ventes & Comptabilité') }}</span> {{ __('avec notre logiciel de gestion de factures') }}</h1>
								<span class="banner-title-icon"><img src="{{ url('build/img/icons/title-icon.svg') }}" alt="Icône"></span>
							</div>
							<p class="fw-medium">{{ config('app.name') }} {{ __('est une solution SaaS complète de comptabilité et finance pour votre entreprise, entièrement équipée de toutes les fonctionnalités et compatible multi-plateformes.') }}</p>
							<div class="banner-wrap-btn">
								<div class="banner-btns d-flex">
									<a class="btn btn-dark btn-lg d-inline-flex align-items-center me-0" href="{{ route('register') }}">{{ __('Essai gratuit') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
								</div>
							</div>
							<ul class="banner-info-list">
								<li><i class="feather-check-circle"></i>{{ __('7 jours d\'essai gratuit') }}</li>
								<li><i class="feather-check-circle"></i>{{ __('Sans carte bancaire') }}</li>
								<li><i class="feather-check-circle"></i>{{ __('Annulez à tout moment') }}</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="banner-img rounded-4">
						<img src="{{ url('build/img/layouts/layout-01.svg') }}" class="img-fluid banner-main-img rounded-4 w-100" alt="Aperçu tableau de bord">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Hero Section -->
@endsection

@section('content')

<!-- Sass App Section -->
<section class="saas-app-section">
	<div class="container">
		<div class="section-heading aos" data-aos="fade-up">
			<span class="title-badge">{{ __('Applications Financières') }}</span>
			<h2 class="mb-2">{{ __('Une plateforme') }} <span>{{ __('puissante et simple') }}</span> {{ __('d\'utilisation') }}</h2>
			<p class="fw-medium">{{ __('Découvrez les piliers de notre plateforme — scores de qualité, support logiciel expert et assistance de gestion sur mesure.') }}</p>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6" data-aos="fade-up">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-01.svg') }}" alt="{{ __('Entreprises') }}">
					</div>
					<div class="app-content">
						<h6 class="mb-1">{{ __('Entreprises') }}</h6>
						<p>{{ __('Une expérience de suivi et de gestion des ventes plus polyvalente et personnalisée.') }}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-02.svg') }}" alt="{{ __('Plans') }}">
					</div>
					<div class="app-content">
						<h6 class="mb-1">{{ __('Plans') }}</h6>
						<p>{{ __('Les utilisateurs bénéficient de fonctionnalités complètes à des prix flexibles et compétitifs.') }}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-03.svg') }}" alt="{{ __('Domaines') }}">
					</div>
					<div class="app-content">
						<h6 class="mb-1">{{ __('Domaines') }}</h6>
						<p>{{ __('Élargissement du spectre d\'application pour répondre à une diversité de secteurs d\'activité.') }}</p>
					</div>
				</div>
			</div>
		</div>
		<div class="invoice-saas-app">
			<div class="row align-items-center">
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
					<div class="app-demo-img pe-lg-5">
						<span><img src="{{ url('build/img/layouts/layout-02.svg') }}" class="img-fluid border border-dark rounded-4 border-5" alt="Démo"></span>
						<span><img src="{{ url('build/img/layouts/layout-03.svg') }}" class="img-fluid demo-img-one" alt="Démo"></span>
					</div>
				</div>
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="700">
					<div class="saas-information">
						<div class="title-head">
							<h2 class="mb-2">{{ __('Application SaaS de ventes, factures & comptabilité') }}</h2>
							<p>{{ config('app.name') }} {{ __('est une application robuste de gestion de factures et de facturation, méticuleusement conçue pour optimiser et automatiser l\'ensemble du cycle de facturation de votre entreprise. Cette solution logicielle sophistiquée simplifie la création, l\'envoi et la gestion des factures.') }}</p>
						</div>
						<ul class="app-more-info">
							<li>
								<h4><span class="counter">2,000</span><sup>+</sup></h4>
								<p>{{ __('Clients servis') }}</p>
							</li>
							<li class="active">
								<h4><span class="counter">49</span><sup>%</sup></h4>
								<p>{{ __('Croissance engagement') }}</p>
							</li>
							<li>
								<h4><span class="counter">99</span><sup>%</sup></h4>
								<p>{{ __('Satisfaction client') }}</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Sass App Section -->

<!-- Software Dev Section -->
<section class="software-dev-section" id="about">
	<div class="container">
		<div class="sec-bg-img">
			<img src="{{ url('build/img/bg/sec-bg-02.png') }}" class="vector-dot-one" alt="Bg">
		</div>
		<div class="row">
			<div class="col-lg-4" data-aos="fade-up">
				<div class="software-sec-info">
					<div class="section-heading mb-4">
						<span class="title-badge fs-14">{{ __('Solutions sur mesure pour chaque secteur') }}</span>
						<h2>{{ __('Suite logicielle complète pour les professionnels') }}</h2>
						<p>{{ __('Plongez dans la prochaine génération de technologies d\'entreprise. Nous concevons des solutions logicielles sur mesure et des cadres stratégiques, propulsant les entreprises vers de nouveaux sommets.') }}</p>
					</div>
					<div class="section-btns">
						<div class="sec-btn">
							<a class="btn btn-lg btn-white" href="{{ route('login') }}"><i class="isax isax-lock-15 me-2"></i>{{ __('Connexion') }}</a>
						</div>
						<div class="sec-btn">
							<a class="btn btn-lg btn-dark" href="{{ route('register') }}"><i class="isax isax-user me-2"></i>{{ __('Inscription') }}</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="row">
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
						<div class="management-types">
							<div class="mnaging-icon">
								<img src="{{ url('build/img/icons/management-icon-01.svg') }}" alt="{{ __('Gestion d\'entreprise') }}">
							</div>
							<div class="managing-info">
								<h6 class="text-white mb-2">{{ __('Gestion d\'entreprise') }}</h6>
								<p>{{ __('Affiche le résumé de toutes les informations en une seule vue pour connaître les données disponibles dans les modules.') }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
						<div class="management-types">
							<div class="mnaging-icon">
								<img src="{{ url('build/img/icons/management-icon-02.svg') }}" alt="{{ __('Gestion des abonnements') }}">
							</div>
							<div class="managing-info">
								<h6 class="text-white mb-2">{{ __('Gestion des abonnements') }}</h6>
								<p>{{ __('Suivi et analyse des abonnements clients, facilitant l\'intégration, le renouvellement et les cycles de facturation.') }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="700">
						<div class="management-types">
							<div class="mnaging-icon">
								<img src="{{ url('build/img/icons/management-icon-03.svg') }}" alt="{{ __('Système de gestion de domaines') }}">
							</div>
							<div class="managing-info">
								<h6 class="text-white mb-2">{{ __('Système de gestion de domaines') }}</h6>
								<p>{{ __('Plateforme centralisée pour gérer efficacement votre portefeuille de domaines, incluant enregistrements, renouvellements et analyses.') }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="800">
						<div class="management-types">
							<div class="mnaging-icon">
								<img src="{{ url('build/img/icons/management-icon-04.svg') }}" alt="{{ __('Gestion des utilisateurs') }}">
							</div>
							<div class="managing-info">
								<h6 class="text-white mb-2">{{ __('Gestion des utilisateurs') }}</h6>
								<p>{{ __('Gérez facilement les rôles, permissions et accès au sein du système, garantissant un processus de vente sécurisé et organisé.') }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="900">
						<div class="management-types">
							<div class="mnaging-icon">
								<img src="{{ url('build/img/icons/management-icon-05.svg') }}" alt="{{ __('Paramètres avancés') }}">
							</div>
							<div class="managing-info">
								<h6 class="text-white mb-2">{{ __('Paramètres avancés') }}</h6>
								<p>{{ __('Flexibilité et contrôle inégalés, permettant aux utilisateurs d\'adapter le logiciel à leurs besoins opérationnels spécifiques.') }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="1000">
						<div class="management-types">
							<div class="mnaging-icon">
								<img src="{{ url('build/img/icons/management-icon-06.svg') }}" alt="{{ __('Abonnements & paiements') }}">
							</div>
							<div class="managing-info">
								<h6 class="text-white mb-2">{{ __('Abonnements & paiements') }}</h6>
								<p>{{ __('Centralise la gestion des abonnements clients et des transactions financières, simplifiant la facturation et les revenus.') }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Software Dev Section -->

<!-- Invoice Template Section -->
<section class="invoice-temp-sec" id="invoice">
	<img src="{{ url('build/img/icons/invoice-bg.png') }}" alt="bg" class="img-fluid invoice-bg1 d-none d-lg-flex">
	<img src="{{ url('build/img/icons/invoice-bg2.png') }}" alt="bg" class="img-fluid invoice-bg2 d-none d-lg-flex">
	<div class="container">
		<div class="section-heading" data-aos="fade-up">
			<span class="title-badge">{{ __('Modèles de factures variés') }}</span>
			<h2>{{ __('Sélectionnez votre') }} <span>{{ __('propre modèle de facture') }}</span></h2>
			<p class="fw-medium">{{ __('Découvrez les piliers de notre plateforme — scores de qualité, support logiciel expert et assistance de gestion sur mesure.') }}</p>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="invoive-temp-slider owl-carousel">
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="600">
						<div class="invoice-img">
							<img src="{{ url('build/img/inner-pages/invoice-01.svg') }}" alt="{{ __('Facture générale 1') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Facture générale 1') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="700">
						<div class="invoice-img">
							<img src="{{ url('build/img/inner-pages/invoice-02.svg') }}" alt="{{ __('Facture générale 2') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Facture générale 2') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="800">
						<div class="invoice-img">
							<img src="{{ url('build/img/inner-pages/invoice-03.svg') }}" alt="{{ __('Facture générale 3') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Facture générale 3') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="900">
						<div class="invoice-img">
							<img src="{{ url('build/img/inner-pages/invoice-04.svg') }}" alt="{{ __('Facture générale 4') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Facture générale 4') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="900">
						<div class="invoice-img">
							<img src="{{ url('build/img/inner-pages/invoice-05.svg') }}" alt="{{ __('Facture générale 5') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Facture générale 5') }}</h6>
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
				<h2 class="mb-2">{{ __('Développez votre activité avec nous') }}</h2>
				<p>{{ __('Nous comprenons qu\'un logiciel idéal peut vous aider à développer votre entreprise à grande échelle.') }}
					{{ __('C\'est pourquoi') }} {{ config('app.name') }} {{ __('peut être la solution parfaite pour vous. Si vous utilisez déjà un logiciel, vous pouvez facilement migrer vers') }} {{ config('app.name') }}. {{ __('N\'hésitez pas à essayer dès aujourd\'hui !') }}
				</p>
			</div>
			<ul class="bussiness-info gap-3 flex-wrap" data-aos="fade-up">
				<li>
					<i class="fa-solid fa-circle-check text-success me-2"></i>
					{{ __('N°1 des logiciels de facturation') }}
				</li>
				<li>
					<i class="fa-solid fa-circle-check text-success me-2"></i>
					{{ __('Support 24h/24') }}
				</li>
				<li>
					<i class="fa-solid fa-circle-check text-success me-2"></i>
					{{ __('Intégration transparente') }}
				</li>
			</ul>
		</div>
	</div>
</section>
<!-- /Invoice Template Section -->

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
			<p class="fw-medium">{{ __('Une gestion commerciale efficace est essentielle au succès d\'une entreprise, car elle impacte directement la génération de revenus et la satisfaction client.') }}</p>
		</div>
		<ul class="nav nav-pills inner-tab-button aos" id="pills-tab" role="tablist" data-aos="fade-up">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="false"><span>{{ __('Gestion des ventes') }}</span>{{ __('Superviser l\'équipe commerciale et le processus de vente') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="true"><span>{{ __('Finance & Comptabilité') }}</span>{{ __('Superviser les rapports financiers et les analyses') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-trend-tab" data-bs-toggle="pill" data-bs-target="#pills-trend" type="button" role="tab" aria-controls="pills-trend" aria-selected="false"><span>{{ __('Devis & Livraisons') }}</span>{{ __('Suivi des prospects et formalisation des offres') }}</button>
			</li>
		</ul>
		<div class="tab-content inner-tab-items">
			<div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
				<div class="row align-items-center">
					<div class="col-lg-4" data-aos="fade-up">
						<div class="empowerment-page-info">
							<h3 class="mb-2">{{ __('Systèmes avancés de gestion des ventes') }}</h3>
							<p>{{ __('Cela implique la supervision de l\'équipe commerciale, la définition des objectifs de vente, le développement de stratégies pour les atteindre et le suivi des performances de l\'équipe.') }}
							</p>
							<ul class="inner-page-features">
								<li><i class="isax isax-tick-circle5"></i>{{ __('Liste des factures') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Création de facture') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Retours de vente') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Ajout de retours de vente') }}</li>
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
			<div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
				<div class="row align-items-center">
					<div class="col-lg-4">
						<div class="empowerment-page-info">
							<h3 class="mb-2">{{ __('Finance & comptabilité puissantes') }}</h3>
							<p>{{ __('La gestion financière et comptable implique la supervision des aspects financiers d\'une organisation pour assurer sa santé financière.') }}
							</p>
							<ul class="inner-page-features">
								<li><i class="isax isax-tick-circle5"></i>{{ __('Dépenses') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Gestion des dépenses') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Paiements') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Filtrage des paiements') }}</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="inner-tab-img aos" data-aos="fade-left">
							<img src="{{ url('build/img/layouts/layout-05.svg') }}" class="img-fluid" alt="{{ __('Finance & Comptabilité') }}">
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-trend" role="tabpanel" aria-labelledby="pills-trend-tab">
				<div class="row align-items-center">
					<div class="col-lg-4">
						<div class="empowerment-page-info">
							<h3 class="mb-2">{{ __('Gestion des devis & bons de livraison') }}</h3>
							<p>{{ __('La gestion financière implique la supervision des aspects financiers d\'une organisation pour assurer sa santé financière.') }}</p>
							<ul class="inner-page-features">
								<li><i class="isax isax-tick-circle5"></i>{{ __('Devis') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Gestion des listes') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Bons de livraison') }}</li>
								<li><i class="isax isax-tick-circle5"></i>{{ __('Création de bons de livraison') }}</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="inner-tab-img">
							<img src="{{ url('build/img/layouts/layout-06.svg') }}" class="img-fluid" alt="{{ __('Devis & Livraisons') }}">
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
			<p class="fw-medium">{{ __('Automatisez les tâches répétitives, rationalisez les processus et améliorez la productivité avec nos outils puissants.') }}</p>
		</div>
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="200">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-01.svg') }}" alt="{{ __('Client') }}">
					</div>
					<h6 class="mb-2">{{ __('Client') }}</h6>
					<p>{{ __('Pierre angulaire pour la gestion des informations, interactions et historique client.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="300">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-02.svg') }}" alt="{{ __('Fournisseur') }}">
					</div>
					<h6 class="mb-2">{{ __('Fournisseur') }}</h6>
					<p>{{ __('Ajout de fournisseurs et création de comptes pour suivre les factures et paiements.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="400">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-03.svg') }}" alt="{{ __('Produit') }}">
					</div>
					<h6 class="mb-2">{{ __('Produit') }}</h6>
					<p>{{ __('Base fondamentale pour le catalogage, la gestion et la vente de produits.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="500">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-04.svg') }}" alt="{{ __('Inventaire') }}">
					</div>
					<h6 class="mb-2">{{ __('Inventaire') }}</h6>
					<p>{{ __('Supervision et coordination des activités de vente et des niveaux de stock de l\'entreprise.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="600">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-05.svg') }}" alt="{{ __('Facture') }}">
					</div>
					<h6 class="mb-2">{{ __('Facture') }}</h6>
					<p>{{ __('Création de factures et envoi par email. Rappels quotidiens si les factures sont en attente.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="700">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-06.svg') }}" alt="{{ __('Retour de vente') }}">
					</div>
					<h6 class="mb-2">{{ __('Retour de vente') }}</h6>
					<p>{{ __('Gestion efficace des retours et échanges clients, maintien de la satisfaction et de l\'inventaire.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="800">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-07.svg') }}" alt="{{ __('Bon de commande') }}">
					</div>
					<h6 class="mb-2">{{ __('Bon de commande') }}</h6>
					<p>{{ __('Création, approbation et suivi des bons de commande, garantissant que les stocks répondent à la demande.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="900">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-08.svg') }}" alt="{{ __('Achat') }}">
					</div>
					<h6 class="mb-2">{{ __('Achat') }}</h6>
					<p>{{ __('Gestion du processus d\'achat, des devis fournisseurs au paiement des factures et création de BC.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="1000">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-09.svg') }}" alt="{{ __('Retour d\'achat') }}">
					</div>
					<h6 class="mb-2">{{ __('Retour d\'achat') }}</h6>
					<p>{{ __('Traitement précis des retours, ajustement des stocks et prise en compte des implications financières.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="1100">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-10.svg') }}" alt="{{ __('Dépenses') }}">
					</div>
					<h6 class="mb-2">{{ __('Dépenses') }}</h6>
					<p>{{ __('Suivi et gestion efficace des coûts associés aux opérations de votre entreprise.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="1200">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-11.svg') }}" alt="{{ __('Devis') }}">
					</div>
					<h6 class="mb-2">{{ __('Devis') }}</h6>
					<p>{{ __('Cotation des prix de produits ou services, permettant de répondre rapidement aux demandes clients.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="1300">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-12.svg') }}" alt="{{ __('Bon de livraison') }}">
					</div>
					<h6 class="mb-2">{{ __('Bon de livraison') }}</h6>
					<p>{{ __('Suivi du mouvement des marchandises du vendeur à l\'acheteur, sans transfert immédiat de paiement.') }}</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Advanced Module Section -->

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
			<p class="fw-medium">{{ __('Que vous soyez un indépendant, une petite équipe ou une entreprise en croissance, nous avons un plan qui correspond parfaitement à vos objectifs.') }}
			</p>
		</div>
		<div class="pricing-tab-btns text-center">
			<ul class="nav nav-pills pricing-tab aos" id="pills-price-tab" role="tablist" data-aos="fade-up">
				<li class="me-0"><span class="pricing-tab-arrow"><img src="{{ url('build/img/icons/arrow.svg') }}" alt="Flèche"></span></li>
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="pills-monthly-tab" data-bs-toggle="pill" data-bs-target="#pills-monthly" type="button" role="tab" aria-controls="pills-monthly" aria-selected="false">{{ __('Mensuel') }}</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="pills-yearly-tab" data-bs-toggle="pill" data-bs-target="#pills-yearly" type="button" role="tab" aria-controls="pills-yearly" aria-selected="true">{{ __('Annuel') }}</button>
				</li>
			</ul>
		</div>
		<div class="tab-content inner-price-cards">
			<div class="tab-pane fade show active" id="pills-monthly" role="tabpanel" aria-labelledby="pills-monthly-tab">
				<div class="row justify-content-center">
					<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
						<div class="packages-card">
							<div class="package-header d-flex justify-content-between">
								<div class="d-flex justify-content-between w-100">
									<div>
										<h6>{{ __('Mensuel') }}</h6>
										<h4>{{ __('Gratuit') }}</h4>
									</div>
									<span class="icon-frame d-flex align-items-center justify-content-center"><img src="{{ url('build/img/icons/price-01.svg') }}" alt="icône"></span>
								</div>
							</div>
							<p>{{ __('Facturation simple, rapports, taxes et sauvegarde des données.') }}</p>
							<span class="plan-price">0€</span>
							<h5>{{ __('Ce qui est inclus') }}</h5>
							<ul class="plan-features">
								<li><i class="fa-solid fa-circle-check"></i>{{ __('2 Utilisateurs') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('1 Fournisseur') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('10 Produits') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('1 Facture') }}</li>
							</ul>
							<div class="package-btn">
								<a class="btn btn-dark btn-lg d-inline-flex align-items-center justify-content-center" href="{{ route('register') }}">{{ __('Choisir ce plan') }} <i class="isax isax-arrow-right-3 ms-2"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
						<div class="packages-card">
							<div class="package-header d-flex justify-content-between">
								<div class="d-flex justify-content-between w-100">
									<div>
										<h6>{{ __('Mensuel') }}</h6>
										<h4>{{ __('Basique') }}</h4>
									</div>
									<span class="icon-frame d-flex align-items-center justify-content-center"><img src="{{ url('build/img/icons/price-02.svg') }}" alt="icône"></span>
								</div>
							</div>
							<p>{{ __('Facturation avancée, inventaire, analyses et accès multi-utilisateurs.') }}</p>
							<span class="plan-price">29€</span>
							<h5>{{ __('Ce qui est inclus') }}</h5>
							<ul class="plan-features">
								<li><i class="fa-solid fa-circle-check"></i>{{ __('5 Utilisateurs') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('5 Fournisseurs') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('100 Produits') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('10 Factures') }}</li>
							</ul>
							<div class="package-btn">
								<a class="btn btn-dark btn-lg d-inline-flex align-items-center justify-content-center" href="{{ route('register') }}">{{ __('Choisir ce plan') }} <i class="isax isax-arrow-right-3 ms-2"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
						<div class="packages-card">
							<div class="package-header d-flex justify-content-between">
								<div class="d-flex justify-content-between w-100">
									<div>
										<h6>{{ __('Mensuel') }}</h6>
										<h4>{{ __('Premium') }}</h4>
									</div>
									<span class="icon-frame d-flex align-items-center justify-content-center"><img src="{{ url('build/img/icons/price-03.svg') }}" alt="icône"></span>
								</div>
							</div>
							<p>{{ __('Automatisation, API, multi-agences et gestion des workflows.') }}</p>
							<span class="plan-price">59€</span>
							<h5>{{ __('Ce qui est inclus') }}</h5>
							<ul class="plan-features">
								<li><i class="fa-solid fa-circle-check"></i>{{ __('50 Utilisateurs') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('10 Fournisseurs') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('1000 Produits') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('1000 Factures') }}</li>
							</ul>
							<div class="package-btn">
								<a class="btn btn-dark btn-lg d-inline-flex align-items-center justify-content-center" href="{{ route('register') }}">{{ __('Choisir ce plan') }} <i class="isax isax-arrow-right-3 ms-2"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="800">
						<div class="packages-card">
							<div class="package-header d-flex justify-content-between">
								<div class="d-flex justify-content-between w-100">
									<div>
										<h6>{{ __('Mensuel') }}</h6>
										<h4>{{ __('Entreprise') }}</h4>
									</div>
									<span class="icon-frame d-flex align-items-center justify-content-center"><img src="{{ url('build/img/icons/price-04.svg') }}" alt="icône"></span>
								</div>
							</div>
							<p>{{ __('IA, intégration ERP et sécurité entreprise.') }}</p>
							<span class="plan-price">99€</span>
							<h5>{{ __('Ce qui est inclus') }}</h5>
							<ul class="plan-features">
								<li><i class="fa-solid fa-circle-check"></i>{{ __('1000 Utilisateurs') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('Fournisseurs illimités') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('Produits illimités') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('Factures illimitées') }}</li>
							</ul>
							<div class="package-btn">
								<a class="btn btn-dark btn-lg d-inline-flex align-items-center justify-content-center" href="{{ route('register') }}">{{ __('Choisir ce plan') }} <i class="isax isax-arrow-right-3 ms-2"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-yearly" role="tabpanel" aria-labelledby="pills-yearly-tab">
				<div class="row justify-content-center">
					<div class="col-xl-3 col-lg-4 col-md-6">
						<div class="packages-card">
							<div class="package-header d-flex justify-content-between">
								<div class="d-flex justify-content-between w-100">
									<div>
										<h6>{{ __('Annuel') }}</h6>
										<h4>{{ __('Gratuit') }}</h4>
									</div>
									<span class="icon-frame d-flex align-items-center justify-content-center"><img src="{{ url('build/img/icons/price-01.svg') }}" alt="icône"></span>
								</div>
							</div>
							<p>{{ __('Facturation simple, rapports, taxes et sauvegarde des données.') }}</p>
							<span class="plan-price">0€</span>
							<h5>{{ __('Ce qui est inclus') }}</h5>
							<ul class="plan-features">
								<li><i class="fa-solid fa-circle-check"></i>{{ __('2 Utilisateurs') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('1 Fournisseur') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('10 Produits') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('1 Facture') }}</li>
							</ul>
							<div class="package-btn">
								<a class="btn btn-dark btn-lg d-inline-flex align-items-center justify-content-center" href="{{ route('register') }}">{{ __('Choisir ce plan') }} <i class="isax isax-arrow-right-3 ms-2"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-4 col-md-6">
						<div class="packages-card">
							<div class="package-header d-flex justify-content-between">
								<div class="d-flex justify-content-between w-100">
									<div>
										<h6>{{ __('Annuel') }}</h6>
										<h4>{{ __('Basique') }}</h4>
									</div>
									<span class="icon-frame d-flex align-items-center justify-content-center"><img src="{{ url('build/img/icons/price-02.svg') }}" alt="icône"></span>
								</div>
							</div>
							<p>{{ __('Facturation avancée, inventaire, analyses et accès multi-utilisateurs.') }}</p>
							<span class="plan-price">249€</span>
							<h5>{{ __('Ce qui est inclus') }}</h5>
							<ul class="plan-features">
								<li><i class="fa-solid fa-circle-check"></i>{{ __('5 Utilisateurs') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('5 Fournisseurs') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('100 Produits') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('10 Factures') }}</li>
							</ul>
							<div class="package-btn">
								<a class="btn btn-dark btn-lg d-inline-flex align-items-center justify-content-center" href="{{ route('register') }}">{{ __('Choisir ce plan') }} <i class="isax isax-arrow-right-3 ms-2"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-4 col-md-6">
						<div class="packages-card">
							<div class="package-header d-flex justify-content-between">
								<div class="d-flex justify-content-between w-100">
									<div>
										<h6>{{ __('Annuel') }}</h6>
										<h4>{{ __('Premium') }}</h4>
									</div>
									<span class="icon-frame d-flex align-items-center justify-content-center"><img src="{{ url('build/img/icons/price-03.svg') }}" alt="icône"></span>
								</div>
							</div>
							<p>{{ __('Automatisation, API, multi-agences et gestion des workflows.') }}</p>
							<span class="plan-price">499€</span>
							<h5>{{ __('Ce qui est inclus') }}</h5>
							<ul class="plan-features">
								<li><i class="fa-solid fa-circle-check"></i>{{ __('50 Utilisateurs') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('10 Fournisseurs') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('1000 Produits') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('1000 Factures') }}</li>
							</ul>
							<div class="package-btn">
								<a class="btn btn-dark btn-lg d-inline-flex align-items-center justify-content-center" href="{{ route('register') }}">{{ __('Choisir ce plan') }} <i class="isax isax-arrow-right-3 ms-2"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-4 col-md-6">
						<div class="packages-card">
							<div class="package-header d-flex justify-content-between">
								<div class="d-flex justify-content-between w-100">
									<div>
										<h6>{{ __('Annuel') }}</h6>
										<h4>{{ __('Entreprise') }}</h4>
									</div>
									<span class="icon-frame d-flex align-items-center justify-content-center"><img src="{{ url('build/img/icons/price-04.svg') }}" alt="icône"></span>
								</div>
							</div>
							<p>{{ __('IA, intégration ERP et sécurité entreprise.') }}</p>
							<span class="plan-price">899€</span>
							<h5>{{ __('Ce qui est inclus') }}</h5>
							<ul class="plan-features">
								<li><i class="fa-solid fa-circle-check"></i>{{ __('1000 Utilisateurs') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('Fournisseurs illimités') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('Produits illimités') }}</li>
								<li><i class="fa-solid fa-circle-check"></i>{{ __('Factures illimitées') }}</li>
							</ul>
							<div class="package-btn">
								<a class="btn btn-dark btn-lg d-inline-flex align-items-center justify-content-center" href="{{ route('register') }}">{{ __('Choisir ce plan') }} <i class="isax isax-arrow-right-3 ms-2"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
					<h2 class="mb-2">{{ __('Vous avez une question ?') }} <span>{{ __('Trouvez votre réponse') }}</span></h2>
					<p class="fw-medium">{{ __('Réponses rapides aux questions fréquentes. Vous ne trouvez pas ce que vous cherchez ? Consultez notre documentation complète.') }}
					</p>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="faq-set" id="accordionExample">
					<div class="faq-card aos" data-aos="fade-up" data-aos-delay="600">
						<h4 class="faq-title">
							<a data-bs-toggle="collapse" href="#faqOne" aria-expanded="false">{{ __('Y a-t-il un essai gratuit disponible ?') }}</a>
						</h4>
						<div id="faqOne" class="card-collapse collapse show" data-bs-parent="#accordionExample">
							<p>{{ __('Oui, vous pouvez nous essayer gratuitement pendant 7 jours. Si vous le souhaitez, nous vous proposons un appel d\'intégration gratuit de 30 minutes pour vous aider à démarrer.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#faqtwo" aria-expanded="false">{{ __('Puis-je changer de plan plus tard ?') }}</a>
						</h4>
						<div id="faqtwo" class="card-collapse collapse" data-bs-parent="#accordionExample">
							<p>{{ __('Absolument ! Vous pouvez passer à un plan supérieur ou inférieur à tout moment depuis votre espace de gestion. Le changement prend effet immédiatement.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#faqthree" aria-expanded="false">{{ __('Quelle est votre politique d\'annulation ?') }}</a>
						</h4>
						<div id="faqthree" class="card-collapse collapse" data-bs-parent="#accordionExample">
							<p>{{ __('Vous pouvez annuler votre abonnement à tout moment. L\'annulation prend effet à la fin de la période de facturation en cours. Aucun frais supplémentaire ne sera appliqué.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#faqfour" aria-expanded="false">{{ __('Puis-je ajouter d\'autres informations sur mes factures ?') }}</a>
						</h4>
						<div id="faqfour" class="card-collapse collapse" data-bs-parent="#accordionExample">
							<p>{{ __('Oui, nos modèles de factures sont entièrement personnalisables. Vous pouvez ajouter des champs personnalisés, votre logo, des conditions de paiement et toute information supplémentaire nécessaire.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#faqfive" aria-expanded="false">{{ __('Comment fonctionne la facturation ?') }}</a>
						</h4>
						<div id="faqfive" class="card-collapse collapse" data-bs-parent="#accordionExample">
							<p>{{ __('La facturation est automatique selon votre cycle choisi (mensuel ou annuel). Vous recevez une facture par email à chaque renouvellement. Tous les paiements sont sécurisés.') }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="connect-with-us">
			<div class="section-title text-center" data-aos="fade-up">
				<h2 class="mb-2">{{ __('Démarrez avec') }} {{ config('app.name') }}</h2>
				<p class="mx-auto">{{ config('app.name') }} {{ __('est une solution complète de comptabilité et finance pour votre entreprise, entièrement équipée de toutes les fonctionnalités et compatible multi-plateformes.') }}</p>
				<a href="{{ route('register') }}" class="btn btn-primary btn-lg d-inline-flex align-items-center">{{ __('Essayer gratuitement') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
			</div>
		</div>
	</div>
</section>
<!-- /Faq Section -->

@endsection
