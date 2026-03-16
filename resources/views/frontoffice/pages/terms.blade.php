@extends('frontoffice.layouts.app')

@section('title', __('Conditions Générales d\'Utilisation'))

@section('hero')
<!-- Hero Section -->
<section class="hero-section" id="index">
	<div class="container banner-hero">
		<div class="home-banner">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<div class="banner-content" data-aos="fade-up">
						<div class="banner-title">
							<h1 class="mb-2">{{ __('Conditions Générales d\'Utilisation') }}</h1>
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

					<h5 class="mb-3 text-dark">{{ __('Article 1 — Objet') }}</h5>
					<p>{{ __('Les présentes Conditions Générales d\'Utilisation (ci-après « CGU ») ont pour objet de définir les modalités et conditions d\'utilisation du service :app (ci-après « le Service »), ainsi que de définir les droits et obligations des parties dans ce cadre.', ['app' => config('app.name')]) }}</p>
					<p>{{ __('Le Service est une application en ligne (SaaS) de facturation et de gestion commerciale accessible via un navigateur web.') }}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('Article 2 — Accès au Service') }}</h5>
					<p>{{ __('Le Service est accessible à toute personne physique ou morale disposant d\'une connexion internet. L\'accès au Service nécessite la création d\'un compte utilisateur et la souscription à un plan d\'abonnement.') }}</p>
					<p>{{ __('L\'utilisateur s\'engage à fournir des informations exactes et à jour lors de son inscription.') }}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('Article 3 — Inscription et compte') }}</h5>
					<p>{{ __('Pour utiliser le Service, l\'utilisateur doit créer un compte en fournissant les informations requises (nom, adresse email, mot de passe, informations de l\'entreprise). Chaque compte est personnel et l\'utilisateur est responsable de la confidentialité de ses identifiants.') }}</p>
					<p>{{ __('L\'utilisateur s\'engage à ne pas partager ses identifiants de connexion et à notifier immédiatement l\'éditeur en cas d\'utilisation non autorisée de son compte.') }}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('Article 4 — Abonnement et tarification') }}</h5>
					<p>{!! __('L\'utilisation du Service est soumise à la souscription d\'un abonnement payant selon les tarifs en vigueur, consultables sur la page <a href=":url" class="text-primary fw-medium">Tarification</a>.', ['url' => route('pricing')]) !!}</p>
					<p>{{ __('Les abonnements sont facturés à la période choisie (mensuelle ou annuelle). L\'utilisateur peut modifier ou résilier son abonnement à tout moment depuis son espace de gestion.') }}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('Article 5 — Obligations de l\'utilisateur') }}</h5>
					<p>{{ __('L\'utilisateur s\'engage à :') }}</p>
					<ul>
						<li>{{ __('Utiliser le Service conformément à sa destination et aux présentes CGU ;') }}</li>
						<li>{{ __('Ne pas utiliser le Service à des fins illicites ou frauduleuses ;') }}</li>
						<li>{{ __('Ne pas porter atteinte à l\'intégrité, la sécurité ou la disponibilité du Service ;') }}</li>
						<li>{{ __('Respecter les droits de propriété intellectuelle de l\'éditeur ;') }}</li>
						<li>{{ __('Maintenir la confidentialité de ses identifiants de connexion.') }}</li>
					</ul>

					<h5 class="mb-3 mt-4 text-dark">{{ __('Article 6 — Propriété intellectuelle') }}</h5>
					<p>{{ __('L\'ensemble des éléments constituant le Service (logiciel, interface, textes, graphismes, base de données, etc.) est protégé par les lois relatives à la propriété intellectuelle.') }}</p>
					<p>{{ __('L\'utilisateur conserve la pleine propriété de ses données saisies dans le Service.') }}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('Article 7 — Protection des données') }}</h5>
					<p>{!! __('Le traitement des données personnelles est régi par notre <a href=":url" class="text-primary fw-medium">Politique de Confidentialité</a>, qui fait partie intégrante des présentes CGU.', ['url' => route('privacy')]) !!}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('Article 8 — Responsabilité') }}</h5>
					<p>{{ __('L\'éditeur s\'engage à fournir le Service avec diligence et selon les règles de l\'art. Il ne saurait être tenu responsable des dommages indirects résultant de l\'utilisation ou de l\'impossibilité d\'utiliser le Service.') }}</p>
					<p>{{ __('L\'éditeur ne garantit pas un fonctionnement ininterrompu du Service et pourra procéder à des opérations de maintenance.') }}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('Article 9 — Résiliation') }}</h5>
					<p>{{ __('L\'utilisateur peut résilier son abonnement à tout moment. La résiliation prend effet à la fin de la période d\'abonnement en cours.') }}</p>
					<p>{{ __('L\'éditeur se réserve le droit de suspendre ou supprimer un compte en cas de violation des présentes CGU.') }}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('Article 10 — Droit applicable') }}</h5>
					<p>{{ __('Les présentes CGU sont régies par le droit français. Tout litige relatif à l\'interprétation ou à l\'exécution des présentes sera soumis aux tribunaux compétents.') }}</p>

				</div>
			</div>
		</div>
	</div>
</section>

@endsection
