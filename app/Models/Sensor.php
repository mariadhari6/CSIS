<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;
    protected $table = 'sensors';

    protected $fillable = [
        'sensor_name', 'merk_sensor', 'serial_number', 'rab_number', 'waranty', 'status'
    ];
    public function requestComplaint()
    {
        return $this->hasOne(RequestComplaint::class, 'id', 'equipment_sensor_id');
    }

    public function requestComplaintPemasangan()
    {
        return $this->hasMany(RequestComplaint::class, 'id', 'equipment_terpakai_sensor');
    }
    public function sensorMerk()
    {
        return $this->belongsTo(MerkSensor::class, 'merk_sensor', 'id');
    }
}
