<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $produk = ProdukModel::where('status', 'pending')->get();
        return view('admin.verifikasi_produk', compact('produk'));
    }

    public function updateStatus($id, $status)
    {
        $produk = ProdukModel::findOrFail($id);
        $produk->status = $status;
        $produk->save();

        return redirect()->back()->with('success', 'Status produk diperbarui.');
    }
}
