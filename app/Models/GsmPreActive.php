<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmPreActive extends Model
{
    use HasFactory;

    protected $table = 'gsm_pre_actives';

    protected $fillable = [
        'gsm_number', 'serial_number', 'icc_id', 'imsi', 'res_id', 'expired_date', 'note'
    ];
    
    public function gsmActive()
    {
        return $this->hasOne(GsmActive::class);
    }

    public function gsmTerminate()
    {
        return $this->hasOne(GsmTerminate::class);
    }
}
