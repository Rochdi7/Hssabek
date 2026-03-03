{{--
    Reusable Avatar / Image Cropper Component

    Usage:
    @include('backoffice.components.avatar-cropper', [
        'currentUrl'  => $user->avatar_url,
        'defaultUrl'  => asset('build/img/profiles/avatar-01.jpg'), // fallback on delete
        'inputName'   => 'cropped_avatar',  // hidden input name for base64
        'previewId'   => 'avatar-preview',  // unique ID for the preview img
        'hasImage'    => $user->hasMedia('avatar'),
        'alt'         => $user->name,
        'label'       => 'Photo de profil', // label text
        'required'    => true,              // show * after label
    ])

    The cropped base64 is stored in a hidden input with the given inputName.
    On "Save" (parent form submit), the server receives the base64 string.
--}}

@php
    $currentUrl = $currentUrl ?? asset('build/img/profiles/avatar-01.jpg');
    $defaultUrl = $defaultUrl ?? asset('build/img/profiles/avatar-01.jpg');
    $inputName = $inputName ?? 'cropped_avatar';
    $previewId = $previewId ?? 'avatar-preview';
    $hasImage = $hasImage ?? false;
    $alt = $alt ?? 'Avatar';
    $label = $label ?? 'Photo de profil';
    $required = $required ?? true;
    $uid = 'cropper-' . Str::random(6);
@endphp

<div class="mb-3" id="{{ $uid }}-wrapper">
    <span class="text-gray-9 fw-bold mb-2 d-flex">{{ $label }}@if($required)<span class="text-danger ms-1">*</span>@endif</span>
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
                <i class="isax isax-image me-1"></i>T&eacute;l&eacute;charger une image
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

@push('styles')
    @once
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css">
        <style>
            #shared-crop-modal { z-index: 1070; }
            #shared-crop-modal + .modal-backdrop { z-index: 1065; }
        </style>
    @endonce
@endpush

@push('scripts')
    @once
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>
        <script>
            // ── Shared Crop Modal (single instance for ALL avatar-cropper components) ──
            (function() {
                var modalHtml = '<div class="modal fade" id="shared-crop-modal" tabindex="-1"'
                    + ' aria-labelledby="shared-crop-modal-label" aria-hidden="true"'
                    + ' data-bs-backdrop="static" data-bs-keyboard="false">'
                    + '<div class="modal-dialog modal-dialog-centered modal-lg">'
                    + '<div class="modal-content">'
                    + '<div class="modal-header">'
                    + '<h5 class="modal-title" id="shared-crop-modal-label">Recadrer l\'image</h5>'
                    + '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>'
                    + '</div>'
                    + '<div class="modal-body p-0">'
                    + '<div class="d-flex justify-content-center" style="max-height:70vh; overflow:hidden;">'
                    + '<img id="shared-crop-img" src="" alt="Aper\u00e7u" style="max-width:100%; display:block;">'
                    + '</div>'
                    + '</div>'
                    + '<div class="modal-footer">'
                    + '<button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">Annuler</button>'
                    + '<button type="button" class="btn btn-primary" id="shared-crop-btn" disabled>'
                    + '<i class="isax isax-image me-1"></i>Recadrer'
                    + '</button>'
                    + '</div>'
                    + '</div></div></div>';

                var wrapper = document.createElement('div');
                wrapper.innerHTML = modalHtml;
                document.body.appendChild(wrapper.firstElementChild);

                var modalEl = document.getElementById('shared-crop-modal');
                var cropImg = document.getElementById('shared-crop-img');
                var cropBtn = document.getElementById('shared-crop-btn');
                var cropModal = new bootstrap.Modal(modalEl);
                var cropper = null;
                var activeCallback = null;
                var pendingImageSrc = null;

                function destroyCropper() {
                    if (cropper) {
                        cropper.destroy();
                        cropper = null;
                    }
                }

                function createCropper() {
                    destroyCropper();
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
                        ready: function() {
                            cropBtn.disabled = false;
                        }
                    });
                }

                // Init cropper AFTER modal is fully visible
                modalEl.addEventListener('shown.bs.modal', function() {
                    destroyCropper();
                    cropBtn.disabled = true;

                    // Set image src now that modal is visible
                    if (pendingImageSrc) {
                        cropImg.src = pendingImageSrc;
                        pendingImageSrc = null;
                    }

                    // Wait for image to load, then give the browser a frame to paint
                    // before creating the Cropper (it needs visible container dimensions)
                    function onImageReady() {
                        cropImg.onload = null;
                        setTimeout(function() { createCropper(); }, 50);
                    }

                    if (cropImg.complete && cropImg.naturalWidth > 0) {
                        onImageReady();
                    } else {
                        cropImg.onload = onImageReady;
                    }
                });

                // Cleanup on modal close
                modalEl.addEventListener('hidden.bs.modal', function() {
                    destroyCropper();
                    cropBtn.disabled = true;
                    cropImg.onload = null;
                    cropImg.src = '';
                    activeCallback = null;
                    pendingImageSrc = null;
                    // Re-add modal-open to body if a parent modal is still visible
                    if (document.querySelector('.modal.show')) {
                        document.body.classList.add('modal-open');
                        document.body.style.overflow = 'hidden';
                        document.body.style.paddingRight = '';
                    }
                });

                // Crop button → send result to the active callback
                cropBtn.addEventListener('click', function() {
                    if (!cropper || !activeCallback) return;

                    var canvas = cropper.getCroppedCanvas({
                        width: 300,
                        height: 300,
                        imageSmoothingEnabled: true,
                        imageSmoothingQuality: 'high',
                    });

                    if (!canvas) return;

                    var base64 = canvas.toDataURL('image/png');
                    activeCallback(base64);
                    cropModal.hide();
                });

                // Expose open method — store src, don't set it until modal is visible
                window.__sharedCropper = {
                    open: function(imageSrc, callback) {
                        activeCallback = callback;
                        pendingImageSrc = imageSrc;
                        cropModal.show();
                    }
                };
            })();
        </script>
    @endonce

    {{-- Per-instance initialization --}}
    <script>
        (function() {
            var uid = @json($uid);
            var defaultUrl = @json($defaultUrl);

            var fileInput = document.getElementById(uid + '-file-input');
            var preview = document.getElementById(@json($previewId));
            var deleteBtn = document.getElementById(uid + '-delete-btn');
            var croppedData = document.getElementById(uid + '-cropped-data');
            var deletedFlag = document.getElementById(uid + '-deleted-flag');

            // File select → open shared crop modal
            fileInput.addEventListener('change', function() {
                var file = this.files[0];
                if (!file) return;

                var validTypes = ['image/jpeg', 'image/png', 'image/webp'];
                if (validTypes.indexOf(file.type) === -1) {
                    alert('Seuls les formats JPG, PNG et WEBP sont accept\u00e9s.');
                    this.value = '';
                    return;
                }
                if (file.size > 5 * 1024 * 1024) {
                    alert("L'image ne doit pas d\u00e9passer 5 Mo.");
                    this.value = '';
                    return;
                }

                var reader = new FileReader();
                reader.onload = function(e) {
                    window.__sharedCropper.open(e.target.result, function(base64) {
                        croppedData.value = base64;
                        deletedFlag.value = '0';
                        preview.src = base64;
                        deleteBtn.style.display = '';
                    });
                };
                reader.readAsDataURL(file);
                this.value = '';
            });

            // Delete button → reset to default
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
