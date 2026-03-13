{{--
    Reusable Avatar / Image Upload Component (No Crop)

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

    The base64 is stored in a hidden input with the given inputName.
    On "Save" (parent form submit), the server receives the base64 string.
--}}

@php
    $currentUrl = $currentUrl ?? asset('build/img/profiles/avatar-01.jpg');
    $defaultUrl = $defaultUrl ?? asset('build/img/profiles/avatar-01.jpg');
    $inputName = $inputName ?? 'cropped_avatar';
    $previewId = $previewId ?? 'avatar-preview';
    $hasImage = $hasImage ?? false;
    $alt = $alt ?? 'Avatar';
    $label = $label ?? __('Photo de profil');
    $required = $required ?? true;
    $uid = 'uploader-' . Str::random(6);
@endphp

<div class="mb-3" id="{{ $uid }}-wrapper">
    <span class="text-gray-9 fw-bold mb-2 d-flex">{{ $label }}@if($required)<span class="text-danger ms-1">*</span>@endif</span>
    <div class="d-flex align-items-center">
        <div class="avatar avatar-xxl border border-dashed bg-light me-3 flex-shrink-0">
            <div class="position-relative d-flex align-items-center">
                <img src="{{ $currentUrl }}" class="avatar avatar-xl" alt="{{ $alt }}" id="{{ $previewId }}"
                    style="object-fit: cover;">
                <a href="javascript:void(0);" id="{{ $uid }}-delete-btn"
                    class="rounded-trash trash-top d-flex align-items-center justify-content-center"
                    style="{{ $hasImage ? '' : 'display:none !important;' }}"><i class="isax isax-trash"></i></a>
            </div>
        </div>
        <div class="d-inline-flex flex-column align-items-start">
            <div class="drag-upload-btn btn btn-sm btn-primary position-relative mb-2">
                <i class="isax isax-image me-1"></i>{{ __('Télécharger une image') }}
                <input type="file" class="form-control image-sign" id="{{ $uid }}-file-input"
                    accept="image/jpeg,image/png,image/webp">
            </div>
            <span class="text-gray-9 fs-12">{{ __('Format JPG ou PNG, 5 Mo maximum.') }}</span>
            @error($inputName)
                <span class="text-danger fs-12">{{ $message }}</span>
            @enderror
        </div>
    </div>
    {{-- Hidden inputs for the parent form --}}
    <input type="hidden" name="{{ $inputName }}" id="{{ $uid }}-cropped-data" value="">
    <input type="hidden" name="{{ $inputName }}_deleted" id="{{ $uid }}-deleted-flag" value="0">
</div>

@push('scripts')
    <script>
        (function() {
            var uid = @json($uid);
            var defaultUrl = @json($defaultUrl);

            var fileInput = document.getElementById(uid + '-file-input');
            var preview = document.getElementById(@json($previewId));
            var deleteBtn = document.getElementById(uid + '-delete-btn');
            var croppedData = document.getElementById(uid + '-cropped-data');
            var deletedFlag = document.getElementById(uid + '-deleted-flag');

            // File select → show preview directly (no crop)
            fileInput.addEventListener('change', function() {
                var file = this.files[0];
                if (!file) return;

                var validTypes = ['image/jpeg', 'image/png', 'image/webp'];
                if (validTypes.indexOf(file.type) === -1) {
                    alert({!! json_encode(__('Seuls les formats JPG, PNG et WEBP sont acceptés.')) !!});
                    this.value = '';
                    return;
                }
                if (file.size > 5 * 1024 * 1024) {
                    alert({!! json_encode(__("L'image ne doit pas dépasser 5 Mo.")) !!});
                    this.value = '';
                    return;
                }

                var reader = new FileReader();
                reader.onload = function(e) {
                    var base64 = e.target.result;
                    croppedData.value = base64;
                    deletedFlag.value = '0';
                    preview.src = base64;
                    deleteBtn.style.display = '';
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
