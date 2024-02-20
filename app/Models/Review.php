<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review';

    protected $fillable = [
        'user_id',
        'perbaikan_id',
        'rating',
        'comment',
    ];

    // Relasi one-to-many dengan menggunakan atribut belongsTo karena tabel yang akan di tuju adalah user maka dari itu di hubungkan dengan model User
    public function user()
    {
        // Relasi one-to-many dengan model User
        return $this->belongsTo(User::class);
    }

    // Relasi one-to-one dengan menggunakan atribut belongsTo karena tabel yang akan di tuju adalah perbaikan maka dari itu di hubungkan dengan model Perbaikan
    public function perbaikan()
    {
        // Relasi one-to-one dengan model Perbaikan
        return $this->belongsTo(Perbaikan::class);
    }
}
