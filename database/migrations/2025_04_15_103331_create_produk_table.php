<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();           // untuk menyimpan path foto
            $table->string('nomor_wa');
            $table->decimal('harga_jual', 10, 2);
            $table->string('judul_buku');
            $table->string('informasi_buku');
            $table->text('detail_buku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }

    
};
