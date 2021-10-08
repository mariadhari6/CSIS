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



    public function companyR()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function companyRequest()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function picRequest()
    {
        return $this->belongsTo(Pic::class, 'pic');
    }

    public function pemasanganMutasiGps()
    {
        return $this->hasMany(PemasanganMutasiGps::class);
    }

    public function maintenanceGps()
    {
        return $this->hasMany(MaintenanceGps::class);
    }

    public function taskRequest()
    {
        return $this->belongsTo(Task::class, 'task');
    }
}
