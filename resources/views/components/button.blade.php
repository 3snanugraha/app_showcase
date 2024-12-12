@props(['variant' => 'primary'])

@php
$classes = [
    'primary' => 'bg-indigo-600 hover:bg-indigo-700 text-white',
    'secondary' => 'bg-gray-200 hover:bg-gray-300 text-gray-800',
    'danger' => 'bg-red-600 hover:bg-red-700 text-white',
];
@endphp

<button {{ $attributes->merge(['class' => "{$classes[$variant]} px-4 py-2 rounded-md transition duration-150 ease-in-out"]) }}>
    {{ $slot }}
</button>
