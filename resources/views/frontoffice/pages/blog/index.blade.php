@extends('frontoffice.layouts.app')

@section('title', __('Blog Facturation Maroc — Conseils, Guides & Actualités PME'))
@section('meta_description', __('Le blog Hssabek : conseils pratiques sur la facturation au Maroc, gestion commerciale, devis, comptabilité pour PME et auto-entrepreneurs marocains. Guides gratuits en français.'))
@section('meta_keywords', 'blog facturation maroc, conseils facturation pme maroc, guide devis facture maroc, comptabilité auto-entrepreneur maroc, actualités gestion commerciale maroc')

@section('structured_data')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Blog",
    "name": "Blog Hssabek — Facturation & Gestion Commerciale Maroc",
    "description": "Conseils pratiques sur la facturation, les devis et la gestion commerciale pour les PME et auto-entrepreneurs marocains.",
    "url": "{{ route('blog.index') }}",
    "publisher": {
        "@@type": "Organization",
        "name": "{{ config('app.name', 'Hssabek') }}",
        "logo": {
            "@@type": "ImageObject",
            "url": "{{ asset('assets/images/logo/hssabek mobile logo.png') }}"
        }
    },
    "inLanguage": "fr-MA"
}
</script>
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
        {"@@type": "ListItem", "position": 1, "name": "Accueil", "item": "{{ route('home') }}"},
        {"@@type": "ListItem", "position": 2, "name": "Blog", "item": "{{ route('blog.index') }}"}
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
						<span class="info-badge fw-medium mb-3">{{ __('Ressources gratuites') }}</span>
						<div class="banner-title">
							<h1 class="mb-2">{{ __('Blog') }} <span class="head">{{ __('Facturation & Gestion') }}</span></h1>
						</div>
						<p class="fw-medium">{{ __('Conseils pratiques, guides et actualités sur la facturation, les devis et la gestion commerciale pour les PME et auto-entrepreneurs marocains.') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Hero Section -->
@endsection

@section('content')

<!-- Blog Section -->
<section class="saas-app-section">
	<div class="container">

		<!-- Category Filter -->
		@if($categories->isNotEmpty())
		<div class="d-flex align-items-center flex-wrap gap-2 mb-4" data-aos="fade-up">
			<a href="{{ route('blog.index') }}"
				class="btn btn-sm {{ !request('category') ? 'btn-primary' : 'btn-outline-white' }}">
				{{ __('Tous les articles') }}
			</a>
			@foreach($categories as $cat)
			<a href="{{ route('blog.index', ['category' => $cat->slug]) }}"
				class="btn btn-sm {{ request('category') === $cat->slug ? 'btn-primary' : 'btn-outline-white' }}">
				{{ $cat->name }}
				<span class="ms-1 opacity-75">({{ $cat->published_posts_count }})</span>
			</a>
			@endforeach
		</div>
		@endif

		<!-- Featured Post (first load, no category filter) -->
		@if($featured && !request('category') && !$posts->currentPage() > 1)
		<div class="mb-5" data-aos="fade-up">
			<div class="card overflow-hidden">
				<div class="row g-0">
					@if($featured->cover_image)
					<div class="col-lg-6">
						<img src="{{ asset('storage/' . $featured->cover_image) }}"
							class="img-fluid h-100 w-100" style="object-fit:cover;min-height:280px;"
							alt="{{ $featured->cover_image_alt ?: $featured->title }}"
							loading="eager" width="700" height="400">
					</div>
					@endif
					<div class="{{ $featured->cover_image ? 'col-lg-6' : 'col-lg-12' }}">
						<div class="card-body p-4 p-lg-5 h-100 d-flex flex-column justify-content-center">
							@if($featured->category)
							<span class="badge badge-soft-{{ $featured->category->color }} mb-3">{{ $featured->category->name }}</span>
							@endif
							<h2 class="fs-20 mb-3">
								<a href="{{ route('blog.show', $featured->slug) }}" class="text-dark">{{ $featured->title }}</a>
							</h2>
							@if($featured->excerpt)
							<p class="text-muted mb-3">{{ $featured->excerpt }}</p>
							@endif
							<div class="d-flex align-items-center gap-3 mt-auto">
								<span class="fs-12 text-muted d-flex align-items-center gap-1">
									<i class="isax isax-calendar-1 fs-14"></i>
									{{ $featured->published_at->translatedFormat('d M Y') }}
								</span>
								<span class="fs-12 text-muted d-flex align-items-center gap-1">
									<i class="isax isax-timer-1 fs-14"></i>
									{{ $featured->reading_time }} min {{ __('de lecture') }}
								</span>
								<a href="{{ route('blog.show', $featured->slug) }}" class="btn btn-primary btn-sm ms-auto">
									{{ __('Lire l\'article') }} <i class="isax isax-arrow-right-3 ms-1"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif

		<!-- Posts Grid -->
		<div class="row g-4">
			@forelse($posts as $post)
			<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
				<article class="card h-100 blog-card">
					@if($post->cover_image)
					<div class="position-relative overflow-hidden" style="height:200px;">
						<a href="{{ route('blog.show', $post->slug) }}">
							<img src="{{ asset('storage/' . $post->cover_image) }}"
								class="img-fluid w-100 h-100" style="object-fit:cover;"
								alt="{{ $post->cover_image_alt ?: $post->title }}"
								loading="lazy" width="400" height="200">
						</a>
						@if($post->category)
						<span class="badge badge-soft-{{ $post->category->color }} position-absolute top-0 start-0 m-2">
							{{ $post->category->name }}
						</span>
						@endif
					</div>
					@endif
					<div class="card-body d-flex flex-column p-4">
						@if(!$post->cover_image && $post->category)
						<span class="badge badge-soft-{{ $post->category->color }} mb-2 align-self-start">{{ $post->category->name }}</span>
						@endif
						<h2 class="fs-16 mb-2 flex-grow-0">
							<a href="{{ route('blog.show', $post->slug) }}" class="text-dark">
								{{ $post->title }}
							</a>
						</h2>
						@if($post->excerpt)
						<p class="text-muted fs-14 mb-3 flex-grow-1">{{ Str::limit($post->excerpt, 120) }}</p>
						@endif
						<div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
							<div class="d-flex align-items-center gap-2 fs-12 text-muted">
								<i class="isax isax-calendar-1"></i>
								<span>{{ $post->published_at->translatedFormat('d M Y') }}</span>
							</div>
							<div class="d-flex align-items-center gap-2 fs-12 text-muted">
								<i class="isax isax-timer-1"></i>
								<span>{{ $post->reading_time }} min</span>
							</div>
						</div>
					</div>
				</article>
			</div>
			@empty
			<div class="col-12 text-center py-5">
				<i class="isax isax-document-text fs-32 text-muted d-block mb-3"></i>
				<p class="text-muted">{{ __('Aucun article publié pour le moment. Revenez bientôt !') }}</p>
			</div>
			@endforelse
		</div>

		<!-- Pagination -->
		@if($posts->hasPages())
		<div class="d-flex justify-content-center mt-5">
			{{ $posts->links() }}
		</div>
		@endif

	</div>
</section>
<!-- /Blog Section -->

<!-- CTA -->
<section class="faq-section bg-white">
	<div class="container">
		<div class="connect-with-us">
			<div class="section-title text-center" data-aos="fade-up">
				<h2 class="mb-2">{{ __('Prêt à simplifier votre facturation ?') }}</h2>
				<p class="mx-auto">{{ __('Rejoignez des centaines de PME et auto-entrepreneurs marocains qui utilisent Hssabek chaque jour.') }}</p>
				<a href="{{ route('request-account') }}" class="btn btn-primary btn-lg d-inline-flex align-items-center">
					{{ __('Essayer gratuitement') }}<i class="isax isax-arrow-right-3 ms-2"></i>
				</a>
			</div>
		</div>
	</div>
</section>

@endsection
