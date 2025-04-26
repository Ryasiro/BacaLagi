<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function index()
    {
        $produk = ProdukModel::all(); // Ambil semua produk: pending, accepted, rejected (jika ada)
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

}
