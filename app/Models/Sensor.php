<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'sensors';

    protected $fillable = [
        'sensor_name', 'merk_sensor', 'serial_number', 'rab_number', 'waranty', 'status'
    ];
    public function pemasanganMutasiGps()
    {
        return $this->hasOne(PemasanganMutasiGps::class);
    }
}
