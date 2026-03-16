@extends('frontoffice.layouts.app')

@section('title', __('Politique de Confidentialité'))

@section('hero')
<!-- Hero Section -->
<section class="hero-section" id="index">
	<div class="container banner-hero">
		<div class="home-banner">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<div class="banner-content" data-aos="fade-up">
						<div class="banner-title">
							<h1 class="mb-2">{{ __('Politique de Confidentialité') }}</h1>
						</div>
						<p class="fw-medium">{{ __('Dernière mise à jour :') }} {{ date('d/m/Y') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Hero Section -->
@endsection

@section('content')

<section class="saas-app-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="management-types" style="background: #fff; border-radius: 16px; padding: 48px;">

					<h5 class="mb-3 text-dark">{{ __('1. Introduction') }}</h5>
					<p>{{ __('La présente Politique de Confidentialité décrit comment :app (ci-après « nous », « notre ») collecte, utilise et protège vos données personnelles conformément au Règlement Général sur la Protection des Données (RGPD) et à la loi Informatique et Libertés.', ['app' => config('app.name')]) }}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('2. Données collectées') }}</h5>
					<p>{{ __('Nous collectons les données suivantes :') }}</p>
					<ul>
						<li><strong>{{ __('Données d\'identification :') }}</strong> {{ __('nom, prénom, adresse email, numéro de téléphone ;') }}</li>
						<li><strong>{{ __('Données professionnelles :') }}</strong> {{ __('nom de l\'entreprise, SIRET, adresse, secteur d\'activité ;') }}</li>
						<li><strong>{{ __('Données d\'utilisation :') }}</strong> {{ __('logs de connexion, actions dans l\'application, adresse IP ;') }}</li>
						<li><strong>{{ __('Données commerciales :') }}</strong> {{ __('factures, devis, informations clients saisies par l\'utilisateur ;') }}</li>
						<li><strong>{{ __('Données de paiement :') }}</strong> {{ __('traitées par notre prestataire de paiement sécurisé (nous ne stockons pas les numéros de carte bancaire).') }}</li>
					</ul>

					<h5 class="mb-3 mt-4 text-dark">{{ __('3. Finalités du traitement') }}</h5>
					<p>{{ __('Vos données sont traitées pour les finalités suivantes :') }}</p>
					<ul>
						<li>{{ __('Fourniture et gestion du Service ;') }}</li>
						<li>{{ __('Gestion de votre compte utilisateur ;') }}</li>
						<li>{{ __('Facturation et gestion des abonnements ;') }}</li>
						<li>{{ __('Support technique et assistance ;') }}</li>
						<li>{{ __('Amélioration du Service (statistiques anonymisées) ;') }}</li>
						<li>{{ __('Communication relative au Service (notifications, mises à jour) ;') }}</li>
						<li>{{ __('Respect de nos obligations légales et réglementaires.') }}</li>
					</ul>

					<h5 class="mb-3 mt-4 text-dark">{{ __('4. Base légale') }}</h5>
					<p>{{ __('Le traitement de vos données repose sur :') }}</p>
					<ul>
						<li><strong>{{ __('L\'exécution du contrat :') }}</strong> {{ __('pour la fourniture du Service ;') }}</li>
						<li><strong>{{ __('L\'obligation légale :') }}</strong> {{ __('pour la conservation des données de facturation ;') }}</li>
						<li><strong>{{ __('L\'intérêt légitime :') }}</strong> {{ __('pour l\'amélioration du Service et la prévention des fraudes ;') }}</li>
						<li><strong>{{ __('Le consentement :') }}</strong> {{ __('pour les communications marketing (le cas échéant).') }}</li>
					</ul>

					<h5 class="mb-3 mt-4 text-dark">{{ __('5. Durée de conservation') }}</h5>
					<p>{{ __('Vos données sont conservées pendant la durée de votre abonnement, puis :') }}</p>
					<ul>
						<li><strong>{{ __('Données de compte :') }}</strong> {{ __('supprimées 12 mois après la clôture du compte ;') }}</li>
						<li><strong>{{ __('Données de facturation :') }}</strong> {{ __('conservées 10 ans (obligation légale) ;') }}</li>
						<li><strong>{{ __('Logs de connexion :') }}</strong> {{ __('conservés 12 mois ;') }}</li>
						<li><strong>{{ __('Données de contact (formulaire) :') }}</strong> {{ __('conservées 3 ans.') }}</li>
					</ul>

					<h5 class="mb-3 mt-4 text-dark">{{ __('6. Vos droits') }}</h5>
					<p>{{ __('Conformément au RGPD, vous disposez des droits suivants :') }}</p>
					<ul>
						<li><strong>{{ __('Droit d\'accès :') }}</strong> {{ __('obtenir une copie de vos données personnelles ;') }}</li>
						<li><strong>{{ __('Droit de rectification :') }}</strong> {{ __('corriger des données inexactes ou incomplètes ;') }}</li>
						<li><strong>{{ __('Droit à l\'effacement :') }}</strong> {{ __('demander la suppression de vos données ;') }}</li>
						<li><strong>{{ __('Droit à la portabilité :') }}</strong> {{ __('recevoir vos données dans un format structuré ;') }}</li>
						<li><strong>{{ __('Droit d\'opposition :') }}</strong> {{ __('vous opposer au traitement de vos données ;') }}</li>
						<li><strong>{{ __('Droit à la limitation :') }}</strong> {{ __('limiter le traitement de vos données.') }}</li>
					</ul>
					<p>{!! __('Pour exercer ces droits, contactez-nous via le <a href=":url" class="text-primary fw-medium">formulaire de contact</a>.', ['url' => route('contact')]) !!}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('7. Sécurité') }}</h5>
					<p>{{ __('Nous mettons en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données contre tout accès non autorisé, altération, divulgation ou destruction. Cela inclut :') }}</p>
					<ul>
						<li>{{ __('Chiffrement des données en transit (HTTPS/TLS) ;') }}</li>
						<li>{{ __('Isolation des données entre locataires (multi-tenant) ;') }}</li>
						<li>{{ __('Contrôle d\'accès basé sur les rôles ;') }}</li>
						<li>{{ __('Sauvegardes régulières ;') }}</li>
						<li>{{ __('Journalisation des accès.') }}</li>
					</ul>

					<h5 class="mb-3 mt-4 text-dark">{{ __('8. Cookies') }}</h5>
					<p>{{ __('Notre Service utilise des cookies essentiels au fonctionnement de l\'application (session, jeton CSRF). Aucun cookie publicitaire ou de tracking tiers n\'est utilisé.') }}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('9. Sous-traitants') }}</h5>
					<p>{{ __('Nous pouvons faire appel à des sous-traitants pour l\'hébergement, le paiement et l\'envoi d\'emails. Ces sous-traitants sont soumis à des obligations contractuelles conformes au RGPD.') }}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('10. Modifications') }}</h5>
					<p>{{ __('Nous nous réservons le droit de modifier cette Politique de Confidentialité. En cas de modification substantielle, nous vous en informerons par email ou via une notification dans le Service.') }}</p>

				</div>
			</div>
		</div>
	</div>
</section>

@endsection
