<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmActive extends Model
{
    use HasFactory;

    protected $table = 'gsm_actives';

    protected $fillable = [
        'gsm_pre_active_id', 'request_date', 'active_date', 'status_active', 'company', 'note'
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
}
