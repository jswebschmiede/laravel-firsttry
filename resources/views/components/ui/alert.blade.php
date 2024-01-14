@props(['type' => 'success'])

@php
    $classes = [
        'success' => 'bg-green-100 border-green-500 text-green-900',
        'warning' => 'bg-yellow-100 border-yellow-500 text-yellow-900',
        'danger' => 'bg-red-100 border-red-500 text-red-900',
        'info' => 'bg-blue-100 border-blue-500 text-blue-900',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'bg-blue-100 border-t-4 rounded-b px-4 py-3 mb-8 shadow-md transition-opacity opacity-100 ' . $classes[$type]]) }}
    role="alert">
    <div class="flex items-center">
        <div class="py-1">
            <svg class="fill-current h-6 w-6 text-inherit mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M0 0h20v20H0z" fill="none" />
                <path
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 110-12 6 6 0 010 12zm0-9a1 1 0 00-1 1v3a1 1 0 002 0V8a1 1 0 00-1-1zm0 6a1 1 0 100 2 1 1 0 000-2z" />
            </svg>
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
