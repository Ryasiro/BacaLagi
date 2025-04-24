<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BacaLagi - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('/img/bukufoto.png')] bg-cover bg-center min-h-screen">

    <!-- Header -->
    <div class="mx-8 mt-5 rounded-t-[50px] bg-white shadow-lg">
        <div class="flex items-center justify-between bg-[#9aa5a0] rounded-full px-6 py-4 shadow-md">
            
            <!-- Logo -->
            <div class="text-white text-2xl font-bold ">
                <a href="{{ url('/home') }}">BacaLagi</a>
            </div>

            <!-- Search and Icons -->
            <div class="flex items-center gap-4">
                <!-- Search -->
                <div class="flex items-center bg-white rounded-full px-4 py-2 w-[500px]">
                    <input type="text" name="search" placeholder="Lagi cari buku apa?" class="flex-grow border-none focus:outline-none text-sm text-gray-800" />
                    <a href="{{ url('/search') }}">
                        <img src="{{ asset('/img/search.png') }}" alt="Search" class="w-5 h-5" />
                    </a>
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

        <!-- Promo Section -->
        <div class="px-14 mt-14">
            <div class="grid md:grid-cols-3 gap-4 mb-10">
                <div class="md:col-span-2">
                    <a href="{{ url('/promo/main') }}">
                        <img src="{{ asset('img/promo/main-promo.avif') }}" class="rounded-xl w-full h-auto object-cover hover:opacity-90 transition" alt="Promo Utama">
                    </a>
                </div>
                <div class="flex flex-col gap-2">
                    <a href="{{ url('/promo/promo1') }}">
                        <img src="{{ asset('img/promo/promo1.avif') }}" class="rounded-xl w-full h-auto object-cover hover:opacity-90 transition" alt="Promo 30%">
                    </a>
                    <a href="{{ url('/promo/promo2') }}">
                        <img src="{{ asset('img/promo/promo2.avif') }}" class="rounded-xl w-full h-auto object-cover hover:opacity-90 transition" alt="Promo Ramadan">
                    </a>
                </div>
            </div>
        </div>

        <!-- Buku Favorit / Katalog -->
        <div class="px-6 mt-10 mb-10">
            <h2 class="text-2xl font-bold text-[#4E695C] mb-7 px-7">Katalog Buku</h2>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 px-7">
                @foreach(range(1, 18) as $i)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden text-center">
                        <div class="aspect-[3/4] overflow-hidden">
                            <img src="{{ asset('img/bukufoto.png') }}" alt="Book {{$i}}" 
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="p-3 text-sm text-gray-700">
                            Lorem Ipsum Dolor sit amet
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <!-- Sticky Button -->
    <a href="{{ route('AddProductIndex') }}" 
       class="fixed bottom-5 right-5 bg-[#9aa5a0] text-white px-4 py-2 rounded-full shadow-lg hover:bg-green-600 transition">
        Tambah Produk
    </a>

</body>
</html>