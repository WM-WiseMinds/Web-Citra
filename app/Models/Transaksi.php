<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    // Atribut 'use' digunakan untuk mengimpor trait ke dalam model.
    use HasFactory;
    
    // Nama tabel yang sesuai dengan model
    protected $table = 'transaksis'; 

    //untuk menyimpan data atribut tabel dari tabel transaksis
    protected $fillable = [
        'user_id',
        'jenis_barang', 
        'biaya', 
        'jumlah',
        'total_biaya', 
    ];
    
    // Relasi one-to-many dengan model User
    public function user()
    {
        // Relasi one-to-many dengan menggunakan atribut belongsTo karena tabel yang di tuju adalah user maka dari itu di hubungkan dengan model User
        return $this->belongsTo(User::class, 'user_id'); 
    }
}
