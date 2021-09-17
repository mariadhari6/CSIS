<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmActive extends Model
{
    use HasFactory;

    protected $table = 'gsm_actives';

    protected $fillable = [
        'request_date', 'active_date', 'gsm_pre_active_id', 'status_active', 'company_id', 'note'
    ];

    public function gsmPreActive()
    {
        return $this->belongsTo(GsmPreActive::class);
    }

    public function gsmTerminate()
    {
        return $this->hasOne(GsmTerminate::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function detailCustomer()
    {
        return $this->hasMany(DetailCustomer::class);
    }
}
