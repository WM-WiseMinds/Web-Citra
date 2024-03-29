<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    // Atribut 'use' digunakan untuk mengimpor trait ke dalam model.
    use HasFactory;

    // Nama tabel yang sesuai dengan model
    protected $table = 'transaksi';

    //untuk menyimpan data atribut tabel dari tabel transaksis
    protected $fillable = [
        'perbaikan_id',
        'jumlah',
        'total_biaya',
    ];

    // Relasi one-to-many dengan model Perbaikan
    public function perbaikan()
    {
        // Relasi one-to-many dengan menggunakan atribut hasOne yang akan di hubungkan dengan model Perbaikan
        return $this->belongsTo(Perbaikan::class);
    }
}
