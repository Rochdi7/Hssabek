{{--
    Reusable document number field with Manuel / Automatique toggle.

    Props:
      $label        — e.g. 'N° Facture'
      $fieldName    — form field name, e.g. 'number'
      $currentValue — existing value for edit pages (null on create)
      $autoValue    — preview of next auto-generated number (optional, shown as placeholder)
--}}
@props([
    'label'        => 'N° Document',
    'fieldName'    => 'number',
    'currentValue' => null,
    'autoValue'    => null,
])

@php
    $oldMode  = old('number_mode', $currentValue ? 'manuel' : 'manuel');
    $oldValue = old($fieldName, $currentValue ?? '');
@endphp

<div class="mb-3">
    <label class="form-label">{{ __($label) }} <span class="text-danger">*</span></label>

    {{-- Radio toggle --}}
    <div class="d-flex gap-3 mb-2">
        <div class="form-check">
            <input class="form-check-input doc-number-radio"
                   type="radio"
                   name="number_mode"
                   id="mode_manuel_{{ $fieldName }}"
                   value="manuel"
                   {{ $oldMode !== 'auto' ? 'checked' : '' }}>
            <label class="form-check-label" for="mode_manuel_{{ $fieldName }}">
                {{ __('Manuel') }}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input doc-number-radio"
                   type="radio"
                   name="number_mode"
                   id="mode_auto_{{ $fieldName }}"
                   value="auto"
                   {{ $oldMode === 'auto' ? 'checked' : '' }}>
            <label class="form-check-label" for="mode_auto_{{ $fieldName }}">
                {{ __('Automatique') }}
            </label>
        </div>
    </div>

    {{-- Number input --}}
    <input type="text"
           id="doc_number_{{ $fieldName }}"
           name="{{ $fieldName }}"
           class="form-control @error($fieldName) is-invalid @enderror"
           value="{{ $oldMode === 'auto' ? '' : $oldValue }}"
           placeholder="{{ $oldMode === 'auto' ? ($autoValue ?? __('Généré automatiquement')) : __('Saisir le numéro') }}"
           {{ $oldMode === 'auto' ? 'readonly' : '' }}>

    @error($fieldName)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

@once
@push('scripts')
<script>
(function () {
    function initNumberField(radioName) {
        const radios  = document.querySelectorAll(`input[type="radio"][name="${radioName}"]`);
        const fieldId = radioName.replace('number_mode', 'doc_number_') ;

        radios.forEach(function (radio) {
            radio.addEventListener('change', function () {
                // find the sibling input within the same mb-3 wrapper
                const wrapper = radio.closest('.mb-3') ?? radio.closest('.col-md-6') ?? document.body;
                const input   = wrapper.querySelector('input[type="text"][name]');
                if (!input) return;

                if (radio.value === 'auto' && radio.checked) {
                    input.setAttribute('readonly', true);
                    input.value = '';
                    input.placeholder = input.dataset.autoPlaceholder ?? '{{ __("Généré automatiquement") }}';
                } else if (radio.value === 'manuel' && radio.checked) {
                    input.removeAttribute('readonly');
                    input.placeholder = '{{ __("Saisir le numéro") }}';
                }
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Init all number-mode radio groups on the page
        const allRadios = document.querySelectorAll('.doc-number-radio');
        const groups    = new Set();
        allRadios.forEach(function (r) { groups.add(r.name); });
        groups.forEach(initNumberField);

        // Client-side validation: block submit if manuel + empty
        const forms = document.querySelectorAll('form');
        forms.forEach(function (form) {
            form.addEventListener('submit', function (e) {
                const manuelRadios = form.querySelectorAll('.doc-number-radio[value="manuel"]:checked');
                manuelRadios.forEach(function (radio) {
                    const wrapper = radio.closest('.mb-3');
                    const input   = wrapper ? wrapper.querySelector('input[type="text"][name]') : null;
                    if (input && input.value.trim() === '') {
                        e.preventDefault();
                        input.classList.add('is-invalid');
                        let fb = input.nextElementSibling;
                        if (!fb || !fb.classList.contains('invalid-feedback')) {
                            fb = document.createElement('div');
                            fb.className = 'invalid-feedback';
                            input.insertAdjacentElement('afterend', fb);
                        }
                        fb.textContent = '{{ __("Le numéro est obligatoire en mode manuel.") }}';
                        input.focus();
                    }
                });
            });
        });
    });
}());
</script>
@endpush
@endonce
