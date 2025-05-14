<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $produk = ProdukModel::all(); // Ambil semua produk
        return view('admin.verifikasi_produk', compact('produk'));
    }

    public function updateStatus($id, $status)
    {
        $produk = ProdukModel::findOrFail($id);
        $produk->status = $status;
        $produk->save();

        return redirect()->back()->with('success', 'Status produk diperbarui.');
    }

    public function hapusProduk($id)
    {
        $produk = ProdukModel::findOrFail($id);

        // Hapus foto jika ada
        if ($produk->foto) {
            Storage::delete('public/' . $produk->foto);
        }

        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }
    
    public function produkDiterima()
    {
        $produk = ProdukModel::where('status', 'accepted')->get();
        return view('admin.produk_diterima', compact('produk'));
    }

    // Menambahkan metode baru untuk mengelola pengguna
    public function userList()
    {
        $users = User::all();
        return view('admin.user_list', compact('users'));
    }

    // Melihat detail user
    public function userDetail($id)
    {
        $user = User::findOrFail($id);
        // Ambil produk yang dimiliki oleh user ini
        $produkUser = ProdukModel::where('user_id', $id)->get();
        return view('admin.user_detail', compact('user', 'produkUser'));
    }

    // Daftar semua produk tanpa filter
    public function allProduk()
    {
        $allProduk = ProdukModel::with('user')->get(); // Eager loading user untuk efisiensi
        return view('admin.all_produk', compact('allProduk'));
    }
}