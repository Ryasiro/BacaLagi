<x-app-layout>
    <div class="container py-4">
        <!-- Menu Navigasi Admin -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card bg-dark text-light">
                    <div class="card-body">
                        <h4 class="card-title">Dashboard Admin</h4>
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <a href="{{ route('admin.produk') }}" class="btn btn-primary">Verifikasi Produk</a>
                            <a href="{{ route('admin.all.produk') }}" class="btn btn-info">Semua Produk</a>
                            <a href="{{ route('admin.users') }}" class="btn btn-success">Kelola Pengguna</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container mt-4">
        <div class="row">
            @foreach($allProduk as $item)
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
                        <div class="card-footer d-flex justify-content-between align-items-center bg-dark text-light">
                            @if($item->status == 'pending')
                                <form method="POST" action="{{ route('admin.produk.status', ['id' => $item->id, 'status' => 'accepted']) }}">
                                    @csrf
                                    <button class="btn btn-success btn-sm">Terima</button>
                                </form>
                                <form method="POST" action="{{ route('admin.produk.status', ['id' => $item->id, 'status' => 'rejected']) }}">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Tolak</button>
                                </form>
                            @elseif($item->status == 'accepted')
                                <form method="POST" action="{{ route('admin.produk.hapus', ['id' => $item->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @elseif($item->status == 'rejected')
                                <span class="text-danger">Tertolak</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>