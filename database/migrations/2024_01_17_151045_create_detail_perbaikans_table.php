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
        // Membuat tabel 'detail_perbaikans' untuk menyimpan data detail perbaikan
        Schema::create('detail_perbaikans', function (Blueprint $table) {
            // Kolom ID unik sebagai primary key untuk setiap detail perbaikan
            $table->id(); 
            // Kolom ID perbaikan yang terkait dengan tabel 'perbaikans' dengan aksi onDelete 'cascade'
            $table->foreignId('perbaikan_id')->constrained('perbaikans')->onDelete('cascade');
            // Kolom jenis barang dengan batasan 50 karakter
            $table->string('jenis_barang', 50); 
            // Kolom deskripsi kerusakan barang
            $table->string('kerusakan'); 
            // Kolom keterangan detail perbaikan
            $table->string('keterangan'); 
            // Kolom persetujuan detail perbaikan
            $table->string('persetujuan');
            // Kolom timestamp otomatis untuk pembuatan dan pembaruan
            $table->timestamps(); 
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_perbaikans');
    }
};
