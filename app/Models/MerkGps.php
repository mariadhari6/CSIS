<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerkGps extends Model
{
    use HasFactory;
    protected $table = 'merk_gps';

    public function Gps()
    {
        return $this->hasMany(Gps::class);
    }
    public function gpsType()
    {
        return $this->hasMany(Gps::class, 'type', 'id');
    }
    public function GpsTemporary()
    {
        return $this->hasMany(GpsTemporary::class);
    }
}
