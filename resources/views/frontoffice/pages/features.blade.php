@extends('frontoffice.layouts.app')

@section('title', __('Fonctionnalités — Facturation Électronique, Devis, Stock & Gestion Commerciale Maroc'))
@section('meta_description', __('Toutes les fonctionnalités de') . ' ' . config('app.name') . ' : ' . __('facturation électronique conforme DGI, devis en un clic, gestion clients et fournisseurs, stock, achats, bons de commande, avoirs, rapports détaillés et 64+ modèles PDF. Logiciel tout-en-un pour entreprises marocaines.'))
@section('meta_keywords', 'application pour devis et facture gratuit, application devis facture gratuit, application facturation gratuite, application factures gratuite, application pour faire des factures gratuit, application gratuite pour faire des factures, logiciel devis facture maroc, gestion stock facturation maroc, logiciel de gestion de stock et facturation maroc, gestion commerciale en ligne maroc, fonctionnalités logiciel facturation maroc, facturation ia maroc, logiciel bon de commande maroc, modèle facture maroc, gestion trésorerie maroc, facturation électronique DGI')

@section('structured_data')
<script type="application/ld+json">
{
	"@@context": "https://schema.org",
	"@@type": "BreadcrumbList",
	"itemListElement": [
		{"@@type": "ListItem", "position": 1, "name": "Accueil", "item": "{{ route('home') }}"},
		{"@@type": "ListItem", "position": 2, "name": "Fonctionnalités"}
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
<section class="user-empowerment-sec" style="overflow-x: clip;" id="features">
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
		<div class="inner-tab-button-wrapper" style="overflow-x:auto;-webkit-overflow-scrolling:touch;scrollbar-width:none;-ms-overflow-style:none;">
		<style>.inner-tab-button-wrapper::-webkit-scrollbar{display:none;}</style>
		<ul class="nav nav-pills inner-tab-button aos" id="pills-tab-features" role="tablist" data-aos="fade-up" style="flex-wrap:nowrap;min-width:max-content;">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" data-bs-slide-to="0" type="button"><span>{{ __('Gestion des ventes') }}</span>{{ __('Factures, devis, paiements et retours') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="1" type="button"><span>{{ __('Finance & Comptabilité') }}</span>{{ __('Dépenses, paiements et rapports financiers') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="2" type="button"><span>{{ __('Achats & Inventaire') }}</span>{{ __('Fournisseurs, commandes et gestion de stock') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="3" type="button"><span>{{ __('Gestion des clients') }}</span>{{ __('Suivi complet de la relation client') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="4" type="button"><span>{{ __('Mode sombre & Apparence') }}</span>{{ __('Personnaliser l\'interface selon vos préférences') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="5" type="button"><span>{{ __('Multilingue') }}</span>{{ __('Support complet français et arabe') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="6" type="button"><span>{{ __('Inventaire & Stock') }}</span>{{ __('Gestion complète des stocks et entrepôts') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="7" type="button"><span>{{ __('Rapports & Analyses') }}</span>{{ __('Tableaux de bord et rapports détaillés') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="8" type="button"><span>{{ __('Rôles & Permissions') }}</span>{{ __('Contrôle d\'accès granulaire par utilisateur') }}</button>
			</li>
		</ul>
		</div>
		<div id="featuresCarouselPage" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
			<div class="position-relative">
				<button class="btn btn-primary rounded-circle position-absolute top-50 translate-middle-y d-none d-md-flex align-items-center justify-content-center" type="button" data-bs-target="#featuresCarouselPage" data-bs-slide="prev" style="width:44px;height:44px;left:-22px;z-index:10;box-shadow:0 2px 8px rgba(0,0,0,.15);">
					<i class="isax isax-arrow-left-2" style="font-size:20px;"></i>
				</button>
				<button class="btn btn-primary rounded-circle position-absolute top-50 translate-middle-y d-none d-md-flex align-items-center justify-content-center" type="button" data-bs-target="#featuresCarouselPage" data-bs-slide="next" style="width:44px;height:44px;right:-22px;z-index:10;box-shadow:0 2px 8px rgba(0,0,0,.15);">
					<i class="isax isax-arrow-right-3" style="font-size:20px;"></i>
				</button>
				<div class="d-flex d-md-none justify-content-center gap-3 mb-3">
					<button class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" type="button" data-bs-target="#featuresCarouselPage" data-bs-slide="prev" style="width:40px;height:40px;">
						<i class="isax isax-arrow-left-2" style="font-size:18px;"></i>
					</button>
					<button class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" type="button" data-bs-target="#featuresCarouselPage" data-bs-slide="next" style="width:40px;height:40px;">
						<i class="isax isax-arrow-right-3" style="font-size:18px;"></i>
					</button>
				</div>
				<div class="carousel-inner inner-tab-items">
					<div class="carousel-item active">
						<div class="row align-items-center">
							<div class="col-lg-4">
								<div class="empowerment-page-info">
									<h3 class="mb-2">{{ __('Systèmes avancés de gestion des ventes') }}</h3>
									<p>{{ __('Supervisez votre équipe commerciale, définissez vos objectifs de vente, développez des stratégies et suivez les performances.') }}</p>
									<ul class="inner-page-features">
										<li><i class="isax isax-tick-circle5"></i>{{ __('Factures & PDF professionnels') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Devis convertibles en factures') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Retours de vente & avoirs') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Gestion des paiements') }}</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="inner-tab-img">
									<img src="{{ url('assets/images/sass screenshots/facture.png') }}" class="img-fluid" loading="lazy" alt="{{ __('Gestion des ventes') }}">
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row align-items-center">
							<div class="col-lg-4">
								<div class="empowerment-page-info">
									<h3 class="mb-2">{{ __('Finance & comptabilité puissantes') }}</h3>
									<p>{{ __('La gestion financière implique la supervision des aspects financiers de votre organisation pour assurer sa santé financière.') }}</p>
									<ul class="inner-page-features">
										<li><i class="isax isax-tick-circle5"></i>{{ __('Dépenses & revenus') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Comptes bancaires') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Transferts entre comptes') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Catégories financières') }}</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="inner-tab-img">
									<img src="{{ url('assets/images/sass screenshots/rapport finance.png') }}" class="img-fluid" loading="lazy" alt="{{ __('Finance et comptabilité') }}">
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row align-items-center">
							<div class="col-lg-4">
								<div class="empowerment-page-info">
									<h3 class="mb-2">{{ __('Achats & gestion d\'inventaire') }}</h3>
									<p>{{ __('Gérez vos fournisseurs, bons de commande et niveaux de stock en temps réel depuis une interface centralisée.') }}</p>
									<ul class="inner-page-features">
										<li><i class="isax isax-tick-circle5"></i>{{ __('Bons de commande fournisseur') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Factures fournisseurs') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Paiements fournisseurs') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Notes de débit') }}</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="inner-tab-img">
									<img src="{{ url('assets/images/sass screenshots/gestion bon de commande.png') }}" class="img-fluid" loading="lazy" alt="{{ __('Achats et inventaire') }}">
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row align-items-center">
							<div class="col-lg-4">
								<div class="empowerment-page-info">
									<h3 class="mb-2">{{ __('Gestion complète des clients') }}</h3>
									<p>{{ __('Centralisez toutes les informations de vos clients : contacts, adresses, historique des transactions et rapports détaillés.') }}</p>
									<ul class="inner-page-features">
										<li><i class="isax isax-tick-circle5"></i>{{ __('Fiche client détaillée') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Historique des transactions') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Contacts & adresses') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Rapport clients') }}</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="inner-tab-img">
									<img src="{{ url('assets/images/sass screenshots/Gestion client.png') }}" class="img-fluid" loading="lazy" alt="{{ __('Gestion des clients') }}">
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row align-items-center">
							<div class="col-lg-4">
								<div class="empowerment-page-info">
									<h3 class="mb-2">{{ __('Mode sombre & personnalisation') }}</h3>
									<p>{{ __('Personnalisez l\'apparence de votre espace de travail avec le mode sombre, les thèmes de couleurs et les options d\'affichage avancées.') }}</p>
									<ul class="inner-page-features">
										<li><i class="isax isax-tick-circle5"></i>{{ __('Mode sombre intégré') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Thèmes de couleurs') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Personnalisation de l\'interface') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Modèles de factures personnalisables') }}</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="inner-tab-img">
									<img src="{{ url('assets/images/sass screenshots/darkmode.png') }}" class="img-fluid" loading="lazy" alt="{{ __('Mode sombre') }}">
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row align-items-center">
							<div class="col-lg-4">
								<div class="empowerment-page-info">
									<h3 class="mb-2">{{ __('Support multilingue complet') }}</h3>
									<p>{{ __('Utilisez la plateforme dans votre langue préférée avec un support complet du français et de l\'arabe, y compris la mise en page RTL.') }}</p>
									<ul class="inner-page-features">
										<li><i class="isax isax-tick-circle5"></i>{{ __('Interface en français') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Interface en arabe (RTL)') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Changement de langue instantané') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Documents PDF multilingues') }}</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="inner-tab-img">
									<img src="{{ url('assets/images/sass screenshots/multilang.png') }}" class="img-fluid" loading="lazy" alt="{{ __('Multilingue') }}">
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row align-items-center">
							<div class="col-lg-4">
								<div class="empowerment-page-info">
									<h3 class="mb-2">{{ __('Inventaire & gestion des stocks') }}</h3>
									<p>{{ __('Suivez vos stocks en temps réel : mouvements, transferts entre entrepôts, alertes de stock bas et historique complet.') }}</p>
									<ul class="inner-page-features">
										<li><i class="isax isax-tick-circle5"></i>{{ __('Produits & services') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Mouvements de stock') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Transferts entre entrepôts') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Historique du stock') }}</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="inner-tab-img">
									<img src="{{ url('assets/images/sass screenshots/Produits & Services.png') }}" class="img-fluid" loading="lazy" alt="{{ __('Inventaire & Stock') }}">
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row align-items-center">
							<div class="col-lg-4">
								<div class="empowerment-page-info">
									<h3 class="mb-2">{{ __('Rapports & analyses détaillées') }}</h3>
									<p>{{ __('Prenez des décisions éclairées grâce à des rapports complets : ventes, achats, finances, inventaire et performance clients.') }}</p>
									<ul class="inner-page-features">
										<li><i class="isax isax-tick-circle5"></i>{{ __('Rapport des ventes') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Rapport financier') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Rapport inventaire') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Rapport clients') }}</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="inner-tab-img">
									<img src="{{ url('assets/images/sass screenshots/rapport des ventes.png') }}" class="img-fluid" loading="lazy" alt="{{ __('Rapports & Analyses') }}">
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row align-items-center">
							<div class="col-lg-4">
								<div class="empowerment-page-info">
									<h3 class="mb-2">{{ __('Rôles & permissions granulaires') }}</h3>
									<p>{{ __('Définissez des rôles personnalisés et attribuez des permissions précises pour contrôler l\'accès de chaque utilisateur aux fonctionnalités.') }}</p>
									<ul class="inner-page-features">
										<li><i class="isax isax-tick-circle5"></i>{{ __('Rôles personnalisés') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Permissions granulaires') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Gestion des utilisateurs') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Contrôle d\'accès sécurisé') }}</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="inner-tab-img">
									<img src="{{ url('assets/images/sass screenshots/gestion roles et permission.png') }}" class="img-fluid" loading="lazy" alt="{{ __('Rôles & Permissions') }}">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				var carouselEl = document.getElementById('featuresCarouselPage');
				var bsCarousel = new bootstrap.Carousel(carouselEl);
				var tabs = document.querySelectorAll('#pills-tab-features .nav-link');

				// Click tab -> slide carousel
				tabs.forEach(function(tab) {
					tab.addEventListener('click', function() {
						var idx = parseInt(this.getAttribute('data-bs-slide-to'));
						bsCarousel.to(idx);
					});
				});

				// Carousel slide -> update active tab
				carouselEl.addEventListener('slide.bs.carousel', function(e) {
					tabs.forEach(function(t) { t.classList.remove('active'); });
					tabs[e.to].classList.add('active');
					// Scroll the active tab into view
					var wrapper = carouselEl.closest('.container').querySelector('.inner-tab-button-wrapper');
					var activeTab = tabs[e.to].closest('.nav-item');
					if (wrapper && activeTab) {
						var scrollLeft = activeTab.offsetLeft - (wrapper.clientWidth / 2) + (activeTab.offsetWidth / 2);
						wrapper.scrollTo({ left: Math.max(0, scrollLeft), behavior: 'smooth' });
					}
				});
			});
		</script>
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
					<p>{{ __('Création, envoi par email et suivi des factures. Plus de 64 modèles PDF personnalisables.') }}</p>
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
					<p>{{ __('Plus de 64 modèles de factures professionnels et personnalisables pour votre image de marque.') }}</p>
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
							<img loading="lazy" src="{{ url('assets/images/templates/invoice/model-1.png') }}" alt="{{ __('Facture') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Facture') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="700">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/quote/model-1.png') }}" alt="{{ __('Devis') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Devis') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="800">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/credit-note/model-1.png') }}" alt="{{ __('Avoir') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Avoir') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="900">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/purchase-order/model-1.png') }}" alt="{{ __('Bon de commande') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Bon de commande') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="1000">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/delivery-challan/model-1.png') }}" alt="{{ __('Bon de livraison') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Bon de livraison') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="1100">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/goods-receipt/model-1.png') }}" alt="{{ __('Bon de réception') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Bon de réception') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="1200">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/payment-receipt/model-1.png') }}" alt="{{ __('Reçu de paiement') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Reçu de paiement') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="1300">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/supplier-payment-receipt/model-1.png') }}" alt="{{ __('Reçu paiement fournisseur') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Reçu paiement fournisseur') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="1400">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/vendor-bill/model-1.png') }}" alt="{{ __('Facture fournisseur') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Facture fournisseur') }}</h6>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="1500">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/debit-note/model-1.png') }}" alt="{{ __('Note de débit') }}">
						</div>
						<div class="title-invoice">
							<h6>{{ __('Note de débit') }}</h6>
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
					<a href="{{ route('request-account') }}" class="btn btn-primary btn-lg d-inline-flex align-items-center">{{ __('Demander un accès gratuit') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
					<a href="{{ route('pricing') }}" class="btn btn-dark btn-lg d-inline-flex align-items-center">{{ __('Voir les tarifs') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /CTA Section -->

@endsection
