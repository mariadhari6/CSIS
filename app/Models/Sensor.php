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
<<<<<<< HEAD
    public function pemasanganMutasiGps()
    {
        return $this->hasOne(PemasanganMutasiGps::class);
    }
=======
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
}
