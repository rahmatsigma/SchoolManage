@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-200 shadow-sm']) }}>
    {{ $value ?? $slot }}
</label>