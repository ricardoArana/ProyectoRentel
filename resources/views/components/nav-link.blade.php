@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-orange-500 text-m font-medium leading-5 text-orange-400 focus:outline-none focus:border-orange-300 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-m font-medium leading-5 text-white hover:text-orange-300 hover:border-orange-500 focus:outline-none focus:text-orange-300 focus:border-orange-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
