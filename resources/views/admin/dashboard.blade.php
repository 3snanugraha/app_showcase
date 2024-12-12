@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard Admin</h1>
        <div class="flex space-x-4">
            <a href="{{ route('apps.create') }}" 
               class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                Tambah Aplikasi
            </a>
            <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                    Keluar
                </button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Apps Management -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Aplikasi Terpublikasi</h2>
            </div>
            <div class="space-y-4">
                @forelse($apps as $app)
                <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset($app->app_banner) }}" alt="{{ $app->app_name }}" 
                             class="w-16 h-16 rounded-lg object-cover">
                        <div>
                            <h3 class="font-medium text-gray-900">{{ $app->app_name }}</h3>
                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                <span>v{{ $app->app_version }}</span>
                                <span>•</span>
                                <span>{{ $app->app_size }} MB</span>
                                <span>•</span>
                                <span>{{ $app->testers_count }} Penguji</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('app.show', $app->id) }}" class="text-gray-600 hover:text-gray-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </a>
                        <a href="{{ route('apps.edit', $app->id) }}" class="text-indigo-600 hover:text-indigo-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                        <form action="{{ route('apps.destroy', $app->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                onclick="return confirm('Yakin ingin menghapus aplikasi ini?')"
                                class="text-red-600 hover:text-red-900">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="text-center py-4 text-gray-500">
                    Belum ada aplikasi yang dipublikasikan
                </div>
                @endforelse
            </div>
        </div>

        <!-- Testers Management -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Pendaftar Penguji Baru</h2>
            <div class="space-y-4">
                @forelse($testers as $tester)
                <div class="p-4 border rounded-lg hover:bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-medium text-gray-900">{{ $tester->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $tester->email }}</p>
                            <p class="text-xs text-indigo-600">Mendaftar untuk: {{ $tester->app->app_name }}</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <form action="{{ route('admin.testers.send-invitation', $tester->id) }}" method="POST">
                                @csrf
                                <button class="bg-green-500 text-white px-3 py-1 rounded-full text-sm hover:bg-green-600">
                                    {{ $tester->is_mail_sent ? 'Kirim Ulang' : 'Kirim Undangan' }}
                                </button>
                            </form>
                            @if($tester->is_mail_sent)
                                <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">
                                    Terkirim {{ $tester->mail_sent_at->diffForHumans() }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-4 text-gray-500">
                    Belum ada pendaftar penguji baru
                </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection
