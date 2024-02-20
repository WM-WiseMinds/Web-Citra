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
        'user_id',
        'perbaikan_id',
        'bookingservice_id',
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
    // Relasi one-to-many dengan model Perbaikan
    public function perbaikan()
    {
        // Relasi one-to-many dengan menggunakan atribut hasOne yang akan di hubungkan dengan model Perbaikan
        return $this->belongsTo(Perbaikan::class);
    }
    // Relasi one-to-many dengan model BookingService
    public function bookingservice()
    {
        // Relasi one-to-many dengan menggunakan atribut hasOne yang akan di hubungkan dengan model BookingService
        return $this->belongsTo(BookingService::class, 'bookingservice_id');
    }
}
