@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Verifikasi Produk</h2>
    @foreach($produk as $item)
        <div class="card mb-3">
            <div class="card-body">
                @if($item->foto)
                    <img src="{{ asset('storage/' . $item->foto) }}" width="150">
                @endif
                <h4>{{ $item->judul_buku }}</h4>
                <p>{{ $item->informasi_buku }}</p>
                <p>{{ $item->detail_buku }}</p>
                <p>Harga: Rp{{ number_format($item->harga_jual, 0, ',', '.') }}</p>
                <p>WA: {{ $item->nomor_wa }}</p>

                <form method="POST" action="{{ route('admin.produk.status', ['id' => $item->id, 'status' => 'accepted']) }}" style="display:inline;">
                    @csrf
                    <button class="btn btn-success">Terima</button>
                </form>
                <form method="POST" action="{{ route('admin.produk.status', ['id' => $item->id, 'status' => 'rejected']) }}" style="display:inline;">
                    @csrf
                    <button class="btn btn-danger">Tolak</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
