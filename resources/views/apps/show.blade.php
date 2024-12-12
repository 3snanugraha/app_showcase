@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-lg shadow-xl overflow-hidden">
        <div class="md:flex">
            <div class="md:w-auto">
                <img src="{{ asset($app->app_banner) }}" alt="{{ $app->app_name }}" class="w-full h-64 object-cover">
                </div>
            <div class="p-8 flex-1">
                <h1 class="text-3xl font-bold text-gray-900">{{ $app->app_name }}</h1>
                <div class="mt-4 flex items-center space-x-4">
                    <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full">v{{ $app->app_version }}</span>
                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full">{{ $app->app_size }}MB</span>
                </div>
                <p class="mt-6 text-gray-600 whitespace-pre-line">{!! nl2br(e($app->app_description)) !!}</p>
                
                <div class="mt-8">
                    <h2 class="text-xl font-semibold">Persyaratan Sistem</h2>
                    <p class="mt-2 text-gray-600">Android {{ $app->app_min_android_version }}+ diperlukan</p>
                </div>

                <div class="mt-8 flex space-x-4">
                <a href="#" onclick="document.getElementById('testerModal').classList.remove('hidden')" 
                    class="inline-flex items-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Daftar Penguji (Playstore)
                    </a>

                    <a href="{{ $app->app_download_link }}" 
                    class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Direct Download APK (Tanpa Playstore)
                    </a>
                </div>
            </div>
        </div>

        <div class="p-8 border-t">
            <h2 class="text-2xl font-semibold mb-6">Tampilan Aplikasi</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($app->app_screenshots as $screenshot)
                    <img src="{{ asset($screenshot) }}" alt="Screenshot" class="rounded-lg shadow-md">
                @endforeach
            </div>
        </div>
    </div>
</div>

<div id="testerModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white transform transition-all duration-300 ease-in-out">
        <div class="absolute top-3 right-3">
            <button onclick="document.getElementById('testerModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="mt-3">
            <div class="flex items-center justify-center mb-4">
                <div class="bg-indigo-100 rounded-full p-3">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <h1 class="text-2xl font-bold text-center mb-4 text-indigo-800">Daftar Sebagai Penguji Aplikasi</h1>
            <p class="text-center text-gray-600 mb-8">Bergabunglah sebagai penguji aplikasi kami dan dapatkan akses ke aplikasi terbaru!</p>
            
            <form action="{{ route('tester.store') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="app_id" value="{{ $app->id }}">
                <div class="transform transition-all duration-200 hover:scale-[1.01]">
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-colors duration-200">
                </div>

                <div class="transform transition-all duration-200 hover:scale-[1.01]">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-colors duration-200">
                </div>

                <p class="text-sm text-gray-600 italic bg-yellow-50 p-3 rounded-lg border border-yellow-200">*Setelah mengirimkan nama dan email, kami akan segera mengirimkan link resmi PlayStore untuk didownload langsung ke HP kamu</p>

                <button type="submit" 
                    class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transform transition-all duration-200 hover:scale-[1.02] flex items-center justify-center space-x-2">
                    <span>Daftar Sekarang</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
