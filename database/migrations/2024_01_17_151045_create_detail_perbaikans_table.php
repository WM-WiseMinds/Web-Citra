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
        Schema::create('detailperbaikan', function (Blueprint $table) {
            // Kolom ID unik sebagai primary key untuk setiap detail perbaikan
            $table->id();
            // Kolom ID perbaikan yang terkait dengan tabel 'perbaikans' dengan aksi onDelete 'cascade'
            $table->foreignId('perbaikan_id')->constrained('perbaikan')->onDelete('cascade');
            // Kolom jenis perbaikan barang
            $table->string('jenis_perbaikan', 50);
            // Kolom biaya barang
            $table->integer('biaya');
            //kolom Timestamp otomatis untuk pembuatan dan pembaruan
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
