{{-- 
    Reusable Avatar Cropper Component
    
    Usage:
    @include('backoffice.components.avatar-cropper', [
        'currentUrl'  => $user->avatar_url,
        'inputName'   => 'cropped_avatar',  // hidden input name for base64
        'previewId'   => 'avatar-preview',   // unique ID for the preview img
        'hasImage'    => $user->hasMedia('avatar'),
        'alt'         => $user->name,
    ])
    
    The parent form must include enctype="multipart/form-data" if also uploading files.
    The cropped base64 is stored in a hidden input with the given inputName.
    On "Save" (parent form submit), the server receives the base64 string.
--}}

@php
    $currentUrl = $currentUrl ?? asset('build/img/profiles/avatar-01.jpg');
    $inputName = $inputName ?? 'cropped_avatar';
    $previewId = $previewId ?? 'avatar-preview';
    $hasImage = $hasImage ?? false;
    $alt = $alt ?? 'Avatar';
    $uid = 'cropper-' . Str::random(6);
@endphp

<div class="mb-3" id="{{ $uid }}-wrapper">
    <span class="text-gray-9 fw-bold mb-2 d-flex">Photo de profil<span class="text-danger ms-1">*</span></span>
    <div class="d-flex align-items-center">
        <div class="avatar avatar-xxl border border-dashed bg-light me-3 flex-shrink-0">
            <div class="position-relative d-flex align-items-center">
                <img src="{{ $currentUrl }}" class="avatar avatar-xl" alt="{{ $alt }}" id="{{ $previewId }}">
                <a href="javascript:void(0);" id="{{ $uid }}-delete-btn"
                    class="rounded-trash trash-top d-flex align-items-center justify-content-center"
                    style="{{ $hasImage ? '' : 'display:none !important;' }}"><i class="isax isax-trash"></i></a>
            </div>
        </div>
        <div class="d-inline-flex flex-column align-items-start">
            <div class="drag-upload-btn btn btn-sm btn-primary position-relative mb-2">
                <i class="isax isax-image me-1"></i>Télécharger une image
                <input type="file" class="form-control image-sign" id="{{ $uid }}-file-input"
                    accept="image/jpeg,image/png,image/webp">
            </div>
            <span class="text-gray-9 fs-12">Format JPG ou PNG, 5 Mo maximum.</span>
            @error($inputName)
                <span class="text-danger fs-12">{{ $message }}</span>
            @enderror
        </div>
    </div>
    {{-- Hidden inputs for the parent form --}}
    <input type="hidden" name="{{ $inputName }}" id="{{ $uid }}-cropped-data" value="">
    <input type="hidden" name="{{ $inputName }}_deleted" id="{{ $uid }}-deleted-flag" value="0">
</div>

{{-- Crop Modal --}}
<div class="modal fade" id="{{ $uid }}-modal" tabindex="-1"
    aria-labelledby="{{ $uid }}-modal-label" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $uid }}-modal-label">Recadrer l'image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body p-0">
                <div class="d-flex justify-content-center" style="max-height:70vh; overflow:hidden;">
                    <img id="{{ $uid }}-crop-img" src="" alt="Aperçu"
                        style="max-width:100%; display:block;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" id="{{ $uid }}-crop-btn">
                    <i class="isax isax-image me-1"></i>Recadrer
                </button>
            </div>
        </div>
    </div>
</div>

@push('styles')
    @once
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css">
    @endonce
@endpush

@push('scripts')
    @once
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>
    @endonce
    <script>
        (function() {
            var uid = @json($uid);
            var defaultUrl = @json(asset('build/img/profiles/avatar-01.jpg'));
            var currentUrl = @json($currentUrl);

            var fileInput = document.getElementById(uid + '-file-input');
            var preview = document.getElementById(@json($previewId));
            var cropImg = document.getElementById(uid + '-crop-img');
            var modalEl = document.getElementById(uid + '-modal');
            var cropBtn = document.getElementById(uid + '-crop-btn');
            var deleteBtn = document.getElementById(uid + '-delete-btn');
            var croppedData = document.getElementById(uid + '-cropped-data');
            var deletedFlag = document.getElementById(uid + '-deleted-flag');
            var cropModal = new bootstrap.Modal(modalEl);
            var cropper = null;

            // File select → open crop modal
            fileInput.addEventListener('change', function() {
                var file = this.files[0];
                if (!file) return;

                var validTypes = ['image/jpeg', 'image/png', 'image/webp'];
                if (validTypes.indexOf(file.type) === -1) {
                    alert('Seuls les formats JPG, PNG et WEBP sont acceptés.');
                    this.value = '';
                    return;
                }
                if (file.size > 5 * 1024 * 1024) {
                    alert("L'image ne doit pas dépasser 5 Mo.");
                    this.value = '';
                    return;
                }

                var reader = new FileReader();
                reader.onload = function(e) {
                    cropImg.src = e.target.result;
                    cropModal.show();
                };
                reader.readAsDataURL(file);
            });

            // Init cropper on modal show
            modalEl.addEventListener('shown.bs.modal', function() {
                if (cropper) cropper.destroy();
                cropper = new Cropper(cropImg, {
                    aspectRatio: 1,
                    viewMode: 1,
                    dragMode: 'move',
                    autoCropArea: 0.8,
                    responsive: true,
                    restore: false,
                    guides: true,
                    center: true,
                    highlight: false,
                    cropBoxMovable: true,
                    cropBoxResizable: true,
                    toggleDragModeOnDblclick: false,
                });
            });

            // Cleanup on modal close
            modalEl.addEventListener('hidden.bs.modal', function() {
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }
                fileInput.value = '';
            });

            // Crop button → set preview + hidden input (NO submit)
            cropBtn.addEventListener('click', function() {
                if (!cropper) return;

                var canvas = cropper.getCroppedCanvas({
                    width: 300,
                    height: 300,
                    imageSmoothingEnabled: true,
                    imageSmoothingQuality: 'high',
                });

                var base64 = canvas.toDataURL('image/png');
                croppedData.value = base64;
                deletedFlag.value = '0';
                preview.src = base64;
                deleteBtn.style.display = '';
                cropModal.hide();
            });

            // Delete button → reset to default (NO server call)
            deleteBtn.addEventListener('click', function(e) {
                e.preventDefault();
                preview.src = defaultUrl;
                croppedData.value = '';
                deletedFlag.value = '1';
                deleteBtn.style.display = 'none';
            });
        })();
    </script>
@endpush
