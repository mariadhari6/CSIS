<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasanganMutasiGps extends Model
{
    use HasFactory;
    protected $table = 'pemasangan_mutasi_gps';

    protected $fillable = [
        'company_id', 'tanggal', 'kendaraan_awal', 'imei', 'gsm_pemasangan', 'kendaraan_pasang', 'jenis_pekerjaan', 'equipment_terpakai_gps', 'equipment_terpasang_sensor', 'teknisi',
        'uang_transportasi', 'type_visit', 'note'
    ];
    public function requestComplain()
    {
        return $this->belongsTo(RequestComplaintCustomer::class, 'company_id');
    }
    // public function companyRequest()
    // {
    //     return $this->belongsTo(Company::class);
    // }
    public function detailCustomer()
    {
        return $this->belongsTo(DetailCustomer::class, 'imei');
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
