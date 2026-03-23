@extends('frontoffice.layouts.app')

@section('title', __('Contactez-nous — Support & Assistance Facturation'))
@section('meta_description', __('Contactez l\'équipe') . ' ' . config('app.name') . '. ' . __('Support réactif sous 24h pour toutes vos questions sur la facturation, les devis et la gestion commerciale au Maroc.'))
@section('meta_keywords', 'contact hssabek, support facturation maroc, aide logiciel facturation, assistance comptable en ligne')

@section('structured_data')
<script type="application/ld+json">
{
	"@@context": "https://schema.org",
	"@@type": "BreadcrumbList",
	"itemListElement": [
		{"@@type": "ListItem", "position": 1, "name": "Accueil", "item": "{{ route('home') }}"},
		{"@@type": "ListItem", "position": 2, "name": "Contact"}
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
						<span class="info-badge fw-medium mb-3">{{ __('Support réactif') }}</span>
						<div class="banner-title">
							<h1 class="mb-2">{{ __('Contactez-') }}<span class="head">{{ __('nous') }}</span></h1>
						</div>
						<p class="fw-medium">{{ __('Une question, une suggestion ou besoin d\'aide ? Notre équipe vous répond sous 24h.') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Hero Section -->
@endsection

@section('content')

<!-- Contact Info Cards -->
<section class="saas-app-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6" data-aos="fade-up">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-01.svg') }}" alt="{{ __('Email') }}">
					</div>
					<div class="app-content">
						<h6 class="mb-1">{{ __('Email') }}</h6>
						<p>hssabekinfo@gmail.com</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-02.svg') }}" alt="{{ __('Horaires') }}">
					</div>
					<div class="app-content">
						<h6 class="mb-1">{{ __('Horaires') }}</h6>
						<p>{{ __('Lundi — Vendredi, 9h00 — 18h00') }}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
				<div class="app-card">
					<div class="app-icon">
						<img src="{{ url('build/img/icons/app-icon-03.svg') }}" alt="{{ __('Support') }}">
					</div>
					<div class="app-content">
						<h6 class="mb-1">{{ __('Support') }}</h6>
						<p>{{ __('Réponse sous 24h ouvrées') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Contact Info Cards -->

<!-- Contact Form Section -->
<section class="invoice-temp-sec">
	<div class="container">
		<div class="section-heading" data-aos="fade-up">
			<span class="title-badge">{{ __('Formulaire de contact') }}</span>
			<h2>{{ __('Envoyez-nous') }} <span>{{ __('un message') }}</span></h2>
			<p class="fw-medium">{{ __('Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.') }}</p>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-8" data-aos="fade-up" data-aos-delay="500">

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
					<form method="POST" action="{{ route('contact.send') }}">
						@csrf
						<div class="row">
							<div class="col-md-6 mb-3">
								<label class="form-label fw-medium fs-14">{{ __('Nom complet') }} <span class="text-danger">*</span></label>
								<input type="text"
									class="form-control @error('name') is-invalid @enderror"
									name="name"
									value="{{ old('name') }}"
									placeholder="{{ __('Votre nom') }}"
									required>
								@error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
							<div class="col-md-6 mb-3">
								<label class="form-label fw-medium fs-14">{{ __('Adresse email') }} <span class="text-danger">*</span></label>
								<input type="email"
									class="form-control @error('email') is-invalid @enderror"
									name="email"
									value="{{ old('email') }}"
									placeholder="{{ __('votre@email.com') }}"
									required>
								@error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label fw-medium fs-14">{{ __('Sujet') }} <span class="text-danger">*</span></label>
							<select class="form-select @error('subject') is-invalid @enderror" name="subject" required>
								<option value="">{{ __('— Sélectionnez un sujet —') }}</option>
								<option value="question" {{ old('subject') === 'question' ? 'selected' : '' }}>{{ __('Question générale') }}</option>
								<option value="support" {{ old('subject') === 'support' ? 'selected' : '' }}>{{ __('Support technique') }}</option>
								<option value="billing" {{ old('subject') === 'billing' ? 'selected' : '' }}>{{ __('Facturation & Abonnement') }}</option>
								<option value="partnership" {{ old('subject') === 'partnership' ? 'selected' : '' }}>{{ __('Partenariat') }}</option>
								<option value="other" {{ old('subject') === 'other' ? 'selected' : '' }}>{{ __('Autre') }}</option>
							</select>
							@error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
						</div>
						<div class="mb-4">
							<label class="form-label fw-medium fs-14">{{ __('Message') }} <span class="text-danger">*</span></label>
							<textarea
								class="form-control @error('message') is-invalid @enderror"
								name="message"
								rows="6"
								placeholder="{{ __('Décrivez votre demande...') }}"
								required>{{ old('message') }}</textarea>
							@error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
						</div>
						<div class="package-btn">
							<button type="submit" class="btn btn-dark btn-lg d-inline-flex align-items-center justify-content-center">
								<i class="isax isax-send-2 me-2"></i> {{ __('Envoyer le message') }}
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Contact Form Section -->

<!-- FAQ Section -->
<section class="faq-section bg-white">
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
					<h2 class="mb-2">{{ __('Questions') }} <span>{{ __('fréquentes') }}</span></h2>
					<p class="fw-medium">{{ __('Réponses rapides aux questions les plus posées.') }}</p>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="faq-set" id="accordionContact">
					<div class="faq-card aos" data-aos="fade-up" data-aos-delay="600">
						<h4 class="faq-title">
							<a data-bs-toggle="collapse" href="#cFaqOne" aria-expanded="false">{{ __('Comment puis-je vous contacter ?') }}</a>
						</h4>
						<div id="cFaqOne" class="card-collapse collapse show" data-bs-parent="#accordionContact">
							<p>{{ __('Vous pouvez nous contacter via le formulaire ci-dessus, par email ou directement depuis votre espace client. Nous répondons sous 24h ouvrées.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#cFaqTwo" aria-expanded="false">{{ __('Quel est le délai de réponse du support ?') }}</a>
						</h4>
						<div id="cFaqTwo" class="card-collapse collapse" data-bs-parent="#accordionContact">
							<p>{{ __('Notre équipe répond en moyenne sous 12h pour les demandes standard et sous 4h pour les clients avec un plan Premium ou Entreprise.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#cFaqThree" aria-expanded="false">{{ __('Proposez-vous une démonstration ?') }}</a>
						</h4>
						<div id="cFaqThree" class="card-collapse collapse" data-bs-parent="#accordionContact">
							<p>{{ __('Oui ! Vous pouvez créer un compte d\'essai gratuit pour tester la plateforme par vous-même, ou nous contacter pour planifier une démonstration personnalisée.') }}</p>
						</div>
					</div>
					<div class="faq-card aos" data-aos="fade-up">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#cFaqFour" aria-expanded="false">{{ __('Puis-je demander une fonctionnalité ?') }}</a>
						</h4>
						<div id="cFaqFour" class="card-collapse collapse" data-bs-parent="#accordionContact">
							<p>{{ __('Absolument ! Nous sommes à l\'écoute de nos utilisateurs. Envoyez-nous votre suggestion via le formulaire et nous l\'évaluerons pour les prochaines mises à jour.') }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- CTA -->
		<div class="connect-with-us">
			<div class="section-title text-center" data-aos="fade-up">
				<h2 class="mb-2">{{ __('Prêt à commencer ?') }}</h2>
				<p class="mx-auto">{{ __('Essayez') }} {{ config('app.name') }} {{ __('gratuitement. Aucune carte bancaire requise.') }}</p>
				<a href="{{ route('request-account') }}" class="btn btn-primary btn-lg d-inline-flex align-items-center">{{ __('Demander un accès gratuit') }}<i class="isax isax-arrow-right-3 ms-2"></i></a>
			</div>
		</div>
	</div>
</section>
<!-- /FAQ Section -->

@endsection
