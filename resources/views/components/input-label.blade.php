@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-base text-gray-800 mb-1']) }}>
    {{ $value ?? $slot }}
</label>
