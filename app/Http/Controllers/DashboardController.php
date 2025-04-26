<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $produk = ProdukModel::where('status', 'accepted')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard', compact('produk'));
    }
}
