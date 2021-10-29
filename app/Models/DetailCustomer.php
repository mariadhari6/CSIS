<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCustomer extends Model
{
    use HasFactory;
    
    protected $table = 'detail_customers';

    protected $fillable = [
        'company_id',
        'licence_plate',
        'vehicle_id',
        'po_id',
        'harga_layanan',
        'po_date',
        'status_po',
        'imei',
        'gps_id',
        'type',
        'gsm_id',
        'provider',
        'sensor_all',
        'serial_number_sensor',
        'sensor_id',
        'merk_sensor',
        'pool_name',
        'pool_location',
        'waranty',
        'status_layanan',
        'tanggal_pasang',
        'tanggal_non_aktif',
        'tgl_reaktivasi_gps'
    ];


    public function pemasanganMutasiGps() {

        return $this->hasMany(PemasanganMutasiGps::class);
    }

    public function company() {

        return $this->belongsTo(Company::class);
    }

    public function gsm() {

        return $this->belongsTo(Gsm::class);
    }

    public function summary() {

        return $this->hasMany(SummaryCustomer::class);
    }
    
    public function gps() {
        
        return $this->belongsTo(Gps::class);
    }

    public function sensor() {
        
        return $this->belongsTo(Sensor::class);
    }

    public function po() {
        
        return $this->belongsTo(MasterPo::class);
    }

    public function vehicle() {

        return $this->belongsTo(Vehicle::class);
    }
}
