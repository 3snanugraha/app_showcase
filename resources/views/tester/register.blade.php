@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
    <div class="bg-white rounded-lg shadow-xl p-8">
        <h1 class="text-2xl font-bold text-center mb-4">Daftar Sebagai Penguji Aplikasi</h1>
        <p class="text-center text-gray-600 mb-8">Bergabunglah sebagai penguji aplikasi kami dan dapatkan akses ke aplikasi terbaru!</p>

        <form action="{{ route('tester.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <p class="text-sm text-gray-600 italic">*Setelah mengirimkan nama dan email, kami akan segera mengirimkan link resmi PlayStore untuk didownload langsung ke HP kamu</p>

            <button type="submit" 
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Daftar Sekarang
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-gray-600 italic">"Terima kasih telah berminat menjadi bagian dari perjalanan kami! 🚀</p>
            <p class="text-gray-600 mt-2">Setiap masukan Anda sangat berharga untuk menciptakan aplikasi yang lebih baik.</p>
            <div class="mt-4 text-indigo-600">
                <span class="animate-pulse">❤</span>
                <span class="mx-2">Kami menghargai kontribusi Anda!</span>
                <span class="animate-pulse">❤</span>
            </div>
        </div>
    </div>
</div>
@endsection