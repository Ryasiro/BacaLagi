<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;
use App\Notifications\ProdukVerifikasiNotification;


class AddProdukController extends Controller
{
    public function index(){
        return view('addProdukIndex');
    }

    public function store(Request $request){
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nomor_wa' => 'required',
            'harga_jual' => 'required|numeric',
            'judul_buku' => 'required',
            'informasi_buku' => 'required',
            'detail_buku' => 'required'
        ]);

        // Simpan file foto kalau ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('produk_foto', 'public');
        }
        $nomorLengkap = $request->kode_negara . $request->nomor_wa;
        ProdukModel::create([
            'foto' => $fotoPath,
            'nomor_wa' => $nomorLengkap,
            'harga_jual' => $request->harga_jual,
            'judul_buku' => $request->judul_buku,
            'informasi_buku' => $request->informasi_buku,
            'detail_buku' => $request->detail_buku,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function updateStatus($id, $status)
    {
        $produk = ProdukModel::findOrFail($id);
        $produk->status = $status;
        $produk->save();

        if ($produk->user) {
            $produk->user->notify(new ProdukVerifikasiNotification($status));
        }

        return redirect()->back()->with('success', 'Status produk diperbarui.');
    }
}
