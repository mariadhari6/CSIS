<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestComplaintCustomer extends Model
{
    use HasFactory;
    protected $table = 'request_complaint_customers';

    protected $fillable = [
        'company', 'internal_external', 'pic', 'vehicle', 'waktu_info', 'task', 'platform',
        'detail_task', 'divisi', 'respond', 'waktu_kesepakatan', 'waktu_solve', 'status', 'status_akhir',
    ];

    // protected $guard = ['id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function picRequest()
    {
        return $this->belongsTo(Pic::class);
    }
    
    public function pemasanganMutasiGps()
    {
        return $this->hasOne(PemasanganMutasiGps::class);
    }

}
