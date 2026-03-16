@extends('frontoffice.layouts.app')

@section('title', __('Mentions Légales'))

@section('hero')
<!-- Hero Section -->
<section class="hero-section" id="index">
	<div class="container banner-hero">
		<div class="home-banner">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<div class="banner-content" data-aos="fade-up">
						<div class="banner-title">
							<h1 class="mb-2">{{ __('Mentions Légales') }}</h1>
						</div>
						<p class="fw-medium">{{ __('Conformément aux dispositions de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l\'économie numérique.') }}</p>
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

					<h5 class="mb-3 text-dark">{{ __('1. Éditeur du site') }}</h5>
					<p>
						<strong>{{ __('Raison sociale :') }}</strong> {{ __('[Nom de votre entreprise]') }}<br>
						<strong>{{ __('Forme juridique :') }}</strong> {{ __('[SAS / SARL / Auto-entrepreneur / ...]') }}<br>
						<strong>{{ __('Capital social :') }}</strong> {{ __('[Montant] €') }}<br>
						<strong>{{ __('Siège social :') }}</strong> {{ __('[Adresse complète]') }}<br>
						<strong>{{ __('SIRET :') }}</strong> {{ __('[Numéro SIRET]') }}<br>
						<strong>{{ __('RCS :') }}</strong> {{ __('[Ville et numéro RCS]') }}<br>
						<strong>{{ __('TVA intracommunautaire :') }}</strong> {{ __('[Numéro TVA]') }}<br>
						<strong>{{ __('Directeur de la publication :') }}</strong> {{ __('[Nom du responsable]') }}<br>
						<strong>{{ __('Email :') }}</strong> contact@{{ request()->getHost() }}
					</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('2. Hébergeur') }}</h5>
					<p>
						<strong>{{ __('Raison sociale :') }}</strong> {{ __('[Nom de l\'hébergeur]') }}<br>
						<strong>{{ __('Adresse :') }}</strong> {{ __('[Adresse de l\'hébergeur]') }}<br>
						<strong>{{ __('Téléphone :') }}</strong> {{ __('[Numéro de téléphone]') }}<br>
						<strong>{{ __('Site web :') }}</strong> {{ __('[URL de l\'hébergeur]') }}
					</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('3. Propriété intellectuelle') }}</h5>
					<p>{{ __('L\'ensemble du contenu de ce site (textes, images, graphismes, logo, icônes, logiciels, etc.) est la propriété exclusive de l\'éditeur ou de ses partenaires et est protégé par les lois françaises et internationales relatives à la propriété intellectuelle.') }}</p>
					<p>{{ __('Toute reproduction, représentation, modification, publication ou adaptation de tout ou partie des éléments du site est interdite sans l\'autorisation écrite préalable de l\'éditeur.') }}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('4. Données personnelles') }}</h5>
					<p>{!! __('Pour toute information relative à la collecte et au traitement de vos données personnelles, veuillez consulter notre <a href=":url" class="text-primary fw-medium">Politique de Confidentialité</a>.', ['url' => route('privacy')]) !!}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('5. Cookies') }}</h5>
					<p>{!! __('Ce site utilise des cookies essentiels au fonctionnement de l\'application. Pour plus d\'informations, consultez notre <a href=":url" class="text-primary fw-medium">Politique de Confidentialité</a>.', ['url' => route('privacy')]) !!}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('6. Limitation de responsabilité') }}</h5>
					<p>{{ __('L\'éditeur ne pourra être tenu responsable des dommages directs ou indirects causés au matériel de l\'utilisateur lors de l\'accès au site. L\'éditeur décline toute responsabilité quant à l\'utilisation qui pourrait être faite des informations et contenus présents sur le site.') }}</p>

					<h5 class="mb-3 mt-4 text-dark">{{ __('7. Droit applicable') }}</h5>
					<p>{{ __('Les présentes mentions légales sont régies par le droit français. En cas de litige, les tribunaux français seront seuls compétents.') }}</p>

				</div>
			</div>
		</div>
	</div>
</section>

@endsection
