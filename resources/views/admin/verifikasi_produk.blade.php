<!-- filepath: d:\Documents\Laragon\BacaLagi\resources\views\admin\verifikasi_produk.blade.php -->
<x-app-layout>
    <div class="container py-4">
        <h2 class="mb-4 text-light">Verifikasi Produk</h2> <!-- Tambahkan text-light -->
        <div class="row">
            @foreach($produk as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm bg-dark text-light"> <!-- Tambahkan bg-dark dan text-light -->
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->judul_buku }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul_buku }}</h5>
                            <p class="card-text text-truncate">{{ $item->informasi_buku }}</p>
                            <p class="card-text text-truncate">{{ $item->detail_buku }}</p>
                            <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($item->harga_jual, 0, ',', '.') }}</p>
                            <p class="card-text"><strong>WA:</strong> {{ $item->nomor_wa }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-dark text-light"> <!-- Tambahkan bg-dark dan text-light -->
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
            @endforeach
        </div>
    </div>
</x-app-layout>