<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;

class ProdukController extends Controller
{
    public function show($judul_buku,$id)
    {
        $produk = ProdukModel::findOrFail($id);
        return view('produk.detail', compact('produk'));
    }
}
