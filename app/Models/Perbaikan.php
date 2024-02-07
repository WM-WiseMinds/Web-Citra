<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    // Atribut 'use' digunakan untuk mengimpor trait ke dalam model.
    use HasFactory;

    // Nama tabel yang sesuai dengan model
    protected $table = 'perbaikan';

    //untuk menyimpan data atribut tabel dari tabel perbaikan
    protected $fillable = [
        'user_id',
        'bookingservice_id',
        'keterangan',
        'persetujuan',
    ];

    //untuk menghubungkan model perbaikan dengan model detailperbaikan melalui relasi one-to-many
    public function detailperbaikan()
    {
        // Relasi one-to-many dengan menggunakan atribut hasMany yang akan di hubungkan dengan model DetailPerbaikan
        return $this->hasMany(DetailPerbaikan::class);
    }
    //untuk menghubungkan model perbaikan dengan model user melalui relasi one-to-many
    public function user()
    {
        // Relasi one-to-many dengan menggunakan atribut belongsTo karena tabel yang akan di tuju adalah user maka dari itu di hubungkan dengan model User
        return $this->belongsTo(User::class);
    }
    //untuk menghubungkan model perbaikan dengan model bookingservice melalui relasi one-to-many
    public function bookingservice()
    {
        // Relasi one-to-many dengan menggunakan atribut belongsTo karena tabel yang di tuju adalah  Bookingservice  maka dari itu di hubungkan dengan model BookingService
        return $this->belongsTo(BookingService::class);
    }
    //untuk menghubungkan model perbaikan dengan model transaksi melalui relasi one-to-many
    public function transaksi()
    {
        // Relasi one-to-many dengan menggunakan atribut belongsTo karena tabel yang di tuju adalah  transaksi  maka dari itu di hubungkan dengan model Transaksi
        return $this->belongsTo(Transaksi::class);
    }

    public function getDetailPerbaikanSummaryAttribute()
    {
        return $this->detailperbaikan->map(function ($detail) {
            return "Status: {$detail->status}, <br> Biaya: {$detail->biaya}";
        })->join('; <br>');
    }
}
