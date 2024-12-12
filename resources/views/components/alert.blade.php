@props(['type' => 'success'])

@php
$classes = [
    'success' => 'bg-green-50 text-green-800',
    'error' => 'bg-red-50 text-red-800',
    'warning' => 'bg-yellow-50 text-yellow-800',
];
@endphp

<div class="{{ $classes[$type] }} rounded-md p-4 mb-4">
    <div class="flex">
        <div class="flex-shrink-0">
            @if($type === 'success')
                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            @endif
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium">
                {{ $slot }}
            </p>
        </div>
    </div>
</div>
