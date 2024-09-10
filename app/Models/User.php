<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'UserID';
    protected $fillable = [
        'name',
        'email',
        'password',
        'JabatanID',
        'Tanggal_Lahir',
        'Jenis_Kelamin',
        'No_Telp',
        'Alamat',
        'Tanggal_Bergabung',
        'Status',
        'role_as'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'Tanggal_Lahir' => 'date',
        'Tanggal_Bergabung' => 'date',
        'email_verified_at' => 'datetime',
    ];
    
   
    public function jabatan()
    {
        return $this->belongsTo(Jabatans::class, 'JabatanID', 'JabatanID' );
    }

    public function gajis()
    {
        return $this->hasMany(Gaji::class, 'GajiID', 'GajiID');
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'AbsensiID', 'AbsensiID');
    }
}
