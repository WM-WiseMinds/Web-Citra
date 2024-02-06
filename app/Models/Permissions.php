<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    // Atribut 'use' digunakan untuk mengimpor trait ke dalam model.
    use HasFactory;
    /**
     * Model untuk mengelola izin (permissions) dalam sistem.
     */
    // Nama tabel yang sesuai dengan model
    protected $table = 'permissions'; 

    //untuk menyimpan data atribut tabel dari tabel permissions
    protected $fillable = [
        'name', 
    ];

    //untuk menghubungkan model permissions dengan model roles melalui relasi many-to-many
    public function roles()
    {
        // Relasi many-to-many dengan model Role
        return $this->belongsToMany(Roles::class,'role_permissions', 'permission_id', 'role_id'); // Relasi many-to-many dengan model Role
    }
}
