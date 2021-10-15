<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeGps extends Model
{
    use HasFactory;
    protected $table = 'type_gps';
    public function Gps()
    {
        return $this->hasMany(Gps::class, 'type', 'id');
    }

    public function GpsTemporary()
    {
        return $this->hasMany(GpsTemporary::class);
    }
}
