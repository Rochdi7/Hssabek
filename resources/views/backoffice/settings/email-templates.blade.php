<?php $page = 'email-templates'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                Start Page Content
            ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">
            <!-- start row -->
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="row">
                        <!-- Start settings sidebar -->
                        @component('backoffice.components.settings-sidebar')
                        @endcomponent
                        <!-- End settings sidebar -->
                        <div class="col-xl-9 col-lg-8">
                            <div>
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">{{ __("Modèles d'email") }}</h6>
                                </div>
                                <div class="mb-3">
                                    <!-- Table Search -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input-icon-start position-relative mb-3">
                                                <span class="input-icon-addon">
                                                    <i class="isax isax-search-normal"></i>
                                                </span>
                                                <input type="text" class="form-control form-control-sm bg-white"
                                                    placeholder="{{ __('Rechercher') }}" id="email-template-search">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex justify-content-end align-items-center flex-wrap gap-2 mb-3">
                                                <div>
                                                    <a href="#" class="btn btn-primary d-flex align-items-center"
                                                        data-bs-toggle="modal" data-bs-target="#add_modal"><i
                                                            class="isax isax-add-circle5 me-1"></i>{{ __('Nouveau modèle') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Table Search -->

                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></button>
                                        </div>
                                    @endif

                                    @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></button>
                                        </div>
                                    @endif

                                    <!-- Table List -->
                                    <div class="table-responsive table-nowrap">
                                        <table class="table border mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>{{ __('Nom du modèle') }}</th>
                                                    <th>{{ __('Créé le') }}</th>
                                                    <th>{{ __('Statut') }}</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($templates as $template)
                                                    <tr>
                                                        <td>
                                                            <h6 class="fw-medium fs-14"><a href="javascript:void(0);"
                                                                    data-bs-toggle="modal" data-bs-target="#view_email_{{ $template['id'] }}">{{ $template['name'] }}</a></h6>
                                                        </td>
                                                        <td>
                                                            <p class="text-dark">{{ \Carbon\Carbon::parse($template['created_at'])->format('d M Y') }}</p>
                                                        </td>
                                                        <td>
                                                            <div class="form-check form-switch">
                                                                <form method="POST" action="{{ route('bo.settings.email-templates.toggle', $template['id']) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                                        {{ ($template['is_active'] ?? true) ? 'checked' : '' }}
                                                                        onchange="this.closest('form').submit()">
                                                                </form>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                                    <i class="isax isax-more"></i>
                                                                </a>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a href="#"
                                                                            class="dropdown-item d-flex align-items-center"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#view_email_{{ $template['id'] }}"><i
                                                                                class="isax isax-eye me-2"></i>{{ __('Aperçu') }}</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"
                                                                            class="dropdown-item d-flex align-items-center"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#edit_modal_{{ $template['id'] }}"><i
                                                                                class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);"
                                                                            class="dropdown-item d-flex align-items-center"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#delete_modal_{{ $template['id'] }}"><i
                                                                                class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">{{ __("Aucun modèle d'email trouvé.") }}</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /Table List -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- End Content -->

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- ========================
                End Page Content
            ========================= -->

    {{-- ============================================
        Add Email Template Modal
    ============================================= --}}
    <div id="add_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __("Nouveau modèle d'email") }}</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                </div>
                <form method="POST" action="{{ route('bo.settings.email-templates.store') }}">
                    @csrf
                    <input type="hidden" name="_modal" value="add_modal">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Nom du modèle') }} <span class="text-danger ms-1">*</span></label>
                                    <input type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        name="name"
                                        value="{{ old('name') }}"
                                        placeholder="{{ __('Ex : E-mail de bienvenue') }}">
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Objet') }} <span class="text-danger ms-1">*</span></label>
                                    <input type="text"
                                        class="form-control @error('subject') is-invalid @enderror"
                                        name="subject"
                                        value="{{ old('subject') }}"
                                        placeholder="{{ __('Ex : Bienvenue sur notre plateforme') }}">
                                    @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __("Contenu de l'email") }} <span class="text-danger ms-1">*</span></label>
                                    <textarea
                                        class="form-control @error('body') is-invalid @enderror"
                                        name="body"
                                        rows="10"
                                        placeholder="{{ __("Saisissez le contenu HTML ou texte de l'email...") }}">{{ old('body') }}</textarea>
                                    @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- /Add Email Template Modal --}}

    {{-- ============================================
        Per-Template Modals: View, Edit, Delete
    ============================================= --}}
    @foreach($templates as $template)

        {{-- View / Preview Email Template Modal --}}
        <div id="view_email_{{ $template['id'] }}" class="modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Aperçu') }} : {{ $template['name'] }}</h4>
                        <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('Objet') }} :</label>
                            <p class="text-dark mb-0">{{ $template['subject'] }}</p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('Contenu') }} :</label>
                            <div class="border rounded p-3 bg-light">
                                {!! nl2br(e($template['body'])) !!}
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 text-muted">
                            <small><i class="isax isax-calendar me-1"></i> {{ __('Créé le') }} {{ \Carbon\Carbon::parse($template['created_at'])->format('d/m/Y à H:i') }}</small>
                            <small><i class="isax isax-refresh me-1"></i> {{ __('Modifié le') }} {{ \Carbon\Carbon::parse($template['updated_at'])->format('d/m/Y à H:i') }}</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- /View Email Template Modal --}}

        {{-- Edit Email Template Modal --}}
        <div id="edit_modal_{{ $template['id'] }}" class="modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Modifier le modèle') }}</h4>
                        <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                    </div>
                    <form method="POST" action="{{ route('bo.settings.email-templates.update', $template['id']) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="_modal" value="edit_modal">
                        <input type="hidden" name="_template_id" value="{{ $template['id'] }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Nom du modèle') }} <span class="text-danger ms-1">*</span></label>
                                        <input type="text"
                                            class="form-control"
                                            name="name"
                                            value="{{ $template['name'] }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Objet') }} <span class="text-danger ms-1">*</span></label>
                                        <input type="text"
                                            class="form-control"
                                            name="subject"
                                            value="{{ $template['subject'] }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __("Contenu de l'email") }} <span class="text-danger ms-1">*</span></label>
                                        <textarea
                                            class="form-control"
                                            name="body"
                                            rows="10">{{ $template['body'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                            <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Enregistrer les modifications') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- /Edit Email Template Modal --}}

        {{-- Delete Email Template Modal --}}
        <div class="modal fade" id="delete_modal_{{ $template['id'] }}">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="mb-3">
                            <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                        </div>
                        <h6 class="mb-1">{{ __('Supprimer le modèle') }}</h6>
                        <p class="mb-3">{{ __('Êtes-vous sûr de vouloir supprimer') }} « {{ $template['name'] }} » ?</p>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:void(0);" class="btn btn-outline-white me-3" data-bs-dismiss="modal">{{ __('Annuler') }}</a>
                            <form method="POST" action="{{ route('bo.settings.email-templates.destroy', $template['id']) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">{{ __('Oui, Supprimer') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- /Delete Email Template Modal --}}

    @endforeach

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Client-side search filtering
        var searchInput = document.getElementById('email-template-search');
        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                var filter = this.value.toLowerCase();
                var rows = document.querySelectorAll('table tbody tr');
                rows.forEach(function(row) {
                    var text = row.textContent.toLowerCase();
                    row.style.display = text.includes(filter) ? '' : 'none';
                });
            });
        }

        // Re-open modal on validation error
        @if($errors->any())
            @if(old('_modal') === 'add_modal')
                var addModal = new bootstrap.Modal(document.getElementById('add_modal'));
                addModal.show();
            @elseif(old('_modal') === 'edit_modal' && old('_template_id'))
                var editModal = new bootstrap.Modal(document.getElementById('edit_modal_' + '{{ old("_template_id") }}'));
                if (editModal) editModal.show();
            @endif
        @endif
    });
</script>
@endpush
