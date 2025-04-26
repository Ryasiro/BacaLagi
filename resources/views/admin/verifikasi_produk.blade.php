<style>
    .img-wrapper {
        position: relative;
        width: 100%;
        padding-top: 75%; /* 4:3 Aspect Ratio = 3/4 = 75% */
        overflow: hidden;
        border-top-left-radius: 0.375rem; /* biar rapi mengikuti card-img-top */
        border-top-right-radius: 0.375rem;
    }

    .img-wrapper img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>


<x-app-layout>
    <div class="container py-4">
        
        <!-- Navbar untuk memilih kategori produk -->
        <div class="mb-4">
            <nav class="nav nav-pills">
                <a class="nav-link active" id="pending-tab" data-bs-toggle="pill" href="#pending">Produk Menunggu Verifikasi</a>
                <a class="nav-link" id="accepted-tab" data-bs-toggle="pill" href="#accepted">Produk Diterima</a>
                <a class="nav-link" id="rejected-tab" data-bs-toggle="pill" href="#rejected">Produk Ditolak</a>

            </nav>
        </div>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Tab untuk Produk Menunggu Verifikasi -->
            <div id="pending" class="tab-pane fade show active">
                <div class="row">
                    @foreach($produk as $item)
                        @if($item->status == 'pending') <!-- Menampilkan hanya produk pending -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm bg-dark text-light">
                                    @if($item->foto)
                                    <div class="img-wrapper">
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul_buku }}">
                                    </div>
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->judul_buku }}</h5>
                                        <p class="card-text text-truncate">{{ $item->informasi_buku }}</p>
                                        <p class="card-text text-truncate">{{ $item->detail_buku }}</p>
                                        <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($item->harga_jual, 0, ',', '.') }}</p>
                                        <p class="card-text"><strong>WA:</strong> {{ $item->nomor_wa }}</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-dark text-light">
                                        <form method="POST" action="{{ route('admin.produk.status', ['id' => $item->id, 'status' => 'accepted']) }}">
                                            @csrf
                                            <button class="btn btn-success btn-sm">Terima</button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.produk.status', ['id' => $item->id, 'status' => 'rejected']) }}">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">Tolak</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Tab untuk Produk Diterima -->
            <div id="accepted" class="tab-pane fade">
                <div class="row">
                    @foreach($produk as $item)
                        @if($item->status == 'accepted') <!-- Menampilkan hanya produk yang diterima -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm bg-dark text-light">
                                    @if($item->foto)
                                    <div class="img-wrapper">
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul_buku }}">
                                    </div>
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->judul_buku }}</h5>
                                        <p class="card-text text-truncate">{{ $item->informasi_buku }}</p>
                                        <p class="card-text text-truncate">{{ $item->detail_buku }}</p>
                                        <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($item->harga_jual, 0, ',', '.') }}</p>
                                        <p class="card-text"><strong>WA:</strong> {{ $item->nomor_wa }}</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-dark text-light">
                                        <!-- Tombol Hapus Produk -->
                                        <form method="POST" action="{{ route('admin.produk.hapus', ['id' => $item->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Tab untuk Produk ditolak -->
            <div id="rejected" class="tab-pane fade">
                <div class="row">
                    @foreach($produk as $item)
                        @if($item->status == 'rejected')
                        <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm bg-dark text-light">
                                    @if($item->foto)
                                    <div class="img-wrapper">
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul_buku }}">
                                    </div>
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->judul_buku }}</h5>
                                        <p class="card-text text-truncate">{{ $item->informasi_buku }}</p>
                                        <p class="card-text text-truncate">{{ $item->detail_buku }}</p>
                                        <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($item->harga_jual, 0, ',', '.') }}</p>
                                        <p class="card-text"><strong>WA:</strong> {{ $item->nomor_wa }}</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-dark text-light">
                                        <div >Tertolak</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

</x-app-layout>


