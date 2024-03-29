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
        Schema::create('review', function (Blueprint $table) {
            $table->id();
            // Kolom ID pengguna yang terkait dengan tabel 'users' dengan aksi onDelete 'cascade'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Kolom ID layanan yang terkait dengan tabel 'bookingservice' dengan aksi onDelete 'cascade'
            $table->foreignId('perbaikan_id')->constrained('perbaikan')->onDelete('cascade');
            // Kolom rating yang berisi angka
            $table->integer('rating');
            // Kolom komentar yang berisi teks
            $table->text('comment');
            // Kolom created_at dan updated_at yang berisi tanggal dan waktu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
