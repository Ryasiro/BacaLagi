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

        <div class="card bg-dark text-light">
            <div class="card-header">
                <h5 class="mb-0">Daftar Pengguna</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Tanggal Registrasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role === 'admin' ? 'Admin' : 'User' }}</td>
                                <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.user.detail', $user->id) }}" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>