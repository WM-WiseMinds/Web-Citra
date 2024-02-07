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
        Schema::create('perbaikan', function (Blueprint $table) {
            // Kolom ID unik sebagai primary key untuk setiap perbaikan
            $table->id(); 
            // Kolom ID pengguna yang terkait dengan tabel 'users' dengan aksi onDelete 'cascade'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Kolom ID pemesanan yang terkait dengan tabel 'bookingservices' dengan aksi onDelete 'cascade'
            $table->foreignId('bookingservice_id')->constrained('bookingservice')->onDelete('cascade');
            // Kolom keterangan perbaikan
            $table->text('keterangan'); 
            // Kolom persetujuan perbaikan
            $table->enum('persetujuan', ['Perbaiki', 'Tidak' ]); 
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
