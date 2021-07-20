@props(['active' => false])

@php
    $classes = 'block px-3 leading-5 text-left text-sm
                hover:text-white focus:text-white
                hover:bg-blue-500 focus:bg-blue-500';

    if ($active) $classes .= ' bg-blue-500 text-white';
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
