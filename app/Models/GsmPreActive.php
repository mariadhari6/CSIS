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
<<<<<<< HEAD

    public function gsmTerminate()
    {
        return $this->hasOne(GsmTerminate::class);
    }
=======
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
}
