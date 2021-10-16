<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmTemporary extends Model
{
    use HasFactory;
    protected $table = 'gsm_temporary';

    protected $fillable = [
        'status_gsm', 'gsm_number', 'company_id', 'serial_number', 'icc_id', 'imsi', 'res_id', 'request_date',
         'expired_date', 'active_date', 'terminate_date', 'note'
    ];

    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
