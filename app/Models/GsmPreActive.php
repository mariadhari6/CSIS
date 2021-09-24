<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmPreActive extends Model
{
    use HasFactory;

    protected $table = 'gsm_pre_actives';

    protected $fillable = [
<<<<<<< HEAD
        'request_date', 'active_date', 'gsm_active_id', 'status_active', 'company_id', 'note'
=======
        'gsm_number', 'serial_number', 'icc_id', 'imsi', 'res_id', 'expired_date', 'note'
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
    ];
    public function gsmActive()
    {
        return $this->hasOne(GsmActive::class);
    }
<<<<<<< HEAD
=======

    public function gsmTerminate()
    {
        return $this->hasOne(GsmTerminate::class);
    }
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
}
