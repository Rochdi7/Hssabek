@extends('frontoffice.layouts.app')

@section('title', __('Essai Gratuit — Créez votre Compte Facturation'))
@section('meta_description', __('Demandez un compte :app gratuit pour votre entreprise. Essai 7 jours sans carte bancaire. Facturation, devis, stock et gestion commerciale au Maroc.', ['app' => config('app.name')]))
@section('meta_keywords', 'essai gratuit facturation, créer compte facturation maroc, inscription logiciel comptable, demande accès hssabek')

@section('structured_data')
<script type="application/ld+json">
{
	"@@context": "https://schema.org",
	"@@type": "BreadcrumbList",
	"itemListElement": [
		{"@@type": "ListItem", "position": 1, "name": "Accueil", "item": "{{ route('home') }}"},
		{"@@type": "ListItem", "position": 2, "name": "Demande de compte"}
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
						<span class="info-badge fw-medium mb-3">{{ __('Créez votre espace') }}</span>
						<div class="banner-title">
							<h1 class="mb-2">{{ __('Demande de') }} <span class="head">{{ __('compte') }}</span></h1>
						</div>
						<p class="fw-medium">{{ __('Remplissez les informations de votre entreprise et nous activerons votre compte rapidement.') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Hero Section -->
@endsection

@section('content')

<!-- Account Request Form Section -->
<section class="invoice-temp-sec">
	<div class="container">
		<div class="section-heading" data-aos="fade-up">
			<span class="title-badge">{{ __('Inscription entreprise') }}</span>
			<h2>{{ __('Créez votre') }} <span>{{ __('compte') }}</span></h2>
			<p class="fw-medium">{{ __('Remplissez les informations ci-dessous. Notre équipe traitera votre demande et vous contactera.') }}</p>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-10" data-aos="fade-up" data-aos-delay="500">

				@if(session('success'))
					<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
						<div class="d-flex align-items-center">
							<i class="fa-solid fa-circle-check me-2"></i>
							<div class="fw-medium">{{ session('success') }}</div>
						</div>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></button>
					</div>
				@endif

				<div class="packages-card">
					<form method="POST" action="{{ route('request-account.send') }}">
						@csrf

						{{-- ─── Informations de l'entreprise ─── --}}
						<h6 class="mb-3 fw-semibold">{{ __('Informations de l\'entreprise') }}</h6>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label class="form-label fw-medium fs-14">{{ __('Nom de l\'entreprise') }} <span class="text-danger">*</span></label>
								<input type="text"
									class="form-control @error('company_name') is-invalid @enderror"
									name="company_name"
									value="{{ old('company_name') }}"
									placeholder="{{ __('Ex : SARL Mon Entreprise') }}"
									required>
								@error('company_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
							<div class="col-md-6 mb-3">
								<label class="form-label fw-medium fs-14">{{ __('Email de l\'entreprise') }} <span class="text-danger">*</span></label>
								<input type="email"
									class="form-control @error('company_email') is-invalid @enderror"
									name="company_email"
									value="{{ old('company_email') }}"
									placeholder="contact@entreprise.com"
									required>
								@error('company_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label class="form-label fw-medium fs-14">{{ __('Téléphone de l\'entreprise') }}</label>
								<input type="text"
									class="form-control @error('company_phone') is-invalid @enderror"
									name="company_phone"
									value="{{ old('company_phone') }}"
									placeholder="+212 6XX XXX XXX">
								@error('company_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
							<div class="col-md-6 mb-3">
								<label class="form-label fw-medium fs-14">{{ __('Secteur d\'activité') }}</label>
								<select class="form-select @error('sector') is-invalid @enderror" name="sector">
									<option value="">{{ __('— Sélectionnez un secteur —') }}</option>
									<option value="commerce" {{ old('sector') === 'commerce' ? 'selected' : '' }}>{{ __('Commerce') }}</option>
									<option value="services" {{ old('sector') === 'services' ? 'selected' : '' }}>{{ __('Services') }}</option>
									<option value="industrie" {{ old('sector') === 'industrie' ? 'selected' : '' }}>{{ __('Industrie') }}</option>
									<option value="construction" {{ old('sector') === 'construction' ? 'selected' : '' }}>{{ __('Construction / BTP') }}</option>
									<option value="technologie" {{ old('sector') === 'technologie' ? 'selected' : '' }}>{{ __('Technologie / IT') }}</option>
									<option value="sante" {{ old('sector') === 'sante' ? 'selected' : '' }}>{{ __('Santé') }}</option>
									<option value="education" {{ old('sector') === 'education' ? 'selected' : '' }}>{{ __('Éducation') }}</option>
									<option value="transport" {{ old('sector') === 'transport' ? 'selected' : '' }}>{{ __('Transport / Logistique') }}</option>
									<option value="agriculture" {{ old('sector') === 'agriculture' ? 'selected' : '' }}>{{ __('Agriculture') }}</option>
									<option value="immobilier" {{ old('sector') === 'immobilier' ? 'selected' : '' }}>{{ __('Immobilier') }}</option>
									<option value="restauration" {{ old('sector') === 'restauration' ? 'selected' : '' }}>{{ __('Restauration / Hôtellerie') }}</option>
									<option value="autre" {{ old('sector') === 'autre' ? 'selected' : '' }}>{{ __('Autre') }}</option>
								</select>
								@error('sector')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 mb-3">
								<label class="form-label fw-medium fs-14">{{ __('Adresse') }}</label>
								<input type="text"
									class="form-control @error('company_address') is-invalid @enderror"
									name="company_address"
									value="{{ old('company_address') }}"
									placeholder="{{ __('Rue, quartier...') }}">
								@error('company_address')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
							<div class="col-md-4 mb-3">
								<label class="form-label fw-medium fs-14">{{ __('Ville') }}</label>
								<input type="text"
									class="form-control @error('company_city') is-invalid @enderror"
									name="company_city"
									value="{{ old('company_city') }}"
									placeholder="{{ __('Ex : Casablanca') }}">
								@error('company_city')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
							<div class="col-md-4 mb-3">
								<label class="form-label fw-medium fs-14">{{ __('Pays') }}</label>
								<input type="text"
									class="form-control @error('company_country') is-invalid @enderror"
									name="company_country"
									value="{{ old('company_country') }}"
									placeholder="{{ __('Ex : Maroc') }}">
								@error('company_country')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label class="form-label fw-medium fs-14">{{ __('Nombre d\'employés') }}</label>
								<select class="form-select @error('employees_count') is-invalid @enderror" name="employees_count">
									<option value="">{{ __('— Sélectionnez —') }}</option>
									<option value="1-5" {{ old('employees_count') === '1-5' ? 'selected' : '' }}>1 — 5</option>
									<option value="6-20" {{ old('employees_count') === '6-20' ? 'selected' : '' }}>6 — 20</option>
									<option value="21-50" {{ old('employees_count') === '21-50' ? 'selected' : '' }}>21 — 50</option>
									<option value="51-200" {{ old('employees_count') === '51-200' ? 'selected' : '' }}>51 — 200</option>
									<option value="200+" {{ old('employees_count') === '200+' ? 'selected' : '' }}>200+</option>
								</select>
								@error('employees_count')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
						</div>

						<hr class="my-4">

						{{-- ─── Personne de contact ─── --}}
						<h6 class="mb-3 fw-semibold">{{ __('Personne de contact') }}</h6>
						<div class="row">
							<div class="col-md-4 mb-3">
								<label class="form-label fw-medium fs-14">{{ __('Nom complet') }} <span class="text-danger">*</span></label>
								<input type="text"
									class="form-control @error('contact_name') is-invalid @enderror"
									name="contact_name"
									value="{{ old('contact_name') }}"
									placeholder="{{ __('Votre nom complet') }}"
									required>
								@error('contact_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
							<div class="col-md-4 mb-3">
								<label class="form-label fw-medium fs-14">{{ __('Email') }} <span class="text-danger">*</span></label>
								<input type="email"
									class="form-control @error('contact_email') is-invalid @enderror"
									name="contact_email"
									value="{{ old('contact_email') }}"
									placeholder="{{ __('votre@email.com') }}"
									required>
								@error('contact_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
							<div class="col-md-4 mb-3">
								<label class="form-label fw-medium fs-14">{{ __('Téléphone') }}</label>
								<input type="text"
									class="form-control @error('contact_phone') is-invalid @enderror"
									name="contact_phone"
									value="{{ old('contact_phone') }}"
									placeholder="+212 6XX XXX XXX">
								@error('contact_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
						</div>

						<hr class="my-4">

						{{-- ─── Message ─── --}}
						<div class="mb-4">
							<label class="form-label fw-medium fs-14">{{ __('Message ou précisions') }}</label>
							<textarea
								class="form-control @error('message') is-invalid @enderror"
								name="message"
								rows="4"
								placeholder="{{ __('Décrivez vos besoins ou ajoutez des informations complémentaires...') }}">{{ old('message') }}</textarea>
							@error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
						</div>

						<div class="package-btn">
							<button type="submit" class="btn btn-dark btn-lg d-inline-flex align-items-center justify-content-center">
								<i class="isax isax-send-2 me-2"></i> {{ __('Envoyer ma demande') }}
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Account Request Form Section -->

@endsection
