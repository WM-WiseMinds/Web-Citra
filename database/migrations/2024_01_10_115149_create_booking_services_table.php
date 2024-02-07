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
        // Membuat tabel 'bookingservices' untuk menyimpan data pemesanan layanan
        Schema::create('bookingservice', function (Blueprint $table) {
            // Kolom ID unik untuk setiap pemesanan
            $table->id(); 
            // Kolom ID pengguna yang terkait dengan tabel 'users' dengan aksi onDelete 'cascade'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Kolom tanggal pemesanan
            $table->date('tanggal_booking'); 
            // Kolom jenis barang yang membutuhkan layanan
            $table->string('jenis_barang', 50); 
            // Kolom deskripsi kerusakan barang
            $table->text('kerusakan'); 
            // Kolom timestamp otomatis untuk pembuatan dan pembaruan
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_services');
    }
};
