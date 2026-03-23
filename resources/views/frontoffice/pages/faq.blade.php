@extends('frontoffice.layouts.app')

@section('title', __('FAQ — Questions Fréquentes sur la Facturation en Ligne'))
@section('meta_description', __('Foire aux questions') . ' ' . config('app.name') . '. ' . __('Trouvez les réponses sur la facturation, les devis, les abonnements, la sécurité et la gestion commerciale au Maroc.'))
@section('meta_keywords', 'faq facturation maroc, questions facturation en ligne, aide logiciel comptable, support hssabek, devis facture faq')

@section('structured_data')
<script type="application/ld+json">
{
	"@@context": "https://schema.org",
	"@@type": "FAQPage",
	"mainEntity": [
		{
			"@@type": "Question",
			"name": "Qu'est-ce que {{ config('app.name') }} ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "{{ config('app.name') }} est une solution SaaS complète de gestion commerciale : facturation, devis, gestion des clients et fournisseurs, stock, achats, dépenses et rapports. Tout est centralisé dans une seule plateforme accessible depuis votre navigateur."
			}
		},
		{
			"@@type": "Question",
			"name": "À qui s'adresse {{ config('app.name') }} ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "Notre plateforme est conçue pour les PME, auto-entrepreneurs, freelances et toute entreprise qui souhaite simplifier sa gestion quotidienne : facturation, suivi des paiements, gestion des stocks et bien plus encore."
			}
		},
		{
			"@@type": "Question",
			"name": "Y a-t-il un essai gratuit ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "Oui ! Vous pouvez tester {{ config('app.name') }} gratuitement pendant 7 jours sans carte bancaire. Cela vous permet de découvrir toutes les fonctionnalités avant de vous engager."
			}
		},
		{
			"@@type": "Question",
			"name": "Ai-je besoin d'installer un logiciel ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "Non. {{ config('app.name') }} est 100% en ligne (SaaS). Il suffit d'un navigateur web et d'une connexion internet. Aucune installation requise."
			}
		},
		{
			"@@type": "Question",
			"name": "Combien de factures puis-je créer ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "Cela dépend de votre plan. Le plan gratuit inclut un nombre limité de factures par mois, tandis que les plans Premium et Entreprise offrent des factures illimitées."
			}
		},
		{
			"@@type": "Question",
			"name": "Puis-je personnaliser mes modèles de facture ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "Oui ! Nous proposons plus de 64 modèles professionnels pour vos factures, devis, bons de livraison et plus encore. Vous pouvez y ajouter votre logo, vos couleurs et vos conditions de paiement."
			}
		},
		{
			"@@type": "Question",
			"name": "Puis-je convertir un devis en facture ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "Absolument ! Un simple clic suffit pour transformer un devis accepté en facture. Toutes les informations sont automatiquement reprises."
			}
		},
		{
			"@@type": "Question",
			"name": "Les rappels de paiement sont-ils automatiques ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "Oui, vous pouvez configurer des rappels automatiques pour les factures impayées. Définissez la fréquence et le contenu des rappels depuis vos paramètres."
			}
		},
		{
			"@@type": "Question",
			"name": "Mes données sont-elles sécurisées ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "Absolument. Chaque entreprise dispose de son propre espace totalement isolé (multi-tenant). Vos données sont chiffrées en transit (HTTPS/TLS) et sauvegardées régulièrement."
			}
		},
		{
			"@@type": "Question",
			"name": "Êtes-vous conforme au RGPD ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "Oui, nous sommes entièrement conformes au RGPD. Consultez notre Politique de Confidentialité pour en savoir plus sur la collecte et le traitement de vos données."
			}
		},
		{
			"@@type": "Question",
			"name": "Puis-je exporter mes données si je quitte ?",
			"acceptedAnswer": {
				"@@type": "Answer",
				"text": "Oui, vos données vous appartiennent. Vous pouvez exporter toutes vos factures, clients, produits et rapports en PDF ou CSV à tout moment, même après annulation."
			}
		}
	]
}
</script>
<script type="application/ld+json">
{
	"@@context": "https://schema.org",
	"@@type": "BreadcrumbList",
	"itemListElement": [
		{"@@type": "ListItem", "position": 1, "name": "Accueil", "item": "{{ route('home') }}"},
		{"@@type": "ListItem", "position": 2, "name": "FAQ"}
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
						<span class="info-badge fw-medium mb-3">FAQ</span>
						<div class="banner-title">
							<h1 class="mb-2">{{ __('Foire aux') }} <span class="head">{{ __('questions') }}</span></h1>
						</div>
						<p class="fw-medium">{{ __('Retrouvez les réponses aux questions les plus fréquemment posées par nos utilisateurs.') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Hero Section -->
@endsection

@section('content')

<!-- FAQ General -->
<section class="faq-section bg-white">
	<div class="container">
		<div class="sec-bg-img">
			<img src="{{ url('build/img/bg/sec-bg-11.png') }}" class="faq-bg-one" alt="Bg">
			<img src="{{ url('build/img/bg/sec-bg-12.png') }}" class="faq-bg-two" alt="Bg">
			<img src="{{ url('build/img/bg/sec-bg-13.png') }}" class="faq-bg-three" alt="Bg">
			<img src="{{ url('build/img/icons/faq-bg.svg') }}" class="faq-bg-four" alt="Bg">
		</div>
		<div class="row align-items-start">
			<div class="col-lg-5">
				<div class="section-heading" data-aos="fade-up">
					<span class="title-badge">{{ __('Général') }}</span>
					<h2 class="mb-2">{{ __('Questions') }} <span>{{ __('générales') }}</span></h2>
					<p class="fw-medium">{{ __('Tout ce que vous devez savoir sur') }} {{ config('app.name') }} {{ __('et son fonctionnement.') }}</p>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="faq-set" id="accordionGeneral">
					<div class="faq-card aos" data-aos="fade-up" data-aos-delay="600">
						<h4 class="faq-title">
							<a data-bs-toggle="collapse" href="#gFaq1" aria-expanded="false">{{ __('Qu\'est-ce que') }} {{ config('app.name') }} ?</a>
						</h4>
						<div id="gFaq1" class="card-collapse collapse show" data-bs-parent="#accordionGeneral">
							<p>{{ config('app.name') }} {{ __('est une solution SaaS complète de gestion commerciale : facturation, devis, gestion des clients et fournisseurs, stock, achats, dépenses et rapports. Tout est centralisé dans une seule plateforme accessible depuis votre navigateur.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#gFaq2" aria-expanded="false">{{ __('À qui s\'adresse') }} {{ config('app.name') }} ?</a>
						</h4>
						<div id="gFaq2" class="card-collapse collapse" data-bs-parent="#accordionGeneral">
							<p>{{ __('Notre plateforme est conçue pour les PME, auto-entrepreneurs, freelances et toute entreprise qui souhaite simplifier sa gestion quotidienne : facturation, suivi des paiements, gestion des stocks et bien plus encore.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#gFaq3" aria-expanded="false">{{ __('Y a-t-il un essai gratuit ?') }}</a>
						</h4>
						<div id="gFaq3" class="card-collapse collapse" data-bs-parent="#accordionGeneral">
							<p>{{ __('Oui ! Vous pouvez tester') }} {{ config('app.name') }} {{ __('gratuitement pendant 7 jours sans carte bancaire. Cela vous permet de découvrir toutes les fonctionnalités avant de vous engager.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#gFaq4" aria-expanded="false">{{ __('Ai-je besoin d\'installer un logiciel ?') }}</a>
						</h4>
						<div id="gFaq4" class="card-collapse collapse" data-bs-parent="#accordionGeneral">
							<p>{{ __('Non.') }} {{ config('app.name') }} {{ __('est 100% en ligne (SaaS). Il suffit d\'un navigateur web et d\'une connexion internet. Aucune installation requise.') }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- FAQ Facturation -->
<section class="faq-section" style="background: #f8f9fc;">
	<div class="container">
		<div class="row align-items-start">
			<div class="col-lg-5">
				<div class="section-heading" data-aos="fade-up">
					<span class="title-badge">{{ __('Facturation') }}</span>
					<h2 class="mb-2">{{ __('Factures') }} <span>{{ __('& Devis') }}</span></h2>
					<p class="fw-medium">{{ __('Questions sur la création et la gestion de vos factures et devis.') }}</p>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="faq-set" id="accordionBilling">
					<div class="faq-card aos" data-aos="fade-up" data-aos-delay="600">
						<h4 class="faq-title">
							<a data-bs-toggle="collapse" href="#bFaq1" aria-expanded="false">{{ __('Combien de factures puis-je créer ?') }}</a>
						</h4>
						<div id="bFaq1" class="card-collapse collapse show" data-bs-parent="#accordionBilling">
							<p>{!! __('Cela dépend de votre plan. Le plan gratuit inclut un nombre limité de factures par mois, tandis que les plans Premium et Entreprise offrent des factures illimitées. Consultez notre <a href=":url" class="text-primary">page tarifs</a> pour les détails.', ['url' => route('pricing')]) !!}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#bFaq2" aria-expanded="false">{{ __('Puis-je personnaliser mes modèles de facture ?') }}</a>
						</h4>
						<div id="bFaq2" class="card-collapse collapse" data-bs-parent="#accordionBilling">
							<p>{{ __('Oui ! Nous proposons plus de 64 modèles professionnels pour vos factures, devis, bons de livraison et plus encore. Vous pouvez y ajouter votre logo, vos couleurs et vos conditions de paiement. Besoin d\'un modèle sur mesure ? Demandez-le gratuitement.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#bFaq3" aria-expanded="false">{{ __('Puis-je convertir un devis en facture ?') }}</a>
						</h4>
						<div id="bFaq3" class="card-collapse collapse" data-bs-parent="#accordionBilling">
							<p>{{ __('Absolument ! Un simple clic suffit pour transformer un devis accepté en facture. Toutes les informations sont automatiquement reprises.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#bFaq4" aria-expanded="false">{{ __('Les rappels de paiement sont-ils automatiques ?') }}</a>
						</h4>
						<div id="bFaq4" class="card-collapse collapse" data-bs-parent="#accordionBilling">
							<p>{{ __('Oui, vous pouvez configurer des rappels automatiques pour les factures impayées. Définissez la fréquence et le contenu des rappels depuis vos paramètres.') }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- FAQ Abonnement -->
<section class="faq-section bg-white">
	<div class="container">
		<div class="row align-items-start">
			<div class="col-lg-5">
				<div class="section-heading" data-aos="fade-up">
					<span class="title-badge">{{ __('Abonnement') }}</span>
					<h2 class="mb-2">{{ __('Plans') }} <span>{{ __('& Paiement') }}</span></h2>
					<p class="fw-medium">{{ __('Tout sur les abonnements, les prix et les modalités de paiement.') }}</p>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="faq-set" id="accordionPlans">
					<div class="faq-card aos" data-aos="fade-up" data-aos-delay="600">
						<h4 class="faq-title">
							<a data-bs-toggle="collapse" href="#pFaq1" aria-expanded="false">{{ __('Puis-je changer de plan à tout moment ?') }}</a>
						</h4>
						<div id="pFaq1" class="card-collapse collapse show" data-bs-parent="#accordionPlans">
							<p>{{ __('Oui, vous pouvez passer à un plan supérieur ou inférieur à tout moment depuis votre espace de gestion. Le changement prend effet immédiatement.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#pFaq2" aria-expanded="false">{{ __('Quelle est votre politique d\'annulation ?') }}</a>
						</h4>
						<div id="pFaq2" class="card-collapse collapse" data-bs-parent="#accordionPlans">
							<p>{{ __('Vous pouvez annuler votre abonnement à tout moment. L\'annulation prend effet à la fin de la période de facturation en cours. Aucun frais supplémentaire ne sera appliqué.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#pFaq3" aria-expanded="false">{{ __('Quels moyens de paiement acceptez-vous ?') }}</a>
						</h4>
						<div id="pFaq3" class="card-collapse collapse" data-bs-parent="#accordionPlans">
							<p>{{ __('Nous acceptons les cartes bancaires (Visa, Mastercard, American Express) via notre prestataire de paiement sécurisé. Les virements bancaires sont disponibles pour les plans Entreprise.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#pFaq4" aria-expanded="false">{{ __('Puis-je exporter mes données si je quitte ?') }}</a>
						</h4>
						<div id="pFaq4" class="card-collapse collapse" data-bs-parent="#accordionPlans">
							<p>{{ __('Oui, vos données vous appartiennent. Vous pouvez exporter toutes vos factures, clients, produits et rapports en PDF ou CSV à tout moment, même après annulation.') }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- FAQ Sécurité -->
<section class="faq-section" style="background: #f8f9fc;">
	<div class="container">
		<div class="row align-items-start">
			<div class="col-lg-5">
				<div class="section-heading" data-aos="fade-up">
					<span class="title-badge">{{ __('Sécurité') }}</span>
					<h2 class="mb-2">{{ __('Données') }} <span>{{ __('& Sécurité') }}</span></h2>
					<p class="fw-medium">{{ __('La protection de vos données est notre priorité absolue.') }}</p>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="faq-set" id="accordionSecurity">
					<div class="faq-card aos" data-aos="fade-up" data-aos-delay="600">
						<h4 class="faq-title">
							<a data-bs-toggle="collapse" href="#sFaq1" aria-expanded="false">{{ __('Mes données sont-elles sécurisées ?') }}</a>
						</h4>
						<div id="sFaq1" class="card-collapse collapse show" data-bs-parent="#accordionSecurity">
							<p>{{ __('Absolument. Chaque entreprise dispose de son propre espace totalement isolé (multi-tenant). Vos données sont chiffrées en transit (HTTPS/TLS) et sauvegardées régulièrement.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#sFaq2" aria-expanded="false">{{ __('Êtes-vous conforme au RGPD ?') }}</a>
						</h4>
						<div id="sFaq2" class="card-collapse collapse" data-bs-parent="#accordionSecurity">
							<p>{!! __('Oui, nous sommes entièrement conformes au RGPD. Consultez notre <a href=":url" class="text-primary">Politique de Confidentialité</a> pour en savoir plus sur la collecte et le traitement de vos données.', ['url' => route('privacy')]) !!}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#sFaq3" aria-expanded="false">{{ __('Qui a accès à mes données ?') }}</a>
						</h4>
						<div id="sFaq3" class="card-collapse collapse" data-bs-parent="#accordionSecurity">
							<p>{{ __('Seuls vous et les membres de votre équipe que vous avez invités ont accès à vos données. Notre système de rôles et permissions vous permet de contrôler précisément qui voit quoi.') }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- CTA -->
<section class="faq-section bg-white">
	<div class="container">
		<div class="connect-with-us">
			<div class="section-title text-center" data-aos="fade-up">
				<h2 class="mb-2">{{ __('Vous avez d\'autres questions ?') }}</h2>
				<p class="mx-auto">{{ __('Notre équipe est là pour vous aider. N\'hésitez pas à nous contacter.') }}</p>
				<div class="d-flex flex-wrap justify-content-center gap-3">
					<a href="{{ route('contact') }}" class="btn btn-primary btn-lg d-inline-flex align-items-center">{{ __('Nous contacter') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
					<a href="{{ route('help-center') }}" class="btn btn-dark btn-lg d-inline-flex align-items-center">{{ __('Centre d\'aide') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
