<!-- Footer Section -->
<footer class="footer" id="contact">
	<div class="container">
		<div class="footer-top">
			<div class="row align-items-center">
				<div class="col-md-7">
					<div class="footer-content">
						<h4>{{ __('Abonnez-vous à notre newsletter') }}</h4>
					</div>
				</div>
				<div class="col-md-5">
					<div class="email-form">
						<form id="newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST">
							@csrf
							<input type="email" name="email" class="form-control" placeholder="{{ __('Adresse email') }}" required>
							<button type="submit" class="btn btn-primary" id="newsletter-btn">{{ __("S'abonner") }}</button>
						</form>
						<div id="newsletter-msg" class="mt-2 fw-medium" style="display:none;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-middle">
			<div class="row">
				<div class="col-lg-4">
					<div class="template-info">
						<div class="footer-logo mb-3">
							<a href="{{ route('home') }}"><img src="{{ url('build/img/footer-logo.svg') }}" alt="{{ config('app.name') }}"></a>
						</div>
						<p class="fw-medium">{{ config('app.name') }} {{ __('est une solution complète de facturation et gestion commerciale pour votre entreprise.') }}</p>
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-6">
					<div class="footer-widget">
						<h6 class="text-white mb-3">{{ __('Produit') }}</h6>
						<ul>
							<li><a href="{{ route('register') }}">{{ __('Essai gratuit') }}</a></li>
							<li><a href="{{ route('features') }}">{{ __('Fonctionnalités') }}</a></li>
							<li><a href="{{ route('pricing') }}">{{ __('Tarifs') }}</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-6">
					<div class="footer-widget">
						<h6 class="text-white mb-3">{{ __('Ressources') }}</h6>
						<ul>
							<li><a href="{{ route('help-center') }}">{{ __("Centre d'aide") }}</a></li>
							<li><a href="{{ route('support') }}">{{ __('Support') }}</a></li>
							<li><a href="{{ route('faq') }}">{{ __('FAQ') }}</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-6">
					<div class="footer-widget">
						<h6 class="text-white mb-3">{{ __('Légal') }}</h6>
						<ul>
							<li><a href="{{ route('terms') }}">{{ __('CGU') }}</a></li>
							<li><a href="{{ route('privacy') }}">{{ __('Confidentialité') }}</a></li>
							<li><a href="{{ route('legal') }}">{{ __('Mentions légales') }}</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-6">
					<div class="footer-widget">
						<h6 class="text-white mb-3">{{ __('Entreprise') }}</h6>
						<ul>
							<li><a href="{{ route('contact') }}">{{ __('Contactez-nous') }}</a></li>
							<li><a href="#">Facebook</a></li>
							<li><a href="#">LinkedIn</a></li>
							<li><a href="#">Twitter</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="copy-right">
						<p>Copyright {{ date('Y') }} &copy; {{ config('app.name') }}. {{ __('Tous droits réservés.') }}</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="footer-bottom-widget">
						<ul>
							<li><a href="{{ route('terms') }}">{{ __('Conditions Générales') }}</a></li>
							<li><a href="{{ route('privacy') }}">{{ __('Politique de Confidentialité') }}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- /Footer Section -->
