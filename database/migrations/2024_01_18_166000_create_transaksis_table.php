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
    // Membuat tabel 'transaksis' untuk menyimpan data transaksi
    Schema::create('transaksi', function (Blueprint $table) {
        // Kolom ID unik untuk setiap transaksi
        $table->id(); 
        // Kolom ID pengguna yang terkait dengan tabel 'users' dengan aksi onDelete 'cascade'
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        // Kolom Id detail perbaikan yang terkait dengan tabel 'detailperbaikan' dengan aksi onDelete 'cascade'
        $table->foreignId('detailperbaikan_id')->constrained('detailperbaikan')->onDelete('cascade');
        // Kolom Id booking service yang terkait dengan tabel 'bookingservice' dengan aksi onDelete 'cascade'
        $table->foreignId('bookingservice_id')->constrained('bookingservice')->onDelete('cascade');
        // Kolom biaya per item
        $table->integer('biaya' ); 
        // Kolom jumlah item yang dibeli
        $table->integer('jumlah'); 
        // Kolom total biaya transaksi
        $table->integer('total_biaya' ); 
        // Kolom timestamp otomatis untuk pembuatan dan pembaruan
        $table->timestamps(); 
    });
    }

    /**
     * Reverse the migrations.
     */
    //untuk menghapus tabel transaksis
    public function down(): void
    {
        // untuk menghapus tabel transaksis
        Schema::dropIfExists('transaksis');
    }
};