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
        'imei_id', 'gsm_pemasangan', 'equipment_terpakai_gps', 'equipment_terpakai_sensor', 'teknisi_pemasangan', 'uang_transportasi', 'type_visit', 'note_pemasangan', 'kendaraan_pasang',
        'type_gps_id', 'equipment_gps_id', 'equipment_sensor_id', 'equipment_gsm', 'ketersediaan_kendaraan', 'keterangan', 'hasil', 'biaya_transportasi', 'teknisi_maintenance', 'req_by', 'note_maintenance'
    ];


    public function companyRequest()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function pic()
    {
        return $this->belongsTo(Pic::class, 'pic_id', 'id');
    }
    public function taskRequest()
    {
        return $this->belongsTo(Task::class, 'task', 'id');
    }
    public function teknisi()
    {
        return $this->belongsTo(Teknisi::class, 'teknisi_pemasangan', 'id');
    }
    public function teknisiMaintenance()
    {
        return $this->belongsTo(Teknisi::class, 'teknisi_maintenance', 'id');
    }
    public function detailCustomer()
    {
        return $this->belongsTo(DetailCustomer::class, 'imei', 'id');
    }
    public function gsmMaster()
    {
        return $this->belongsTo(Gsm::class, 'gsm_pemasangan', 'id'); // GSM apa gps?
    }
    public function gsm()
    {
        return $this->belongsTo(Gsm::class, 'equipment_gsm', 'id'); // GSM apa gps?
    }
    public function sensor()
    {
        return $this->belongsTo(Sensor::class, 'equipment_terpakai_sensor', 'id');
    }
    public function sensorMaintenance()
    {
        return $this->belongsTo(Sensor::class, 'equipment_sensor_id', 'id');
    }
    public function gpsPemasangan()
    {
        return $this->belongsTo(Gps::class, 'equipment_terpakai_gps', 'id');
    }
    public function gpsMaintenance()
    {
        return $this->belongsTo(Gps::class, 'equipment_gps_id', 'id');
    }
    public function gpsType()
    {
        return $this->belongsTo(Gps::class, 'type_gps_id', 'id');
    }
    public function vehicleRequest()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle', 'id');
    }
    public function vehicleKendaraanPasang()
    {
        return $this->belongsTo(Vehicle::class, 'kendaraan_pasang', 'id');
    }
}
