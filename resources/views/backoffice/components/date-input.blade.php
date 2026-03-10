{{-- Date Input Component using Bootstrap Datetimepicker --}}
@props([
    'name',
    'label' => null,
    'value' => null,
    'required' => false,
    'placeholder' => null,
    'id' => null,
    'class' => '',
    'format' => 'DD-MM-YYYY',
])

@php
    $inputId = $id ?? $name;
    $placeholderText = $placeholder ?? now()->format('d M Y');
@endphp

@if ($label)
    <label class="form-label">
        {{ $label }}@if ($required)
            <span class="text-danger ms-1">*</span>
        @endif
    </label>
@endif
<div class="input-group position-relative">
    <input type="text" class="form-control datetimepicker {{ $class }} @error($name) is-invalid @enderror"
        name="{{ $name }}" id="{{ $inputId }}" value="{{ old($name, $value) }}"
        placeholder="{{ $placeholderText }}" autocomplete="off" {{ $required ? 'required' : '' }} {{ $attributes }}>
    <span class="input-icon-addon fs-16 text-gray-9">
        <i class="isax isax-calendar-2"></i>
    </span>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
