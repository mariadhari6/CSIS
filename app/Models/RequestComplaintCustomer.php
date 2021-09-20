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

    public function companyRequest()
    {
        return $this->belongsTo(Company::class, 'id');
    }

    public function picRequest()
    {
        return $this->belongsTo(Pic::class, 'id');
    }

    public function pemasanganMutasiGps()
    {
        return $this->hasMany(PemasanganMutasiGps::class);
    }
}
