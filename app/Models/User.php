<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    // Atribut 'use' digunakan untuk mengimpor trait ke dalam model.
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // Atribut 'fillable' digunakan untuk menentukan atribut mana saja yang dapat diisi massal.
    protected $fillable = [
        'name',
        'email',
        'no_hp',
        'alamat',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    // Atribut 'hidden' digunakan untuk menyembunyikan atribut dari model ketika model diubah menjadi array atau JSON.
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    // Atribut 'casts' digunakan untuk mengubah tipe data atribut dari model.
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */

    // atribut 'appends' digunakan untuk menambahkan atribut ke array model.
    protected $appends = [
        'profile_photo_url',
    ];

    // Metode 'bookingservice()' digunakan untuk mendefinisikan hubungan antara model ini dengan model 'Bookingservice'.
    // Model ini akan memiliki satu relasi 'hasMany' dengan 'Bookingservice', yang berarti satu pengguna dapat memiliki banyak booking service.
    public function bookingservice()
    {
        // Relasi one-to-many dengan model BookingService
        return $this->hasMany(Bookingservice::class);
    }

    // Metode 'perbaikan()' digunakan untuk mendefinisikan hubungan antara model ini dengan model 'Perbaikan'.
    // Model ini akan memiliki satu relasi 'hasMany' dengan 'Perbaikan', yang berarti satu pengguna dapat memiliki banyak data perbaikan.
    public function perbaikan()
    {
        // Relasi one-to-many dengan model Perbaikan
        return $this->hasMany(Perbaikan::class);
    }

    // Metode 'transaksi()' digunakan untuk mendefinisikan hubungan antara model ini dengan model 'Transaksi'.
    // Model ini akan memiliki satu relasi 'hasMany' dengan 'Transaksi', yang berarti satu pengguna dapat memiliki banyak transaksi.
    public function transaksi()
    {
        // Relasi one-to-many dengan model Transaksi
        return $this->hasMany(Transaksi::class);
    }

    // Metode 'review()' digunakan untuk mendefinisikan hubungan antara model ini dengan model 'Review'.
    // Model ini akan memiliki satu relasi 'hasMany' dengan 'Review', yang berarti satu pengguna dapat memiliki banyak review.
    public function review()
    {
        // Relasi one-to-many dengan model Review
        return $this->hasMany(Review::class);
    }

    protected function getDefaultGuardName(): string
    {
        return 'web';
    }
}
