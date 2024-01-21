<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingService extends Model
{
    // Atribut 'use' digunakan untuk mengimpor trait ke dalam model.
    use HasFactory;

    // Nama tabel yang sesuai dengan model
    protected $table = 'booking_services'; 
    
    //untuk menyimpan data atribut tabel dari tabel booking_services
    protected $fillable = [
        'tanggal_booking', 
        'nama', 
        'alamat', 
        'no_hp', 
        'jenis_barang', 
        'kerusakan', 
    ];

    public function user()
    {
        // Relasi one-to-many dengan menggunakan atribut belongsTo karena tabel yang akan di tuju adalah user maka dari itu di hubungkan dengan model User
        return $this->belongsTo(User::class);
    }

    public function perbaikan()
    {
        // Relasi one-to-many dengan menggunakan atribut hasMany yang akan di hubungkan dengan model Perbaikan
        return $this->hasMany(Perbaikan::class); 
    }
}
