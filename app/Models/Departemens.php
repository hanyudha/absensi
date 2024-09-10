<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemens extends Model
{
    use HasFactory;
    protected $table = 'departemens';
    protected $primaryKey = 'DepartemenID';
    protected $fillable = [
        'NamaDepartemen',
    ];

     public function jabatans()
    {
        return $this->hasMany(Jabatans::class);
    }
}
