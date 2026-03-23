@props([
    'status' => 'pending'
]);

@php
    $classes = "inline-block text-color rounded-full border mt-1 px-2 py-1 text-xs font-medium";

    if ($status === 'pending') {
        $classes .= " bg-gray-500/10 text-white-s500 border-white-500/20";
    }

    if ($status === 'in_progress') {
        $classes .= " bg-blue-500/10 text-blue-500 border-blue-500/20";
    }

    if ($status === 'completed') {
        $classes .= " bg-green-500/10 text-green-500 border-greeen-500/20";
    }

@endphp

<span {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</span>
