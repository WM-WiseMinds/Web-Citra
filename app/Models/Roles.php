<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
        /**
     * Model untuk mengelola peran (roles) dalam sistem.
     */
    // Nama tabel yang sesuai dengan model
    protected $table = 'roles'; 
    //untuk menyimpan data atribut tabel dari tabel roles
    protected $fillable = [
        'name', 
    ];
    //untuk menghubungkan model roles dengan model user melalui relasi one-to-many
    public function permissions()
    {
        // Relasi many-to-many dengan model Permissions
        return $this->belongsToMany(Permissions::class,'role_permissions', 'role_id');
    }
}
