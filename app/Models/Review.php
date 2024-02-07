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
        'bookingservice_id',
        'rating',
        'comment',
        'review_date'
    ];

    // Relasi one-to-many dengan menggunakan atribut belongsTo karena tabel yang akan di tuju adalah user maka dari itu di hubungkan dengan model User
    public function user()
    {
        // Relasi one-to-many dengan model User
        return $this->belongsTo(User::class);
    }

    // Relasi one-to-one dengan menggunakan atribut belongsTo karena tabel yang akan di tuju adalah bookingservice maka dari itu di hubungkan dengan model Bookingservice
    public function bookingservice()
    {
        // Relasi one-to-one dengan model Bookingservice
        return $this->belongsTo(Bookingservice::class);
    }


}
