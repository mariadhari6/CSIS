<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
 
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

=======
class RequestComplaintCustomer extends Model
{
    use HasFactory;
    protected $table = 'request_complaint_customers';

    protected $fillable = [
        'company_id', 'internal_external', 'pic', 'vehicle', 'waktu_info', 'waktu_respond', 'task', 'platform',
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
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
}
