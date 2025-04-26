<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>BacaLagi</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('/img/bukufoto.png')] bg-cover bg-center min-h-screen">

    <!-- Header -->
    <div class="mx-8 mt-5 rounded-t-[50px] bg-white shadow-lg">
        <div class="flex items-center justify-between bg-[#9aa5a0] rounded-full px-6 py-4 shadow-md">
            
            <!-- Logo -->
            <div class="text-white text-2xl font-bold ">
                <a href="{{ url('/dashboard') }}">BacaLagi</a>
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
    

        <!-- Form Section -->
        <div class="mx-auto mt-10 w-full max-w-4xl bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Form Penjualan</h2>
            <form action="{{ url('/add') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label for="foto" class="block text-gray-700 font-semibold mb-1">Foto</label>
                <input type="file" name="foto" id="foto" class="w-full border border-gray-300 rounded-lg px-3 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:bg-[#9aa5a0] file:text-white-700 hover:file:bg-green-100" />
            </div>

            <div>
            <label for="nomor_wa" class="block text-gray-700 font-semibold mb-1">Nomor WA</label>
            <div class="flex">
                <select name="kode_negara" id="kode_negara" class="border border-gray-300 rounded-l-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="+62">+62</option>
                    <!-- Tambahkan negara lainnya jika perlu -->
                </select>
                <input type="text" name="nomor_wa" id="nomor_wa" class="w-full border-t border-b border-r border-gray-300 rounded-r-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required />
            </div>
        </div>


            <div>
                <label for="harga_jual" class="block text-gray-700 font-semibold mb-1">Harga Jual</label>
                <input type="number" name="harga_jual" id="harga_jual" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required />
            </div>

            <div>
                <label for="judul_buku" class="block text-gray-700 font-semibold mb-1">Judul Buku</label>
                <input type="text" name="judul_buku" id="judul_buku" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required />
            </div>

            <div>
                <label for="informasi_buku" class="block text-gray-700 font-semibold mb-1">Informasi Buku</label>
                <textarea name="informasi_buku" id="informasi_buku" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
            </div>

            <div>
                <label for="detail_buku" class="block text-gray-700 font-semibold mb-1">Detail Buku</label>
                <textarea name="detail_buku" id="detail_buku" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
            </div>

            <button type="submit" class="w-full bg-[#9aa5a0] hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-200">Tambah Produk</button>
            </form>
        </div>

        @if (session('success'))
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
            </script>
        @endif
</body>
</html>
