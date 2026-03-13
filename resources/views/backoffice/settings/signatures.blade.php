<?php $page = 'esignatures'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                Start Page Content
            ========================= -->

    <div class="page-wrapper">
        <!-- Start Content -->
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class=" row settings-wrapper d-flex">
                        <!-- Start settings sidebar -->
                        @component('backoffice.components.settings-sidebar')
                        @endcomponent
                        <!-- End settings sidebar -->
                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">{{ __('Signatures électroniques') }}</h6>
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

                                <div class="mb-3">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#add_signatures"
                                                class="btn btn-primary d-flex align-items-center"><i
                                                    class="isax isax-add-circle5 me-2"></i>{{ __('Nouvelle signature') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-nowrap">
                                    <table class="table border">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="no-sort">{{ __('Nom de la signature') }}</th>
                                                <th>{{ __('Signature') }}</th>
                                                <th>{{ __('Par défaut') }}</th>
                                                <th>{{ __('Statut') }}</th>
                                                <th class="no-sort"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($signatures as $signature)
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-dark">{{ $signature->name }}</a>
                                                    </td>
                                                    <td>
                                                        @if($signature->signature_url)
                                                            <img src="{{ $signature->signature_url }}" alt="{{ $signature->name }}" style="max-height: 40px;">
                                                        @else
                                                            <span class="text-muted">&mdash;</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="rounded-circle bg-light p-1" href="javascript:void(0);">
                                                            <i class="isax isax-star {{ $signature->is_default ? 'icon-active' : '' }}"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form method="POST" action="{{ route('bo.settings.signatures.toggle', $signature) }}" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch"
                                                                    {{ $signature->status === 'active' ? 'checked' : '' }}
                                                                    onchange="this.closest('form').submit()">
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                            <i class="isax isax-more"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="javascript:void(0);"
                                                                    class="dropdown-item d-flex align-items-center"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit_signature_{{ $signature->id }}"><i
                                                                        class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);"
                                                                    class="dropdown-item d-flex align-items-center"
                                                                    data-bs-toggle="modal" data-bs-target="#delete_signature_{{ $signature->id }}"><i
                                                                        class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">{{ __('Aucune signature trouvée.') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End container -->

        @component('backoffice.components.footer')
        @endcomponent

    </div>

    <!-- Add Signature Modal -->
    <div class="modal fade" id="add_signatures" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Ajouter une signature') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('bo.settings.signatures.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nom') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Image de la signature') }} <span class="text-danger">*</span></label>
                            <div class="mb-2">
                                <img src="" alt="{{ __('Aperçu') }}" id="add-sig-preview" class="border"
                                    style="max-height: 80px; object-fit: cover; display: none;">
                            </div>
                            <input type="file" class="form-control @error('signature_image') is-invalid @enderror" name="signature_image" accept="image/*" required
                                onchange="if(this.files[0]){var r=new FileReader();r.onload=function(e){var p=document.getElementById('add-sig-preview');p.src=e.target.result;p.style.display='';};r.readAsDataURL(this.files[0]);}">
                            @error('signature_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_default" value="1" id="add_is_default">
                            <label class="form-check-label" for="add_is_default">{{ __('Définir par défaut') }}</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit & Delete Modals (per signature) -->
    @foreach($signatures as $signature)
        <!-- Edit Modal -->
        <div class="modal fade" id="edit_signature_{{ $signature->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Modifier la signature') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('bo.settings.signatures.update', $signature) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Nom') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{ $signature->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Image de la signature') }}</label>
                                <div class="mb-2">
                                    <img src="{{ $signature->signature_url ?? '' }}" alt="{{ $signature->name }}"
                                        id="edit-sig-preview-{{ $signature->id }}" class="border"
                                        style="max-height: 60px; object-fit: cover;{{ $signature->signature_url ? '' : ' display: none;' }}">
                                </div>
                                <input type="file" class="form-control" name="signature_image" accept="image/*"
                                    onchange="if(this.files[0]){var r=new FileReader();r.onload=function(e){var p=document.getElementById('edit-sig-preview-{{ $signature->id }}');p.src=e.target.result;p.style.display='';};r.readAsDataURL(this.files[0]);}">
                                <small class="text-muted">{{ __("Laissez vide pour garder l'image actuelle.") }}</small>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_default" value="1"
                                    id="edit_is_default_{{ $signature->id }}"
                                    {{ $signature->is_default ? 'checked' : '' }}>
                                <label class="form-check-label" for="edit_is_default_{{ $signature->id }}">{{ __('Définir par défaut') }}</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="delete_signature_{{ $signature->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Supprimer la signature') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('Êtes-vous sûr de vouloir supprimer la signature') }} <strong>{{ $signature->name }}</strong> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <form action="{{ route('bo.settings.signatures.destroy', $signature) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('Supprimer') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- ========================
                End Page Content
            ========================= -->
@endsection
