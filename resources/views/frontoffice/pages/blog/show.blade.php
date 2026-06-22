@extends('frontoffice.layouts.app')

@section('title', $post->getEffectiveMetaTitle())
@section('meta_description', $post->getEffectiveMetaDescription())
@if($post->meta_keywords)
@section('meta_keywords', $post->meta_keywords)
@endif
@section('og_type', 'article')
@if($post->cover_image)
@section('og_image', asset('storage/' . $post->cover_image))
@endif

@section('structured_data')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BlogPosting",
    "headline": "{{ addslashes($post->title) }}",
    "description": "{{ addslashes($post->getEffectiveMetaDescription()) }}",
    "url": "{{ route('blog.show', $post->slug) }}",
    "datePublished": "{{ $post->published_at->toIso8601String() }}",
    "dateModified": "{{ $post->updated_at->toIso8601String() }}",
    "author": {
        "@@type": "Person",
        "name": "{{ addslashes($post->author?->name ?? 'Équipe Hssabek') }}"
    },
    "publisher": {
        "@@type": "Organization",
        "name": "{{ config('app.name', 'Hssabek') }}",
        "logo": {
            "@@type": "ImageObject",
            "url": "{{ asset('assets/images/logo/hssabek mobile logo.png') }}"
        }
    },
    @if($post->cover_image)
    "image": {
        "@@type": "ImageObject",
        "url": "{{ asset('storage/' . $post->cover_image) }}",
        "alt": "{{ addslashes($post->cover_image_alt ?: $post->title) }}"
    },
    @endif
    @if($post->category)
    "articleSection": "{{ addslashes($post->category->name) }}",
    @endif
    @if($post->tags)
    "keywords": "{{ implode(', ', $post->tags) }}",
    @endif
    "timeRequired": "PT{{ $post->reading_time }}M",
    "inLanguage": "fr-MA",
    "mainEntityOfPage": {
        "@@type": "WebPage",
        "@@id": "{{ route('blog.show', $post->slug) }}"
    }
}
</script>
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
        {"@@type": "ListItem", "position": 1, "name": "Accueil", "item": "{{ route('home') }}"},
        {"@@type": "ListItem", "position": 2, "name": "Blog", "item": "{{ route('blog.index') }}"},
        {"@@type": "ListItem", "position": 3, "name": "{{ addslashes($post->title) }}", "item": "{{ route('blog.show', $post->slug) }}"}
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
				<div class="col-lg-9 text-center">
					<div class="banner-content" data-aos="fade-up">
						@if($post->category)
						<span class="info-badge fw-medium mb-3">{{ $post->category->name }}</span>
						@endif
						<div class="banner-title">
							<h1 class="mb-3 fs-28">{{ $post->title }}</h1>
						</div>
						<div class="d-flex align-items-center justify-content-center flex-wrap gap-3 text-muted fs-14">
							@if($post->author)
							<span class="d-flex align-items-center gap-1">
								<i class="isax isax-user"></i>
								{{ $post->author->name }}
							</span>
							@endif
							<span class="d-flex align-items-center gap-1">
								<i class="isax isax-calendar-1"></i>
								{{ $post->published_at->translatedFormat('d F Y') }}
							</span>
							<span class="d-flex align-items-center gap-1">
								<i class="isax isax-timer-1"></i>
								{{ $post->reading_time }} min {{ __('de lecture') }}
							</span>
							<span class="d-flex align-items-center gap-1">
								<i class="isax isax-eye"></i>
								{{ number_format($post->views) }} {{ __('vues') }}
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Hero Section -->
@endsection

@section('content')

<section class="saas-app-section pt-4">
	<div class="container">
		<div class="row justify-content-center">

			<!-- Article content -->
			<div class="col-lg-8">

				<!-- Breadcrumb -->
				<nav aria-label="breadcrumb" class="mb-4">
					<ol class="breadcrumb fs-13">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Accueil') }}</a></li>
						<li class="breadcrumb-item"><a href="{{ route('blog.index') }}">{{ __('Blog') }}</a></li>
						@if($post->category)
						<li class="breadcrumb-item">
							<a href="{{ route('blog.index', ['category' => $post->category->slug]) }}">{{ $post->category->name }}</a>
						</li>
						@endif
						<li class="breadcrumb-item active" aria-current="page">{{ Str::limit($post->title, 40) }}</li>
					</ol>
				</nav>

				<!-- Cover Image -->
				@if($post->cover_image)
				<div class="mb-4">
					<img src="{{ asset('storage/' . $post->cover_image) }}"
						class="img-fluid rounded w-100"
						alt="{{ $post->cover_image_alt ?: $post->title }}"
						fetchpriority="high" loading="eager" width="800" height="430">
				</div>
				@endif

				<!-- Article Body -->
				<div class="blog-content fs-15 lh-lg text-dark-50">
					{!! $post->content !!}
				</div>

				<!-- Tags -->
				@if($post->tags)
				<div class="mt-4 pt-4 border-top">
					<div class="d-flex align-items-center flex-wrap gap-2">
						<span class="fw-medium fs-13">{{ __('Tags :') }}</span>
						@foreach($post->tags as $tag)
						<span class="badge badge-soft-primary">{{ $tag }}</span>
						@endforeach
					</div>
				</div>
				@endif

				<!-- Share buttons -->
				<div class="mt-4 pt-4 border-top">
					<div class="d-flex align-items-center flex-wrap gap-2">
						<span class="fw-medium fs-13">{{ __('Partager :') }}</span>
						<a href="https://www.linkedin.com/shareArticle?url={{ urlencode(route('blog.show', $post->slug)) }}&title={{ urlencode($post->title) }}"
							target="_blank" rel="noopener nofollow"
							class="btn btn-sm btn-outline-white d-flex align-items-center gap-1">
							<i class="fab fa-linkedin fs-14"></i> LinkedIn
						</a>
						<a href="https://wa.me/?text={{ urlencode($post->title . ' — ' . route('blog.show', $post->slug)) }}"
							target="_blank" rel="noopener nofollow"
							class="btn btn-sm btn-outline-white d-flex align-items-center gap-1">
							<i class="fab fa-whatsapp fs-14"></i> WhatsApp
						</a>
						<a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}"
							target="_blank" rel="noopener nofollow"
							class="btn btn-sm btn-outline-white d-flex align-items-center gap-1">
							<i class="fab fa-twitter fs-14"></i> Twitter
						</a>
					</div>
				</div>

				<!-- Author bio -->
				@if($post->author)
				<div class="card mt-4 bg-light border-0">
					<div class="card-body d-flex align-items-center gap-3">
						<div class="avatar avatar-md bg-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
							<span class="text-white fw-bold fs-16">{{ strtoupper(substr($post->author->name, 0, 1)) }}</span>
						</div>
						<div>
							<div class="fw-medium">{{ $post->author->name }}</div>
							<div class="fs-12 text-muted">{{ __('Équipe Hssabek — Logiciel de facturation Maroc') }}</div>
						</div>
					</div>
				</div>
				@endif

				<!-- Navigation: prev/next could be added later -->

			</div>

			<!-- Sidebar -->
			<div class="col-lg-4">
				<div class="sticky-top" style="top:90px;">

					<!-- CTA Card -->
					<div class="card bg-primary text-white mb-4">
						<div class="card-body p-4">
							<h5 class="text-white mb-2">{{ __('Essayez Hssabek gratuitement') }}</h5>
							<p class="mb-3 opacity-75 fs-14">{{ __('Créez vos premières factures et devis en 10 secondes grâce à l\'IA. Conforme DGI Maroc.') }}</p>
							<a href="{{ route('request-account') }}" class="btn btn-white text-primary w-100 fw-medium">
								{{ __('Demander un accès gratuit') }}
							</a>
						</div>
					</div>

					<!-- Related Posts -->
					@if($related->isNotEmpty())
					<div class="card mb-4">
						<div class="card-header"><h5 class="card-title mb-0 fs-14">{{ __('Articles similaires') }}</h5></div>
						<div class="card-body p-0">
							@foreach($related as $rel)
							<a href="{{ route('blog.show', $rel->slug) }}" class="d-flex align-items-start gap-3 p-3 border-bottom text-dark text-decoration-none hover-bg-light">
								@if($rel->cover_image)
								<img src="{{ asset('storage/' . $rel->cover_image) }}"
									class="rounded flex-shrink-0" width="60" height="60" style="object-fit:cover;"
									alt="{{ $rel->title }}" loading="lazy">
								@else
								<div class="avatar avatar-md bg-light rounded flex-shrink-0 d-flex align-items-center justify-content-center">
									<i class="isax isax-document-text text-muted"></i>
								</div>
								@endif
								<div>
									<div class="fw-medium fs-13 lh-sm mb-1">{{ Str::limit($rel->title, 60) }}</div>
									<div class="fs-11 text-muted">{{ $rel->published_at->translatedFormat('d M Y') }}</div>
								</div>
							</a>
							@endforeach
						</div>
					</div>
					@endif

					<!-- Back to blog -->
					<a href="{{ route('blog.index') }}" class="btn btn-outline-white w-100">
						<i class="isax isax-arrow-left me-1"></i>{{ __('Tous les articles') }}
					</a>

				</div>
			</div>

		</div>
	</div>
</section>

@push('styles')
<style>
/* Blog content typography */
.blog-content h2 { font-size: 1.4rem; font-weight: 700; margin: 2rem 0 1rem; }
.blog-content h3 { font-size: 1.2rem; font-weight: 600; margin: 1.5rem 0 0.75rem; }
.blog-content p  { margin-bottom: 1.25rem; line-height: 1.8; }
.blog-content ul, .blog-content ol { padding-left: 1.5rem; margin-bottom: 1.25rem; }
.blog-content li { margin-bottom: 0.5rem; line-height: 1.7; }
.blog-content blockquote {
    border-left: 4px solid #7f56ff;
    padding: 1rem 1.5rem;
    background: #f5f3ff;
    border-radius: 0 8px 8px 0;
    margin: 1.5rem 0;
    font-style: italic;
}
.blog-content img { max-width: 100%; border-radius: 8px; margin: 1rem 0; }
.blog-content a { color: #7f56ff; text-decoration: underline; }
.blog-content strong { font-weight: 600; }
.blog-content code {
    background: #f1f0f5;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 0.9em;
}
</style>
@endpush

@endsection
