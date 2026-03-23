@extends('frontoffice.layouts.app')

@section('title', __('Application Gratuite Facture Auto-Entrepreneur Maroc — Hssabek'))
@section('meta_description', __('Application de facturation gratuite pour auto-entrepreneurs au Maroc. Créez vos factures et devis en 10 secondes grâce à l\'IA. Conforme DGI, sans installation, essai gratuit.'))
@section('meta_keywords', 'application gratuite facture auto entrepreneur, application facture auto entrepreneur gratuit, logiciel facturation auto entrepreneur maroc, application de facturation gratuit, application facturation gratuite, application pour devis et facture gratuit, application pour faire des factures gratuit, meilleur application de facturation gratuit, logiciel facturation maroc gratuit, facturation auto entrepreneur maroc, auto entrepreneur maroc facture, facture auto entrepreneur gratuit')
@section('og_type', 'website')

@section('structured_data')
<script type="application/ld+json">
{
	"@@context": "https://schema.org",
	"@@type": "SoftwareApplication",
	"name": "{{ config('app.name', 'Hssabek') }}",
	"applicationCategory": "BusinessApplication",
	"operatingSystem": "Web",
	"url": "{{ route('auto-entrepreneur') }}",
	"description": "Application de facturation gratuite pour auto-entrepreneurs au Maroc. Créez factures et devis en 10 secondes grâce à l'IA. Conforme DGI.",
	"offers": {
		"@@type": "Offer",
		"price": "0",
		"priceCurrency": "MAD",
		"description": "Gratuit pour auto-entrepreneurs"
	},
	"featureList": [
		"Facturation gratuite auto-entrepreneur",
		"Génération de factures par IA en 10 secondes",
		"Devis professionnels en un clic",
		"Envoi automatique par email",
		"64+ modèles PDF professionnels",
		"Conforme DGI Maroc",
		"Support français et arabe"
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
	"@@type": "BreadcrumbList",
	"itemListElement": [
		{"@@type": "ListItem", "position": 1, "name": "Accueil", "item": "{{ route('home') }}"},
		{"@@type": "ListItem", "position": 2, "name": "Auto-Entrepreneur"}
	]
}
</script>
<script type="application/ld+json">
{
	"@@context": "https://schema.org",
	"@@type": "FAQPage",
	"mainEntity": [
		{
			"@@type": "Question",
			"name": "Hssabek est-il gratuit pour les auto-entrepreneurs ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "Oui, Hssabek propose un plan gratuit adapté aux auto-entrepreneurs qui démarrent. Vous pouvez créer vos factures et devis sans payer, sans carte bancaire."
			}
		},
		{
			"@@type": "Question",
			"name": "Comment créer une facture auto-entrepreneur au Maroc ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "Avec Hssabek, vous créez votre facture en 10 secondes : ajoutez votre client, vos prestations, et l'IA génère le PDF automatiquement. Vous pouvez l'envoyer par email directement depuis l'application."
			}
		},
		{
			"@@type": "Question",
			"name": "L'application est-elle conforme à la réglementation marocaine DGI ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "Oui, Hssabek est conforme aux exigences de la Direction Générale des Impôts (DGI) du Maroc pour la facturation électronique."
			}
		},
		{
			"@@type": "Question",
			"name": "Dois-je installer un logiciel sur mon ordinateur ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "Non. Hssabek est une application web 100% en ligne. Aucune installation requise. Fonctionne sur ordinateur, tablette et mobile."
			}
		}
	]
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
							<span class="info-badge fw-medium mb-3">{{ __('Application gratuite pour auto-entrepreneurs au Maroc') }}</span>
							<div class="banner-title">
								<h1 class="mb-2">{{ __('Factures & devis gratuits pour') }} <span class="head">{{ __('auto-entrepreneurs marocains') }}</span></h1>
								<span class="banner-title-icon"><img src="{{ url('build/img/icons/title-icon.svg') }}" alt="Icône"></span>
							</div>
							<p class="fw-medium">{{ __('Créez vos factures professionnelles en 10 secondes grâce à l\'IA. Envoi automatique par email, modèles PDF conformes DGI, gestion des devis — 100% gratuit pour démarrer. Aucune installation, aucune carte bancaire.') }}</p>
							<div class="banner-wrap-btn">
								<div class="banner-btns d-flex">
									<a class="btn btn-dark btn-lg d-inline-flex align-items-center me-0" href="{{ route('request-account') }}">{{ __('Commencer gratuitement') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
								</div>
							</div>
							<ul class="banner-info-list">
								<li><i class="feather-check-circle"></i>{{ __('Gratuit pour commencer') }}</li>
								<li><i class="feather-check-circle"></i>{{ __('Facture en 10 secondes avec l\'IA') }}</li>
								<li><i class="feather-check-circle"></i>{{ __('Conforme DGI Maroc') }}</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="banner-img rounded-4">
						<img src="{{ url('assets/images/sass screenshots/dashboard.png') }}" class="img-fluid banner-main-img rounded-4 w-100" alt="Application facturation auto-entrepreneur Maroc" fetchpriority="high" width="800" height="406">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Hero Section -->
@endsection

@section('content')

<!-- Pourquoi Section -->
<section class="saas-app-section">
	<div class="container">
		<div class="section-heading aos" data-aos="fade-up">
			<span class="title-badge">{{ __('Fait pour les auto-entrepreneurs') }}</span>
			<h2 class="mb-2">{{ __('Tout ce dont un') }} <span>{{ __('auto-entrepreneur a besoin') }}</span></h2>
			<p class="fw-medium">{{ __('En tant qu\'auto-entrepreneur, vous n\'avez pas besoin d\'un logiciel compliqué. Hssabek vous donne exactement ce qu\'il faut : factures rapides, devis professionnels, suivi des paiements — sans prise de tête.') }}</p>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6" data-aos="fade-up">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-01.svg') }}" alt="{{ __('Factures rapides') }}">
					</div>
					<div class="app-content">
						<p class="h6 mb-1">{{ __('Factures en 10 secondes') }}</p>
						<p>{{ __('L\'IA génère votre facture automatiquement dès que vous ajoutez un client et une prestation. Fini les heures perdues sur Excel ou Word.') }}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-02.svg') }}" alt="{{ __('Devis professionnels') }}">
					</div>
					<div class="app-content">
						<p class="h6 mb-1">{{ __('Devis professionnels en un clic') }}</p>
						<p>{{ __('Envoyez des devis qui inspirent confiance. Transformez-les en factures en un clic quand le client accepte. Aucune ressaisie.') }}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-03.svg') }}" alt="{{ __('Suivi paiements') }}">
					</div>
					<div class="app-content">
						<p class="h6 mb-1">{{ __('Suivi des paiements automatique') }}</p>
						<p>{{ __('Sachez toujours qui vous doit quoi. Les rappels de paiement partent automatiquement — vous arrêtez de courir après vos clients.') }}</p>
					</div>
				</div>
			</div>
		</div>

		<div class="invoice-saas-app">
			<div class="row align-items-center">
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
					<div class="app-demo-img pe-lg-5">
						<span><img src="{{ url('assets/images/sass screenshots/arabci dashboard 2.png') }}" class="img-fluid border border-dark rounded-4 border-5" loading="lazy" alt="Application facturation auto-entrepreneur" width="800" height="403"></span>
						<span><img src="{{ url('assets/images/sass screenshots/dashboard.png') }}" class="img-fluid demo-img-one" loading="lazy" alt="Tableau de bord auto-entrepreneur" width="800" height="406"></span>
					</div>
				</div>
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="700">
					<div class="saas-information">
						<div class="title-head">
							<h2 class="mb-2">{{ __('L\'application de facturation gratuite pensée pour l\'auto-entrepreneur marocain') }}</h2>
							<p>{{ __('Vous êtes auto-entrepreneur au Maroc : consultant, freelance, artisan, commerçant. Vous devez émettre des factures conformes, suivre vos encaissements, et garder une trace de vos devis. Hssabek fait tout ça — gratuitement — en français ou en arabe, depuis n\'importe quel appareil.') }}</p>
						</div>
						<ul class="app-more-info">
							<li>
								<p class="h4"><span>100</span><sup>%</sup></p>
								<p>{{ __('Gratuit pour démarrer') }}</p>
							</li>
							<li class="active">
								<p class="h4"><span>10</span><sup>s</sup></p>
								<p>{{ __('Par facture avec l\'IA') }}</p>
							</li>
							<li>
								<p class="h4"><span>64</span><sup>+</sup></p>
								<p>{{ __('Modèles PDF') }}</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Fonctionnalités clés auto-entrepreneur -->
<section class="software-dev-section" id="features">
	<div class="container">
		<div class="sec-bg-img">
			<img src="{{ url('build/img/bg/sec-bg-02.png') }}" class="vector-dot-one" alt="Bg" loading="lazy">
		</div>
		<div class="row">
			<div class="col-lg-4" data-aos="fade-up">
				<div class="software-sec-info">
					<div class="section-heading mb-4">
						<span class="title-badge fs-14">{{ __('Simple & rapide') }}</span>
						<h2>{{ __('Prêt en 2 minutes, pas en 2 heures') }}</h2>
						<p>{{ __('Aucune formation, aucune configuration complexe. Créez votre compte, ajoutez votre logo et votre numéro ICE, et émettez votre première facture. C\'est vraiment aussi simple.') }}</p>
					</div>
					<div class="section-btns">
						<div class="sec-btn">
							<a class="btn btn-lg btn-dark" href="{{ route('request-account') }}"><i class="isax isax-user me-2"></i>{{ __('Commencer gratuitement') }}</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="row">
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
						<div class="app-card">
							<div class="app-icon">
								<img src="{{ url('build/img/icons/app-icon-01.svg') }}" alt="{{ __('Factures conformes DGI') }}">
							</div>
							<div class="app-content">
								<p class="h6 mb-1">{{ __('Factures conformes DGI') }}</p>
								<p>{{ __('Numérotation séquentielle, mentions légales obligatoires, ICE, TVA — tout est automatiquement inclus et conforme à la réglementation marocaine.') }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
						<div class="app-card">
							<div class="app-icon">
								<img src="{{ url('build/img/icons/app-icon-02.svg') }}" alt="{{ __('64+ modèles PDF') }}">
							</div>
							<div class="app-content">
								<p class="h6 mb-1">{{ __('64+ modèles PDF professionnels') }}</p>
								<p>{{ __('Choisissez parmi plus de 64 modèles de factures et devis professionnels. Personnalisez avec votre logo, vos couleurs, votre signature.') }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
						<div class="app-card">
							<div class="app-icon">
								<img src="{{ url('build/img/icons/app-icon-03.svg') }}" alt="{{ __('Envoi par email') }}">
							</div>
							<div class="app-content">
								<p class="h6 mb-1">{{ __('Envoi direct par email') }}</p>
								<p>{{ __('Envoyez vos factures et devis directement depuis l\'application par email. Vos clients reçoivent un PDF professionnel en quelques secondes.') }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
						<div class="app-card">
							<div class="app-icon">
								<img src="{{ url('build/img/icons/app-icon-01.svg') }}" alt="{{ __('Devis vers facture') }}">
							</div>
							<div class="app-content">
								<p class="h6 mb-1">{{ __('Devis → Facture en 1 clic') }}</p>
								<p>{{ __('Votre client accepte le devis ? Convertissez-le en facture en un seul clic. Les données sont recopiées automatiquement, sans resaisie.') }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
	<div class="container">
		<div class="section-heading text-center aos" data-aos="fade-up">
			<span class="title-badge">{{ __('Questions fréquentes') }}</span>
			<h2 class="mb-2">{{ __('Tout ce que l\'auto-entrepreneur') }} <span>{{ __('doit savoir') }}</span></h2>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="accordion faq-accordion" id="faqAccordion" data-aos="fade-up">
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
								{{ __('Hssabek est-il vraiment gratuit pour les auto-entrepreneurs ?') }}
							</button>
						</h3>
						<div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
							<div class="accordion-body">
								{{ __('Oui. Hssabek propose un plan gratuit sans limitation de durée pour les auto-entrepreneurs qui démarrent. Aucune carte bancaire requise. Vous pouvez créer vos premières factures et devis sans dépenser un dirham.') }}
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
								{{ __('Comment créer ma première facture ?') }}
							</button>
						</h3>
						<div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
							<div class="accordion-body">
								{{ __('C\'est simple : créez votre compte, ajoutez votre client, entrez vos prestations et cliquez sur "Générer". L\'IA remplit la facture en 10 secondes. Vous pouvez ensuite la télécharger en PDF ou l\'envoyer directement par email.') }}
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
								{{ __('Mes factures sont-elles conformes à la DGI ?') }}
							</button>
						</h3>
						<div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
							<div class="accordion-body">
								{{ __('Oui. Toutes les factures générées par Hssabek incluent les mentions légales obligatoires au Maroc : numérotation séquentielle, ICE, IF, RC, CNSS, TVA applicable, et toutes les informations exigées par la Direction Générale des Impôts.') }}
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
								{{ __('Dois-je installer quelque chose sur mon ordinateur ?') }}
							</button>
						</h3>
						<div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
							<div class="accordion-body">
								{{ __('Non. Hssabek est 100% en ligne. Aucune installation, aucun téléchargement. Connectez-vous depuis votre navigateur sur n\'importe quel appareil : ordinateur, tablette ou smartphone.') }}
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
								{{ __('L\'application fonctionne-t-elle en arabe ?') }}
							</button>
						</h3>
						<div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
							<div class="accordion-body">
								{{ __('Oui. Hssabek est disponible en français et en arabe avec support RTL complet. Vos factures peuvent être émises dans les deux langues selon vos clients.') }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- CTA Section -->
<section class="clients-section">
	<div class="container">
		<div class="clients-main" data-aos="fade-up">
			<div class="row align-items-center">
				<div class="col-lg-8">
					<div class="clients-info">
						<h2>{{ __('Prêt à émettre votre première facture professionnelle ?') }}</h2>
						<p>{{ __('Rejoignez les auto-entrepreneurs marocains qui gèrent leur facturation avec Hssabek. Gratuit pour commencer, aucune carte bancaire.') }}</p>
					</div>
				</div>
				<div class="col-lg-4 text-lg-end">
					<a class="btn btn-dark btn-lg" href="{{ route('request-account') }}">{{ __('Commencer gratuitement') }} <i class="isax isax-arrow-right-3 ms-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
