@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-500 text-base font-semibold leading-6 text-indigo-700 focus:outline-none transition-all duration-200 border-b-4'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-medium leading-6 text-gray-500 hover:text-indigo-600 hover:border-indigo-300 focus:outline-none transition-all duration-200';
@endphp

<a {{ $attributes->merge(['class' => $classes.' relative after:absolute after:left-0 after:bottom-0 after:w-full after:h-0.5 after:bg-indigo-500 after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:duration-200 after:origin-left']) }}>
    {{ $slot }}
</a>
