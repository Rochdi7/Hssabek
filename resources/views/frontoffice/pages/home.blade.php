@extends('frontoffice.layouts.app')

@section('title', __('Logiciel de Facturation en Ligne au Maroc — Factures & Devis IA'))
@section('meta_description', __('Logiciel de facturation électronique conforme DGI au Maroc. Créez factures et devis en 10 secondes grâce à l\'IA. Idéal auto-entrepreneurs, PME et grandes entreprises. Essai gratuit.'))
@section('meta_keywords', 'logiciel facturation maroc, logiciel de facturation maroc, logiciel facturation gratuit maroc, logiciel de facturation gratuit maroc, application de facturation gratuit, application facturation gratuite, application gratuite facture, application de facture gratuite, logiciel gestion commerciale maroc, logiciel de gestion commerciale maroc, facturation en ligne maroc, facturation électronique maroc, logiciel facturation auto entrepreneur maroc, devis en ligne maroc, facturation conforme DGI, meilleur logiciel facturation maroc, facture électronique DGI, hssabek, facturation ia, e-facturation maroc')
@section('og_type', 'website')

@section('structured_data')
<script type="application/ld+json">
{
	"@@context": "https://schema.org",
	"@@type": "SoftwareApplication",
	"name": "{{ config('app.name', 'Hssabek') }}",
	"applicationCategory": "BusinessApplication",
	"operatingSystem": "Web",
	"url": "{{ route('home') }}",
	"description": "Logiciel de facturation électronique conforme DGI au Maroc. Créez factures et devis en 10 secondes grâce à l'IA. Solution complète pour auto-entrepreneurs, PME et grandes entreprises.",
	"offers": {
		"@@type": "Offer",
		"price": "0",
		"priceCurrency": "MAD",
		"description": "Essai gratuit"
	},
	"featureList": [
		"Génération de factures par IA en 10 secondes",
		"Envoi automatique par email",
		"Gestion des devis et avoirs",
		"Suivi des chèques et prêts",
		"64+ modèles PDF professionnels",
		"Support français et arabe",
		"Gestion des stocks et inventaire",
		"Rapports et analyses détaillées"
	],
	"aggregateRating": {
		"@@type": "AggregateRating",
		"ratingValue": "4.8",
		"ratingCount": "112",
		"bestRating": "5"
	}
}
</script>
<script type="application/ld+json">
{
	"@@context": "https://schema.org",
	"@@type": "WebSite",
	"name": "{{ config('app.name', 'Hssabek') }}",
	"url": "{{ url('/') }}",
	"potentialAction": {
		"@@type": "SearchAction",
		"target": "{{ url('/faq') }}?q={search_term_string}",
		"query-input": "required name=search_term_string"
	}
}
</script>
@endsection

@section('hero')
<!-- Hero Section -->
<section class="hero-section" id="index">
	<div class="container banner-hero pe-lg-0">
		<div class="home-banner">
			<div class="row align-items-center">
				<div class="col-lg-7">
					<div class="banner-content pe-xl-5">
						<div class="banner-content" data-aos="fade-up">
							<span class="info-badge fw-medium mb-3">{{ __('L\'IA qui génère vos factures en 10 secondes') }}</span>
							<div class="banner-title">
								<h1 class="mb-2">{{ __('Vos factures & devis') }} <span class="head">{{ __('créés par l\'IA, envoyés automatiquement') }}</span></h1>
								<span class="banner-title-icon"><img src="{{ url('build/img/icons/title-icon.svg') }}" alt="Icône"></span>
							</div>
							<p class="fw-medium">{{ __('Pendant que vos concurrents perdent 2h par jour sur Excel, vous générez une facture en 10 secondes grâce à l\'IA. Envoi automatique, suivi des chèques et prêts, détection de fraude — le seul logiciel marocain qui pense à votre place.') }}</p>
							<div class="banner-wrap-btn">
								<div class="banner-btns d-flex">
									<a class="btn btn-dark btn-lg d-inline-flex align-items-center me-0" href="{{ route('request-account') }}">{{ __('Essayer gratuitement') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
								</div>
							</div>
							<ul class="banner-info-list">
								<li><i class="feather-check-circle"></i>{{ __('Génération IA en 10 secondes') }}</li>
								<li><i class="feather-check-circle"></i>{{ __('Envoi automatique par email') }}</li>
								<li><i class="feather-check-circle"></i>{{ __('Suivi chèques, prêts & fraude') }}</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="banner-img rounded-4">
						<img src="{{ url('assets/images/sass screenshots/dashboard.png') }}" class="img-fluid banner-main-img rounded-4 w-100" alt="Aperçu tableau de bord" fetchpriority="high" width="800" height="406">
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
			<span class="title-badge">{{ __('Pourquoi nous sommes différents') }}</span>
			<h2 class="mb-2">{{ __('Ce que les autres logiciels') }} <span>{{ __('ne font pas') }}</span></h2>
			<p class="fw-medium">{{ __('L\'IA intégrée génère vos documents en 10 secondes. Le suivi intelligent des chèques et prêts détecte les anomalies. L\'envoi automatique par email vous fait gagner 2h par jour. Aucun autre logiciel au Maroc ne fait tout ça.') }}</p>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6" data-aos="fade-up">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-01.svg') }}" alt="{{ __('Entreprises') }}">
					</div>
					<div class="app-content">
						<p class="h6 mb-1">{{ __('Génération IA ultra-rapide') }}</p>
						<p>{{ __('L\'intelligence artificielle remplit vos factures et devis automatiquement. 10 secondes au lieu de 10 minutes. Vos concurrents rêvent d\'aller aussi vite.') }}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-02.svg') }}" alt="{{ __('Suivi intelligent') }}">
					</div>
					<div class="app-content">
						<p class="h6 mb-1">{{ __('Détection de fraude & suivi') }}</p>
						<p>{{ __('Suivez chaque chèque, prêt et paiement en temps réel. Le système détecte automatiquement les anomalies et vous alerte avant qu\'il ne soit trop tard.') }}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-03.svg') }}" alt="{{ __('Automatisation') }}">
					</div>
					<div class="app-content">
						<p class="h6 mb-1">{{ __('Automatisation de l\'envoi & rappels') }}</p>
						<p>{{ __('Vos factures sont créées et envoyées automatiquement par email. Les rappels de paiement partent tout seuls. Vous ne courez plus après vos clients.') }}</p>
					</div>
				</div>
			</div>
		</div>
		<div class="invoice-saas-app">
			<div class="row align-items-center">
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
					<div class="app-demo-img pe-lg-5">
						<span><img src="{{ url('assets/images/sass screenshots/arabci dashboard 2.png') }}" class="img-fluid border border-dark rounded-4 border-5" loading="lazy" alt="Démo" width="800" height="403"></span>
						<span><img src="{{ url('assets/images/sass screenshots/dashboard.png') }}" class="img-fluid demo-img-one" loading="lazy" alt="Démo" width="800" height="406"></span>
					</div>
				</div>
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="700">
					<div class="saas-information">
						<div class="title-head">
							<h2 class="mb-2">{{ __('L\'IA qui remplace votre comptable du quotidien') }}</h2>
							<p>{{ __('Arrêtez de payer quelqu\'un pour taper des factures. L\'IA de') }} {{ config('app.name') }} {{ __('génère vos factures, devis et avoirs en 10 secondes. Elle remplit les lignes, calcule les taxes, applique les remises et envoie le PDF par email — automatiquement. Vous gardez le contrôle total sur chaque chèque, chaque prêt et chaque paiement. Le tableau de bord intelligent vous montre exactement où va votre argent.') }}</p>
						</div>
						<ul class="app-more-info">
							<li>
								<p class="h4"><span>112</span><sup>+</sup></p>
								<p>{{ __('Clients servis') }}</p>
							</li>
							<li class="active">
								<p class="h4"><span>64</span><sup>%</sup></p>
								<p>{{ __('Croissance engagement') }}</p>
							</li>
							<li>
								<p class="h4"><span>90</span><sup>%</sup></p>
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
			<img src="{{ url('build/img/bg/sec-bg-02.png') }}" class="vector-dot-one" alt="Bg" loading="lazy">
		</div>
		<div class="row">
			<div class="col-lg-4" data-aos="fade-up">
				<div class="software-sec-info">
					<div class="section-heading mb-4">
						<span class="title-badge fs-14">{{ __('Zéro formation, zéro prise de tête') }}</span>
						<h2>{{ __('Votre grand-mère pourrait l\'utiliser') }}</h2>
						<p>{{ __('Interface tellement simple que vous créez votre première facture en 2 minutes. En français ou en arabe, le logiciel s\'adapte à vous — pas l\'inverse.') }}</p>
					</div>
					<div class="section-btns">
						<div class="sec-btn">
							<a class="btn btn-lg btn-dark" href="{{ route('request-account') }}"><i class="isax isax-user me-2"></i>{{ __('Demander un accès') }}</a>
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
								<p class="h6 text-white mb-2">{{ __('Tableau de bord intelligent') }}</p>
								<p>{{ __('Voyez en un coup d\'œil vos ventes, dépenses, impayés et chèques en cours. Détectez les problèmes avant qu\'ils n\'arrivent.') }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
						<div class="management-types">
							<div class="mnaging-icon">
								<img src="{{ url('build/img/icons/management-icon-02.svg') }}" alt="{{ __('Gestion des abonnements') }}">
							</div>
							<div class="managing-info">
								<p class="h6 text-white mb-2">{{ __('Suivi des chèques & prêts') }}</p>
								<p>{{ __('Chaque chèque reçu ou émis est tracé. Chaque prêt est suivi avec ses échéances. Plus jamais de chèque oublié ou de prêt non remboursé.') }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="700">
						<div class="management-types">
							<div class="mnaging-icon">
								<img src="{{ url('build/img/icons/management-icon-03.svg') }}" alt="{{ __('Système de gestion de domaines') }}">
							</div>
							<div class="managing-info">
								<p class="h6 text-white mb-2">{{ __('Détection de fraude') }}</p>
								<p>{{ __('Le système analyse vos flux financiers et vous alerte en cas d\'anomalie : paiements en double, montants inhabituels ou écarts de caisse.') }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="800">
						<div class="management-types">
							<div class="mnaging-icon">
								<img src="{{ url('build/img/icons/management-icon-04.svg') }}" alt="{{ __('Gestion des utilisateurs') }}">
							</div>
							<div class="managing-info">
								<p class="h6 text-white mb-2">{{ __('IA de génération de documents') }}</p>
								<p>{{ __('L\'intelligence artificielle pré-remplit vos factures et devis. Sélectionnez le client, l\'IA fait le reste en 10 secondes. Rapide, précis, sans erreur.') }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="900">
						<div class="management-types">
							<div class="mnaging-icon">
								<img src="{{ url('build/img/icons/management-icon-05.svg') }}" alt="{{ __('Paramètres avancés') }}">
							</div>
							<div class="managing-info">
								<p class="h6 text-white mb-2">{{ __('64+ modèles personnalisables') }}</p>
								<p>{{ __('Choisissez parmi +64 modèles PDF pour chaque type de document. Besoin d\'un design unique ? On crée votre modèle sur mesure gratuitement.') }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="1000">
						<div class="management-types">
							<div class="mnaging-icon">
								<img src="{{ url('build/img/icons/management-icon-06.svg') }}" alt="{{ __('Abonnements & paiements') }}">
							</div>
							<div class="managing-info">
								<p class="h6 text-white mb-2">{{ __('Envoi automatique & rappels') }}</p>
								<p>{{ __('Vos factures partent par email toutes seules. Les rappels de paiement s\'envoient automatiquement. Vous ne courez plus après personne.') }}</p>
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
	<picture><source srcset="{{ url('build/img/icons/invoice-bg.webp') }}" type="image/webp"><img src="{{ url('build/img/icons/invoice-bg.png') }}" alt="bg" class="img-fluid invoice-bg1 d-none d-lg-flex" loading="lazy"></picture>
	<picture><source srcset="{{ url('build/img/icons/invoice-bg2.webp') }}" type="image/webp"><img src="{{ url('build/img/icons/invoice-bg2.png') }}" alt="bg" class="img-fluid invoice-bg2 d-none d-lg-flex" loading="lazy"></picture>
	<div class="container">
		<div class="section-heading" data-aos="fade-up">
			<span class="title-badge">{{ __('+64 modèles professionnels') }}</span>
			<h2>{{ __('Plus de 64 modèles de') }} <span>{{ __('factures, devis & documents') }}</span></h2>
			<p class="fw-medium">{{ __('Choisissez parmi +64 modèles PDF professionnels pour vos factures, devis, bons de livraison, avoirs et plus encore. Besoin d\'un modèle sur mesure ? Demandez-le gratuitement, nous le créons pour vous.') }}</p>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="invoive-temp-slider owl-carousel">
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="600">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/invoice/model-1.png') }}" alt="{{ __('Facture') }}" width="300" height="424">
						</div>
						<div class="title-invoice">
							<p class="h6 mb-0">{{ __('Facture') }}</p>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="700">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/quote/model-1.png') }}" alt="{{ __('Devis') }}" width="300" height="424">
						</div>
						<div class="title-invoice">
							<p class="h6 mb-0">{{ __('Devis') }}</p>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="800">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/credit-note/model-1.png') }}" alt="{{ __('Avoir') }}" width="300" height="424">
						</div>
						<div class="title-invoice">
							<p class="h6 mb-0">{{ __('Avoir') }}</p>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="900">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/purchase-order/model-1.png') }}" alt="{{ __('Bon de commande') }}" width="300" height="424">
						</div>
						<div class="title-invoice">
							<p class="h6 mb-0">{{ __('Bon de commande') }}</p>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="1000">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/delivery-challan/model-1.png') }}" alt="{{ __('Bon de livraison') }}" width="300" height="424">
						</div>
						<div class="title-invoice">
							<p class="h6 mb-0">{{ __('Bon de livraison') }}</p>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="1100">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/goods-receipt/model-1.png') }}" alt="{{ __('Bon de réception') }}" width="300" height="424">
						</div>
						<div class="title-invoice">
							<p class="h6 mb-0">{{ __('Bon de réception') }}</p>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="1200">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/payment-receipt/model-1.png') }}" alt="{{ __('Reçu de paiement') }}" width="300" height="424">
						</div>
						<div class="title-invoice">
							<p class="h6 mb-0">{{ __('Reçu de paiement') }}</p>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="1300">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/supplier-payment-receipt/model-1.png') }}" alt="{{ __('Reçu paiement fournisseur') }}" width="300" height="424">
						</div>
						<div class="title-invoice">
							<p class="h6 mb-0">{{ __('Reçu paiement fournisseur') }}</p>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="1400">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/vendor-bill/model-1.png') }}" alt="{{ __('Facture fournisseur') }}" width="300" height="424">
						</div>
						<div class="title-invoice">
							<p class="h6 mb-0">{{ __('Facture fournisseur') }}</p>
						</div>
					</div>
					<div class="general-invoice-list text-center" data-aos="fade-up" data-aos-delay="1500">
						<div class="invoice-img">
							<img loading="lazy" src="{{ url('assets/images/templates/debit-note/model-1.png') }}" alt="{{ __('Note de débit') }}" width="300" height="424">
						</div>
						<div class="title-invoice">
							<p class="h6 mb-0">{{ __('Note de débit') }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="start-bussiness">
			<div class="section-bg-img">
				<img src="{{ url('build/img/bg/sec-bg-16.svg') }}" class="sec-bg-vector-one d-none d-lg-flex" alt="Bg" loading="lazy">
				<img src="{{ url('build/img/bg/sec-bg-17.svg') }}" class="sec-bg-vector-two" alt="Bg" loading="lazy">
			</div>
			<div class="section-title" data-aos="fade-up">
				<h2 class="mb-2">{{ __('Gagnez du temps chaque jour') }}</h2>
				<p>{{ __('Arrêtez de perdre des heures sur la facturation manuelle.') }} {{ config('app.name') }} {{ __('automatise tout : génération de factures, envoi par email, suivi des paiements et rapports. Vos clients reçoivent des documents professionnels en quelques secondes.') }}
				</p>
			</div>
			<ul class="bussiness-info gap-3 flex-wrap" data-aos="fade-up">
				<li>
					<i class="fa-solid fa-circle-check text-success me-2"></i>
					{{ __('Facture créée en 10 secondes') }}
				</li>
				<li>
					<i class="fa-solid fa-circle-check text-success me-2"></i>
					{{ __('Envoi automatique par email') }}
				</li>
				<li>
					<i class="fa-solid fa-circle-check text-success me-2"></i>
					{{ __('+64 modèles PDF professionnels') }}
				</li>
			</ul>
		</div>
	</div>
</section>
<!-- /Invoice Template Section -->

<!-- Custom Template Section -->
<section class="saas-app-section">
	<div class="container">
		<div class="invoice-saas-app">
			<div class="row align-items-center">
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
					<div class="app-demo-img pe-lg-5">
						<span><img src="{{ url('assets/images/sass screenshots/management model.png') }}" class="img-fluid border border-dark rounded-4 border-5" loading="lazy" alt="{{ __('+64 modèles') }}" width="800" height="407"></span>
						<span><img src="{{ url('assets/images/sass screenshots/gestion model facture.png') }}" class="img-fluid demo-img-one" loading="lazy" alt="{{ __('Gestion des modèles') }}" width="800" height="406"></span>
					</div>
				</div>
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="700">
					<div class="saas-information">
						<div class="title-head">
							<h2 class="mb-2">{{ __('+64 modèles professionnels prêts à l\'emploi') }}</h2>
							<p>{{ __('Factures, devis, bons de livraison, avoirs, bons de commande, reçus de paiement — chaque type de document dispose de plusieurs modèles élégants et professionnels. Choisissez celui qui correspond à votre image de marque en un clic.') }}</p>
						</div>
						<ul class="app-more-info">
							<li>
								<p class="h4"><span>64</span><sup>+</sup></p>
								<p>{{ __('Modèles disponibles') }}</p>
							</li>
							<li class="active">
								<p class="h4"><span>10</span></p>
								<p>{{ __('Types de documents') }}</p>
							</li>
							<li>
								<p class="h4">{{ __('Gratuit') }}</p>
								<p>{{ __('Modèle sur mesure') }}</p>
							</li>
						</ul>
						<div class="mt-4">
							<p class="fw-bold mb-2"><i class="fa-solid fa-gift text-primary me-2"></i>{{ __('Besoin d\'un modèle personnalisé ?') }}</p>
							<p>{{ __('Demandez votre modèle sur mesure gratuitement. Notre équipe le crée spécialement pour votre entreprise avec votre logo, vos couleurs et votre mise en page.') }}</p>
							<a class="btn btn-dark btn-lg d-inline-flex align-items-center mt-3" href="{{ route('request-account') }}">{{ __('Demander un modèle gratuit') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Custom Template Section -->

<!-- User Empowerment Section -->
<section class="user-empowerment-sec" style="overflow-x: clip;" id="features">
	<div class="container">
		<div class="sec-bg-img">
			<picture><source srcset="{{ url('build/img/bg/sec-bg-06.webp') }}" type="image/webp"><img src="{{ url('build/img/bg/sec-bg-06.png') }}" class="vector-bg-one" alt="Bg" loading="lazy"></picture>
			<picture><source srcset="{{ url('build/img/bg/sec-bg-07.webp') }}" type="image/webp"><img src="{{ url('build/img/bg/sec-bg-07.png') }}" class="vector-bg-two" alt="Bg" loading="lazy"></picture>
			<img src="{{ url('build/img/bg/sec-bg-08.png') }}" class="vector-bg-three" alt="Bg" loading="lazy">
		</div>
		<div class="section-heading" data-aos="fade-up" data-aos-delay="500">
			<span class="title-badge fs-14 mb-3">{{ __('Des fonctionnalités qui dépassent vos attentes') }}</span>
			<h2 class="mb-2">{{ __('Autonomisation des utilisateurs grâce à des') }} <span>{{ __('expériences personnalisées.') }}</span></h2>
			<p class="fw-medium">{{ __('Une gestion commerciale efficace est essentielle au succès d\'une entreprise, car elle impacte directement la génération de revenus et la satisfaction client.') }}</p>
		</div>
		<div class="inner-tab-button-wrapper" style="overflow-x:auto;-webkit-overflow-scrolling:touch;scrollbar-width:none;-ms-overflow-style:none;">
		<style>.inner-tab-button-wrapper::-webkit-scrollbar{display:none;}</style>
		<ul class="nav nav-pills inner-tab-button aos" id="pills-tab" role="tablist" data-aos="fade-up" style="flex-wrap:nowrap;min-width:max-content;">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" data-bs-slide-to="0" type="button" role="tab"><span>{{ __('Gestion des ventes') }}</span>{{ __('Superviser l\'équipe commerciale et le processus de vente') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="1" type="button" role="tab"><span>{{ __('Finance & Comptabilité') }}</span>{{ __('Superviser les rapports financiers et les analyses') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="2" type="button" role="tab"><span>{{ __('Devis & Livraisons') }}</span>{{ __('Suivi des prospects et formalisation des offres') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="3" type="button" role="tab"><span>{{ __('Achats & Fournisseurs') }}</span>{{ __('Gérer les achats et les relations fournisseurs') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="4" type="button" role="tab"><span>{{ __('Gestion des clients') }}</span>{{ __('Suivi complet de la relation client') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="5" type="button" role="tab"><span>{{ __('Mode sombre & Apparence') }}</span>{{ __('Personnaliser l\'interface selon vos préférences') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="6" type="button" role="tab"><span>{{ __('Multilingue') }}</span>{{ __('Support complet français et arabe') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="7" type="button" role="tab"><span>{{ __('Inventaire & Stock') }}</span>{{ __('Gestion complète des stocks et entrepôts') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="8" type="button" role="tab"><span>{{ __('Rapports & Analyses') }}</span>{{ __('Tableaux de bord et rapports détaillés') }}</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" data-bs-slide-to="9" type="button" role="tab"><span>{{ __('Rôles & Permissions') }}</span>{{ __('Contrôle d\'accès granulaire par utilisateur') }}</button>
			</li>
		</ul>
		</div>
		<div id="featuresCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
			<div class="position-relative">
				<button class="btn btn-primary rounded-circle position-absolute top-50 translate-middle-y d-none d-md-flex align-items-center justify-content-center" type="button" data-bs-target="#featuresCarousel" data-bs-slide="prev" aria-label="Précédent" style="width:44px;height:44px;left:-22px;z-index:10;box-shadow:0 2px 8px rgba(0,0,0,.15);">
					<i class="isax isax-arrow-left-2" style="font-size:20px;"></i>
				</button>
				<button class="btn btn-primary rounded-circle position-absolute top-50 translate-middle-y d-none d-md-flex align-items-center justify-content-center" type="button" data-bs-target="#featuresCarousel" data-bs-slide="next" aria-label="Suivant" style="width:44px;height:44px;right:-22px;z-index:10;box-shadow:0 2px 8px rgba(0,0,0,.15);">
					<i class="isax isax-arrow-right-3" style="font-size:20px;"></i>
				</button>
				<div class="d-flex d-md-none justify-content-center gap-3 mb-3">
					<button class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" type="button" data-bs-target="#featuresCarousel" data-bs-slide="prev" aria-label="Précédent" style="width:40px;height:40px;">
						<i class="isax isax-arrow-left-2" style="font-size:18px;"></i>
					</button>
					<button class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" type="button" data-bs-target="#featuresCarousel" data-bs-slide="next" aria-label="Suivant" style="width:40px;height:40px;">
						<i class="isax isax-arrow-right-3" style="font-size:18px;"></i>
					</button>
				</div>
				<div class="carousel-inner inner-tab-items">
					<div class="carousel-item active">
						<div class="row align-items-center">
							<div class="col-lg-4">
								<div class="empowerment-page-info">
									<h3 class="mb-2">{{ __('Systèmes avancés de gestion des ventes') }}</h3>
									<p>{{ __('Cela implique la supervision de l\'équipe commerciale, la définition des objectifs de vente, le développement de stratégies pour les atteindre et le suivi des performances de l\'équipe.') }}</p>
									<ul class="inner-page-features">
										<li><i class="isax isax-tick-circle5"></i>{{ __('Liste des factures') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Création de facture') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Avoirs & remboursements') }}</li>
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
									<p>{{ __('La gestion financière et comptable implique la supervision des aspects financiers d\'une organisation pour assurer sa santé financière.') }}</p>
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
									<img src="{{ url('assets/images/sass screenshots/rapport finance.png') }}" class="img-fluid" loading="lazy" alt="{{ __('Finance & Comptabilité') }}">
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row align-items-center">
							<div class="col-lg-4">
								<div class="empowerment-page-info">
									<h3 class="mb-2">{{ __('Gestion des devis & bons de livraison') }}</h3>
									<p>{{ __('Créez et envoyez des devis professionnels, convertissez-les en factures et suivez vos livraisons en temps réel.') }}</p>
									<ul class="inner-page-features">
										<li><i class="isax isax-tick-circle5"></i>{{ __('Création de devis') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Conversion devis en facture') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Bons de livraison') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Bons de réception') }}</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="inner-tab-img">
									<img src="{{ url('assets/images/sass screenshots/gestion devis.png') }}" class="img-fluid" loading="lazy" alt="{{ __('Devis & Livraisons') }}">
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row align-items-center">
							<div class="col-lg-4">
								<div class="empowerment-page-info">
									<h3 class="mb-2">{{ __('Achats & gestion des fournisseurs') }}</h3>
									<p>{{ __('Gérez l\'ensemble du cycle d\'achat : bons de commande, factures fournisseurs, paiements et notes de débit.') }}</p>
									<ul class="inner-page-features">
										<li><i class="isax isax-tick-circle5"></i>{{ __('Bons de commande') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Factures fournisseurs') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Paiements fournisseurs') }}</li>
										<li><i class="isax isax-tick-circle5"></i>{{ __('Notes de débit') }}</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="inner-tab-img">
									<img src="{{ url('assets/images/sass screenshots/gestion bon de commande.png') }}" class="img-fluid" loading="lazy" alt="{{ __('Achats & Fournisseurs') }}">
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
				var carouselEl = document.getElementById('featuresCarousel');
				var bsCarousel = new bootstrap.Carousel(carouselEl);
				var tabs = document.querySelectorAll('#pills-tab .nav-link');

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
					var wrapper = document.querySelector('.inner-tab-button-wrapper');
					var activeTab = tabs[e.to].closest('.nav-item');
					if (wrapper && activeTab) {
						var wrapperRect = wrapper.getBoundingClientRect();
						var tabRect = activeTab.getBoundingClientRect();
						if (tabRect.left < wrapperRect.left || tabRect.right > wrapperRect.right) {
							var scrollLeft = activeTab.offsetLeft - (wrapper.clientWidth / 2) + (activeTab.offsetWidth / 2);
							wrapper.scrollTo({ left: Math.max(0, scrollLeft), behavior: 'smooth' });
						}
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
			<span class="title-badge">{{ __('Tout est inclus') }}</span>
			<h2 class="mb-2">{{ __('Un logiciel complet,') }} <span>{{ __('pas un jouet') }}</span></h2>
			<p class="fw-medium">{{ __('Chaque module est pensé pour les entreprises marocaines. De la facturation au suivi des chèques, de l\'inventaire à la détection de fraude — tout est là, sans supplément.') }}</p>
		</div>
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="200">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-01.svg') }}" alt="{{ __('Client') }}">
					</div>
					<p class="h6 mb-2">{{ __('Clients & CRM') }}</p>
					<p>{{ __('Fiche client complète, historique des achats, suivi des impayés. Vous savez exactement qui vous doit quoi.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="300">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-02.svg') }}" alt="{{ __('Fournisseur') }}">
					</div>
					<p class="h6 mb-2">{{ __('Fournisseurs') }}</p>
					<p>{{ __('Gérez vos fournisseurs, leurs factures et paiements. Suivez qui vous devez payer et quand.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="400">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-03.svg') }}" alt="{{ __('Produit') }}">
					</div>
					<p class="h6 mb-2">{{ __('Produits & Services') }}</p>
					<p>{{ __('Catalogue complet avec prix d\'achat, prix de vente et marges calculées automatiquement.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="500">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-04.svg') }}" alt="{{ __('Inventaire') }}">
					</div>
					<p class="h6 mb-2">{{ __('Stock & Entrepôts') }}</p>
					<p>{{ __('Stock en temps réel, multi-entrepôts, alertes de stock bas et transferts. Vous ne vendez plus ce que vous n\'avez pas.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="600">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-05.svg') }}" alt="{{ __('Facture') }}">
					</div>
					<p class="h6 mb-2">{{ __('Factures IA') }}</p>
					<p>{{ __('L\'IA génère votre facture en 10 secondes. PDF professionnel, envoi automatique et rappels intégrés.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="700">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-06.svg') }}" alt="{{ __('Retour de vente') }}">
					</div>
					<p class="h6 mb-2">{{ __('Avoirs & Remboursements') }}</p>
					<p>{{ __('Avoirs et remboursements en un clic. Le stock se met à jour automatiquement, les comptes aussi.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="800">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-07.svg') }}" alt="{{ __('Bon de commande') }}">
					</div>
					<p class="h6 mb-2">{{ __('Bons de commande') }}</p>
					<p>{{ __('Créez vos BC en quelques clics, convertissez-les en factures et suivez la réception des marchandises.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="900">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-08.svg') }}" alt="{{ __('Achat') }}">
					</div>
					<p class="h6 mb-2">{{ __('Achats intelligents') }}</p>
					<p>{{ __('Centralisez vos achats : commandes fournisseurs, réceptions, factures et paiements. Tout est lié automatiquement.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="1000">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-09.svg') }}" alt="{{ __('Retour d\'achat') }}">
					</div>
					<p class="h6 mb-2">{{ __('Notes de débit') }}</p>
					<p>{{ __('Gérez les retours fournisseurs et réclamations. Stock et comptabilité se mettent à jour en temps réel.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="1100">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-10.svg') }}" alt="{{ __('Dépenses') }}">
					</div>
					<p class="h6 mb-2">{{ __('Suivi des dépenses') }}</p>
					<p>{{ __('Catégorisez et suivez chaque dirham dépensé. Détectez les anomalies et optimisez vos coûts.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="1200">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-11.svg') }}" alt="{{ __('Devis') }}">
					</div>
					<p class="h6 mb-2">{{ __('Devis IA') }}</p>
					<p>{{ __('Générez des devis professionnels par IA, envoyez-les en un clic et convertissez-les en factures instantanément.') }}</p>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="1300">
				<div class="module-card">
					<div class="module-icon">
						<img src="{{ url('build/img/icons/module-icon-12.svg') }}" alt="{{ __('Bon de livraison') }}">
					</div>
					<p class="h6 mb-2">{{ __('Bons de livraison') }}</p>
					<p>{{ __('Suivez chaque livraison avec preuve de réception. Liez vos BL aux factures pour une traçabilité totale.') }}</p>
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
			<img src="{{ url('build/img/icons/pricing-bg-01.svg') }}" class="pricing-bg-one d-none d-lg-flex" alt="Bg" loading="lazy">
			<img src="{{ url('build/img/bg/sec-bg-10.png') }}" class="pricing-bg-two" alt="Bg" loading="lazy">
		</div>
		<div class="section-heading">
			<span class="title-badge bg-white">{{ __('Offre unique') }}</span>
			<h2>{{ __('Un seul prix,') }} <span>{{ __('toutes les fonctionnalités. À vie.') }}</span></h2>
			<p class="fw-medium">{{ __('Pas d\'abonnement mensuel, pas de frais cachés. Payez une seule fois et utilisez') }} {{ config('app.name') }} {{ __('pour toujours. Toutes les mises à jour incluses.') }}</p>
		</div>
		<div class="row justify-content-center">
			<div class="col-xl-5 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="500">
				<div class="packages-card">
					<div class="package-header d-flex justify-content-between">
						<div class="d-flex justify-content-between w-100">
							<div>
								<p class="h6 mb-0">{{ __('Essai gratuit') }}</p>
								<p class="h4 mb-0">{{ __('Découverte') }}</p>
							</div>
							<span class="icon-frame d-flex align-items-center justify-content-center"><img src="{{ url('build/img/icons/price-01.svg') }}" alt="icône"></span>
						</div>
					</div>
					<p>{{ __('Testez toutes les fonctionnalités pendant 7 jours. Créez vos premières factures et devis gratuitement.') }}</p>
					<span class="plan-price">{{ __('Gratuit') }}</span>
					<p class="h5">{{ __('Ce qui est inclus') }}</p>
					<ul class="plan-features">
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Toutes les fonctionnalités') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('7 jours d\'accès complet') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Aucune carte bancaire requise') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Support par email') }}</li>
					</ul>
					<div class="package-btn">
						<a class="btn btn-dark btn-lg d-inline-flex align-items-center justify-content-center" href="{{ route('request-account') }}">{{ __('Commencer l\'essai gratuit') }} <i class="isax isax-arrow-right-3 ms-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xl-5 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="600">
				<div class="packages-card" style="border: 2px solid #7f56ff;">
					<div class="package-header d-flex justify-content-between">
						<div class="d-flex justify-content-between w-100">
							<div>
								<p class="h6 mb-0">{{ __('Paiement unique — à vie') }}</p>
								<p class="h4 mb-0">{{ __('Professionnel') }}</p>
							</div>
							<span class="icon-frame d-flex align-items-center justify-content-center"><img src="{{ url('build/img/icons/price-04.svg') }}" alt="icône"></span>
						</div>
					</div>
					<p>{{ __('Accès illimité et permanent à toutes les fonctionnalités. Mises à jour incluses à vie. Zéro abonnement.') }}</p>
					<span class="plan-price">399 DH</span>
					<p class="h5">{{ __('Tout est inclus') }}</p>
					<ul class="plan-features">
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Utilisateurs illimités') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Factures, devis & avoirs illimités') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Clients & fournisseurs illimités') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Produits & stock illimités') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('+64 modèles PDF professionnels') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Envoi automatique par email') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Rapports & tableaux de bord') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Mode sombre & multilingue (FR/AR)') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Rôles & permissions avancés') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Mises à jour à vie') }}</li>
						<li><i class="fa-solid fa-circle-check"></i>{{ __('Support prioritaire') }}</li>
					</ul>
					<div class="package-btn">
						<a class="btn btn-primary btn-lg d-inline-flex align-items-center justify-content-center" href="{{ route('request-account') }}">{{ __('Obtenir l\'accès à vie') }} <i class="isax isax-arrow-right-3 ms-2"></i></a>
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
			<img src="{{ url('build/img/bg/sec-bg-11.png') }}" class="faq-bg-one" alt="Bg" loading="lazy">
			<picture><source srcset="{{ url('build/img/bg/sec-bg-12.webp') }}" type="image/webp"><img src="{{ url('build/img/bg/sec-bg-12.png') }}" class="faq-bg-two" alt="Bg" loading="lazy"></picture>
			<picture><source srcset="{{ url('build/img/bg/sec-bg-13.webp') }}" type="image/webp"><img src="{{ url('build/img/bg/sec-bg-13.png') }}" class="faq-bg-three" alt="Bg" loading="lazy"></picture>
			<img src="{{ url('build/img/icons/faq-bg.svg') }}" class="faq-bg-four" alt="Bg" loading="lazy">
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
							<p>{{ __('Oui ! Demandez votre accès gratuit et testez toutes les fonctionnalités pendant 7 jours. Aucune carte bancaire requise. Vous pourrez ensuite passer à l\'offre à vie pour seulement 399 DH.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#faqtwo" aria-expanded="false">{{ __('Pourquoi un paiement unique et pas un abonnement ?') }}</a>
						</h4>
						<div id="faqtwo" class="card-collapse collapse" data-bs-parent="#accordionExample">
							<p>{{ __('Nous croyons en la simplicité. Payez une seule fois 399 DH et utilisez le logiciel pour toujours. Pas de surprise, pas de renouvellement automatique. Toutes les mises à jour futures sont incluses.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#faqthree" aria-expanded="false">{{ __('Est-ce que c\'est vraiment facile à utiliser ?') }}</a>
						</h4>
						<div id="faqthree" class="card-collapse collapse" data-bs-parent="#accordionExample">
							<p>{{ __('Absolument ! L\'interface est conçue pour être intuitive. Créez votre première facture en moins de 10 secondes. Aucune formation nécessaire. Et si vous avez besoin d\'aide, notre support est là pour vous.') }}</p>
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
							<a class="collapsed" data-bs-toggle="collapse" href="#faqfive" aria-expanded="false">{{ __('Comment fonctionne l\'envoi automatique ?') }}</a>
						</h4>
						<div id="faqfive" class="card-collapse collapse" data-bs-parent="#accordionExample">
							<p>{{ __('Dès qu\'une facture ou un devis est prêt, vous pouvez l\'envoyer directement par email à votre client en un clic. Le PDF professionnel est généré automatiquement avec votre logo et vos informations.') }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="connect-with-us">
			<div class="section-title text-center" data-aos="fade-up">
				<h2 class="mb-2">{{ __('Prêt à automatiser votre facturation ?') }}</h2>
				<p class="mx-auto">{{ __('Rejoignez les entreprises qui gagnent du temps chaque jour grâce à') }} {{ config('app.name') }}. {{ __('Créez votre première facture en 10 secondes.') }}</p>
				<a href="{{ route('request-account') }}" class="btn btn-primary btn-lg d-inline-flex align-items-center">{{ __('Demander un accès gratuit') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
			</div>
		</div>
	</div>
</section>
<!-- /Faq Section -->

@endsection
