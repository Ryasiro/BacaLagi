<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'foto',
        'nomor_wa',
        'harga_jual',
        'judul_buku',
        'informasi_buku',
        'detail_buku',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
