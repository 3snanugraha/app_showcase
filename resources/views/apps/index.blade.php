@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900">Daftar Aplikasi</h1>
        <p class="mt-4 text-xl text-gray-600">Temukan aplikasi Android terbaru kami</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($apps as $app)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition transform hover:scale-105">
            <img src="{{ $app->app_banner }}" alt="{{ $app->app_name }}" class="w-full h-48 object-cover">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-900">{{ $app->app_name }}</h2>
                <p class="mt-2 text-gray-600 line-clamp-3">{{ $app->app_description }}</p>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-sm text-indigo-600">v{{ $app->app_version }}</span>
                    <a href="{{ route('app.show', $app->id) }}" 
                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-md hover:scale-105 hover:shadow-lg transform transition duration-200 ease-in-out">
                        <span>Lihat Detail</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection