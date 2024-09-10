<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatans extends Model
{
    use HasFactory;
    protected $table = 'jabatans';
    protected $primaryKey = 'JabatanID';
    protected $fillable = [
        'NamaJabatan',
        'Keterangan',
        'DepartemenID',
    ];


    public function departemens() 
    {
        return $this->belongsTo(Departemens::class, 'DepartemenID');
    }


}
