<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasanganMutasiGps extends Model
{
    use HasFactory;
    protected $table = 'pemasangan_mutasi_gps';

    protected $fillable = [
        'company_id', 'tanggal', 'kendaraan_awal', 'imei', 'gsm', 'kendaraan_pasang', 'jenis_pekerjaan', 'equipment_terpakai_gps', 'equipment_terpasang_sensor', 'teknisi',
        'uang_transportasi', 'type_visit', 'note'
    ];
    public function requestComplain()
    {
        return $this->belongsTo(RequestComplaintCustomer::class, 'company', 'tanggal', 'waktu_kesepakatan');
    }
    // public function companyRequest()
    // {
    //     return $this->belongsTo(Company::class);
    // }
    public function detailCustomer()
    {
        return $this->belongsTo(DetailCustomer::class);
    }
    public function gpsPemasangan()
    {
        return $this->belongsTo(Gps::class);
    }

    public function sensorPemasangan()
    {
        return $this->belongsTo(Sensor::class);
    }
}
