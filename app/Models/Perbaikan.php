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
    //untuk menghubungkan model perbaikan dengan model transaksi melalui relasi one-to-one
    public function transaksi()
    {
        // Relasi one-to-one dengan menggunakan atribut hasMany yang akan di hubungkan dengan model Transaksi
        return $this->hasOne(Transaksi::class);
    }

    // Untuk menghubungkan model perbaikan dengan model review melalui relasi one-to-many
    public function review()
    {
        // Relasi one-to-many dengan menggunakan atribut hasOne yang akan di hubungkan dengan model Review
        return $this->hasMany(Review::class);
    }

    public function updateTransaksi()
    {
        $jumlah = $this->detailPerbaikan()->count();
        $totalBiaya = $this->detailPerbaikan()->sum('biaya');

        // Perbarui transaksi terkait
        $transaksi = Transaksi::where('perbaikan_id', $this->id)->first();
        if ($transaksi) {
            $transaksi->update([
                'jumlah' => $jumlah,
                'total_biaya' => $totalBiaya,
            ]);
        }
    }
}
