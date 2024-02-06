<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingService extends Model
{
    // Atribut 'use' digunakan untuk mengimpor trait ke dalam model.
    use HasFactory;

    // Nama tabel yang sesuai dengan model
    protected $table = 'bookingservice'; 
    
    //untuk menyimpan data atribut tabel dari tabel booking_services
    protected $fillable = [
        'jenis_barang', 
        'nama', 
        'no_hp', 
        'alamat', 
        'kerusakan', 
        'tanggal_booking', 
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
