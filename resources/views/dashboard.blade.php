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
    <div class="mx-8 mt-6 rounded-t-[50px] bg-white shadow-lg">
            <div class="flex items-center justify-between bg-[#9aa5a0] rounded-full px-6 py-4 shadow-md">
                
                <!-- Logo -->
                <div class="text-white text-2xl font-bold">
                    <a href="{{ url('/home') }}">BacaLagi</a>
                </div>

                <!-- Search and Cart -->
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
                </div>

                <!-- Profile -->
                <div class="h-12 w-12">
                    <a href="{{ url('/profile') }}">
                        <img src="{{ asset('/img/Profile.jpg') }}" alt="Profile" class="w-full h-full rounded-full object-cover border-2 border-white" />
                    </a>
                </div>
            </div>

        <!-- Promo Section -->
        <div class="px-14 mt-14">
            <div class="grid md:grid-cols-3 gap-4 mb-10">
                <div class="md:col-span-2">
                    <img src="{{ asset('img/promo/main-promo.avif') }}" class="rounded-xl w-full h-auto object-cover" alt="Promo Utama">
                </div>
                <div class="flex flex-col gap-4">
                    <img src="{{ asset('img/promo/promo1.avif') }}" class="rounded-xl w-full h-auto object-cover" alt="Promo 30%">
                    <img src="{{ asset('img/promo/promo2.avif') }}" class="rounded-xl w-full h-auto object-cover" alt="Promo Ramadan">
                </div>
            </div>
        </div>

        <!-- Favorite Books Section -->
        <div class="px-6 mt-10 mb-10">
            <h2 class="text-2xl font-bold text-gray-700 mb-4">Bacaan Favorit Pekan Ini</h2>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                @foreach(range(1, 18) as $i)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden text-center">
                        <img src="{{ asset('images/book'.$i.'.jpg') }}" alt="Book {{$i}}" class="w-full h-60 object-cover">
                        <div class="p-3 text-sm text-gray-700">
                            Lorem Ipsum Dolor sit amet
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        
    

</body>
</html>
