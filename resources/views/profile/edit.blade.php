
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
    <div class="mx-8 mt-5 rounded-t-[50px] bg-white shadow-lg" style="min-height: 95vh;">
            <div class="flex items-center justify-between bg-[#9aa5a0] rounded-full px-6 py-4 shadow-md">
                
                <!-- Logo -->
                <div class="text-white text-2xl font-bold">
                    <a href="{{ url('/dashboard') }}">BacaLagi</a>
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
    <div class="px-6 py-5  max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-[#4E695C]">Akun</h1>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            {{-- Sidebar --}}
            <div class="flex flex-col items-center text-center">
                <div class="relative">
                    <img src="{{ Auth::user()->profile_photo_path ? asset(Auth::user()->profile_photo_path) : asset('images/default-avatar.png') }}"
                        class="rounded-full w-28 h-28 object-cover border shadow" alt="Foto Profil">
                    {{-- You can add a badge or overlay here --}}
                </div>
                <h2 class="mt-4 text-xl font-semibold">{{ Auth::user()->name }}</h2>
                <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>

                {{-- Poin --}}
                <div class="mt-4 px-4 py-2 rounded-xl border w-full flex items-center justify-between">
                    <div>
                        <div class="text-xs text-gray-500">Kode</div>
                        <div class="text-sm font-semibold">VX4ZQH</div>
                    </div>
                    <div class="text-sm font-bold text-black">0 Poin</div>
                </div>

                {{-- Menu --}}
                <div class="mt-6 space-y-2 w-full text-left">
                    <div class="text-[#4E695C] font-semibold">Akun</div>
                    <div class="text-gray-600 hover:text-[#4E695C] cursor-pointer">Transaksi</div>
                    <div class="text-gray-600 hover:text-[#4E695C] cursor-pointer">Wishlist</div>
                    <div class="text-gray-600 hover:text-[#4E695C] cursor-pointer">Alamat</div>
                </div>
            </div>

            {{-- Form --}}
            <div class="md:col-span-2">
                <h2 class="text-xl font-bold text-[#4E695C] mb-4">Pengaturan Profil</h2>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" disabled value="{{ $user->email }}"
                            class="mt-1 block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded-lg p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                        <input type="password" disabled value="password"
                            class="mt-1 block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded-lg p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="gender" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ $user->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="birth_date" value="{{ old('birth_date', $user->birth_date) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-lg p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">No. Telepon</label>
                        <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-lg p-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ubah Foto Profil</label>
                        <input type="file" name="profile_photo"
                            class="mt-1 block w-full text-gray-700 border border-gray-300 rounded-lg p-2">
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="bg-[#4E695C] text-white px-4 py-2 rounded-lg hover:bg-[#3b564a] transition">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

