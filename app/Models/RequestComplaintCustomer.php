<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestComplaintCustomer extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'company', 'internal_external', 'pic', 'vehicle', 'waktu_info', 'task', 'platform',
        'detail_task', 'divisi', 'respond', 'waktu_kesepakatan', 'waktu_solve', 'status', 'status_akhir',
    ];

    public function companyRequest()
    {
        return $this->belongsTo(Company::class);
    }
    public function picRequest()
    {
        return $this->belongsTo(Pic::class);
    }
}
