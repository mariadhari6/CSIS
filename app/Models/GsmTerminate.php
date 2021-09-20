<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmTerminate extends Model
{
    use HasFactory;
    protected $table = 'gsm_terminates';

    protected $fillable = [
        'request_date', 'active_date', 'gsm_active_id',  'status_active', 'company_id', 'note'
    ];

    public function gsmActive()
    {

<<<<<<< HEAD
        return $this->hasOne(GsmActive::class, 'gsm_pre_active_id');
=======
        return $this->belongsTo(GsmActive::class);
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
    }

    public function company()
    {
<<<<<<< HEAD
        return $this->belongsTo(GsmActive::class, 'company_id');
    }
    
    public function gsmPreActive()
    {
        return $this->belongsTo(GsmPreActive::class, 'gsm_number');
=======
        return $this->belongsTo(GsmActive::class);
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
    }
}
