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
        'imei', 'gsm_pemasangan', 'equipment_terpakai_gps', 'equipment_terpakai_sensor', 'teknisi_pemasangan', 'uang_transportasi', 'type_visit', 'note_pemasangan', 'kendaraan_pasang',
        'type_gps_id', 'equipment_gps_id', 'equipment_sensor_id', 'equipment_gsm', 'ketersediaan_kendaraan', 'keterangan', 'hasil', 'biaya_transportasi', 'teknisi_maintenance', 'req_by', 'note_maintenance'
    ];

    public function companyPemasangan()
    {
        return $this->belongsTo(Company::class, 'id');
    }
    public function companyMaintenance()
    {
        return $this->belongsTo(Company::class, 'id');
    }
    public function companyRequest()
    {
        return $this->belongsTo(Company::class, 'id');
    }

    public function pic()
    {
        return $this->belongsTo(Pic::class, 'id');
    }
    public function taskRequest()
    {
        return $this->belongsTo(Task::class, 'id');
    }
    public function teknisi()
    {
        return $this->belongsTo(Teknisi::class, 'id');
    }
    public function detailCustomer()
    {
        return $this->belongsTo(DetailCustomer::class, 'imei');
    }
    public function gsm()
    {
        return $this->belongsTo(Gsm::class, 'id');
    }
    public function gps()
    {
        return $this->belongsTo(Gps::class, 'id');
    }

    public function sensor()
    {
        return $this->belongsTo(Sensor::class, 'id');
    }
}
