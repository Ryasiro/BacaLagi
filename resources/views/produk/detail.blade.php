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
            <div class="text-white text-2xl font-bold">
                <a href="{{ url('/dashboard') }}">BacaLagi</a>
            </div>

            <!-- Search and Icons -->
            <div class="flex items-center gap-4">
                <!-- Search -->
                <div class="flex items-center bg-white rounded-full px-4 py-3 w-[500px]">
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

        <!-- Book Detail Section -->
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-semibold text-gray-700 mb-6">Deskripsi Buku</h1>
            
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Book Image -->
                <div class="w-full md:w-1/4">
                    <div class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm">
                        <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->judul_buku }}" 
                            class="w-full object-cover">
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex mt-4 gap-2">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $produk->nomor_wa) }}" 
                        target="_blank" 
                        class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg flex-1 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Hubungi Penjual
                        </a>
                        <button class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 py-2 px-4 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Book Details -->
                <div class="w-full md:w-3/4">
                    <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ $produk->judul_buku }}</h2>
                    <p class="text-xl font-semibold text-gray-700 mb-6">Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}</p>
                    
                    <!-- Informasi Buku -->
                    @if($produk->informasi_buku)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-3">Informasi Buku</h3>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $produk->informasi_buku }}
                        </p>
                    </div>
                    @endif
                    
                    <!-- Detail Buku -->
                    @if($produk->detail_buku)
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-3">Detail Buku</h3>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $produk->detail_buku }}
                        </p>
                    </div>
                    @endif

                    <!-- WhatsApp Number -->
                    @if($produk->nomor_wa)
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-3">Kontak Penjual</h3>
                        <p class="text-gray-600">
                            WhatsApp: {{ $produk->nomor_wa }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>