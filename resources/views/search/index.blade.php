<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pencarian - BacaLagi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('/img/bukufoto.png')] bg-cover bg-center min-h-screen flex flex-col">

    <!-- Header -->
    <div class="flex-grow">
        <div class="mx-8 mt-5 rounded-t-[50px] bg-white shadow-lg">
            <div class="flex items-center justify-between bg-[#9aa5a0] rounded-full px-6 py-4 shadow-md">
                
                <!-- Logo -->
                <div class="text-white text-2xl font-bold">
                    <a href="{{ url('/dashboard') }}">BacaLagi</a>
                </div>

                <!-- Search and Icons -->
                <div class="flex items-center gap-4">
                    <!-- Search -->
                    <div class="flex items-center bg-white rounded-full px-4 py-3 w-[500px]">
                        <form action="{{ route('search') }}" method="GET" class="flex w-full">
                            <input type="text" name="search" placeholder="Lagi cari buku apa?" 
                                class="flex-grow border-none focus:outline-none text-sm text-gray-800" value="{{ request('search') }}" required />
                            <button type="submit">
                                <img src="{{ asset('/img/search.png') }}" alt="Search" class="w-5 h-5" />
                            </button>
                        </form>
                    </div>
                
                    <!-- Cart -->
                    <a href="{{ url('/keranjang') }}">
                        <img src="{{ asset('/img/Shopping_Cart.png') }}" alt="Keranjang" class="w-7 h-7 object-contain" />
                    </a>

                    <!-- Notifikasi -->
                    <div class="relative">
                        <a href="{{ route('user.notifications') }}" class="relative">
                            <!-- SVG Bell Icon -->
                            <svg class="w-6 h-6 text-white hover:text-gray-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>

                            <!-- Badge Notifikasi -->
                            @if(Auth::user()->unreadNotifications->count() > 0)
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full px-1.5">
                                    {{ Auth::user()->unreadNotifications->count() }}
                                </span>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Profile -->
                <div class="h-12 w-12">
                    <a href="{{ url('/profile') }}">
                        <img src="{{ Auth::user()->profile_photo_path ? asset(Auth::user()->profile_photo_path) : asset('/img/Profile.jpg') }}" 
                            alt="Profile" 
                            class="w-full h-full rounded-full object-cover border-2 border-white" />
                    </a>
                </div>
            </div>

            <!-- Hasil Pencarian -->
            <div class="px-14 mt-10 mb-20 ">
                <h2 class="text-2xl font-bold text-[#4E695C] mb-7">Hasil Pencarian untuk "{{ $query }}"</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                @forelse($produk as $item)
                    <a href="{{ route('produk.detail', [$item->judul_buku, $item->id]) }}" class="bg-white rounded-xl shadow-md overflow-hidden text-center hover:shadow-lg transition duration-300">
                        <div class="w-full aspect-[3/4] bg-gray-100">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul_buku }}"
                                class="w-full h-full object-cover object-top" />
                        </div>
                        <div class="p-3 text-sm text-gray-700 font-semibold truncate">
                            {{ $item->judul_buku }}
                        </div>
                    </a>
                @empty
                    <p class="text-gray-500 col-span-full text-center">Tidak ada buku yang ditemukan.</p>
                @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-[#9aa5a0] text-white">
        <div class="bg-[#85908c] py-4">
            <div class="container mx-auto px-6 text-center">
                <p>&copy; {{ date('Y') }} BacaLagi. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>