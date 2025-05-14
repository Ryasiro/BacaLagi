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

        <div class="row">
            <!-- Detail User -->
            <div class="col-md-5 mb-4">
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h5 class="mb-0">Detail Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $user->id }}</p>
                        <p><strong>Nama:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Role:</strong> {{ $user->role === 'admin' ? 'Admin' : 'User' }}</p>
                        <p><strong>Tanggal Registrasi:</strong> {{ $user->created_at->format('d M Y H:i') }}</p>
                        <p><strong>Terakhir Update:</strong> {{ $user->updated_at->format('d M Y H:i') }}</p>
                        <a href="{{ route('admin.users') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </div>
                </div>
            </div>

            <!-- Produk User -->
            <div class="col-md-7">
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h5 class="mb-0">Produk Pengguna</h5>
                    </div>
                    <div class="card-body">
                        @if(count($produkUser) > 0)
                            <div class="table-responsive">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($produkUser as $produk)
                                        <tr>
                                            <td>{{ $produk->judul_buku }}</td>
                                            <td>Rp{{ number_format($produk->harga_jual, 0, ',', '.') }}</td>
                                            <td>
                                                @if($produk->status == 'pending')
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                @elseif($produk->status == 'accepted')
                                                    <span class="badge bg-success">Diterima</span>
                                                @elseif($produk->status == 'rejected')
                                                    <span class="badge bg-danger">Ditolak</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    @if($produk->status == 'pending')
                                                        <form method="POST" action="{{ route('admin.produk.status', ['id' => $produk->id, 'status' => 'accepted']) }}" class="me-1">
                                                            @csrf
                                                            <button class="btn btn-success btn-sm">Terima</button>
                                                        </form>
                                                        <form method="POST" action="{{ route('admin.produk.status', ['id' => $produk->id, 'status' => 'rejected']) }}" class="me-1">
                                                            @csrf
                                                            <button class="btn btn-danger btn-sm">Tolak</button>
                                                        </form>
                                                    @endif
                                                    <form method="POST" action="{{ route('admin.produk.hapus', ['id' => $produk->id]) }}" 
                                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                Pengguna ini belum memiliki produk.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>