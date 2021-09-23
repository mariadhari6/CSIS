<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

 
class RequestComplaintCustomer extends Model
{
    use HasFactory;

    protected $table = 'request_complaint_customers';

    protected $fillable = [
        'company_id', 'internal_eksternal', 'pic_id', 'vehicle', 'waktu_info', 'task', 'platform',
        'detail_task', 'divisi', 'waktu_respond', 'respond', 'waktu_kesepakatan', 'waktu_solve', 'status', 'status_akhir',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function pic()
    {
        return $this->belongsTo(Pic::class);
    }

}
