@extends('web.layout.app')

@section('title', 'Contact')
@section('meta_description', 'Contactez l\'équipe ' . config('app.name') . '. Nous sommes là pour répondre à vos questions.')

@section('content')

    {{-- ===== HEADER ===== --}}
    <section class="public-hero text-center" style="padding: 50px 0;">
        <div class="container">
            <h1 class="fw-bold mb-2">Contactez-nous</h1>
            <p class="text-muted">Une question, une suggestion ou besoin d'aide ? Envoyez-nous un message.</p>
        </div>
    </section>

    {{-- ===== FORMULAIRE ===== --}}
    <section class="public-section pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="isax isax-tick-circle me-2"></i>
                                <div>{{ session('success') }}</div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                        </div>
                    @endif

                    <div class="card border">
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('contact.send') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nom complet <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            name="name"
                                            value="{{ old('name') }}"
                                            placeholder="Votre nom"
                                            required>
                                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Adresse email <span class="text-danger">*</span></label>
                                        <input type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            name="email"
                                            value="{{ old('email') }}"
                                            placeholder="votre@email.com"
                                            required>
                                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sujet <span class="text-danger">*</span></label>
                                    <select class="form-select @error('subject') is-invalid @enderror" name="subject" required>
                                        <option value="">— Sélectionnez un sujet —</option>
                                        <option value="question" {{ old('subject') === 'question' ? 'selected' : '' }}>Question générale</option>
                                        <option value="support" {{ old('subject') === 'support' ? 'selected' : '' }}>Support technique</option>
                                        <option value="billing" {{ old('subject') === 'billing' ? 'selected' : '' }}>Facturation & Abonnement</option>
                                        <option value="partnership" {{ old('subject') === 'partnership' ? 'selected' : '' }}>Partenariat</option>
                                        <option value="other" {{ old('subject') === 'other' ? 'selected' : '' }}>Autre</option>
                                    </select>
                                    @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message <span class="text-danger">*</span></label>
                                    <textarea
                                        class="form-control @error('message') is-invalid @enderror"
                                        name="message"
                                        rows="6"
                                        placeholder="Décrivez votre demande..."
                                        required>{{ old('message') }}</textarea>
                                    @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="isax isax-send-2 me-1"></i> Envoyer le message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== INFOS DE CONTACT ===== --}}
    <section class="public-section bg-light">
        <div class="container">
            <div class="row justify-content-center g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <span class="avatar avatar-lg bg-primary-transparent rounded-circle">
                                    <i class="isax isax-sms fs-24 text-primary"></i>
                                </span>
                            </div>
                            <h6>Email</h6>
                            <p class="text-muted mb-0">contact@{{ request()->getHost() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <span class="avatar avatar-lg bg-success-transparent rounded-circle">
                                    <i class="isax isax-clock fs-24 text-success"></i>
                                </span>
                            </div>
                            <h6>Horaires</h6>
                            <p class="text-muted mb-0">Lundi — Vendredi<br>9h00 — 18h00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <span class="avatar avatar-lg bg-warning-transparent rounded-circle">
                                    <i class="isax isax-message-question fs-24 text-warning"></i>
                                </span>
                            </div>
                            <h6>Support</h6>
                            <p class="text-muted mb-0">Réponse sous 24h ouvrées</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
