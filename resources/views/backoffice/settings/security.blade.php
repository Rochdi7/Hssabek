<?php $page = 'security-settings'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Sécurité')
@section('description', 'Configurer les paramètres de sécurité')
@section('content')
    <!-- ========================
                Start Page Content
            ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">
            <!-- start row -->
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <!-- start row -->
                    <div class=" row settings-wrapper d-flex">
                        <!-- Start settings sidebar -->
                        @component('backoffice.components.settings-sidebar')
                        @endcomponent
                        <!-- End settings sidebar -->

                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">{{ __('Sécurité') }}</h6>
                                </div>

                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                {{-- 1. Mot de passe --}}
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-lock-circle text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">{{ __('Mot de passe') }}</h5>
                                            <p class="fs-14 mb-0">{{ __('Dernière modification') }} :
                                                @if($user->password_changed_at)
                                                    {{ $user->password_changed_at->translatedFormat('d M Y') }}
                                                @else
                                                    {{ __('Jamais modifié') }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#change_password"><span
                                                class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i
                                                    class="isax isax-edit"></i></span></a>
                                    </div>
                                </div>

                                {{-- 2. Vérification de l'email --}}
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-sms-tracking text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">{{ __("Vérification de l'email") }}</h5>
                                            <p class="fs-14 mb-0">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        @if($user->email_verified_at)
                                            <span class="badge badge-md badge-soft-success me-3">{{ __('Vérifié le') }} {{ $user->email_verified_at->translatedFormat('d M Y') }}<i
                                                    class="isax isax-tick-circle ms-1"></i></span>
                                        @else
                                            <span class="badge badge-md badge-soft-warning me-3">{{ __('Non vérifié') }}</span>
                                            <form method="POST" action="{{ route('verification.send') }}" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-primary ms-2">{{ __('Renvoyer') }}</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>

                                {{-- 3. Navigateurs et appareils --}}
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-device-message text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">{{ __('Navigateurs et appareils') }}</h5>
                                            <p class="fs-14 mb-0">{{ $sessions->count() }} {{ __('session(s) active(s)') }}</p>
                                        </div>
                                    </div>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#view_device"><span
                                            class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i
                                                class="isax isax-eye"></i></span></a>
                                </div>

                                {{-- 4. Désactiver le compte --}}
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-close-circle text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">{{ __('Désactiver le compte') }}</h5>
                                            <p class="fs-14 mb-0">{{ __('Votre compte sera réactivé lorsque vous vous reconnecterez.') }}</p>
                                        </div>
                                    </div>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deactivate_account_modal"><span
                                            class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i
                                                class="isax isax-slash"></i></span></a>
                                </div>

                                {{-- 5. Supprimer le compte --}}
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-info-circle text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">{{ __('Supprimer le compte') }}</h5>
                                            <p class="fs-14 mb-0">{{ __('Votre compte sera définitivement supprimé.') }}</p>
                                        </div>
                                    </div>
                                    @if($pendingDeleteRequest)
                                        <span class="badge badge-md badge-soft-warning">{{ __('Demande en cours') }}<i class="isax isax-clock ms-1"></i></span>
                                    @else
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_account_modal"><span
                                                class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i
                                                    class="isax isax-trash"></i></span></a>
                                    @endif
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- End Content -->

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- Start Change Password Modal -->
    <div id="change_password" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Start modal header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Changer le mot de passe') }}</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                </div>
                <!-- End modal header -->
                <form method="POST" action="{{ route('bo.account.settings.password') }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Mot de passe actuel') }}<span class="text-danger ms-1">*</span></label>
                            <div class="pass-group input-group">
                                <span class="input-group-text border-end-0">
                                    <i class="isax isax-lock"></i>
                                </span>
                                <span class="isax toggle-password isax-eye-slash"></span>
                                <input type="password" name="current_password" class="pass-input form-control border-start-0 ps-0 @error('current_password') is-invalid @enderror" placeholder="****************">
                                @error('current_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="mb-3" id="passwordInput">
                            <label class="form-label">{{ __('Nouveau mot de passe') }}<span class="text-danger ms-1">*</span></label>
                            <div class="pass-group input-group mb-3">
                                <span class="input-group-text border-end-0">
                                    <i class="isax isax-lock"></i>
                                </span>
                                <span class="isax toggle-passwords isax-eye-slash"></span>
                                <input type="password" name="password" class="pass-inputs form-control border-start-0 ps-0 @error('password') is-invalid @enderror" placeholder="****************">
                                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="password-strength d-flex" id="passwordStrength">
                                <span id="poor"></span>
                                <span id="weak"></span>
                                <span id="strong"></span>
                                <span id="heavy"></span>
                            </div>
                            <div id="passwordInfo" class="mb-2"></div>
                            <p class="text-gray-5">{{ __('Utilisez au moins 8 caractères avec un mélange de lettres, chiffres et symboles.') }}</p>
                        </div>
                        <div>
                            <label class="form-label">{{ __('Confirmer le mot de passe') }}<span class="text-danger ms-1">*</span></label>
                            <div class="pass-group input-group">
                                <span class="input-group-text border-end-0">
                                    <i class="isax isax-lock"></i>
                                </span>
                                <input type="password" name="password_confirmation" class="form-control border-start-0 ps-0" placeholder="****************">
                            </div>
                        </div>
                    </div><!-- End modal body -->
                    <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                    </div><!-- End modal footer -->
                </form>
            </div><!-- End modal content-->
        </div><!-- End modal dialog-->
    </div>
    <!-- End Change Password Modal -->

    <!-- Start View Device Modal -->
    <div id="view_device" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Start modal header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Navigateurs et appareils') }}</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                </div>
                <!-- End modal header -->
                <div class="modal-body">
                    <!-- Table List -->
                    <div class="table-responsive border border-bottom-0">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('Appareil') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Adresse IP') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sessions as $session)
                                    <tr>
                                        <td class="text-dark">
                                            {{ $session->device }}
                                            @if($session->is_current)
                                                <span class="badge badge-soft-success ms-1">{{ __('Session actuelle') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $session->last_activity->translatedFormat('d M Y, H:i') }}</td>
                                        <td>{{ $session->ip_address ?? 'N/A' }}</td>
                                        <td>
                                            @if(!$session->is_current)
                                                <form method="POST" action="{{ route('bo.settings.security.revoke-session', $session->id) }}" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent">
                                                        <span class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i class="isax isax-logout"></i></span>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">{{ __('Aucune session active trouvée.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /Table List -->
                </div><!-- End modal body -->
            </div><!-- End modal content-->
        </div><!-- End modal dialog-->
    </div>
    <!-- End View Device Modal -->

    <!-- Start Deactivate Account Modal -->
    <div class="modal fade" id="deactivate_account_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Désactiver le compte') }}</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <span class="avatar avatar-xl border bg-light mb-3">
                            <i class="isax isax-close-circle text-danger fs-36"></i>
                        </span>
                        <h5 class="fw-semibold mb-2">{{ __('Êtes-vous sûr ?') }}</h5>
                        <p class="fs-14">{{ __('Cette action désactivera votre compte. Votre compte sera réactivé automatiquement lorsque vous vous reconnecterez.') }}</p>
                    </div>
                </div>
                <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                    <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                    <form method="POST" action="{{ route('bo.settings.security.deactivate') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">{{ __('Désactiver mon compte') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Deactivate Account Modal -->

    <!-- Start Delete Account Modal -->
    <div class="modal fade" id="delete_account_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Supprimer le compte') }}</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                </div>
                <form method="POST" action="{{ route('bo.settings.delete-account.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <p class="text-dark fw-semibold mb-0">{{ __('Pourquoi souhaitez-vous supprimer votre compte ?') }}</p>
                            <p class="fs-13">{{ __('Nous sommes désolés de vous voir partir ! Pour nous aider à nous améliorer, veuillez nous indiquer la raison de votre demande.') }}</p>
                        </div>
                        <div>
                            <div class="form-check mb-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="reason_type" id="reason-1" value="no_longer_using">
                                <div class="ms-2">
                                    <p class="text-dark fw-semibold mb-0">{{ __("Je n'utilise plus le service") }}</p>
                                    <label class="form-check-label fs-13" for="reason-1">
                                        {{ __("Je n'ai plus besoin de ce service et ne l'utiliserai plus à l'avenir.") }}
                                    </label>
                                </div>
                            </div>
                            <div class="form-check mb-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="reason_type" id="reason-2" value="privacy">
                                <div class="ms-2">
                                    <p class="text-dark fw-semibold mb-0">{{ __('Préoccupations de confidentialité') }}</p>
                                    <label class="form-check-label fs-13" for="reason-2">
                                        {{ __('Je suis préoccupé par la gestion de mes données et je souhaite les supprimer.') }}
                                    </label>
                                </div>
                            </div>
                            <div class="form-check mb-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="reason_type" id="reason-3" value="notifications">
                                <div class="ms-2">
                                    <p class="text-dark fw-semibold mb-0">{{ __('Trop de notifications / e-mails') }}</p>
                                    <label class="form-check-label fs-13" for="reason-3">
                                        {{ __("Je suis submergé par le volume de notifications ou d'e-mails.") }}
                                    </label>
                                </div>
                            </div>
                            <div class="form-check mb-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="reason_type" id="reason-4" value="poor_experience">
                                <div class="ms-2">
                                    <p class="text-dark fw-semibold mb-0">{{ __('Mauvaise expérience utilisateur') }}</p>
                                    <label class="form-check-label fs-13" for="reason-4">
                                        {{ __("J'ai eu des difficultés à utiliser la plateforme et elle n'a pas répondu à mes attentes.") }}
                                    </label>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="reason_type" id="reason-5" value="other" checked>
                                <label class="form-check-label text-dark fw-semibold" for="reason-5">
                                    {{ __('Autre (veuillez préciser)') }}
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="form-label">{{ __('Raison') }}<span class="text-danger ms-1">*</span></label>
                            <textarea class="form-control @error('reason_details') is-invalid @enderror" name="reason_details" rows="3" placeholder="{{ __('Décrivez la raison...') }}"></textarea>
                            @error('reason_details')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Confirmer la suppression') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Delete Account Modal -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if($errors->any())
            var modal = new bootstrap.Modal(document.getElementById('change_password'));
            modal.show();
            @endif

            // Password strength meter
            var pwInput = document.querySelector('#passwordInput input[name="password"]');
            var strengthBar = document.getElementById('passwordStrength');
            var poor = document.querySelector('#passwordStrength #poor');
            var weak = document.querySelector('#passwordStrength #weak');
            var strong = document.querySelector('#passwordStrength #strong');
            var heavy = document.querySelector('#passwordStrength #heavy');
            var info = document.getElementById('passwordInfo');

            if (pwInput && strengthBar) {
                pwInput.addEventListener('input', function() {
                    var val = this.value;
                    var len = val.length;
                    var hasLower = /[a-z]/.test(val);
                    var hasNumber = /[0-9]/.test(val);
                    var hasSpecial = /[#?!@$%^&*\-]/.test(val);
                    var hasWhitespace = /\s/.test(val);

                    // Reset
                    [poor, weak, strong, heavy].forEach(function(el) { el.classList.remove('active'); });
                    strengthBar.classList.remove('poor-active', 'avg-active', 'strong-active', 'heavy-active');

                    if (len === 0) {
                        strengthBar.style.display = 'none';
                        info.style.display = 'none';
                        return;
                    }

                    strengthBar.style.display = 'flex';
                    info.style.display = 'block';

                    if (hasWhitespace) {
                        info.textContent = {!! json_encode(__('Les espaces ne sont pas autorisés')) !!};
                        info.style.color = '#FF0000';
                        return;
                    }

                    // Heavy: 8+ chars, lowercase, number AND special
                    if (len >= 8 && hasLower && hasNumber && hasSpecial) {
                        [poor, weak, strong, heavy].forEach(function(el) { el.classList.add('active'); });
                        strengthBar.classList.add('heavy-active');
                        info.textContent = {!! json_encode(__('Excellent ! Mot de passe sécurisé.')) !!};
                        info.style.color = '#159F46';
                    }
                    // Strong: 8+ chars, lowercase AND (number or special)
                    else if (len >= 8 && hasLower && (hasNumber || hasSpecial)) {
                        [poor, weak, strong].forEach(function(el) { el.classList.add('active'); });
                        strengthBar.classList.add('strong-active');
                        info.textContent = {!! json_encode(__('Presque ! Ajoutez un symbole spécial.')) !!};
                        info.style.color = '#1D9CFD';
                    }
                    // Weak/Average: 8+ chars, at least one condition
                    else if (len >= 8 && (hasLower || hasNumber || hasSpecial)) {
                        [poor, weak].forEach(function(el) { el.classList.add('active'); });
                        strengthBar.classList.add('avg-active');
                        info.textContent = {!! json_encode(__('Moyen. Ajoutez des lettres et des chiffres.')) !!};
                        info.style.color = '#FFB54A';
                    }
                    // Poor: anything else
                    else {
                        poor.classList.add('active');
                        strengthBar.classList.add('poor-active');
                        info.textContent = {!! json_encode(__('Faible. Minimum 8 caractères requis.')) !!};
                        info.style.color = '#FF0000';
                    }
                });
            }
        });
    </script>

    <!-- ========================
                End Page Content
            ========================= -->
@endsection
