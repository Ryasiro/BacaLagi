<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search'); // Ambil input dari form pencarian
        $produk = ProdukModel::where('judul_buku', 'LIKE', "%{$query}%")->get(); // Cari produk berdasarkan judul

        return view('search.index', compact('produk', 'query'));
    }
}
