<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gsm extends Model
{
    use HasFactory;

    protected $table = 'gsm';

    // protected $guard = ['id'];
    protected $fillable = [
        'status_gsm', 'gsm_number', 'company_id', 'serial_number', 'icc_id', 'imsi', 'res_id', 'request_date',
        'expired_date', 'active_date', 'terminate_date', 'note', 'provider', 'was_maintenance'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    public function requestComplaint()
    {
        return $this->hasMany(RequestComplaint::class, 'gsm_pemasangan', 'id');
    }
    public function requestComplaintMaintenance()
    {
        return $this->hasMany(RequestComplaint::class, 'equipment_gsm', 'id');
    }
    public function detail()
    {
        return $this->hasMany(DetailCustomer::class);
    }
}
