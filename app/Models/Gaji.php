<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = 'gajis'; // Nama tabel
    protected $primaryKey = 'GajiID'; // Nama primary key yang sesuai
    public $incrementing = true; // Jika primary key auto-increment
    protected $keyType = 'int'; // Tipe primary key (int)
    protected $fillable = ['UserID', 'No_Rekening', 'Npwp', 'Nominal'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID'); // Menentukan relasi dengan model User
    }
}
