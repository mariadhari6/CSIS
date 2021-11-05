<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestComplaint extends Model
{
    use HasFactory;
    protected $table = 'request_complaint';

    protected $fillable = [
        'company_id', 'internal_eksternal', 'pic_id', 'vehicle', 'waktu_info', 'task', 'platform', 'detail_task', 'divisi', 'waktu_respond', 'respond', 'waktu_kesepakatan', 'waktu_solve', 'status', 'status_akhir',
         'imei', 'gsm_pemasangan', 'equipment_terpakai_gps', 'equipment_terpakai_sensor', 'teknisi_pemasangan', 'uang_transportasi', 'type_visit', 'note_pemasangan',
         'type_gps_id', 'equipment_gps_id', 'equipment_sensor_id', 'equipment_gsm', 'ketersediaan_kendaraan', 'keterangan', 'hasil', 'biaya_transportasi', 'teknisi_maintenance', 'req_by', 'note_maintenance'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function pic()
    {
        return $this->belongsTo(Pic::class);
    }
    public function vehicleRequest()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle', 'id');
    }
    public function task()
    {
        return $this->belongsTo(Task::class, 'task', 'id');
    }
}
