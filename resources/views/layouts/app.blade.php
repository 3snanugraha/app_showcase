<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtaDev Katalog Aplikasi</title>
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Navigation -->
    <nav class="bg-indigo-600 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-white font-bold text-xl">Artadev Apps</a>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- <a href="{{ route('home') }}" class="text-white hover:text-indigo-200">Aplikasi</a> -->
                   <a href="https://wa.me/62895339046899?text=Halo%20Artadev%2C%0ASaya%20tertarik%20untuk%20request%20pembuatan%20aplikasi.%0A%0ANama%3A%20%0AJenis%20Aplikasi%3A%20%0ADeskripsi%20Singkat%3A%20" 
                      target="_blank" 
                      class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300 flex items-center gap-2">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                           <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z"/>
                       </svg>
                       Request Aplikasi
                   </a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-indigo-200">Dasbor</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <!-- Featured Banner with improved height -->
    @if(Route::is('home'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="relative rounded-xl overflow-hidden">
            <img src="{{ asset('storage/featured.jpg') }}" alt="Featured Banner" 
                class="w-full h-48 md:h-72 lg:h-96 object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-600/80 to-transparent flex items-center">
                <div class="px-4 md:px-8 lg:px-12">
                    <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold mb-2 md:mb-4 text-white">Jadi Penguji Aplikasi</h1>
                    <p class="text-sm md:text-lg lg:text-xl mb-4 md:mb-6 text-white">Dapatkan akses eksklusif ke aplikasi terbaru kami</p>
                    <a href="#apps" 
                    class="bg-white text-indigo-600 px-4 md:px-6 py-2 rounded-lg font-medium hover:bg-indigo-50 transition duration-300">
                        Lihat Aplikasi
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Search Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="bg-white rounded-lg shadow-lg p-4 md:p-6">
            <form action="{{ route('home') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <input type="text" 
                        name="search" 
                        placeholder="Cari aplikasi berdasarkan nama atau deskripsi..." 
                        value="{{ request('search') }}"
                        class="w-full h-12 md:h-14 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-base md:text-lg px-4">
                </div>
                <button type="submit" 
                        class="w-full md:w-auto bg-indigo-600 text-white px-6 py-3 md:py-4 rounded-lg hover:bg-indigo-700 flex items-center justify-center gap-2 transition duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span class="font-medium">Cari Aplikasi</span>
                </button>
            </form>
        </div>
    </div>
    @endif


    <!-- Main Content -->
    <main class="flex-grow" id="apps">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-auto">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="font-bold text-lg mb-4">Artadev</h3>
                    <p class="text-gray-400">Berkomitmen mengembangkan aplikasi berkualitas untuk Indonesia</p>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-4">Kontak</h3>
                    <p class="text-gray-400">Email: developer@artadev.my.id</p>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.066 9.645c.183 4.04-2.83 8.544-8.164 8.544-1.622 0-3.131-.476-4.402-1.291 1.524.18 3.045-.244 4.252-1.189-1.256-.023-2.317-.854-2.684-1.995.451.086.895.061 1.298-.049-1.381-.278-2.335-1.522-2.304-2.853.388.215.83.344 1.301.359-1.279-.855-1.641-2.544-.889-3.835 1.416 1.738 3.533 2.881 5.92 3.001-.419-1.796.944-3.527 2.799-3.527.825 0 1.572.349 2.096.907.654-.128 1.27-.368 1.824-.697-.215.671-.67 1.233-1.263 1.589.581-.07 1.135-.224 1.649-.453-.384.578-.87 1.084-1.433 1.489z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 text-center text-gray-400">
                <p>© {{ date('Y') }} Artadev</p>
            </div>
        </div>
    </footer>
</body>
</html>