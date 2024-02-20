<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPerbaikan extends Model
{
    // Atribut 'use' digunakan untuk mengimpor trait ke dalam model.
    use HasFactory;

    // Nama tabel yang sesuai dengan model
    protected $table = 'detailperbaikan';

    //untuk menyimpan data atribut tabel dari tabel detailperbaikan
    protected $fillable = [
        'perbaikan_id',
        'jenis_perbaikan',
        'biaya',
    ];
    //untuk menghubungkan model detailperbaikan dengan model user melalui relasi one-to-many
    public function perbaikan()
    {
        // Relasi one-to-many dengan menggunakan atribut belongsTo karena tabel yang akan di tuju adalah Perbaikan maka dari itu di hubungkan dengan model Perbaikan
        return $this->belongsTo(Perbaikan::class);
    }

    protected static function booted()
    {
        static::saved(function ($detailPerbaikan) {
            // Panggil fungsi untuk memperbarui transaksi terkait
            $detailPerbaikan->perbaikan->updateTransaksi();
        });

        static::deleted(function ($detailPerbaikan) {
            // Panggil fungsi untuk memperbarui transaksi terkait
            $detailPerbaikan->perbaikan->updateTransaksi();
        });
    }
}
