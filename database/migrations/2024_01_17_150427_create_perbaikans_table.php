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
        // Membuat tabel 'perbaikans' untuk menyimpan data perbaikan
        Schema::create('perbaikans', function (Blueprint $table) {
            // Kolom ID unik sebagai primary key untuk setiap perbaikan
            $table->id(); 
            // Kolom ID pengguna yang terkait dengan tabel 'users' dengan aksi onDelete 'cascade'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Kolom ID pemesanan yang terkait dengan tabel 'bookingservices' dengan aksi onDelete 'cascade'
            $table->foreignId('bookingservice_id')->constrained('bookingservices')->onDelete('cascade');
            // Kolom jenis barang dengan batasan 50 karakter
            $table->string('jenis_barang', 50); 
            // Kolom deskripsi kerusakan barang
            $table->string('kerusakan'); 
            // Kolom keterangan perbaikan
            $table->string('keterangan'); 
            // Kolom persetujuan perbaikan
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
        Schema::dropIfExists('perbaikans');
    }
};
