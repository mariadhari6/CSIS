<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';

    protected $fillable = [
        'company_name', 'seller_id', 'customer_code', 'no_agreement_letter_id', 'status',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function pic()
    {
        return $this->hasMany(Pic::class);
    }

    public function gsmActive()
    {
        return $this->hasMany(GsmActive::class);
    }
    public function gsmTerminate()
    {
        return $this->hasMany(GsmTerminate::class);
    }
    public function maintenanceGps()
    {
        return $this->hasMany(MaintenanceGps::class);
    }
    public function pemasanganMutasiGps()
    {
        return $this->hasMany(PemasanganMutasiGps::class);
    }
    
    public function requestComplaint()
    {
        return $this->hasMany(RequestComplaint::class);
    }
    
    public function masterPo()
    {
        return $this->hasMany(MasterPo::class, 'company_id', 'id');
    }
    public function gsmTemporary()
    {
        return $this->hasMany(GsmTemporary::class, 'company_id', 'id');
    }
    public function gsm()
    {
        return $this->hasMany(Gsm::class, 'company_id', 'id');
    }
    public function detailCustomer()
    {
        return $this->hasMany(DetailCustomer::class, 'company_id', 'id');
    }

    public function summary()
    {
        return $this->hasMany(SummaryCustomer::class);
    }

    public function Po()
    {
        return $this->hasMany(MasterPo::class);
    }

    public function vehicle(){

        return $this->hasMany(Vehicle::class);
    }
    
    public function gps()
    {
        return $this->hasMany(Gps::class);
    }

}
