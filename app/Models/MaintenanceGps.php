<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceGps extends Model
{
    use HasFactory;

    protected $guard = ['id'];

    public function requestComplain()
    {
        return $this->belongsTo(RequestComplaintCustomer::class, 'company_id');
    }

    public function gps()
    {
        return $this->belongsTo(Gps::class, 'type_gps_id');
    }

    public function sensor()
    {
        return $this->belongsTo(Sensor::class, 'equipment_sensor_id');
    }

    public function teknisiMaintenance()
    {
        return $this->belongsTo(Teknisi::class, 'teknisi_id');
    }
}
