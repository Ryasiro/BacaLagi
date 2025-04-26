<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>BacaLagi</title>
    <!-- Tailwind CSS (via CDN atau build kamu sendiri) -->
    <script src="https://cdn.tailwindcss.com"></script>

  </head>

  <body class="min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('/img/bukufoto.png') }}');">
    
    <div class="container mx-auto mt-5 rounded-t-[50px] bg-white">

      <!-- Navbar -->
      <div class="flex items-center justify-between bg-[#9aa5a0] text-white rounded-full px-6 py-4 shadow-md">
        <a href="{{ url('/dashboard') }}" class="text-2xl font-bold">BacaLagi</a>

        <div class="flex items-center gap-4">
          <div class="flex items-center bg-white rounded-full px-4 py-2">
            <input type="text" placeholder="Lagi cari buku apa?" name="search" class="text-gray-800 placeholder-gray-400 focus:outline-none w-64" />
            <a href="{{ url('/search') }}">
              <img src="{{ asset('/img/search.png') }}" alt="Cari" class="w-5 h-5 ml-2" />
            </a>
          </div>


          <a href="{{ url('/profile') }}">
            <img src="{{ asset('/img/Profile.jpg') }}" alt="Profil" class="w-8 h-8 rounded-full border-2 border-white" />
          </a>
        </div>
      </div>

      <!-- Isi Konten -->
      <div class="bg-white rounded-lg shadow-lg p-8 mt-8">
        <div class="flex items-center justify-between mb-4">
          <h2 class="text-xl font-bold">Keranjang Belanja</h2>
          <div class="flex gap-4 items-center">
            <a href="#" class="text-blue-600 hover:underline">Pilih Semua</a>
            <button class="flex items-center gap-2 text-red-600 hover:text-red-800 font-semibold">
              <img src="{{ asset('/img/hapus.png') }}" alt="hapus" class="w-5 h-5" />
              Hapus
            </button>
          </div>
        </div>

        <!-- Item Produk -->
        <div class="flex items-start bg-gray-100 rounded-lg p-4 gap-4">
          <input type="checkbox" class="mt-2">
          <img src="{{ asset('/img/SampulBuku.png') }}" alt="Produk" class="w-24 h-32 object-cover rounded-md">
          <div class="flex-1">
            <h4 class="font-bold text-lg">Berani Tidak Disukai</h4>
            <p class="text-sm text-gray-600">Ichiro Kishimi dan Fumitake Koga<br>Oleh: [namapenjual]</p>
            <p class="font-semibold text-green-600 mt-2">Rp 60.000,00</p>
            <button class="mt-2 text-sm bg-blue-500 text-white px-3 py-1 rounded-full hover:bg-blue-600">
              <a href="{{ url('/produk') }}" >Detail</a>
            </button>
          </div>
          <button class="text-red-600 font-semibold hover:underline">Hapus</button>
        </div>
      </div>

    </div>

  </body>
</html>
