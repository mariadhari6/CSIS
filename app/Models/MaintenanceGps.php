<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceGps extends Model
{
    use HasFactory;
    protected $table = 'maintenance_gps';

    protected $fillable = [
        'company', 'vehicle', 'tanggal', 'type_gps', 'equipment_gps', 'equipment_sensor',
        'equipment_gsm', 'permasalahan', 'ketersediaan_kendaraan', 'keterangan', 'hasil',
        'biaya_transportasi', 'teknisi', 'req_by', 'note'
    ];

}
