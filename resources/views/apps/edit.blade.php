@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Aplikasi</h1>

        <form action="{{ route('apps.update', $app->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Aplikasi</label>
                <input type="text" name="app_name" value="{{ $app->app_name }}" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Package Name</label>
                <input type="text" name="app_package_name" value="{{ $app->app_package_name }}" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="com.example.app">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Versi</label>
                    <input type="text" name="app_version" value="{{ $app->app_version }}" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        placeholder="1.0.0">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Ukuran (MB)</label>
                    <input type="number" name="app_size" value="{{ $app->app_size }}" step="0.01" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Minimal Android</label>
                    <input type="text" name="app_min_android_version" value="{{ $app->app_min_android_version }}" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        placeholder="5.0">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="app_description" rows="6" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $app->app_description }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Banner Aplikasi</label>
                <div class="mt-2">
                    <img src="{{ asset($app->app_banner) }}" alt="Current Banner" class="h-32 object-contain mb-2">
                </div>
                <input type="file" name="app_banner" accept="image/*" 
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                <p class="mt-1 text-sm text-gray-500">Biarkan kosong jika tidak ingin mengubah banner</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Screenshot Aplikasi</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-2">
                    @foreach($app->app_screenshots as $screenshot)
                        <img src="{{ asset($screenshot) }}" alt="Screenshot" class="rounded-lg shadow-sm">
                    @endforeach
                </div>
                <input type="file" name="screenshots[]" multiple accept="image/*" 
                    class="mt-4 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                <p class="mt-1 text-sm text-gray-500">Biarkan kosong jika tidak ingin mengubah screenshot</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Link Download APK</label>
                <input type="url" name="app_download_link" value="{{ $app->app_download_link }}" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="https://example.com/app.apk">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Link Internal Test (PlayStore)</label>
                <input type="url" name="internal_test_link" value="{{ $app->internal_test_link }}" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="https://play.google.com/apps/internaltest/...">
                <p class="mt-1 text-sm text-gray-500">Link undangan internal test dari Google Play Console</p>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.dashboard') }}" 
                    class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit" 
                    class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
