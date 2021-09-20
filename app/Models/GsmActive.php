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
<<<<<<< HEAD
        return $this->belongsTo(GsmTerminate::class);
=======
        return $this->hasMany(GsmTerminate::class);
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
<<<<<<< HEAD

    public function detailCustomer()
    {
        return $this->hasMany(DetailCustomer::class);
    }
=======
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
}
