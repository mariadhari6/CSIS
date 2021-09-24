<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmActive extends Model
{
    use HasFactory;

    protected $table = 'gsm_actives';

    protected $fillable = [
<<<<<<< HEAD
        'request_date', 'active_data', 'gsm_pre_active_id', 'status_active', 'company_id', 'note'
=======
        'request_date', 'active_date', 'gsm_pre_active_id', 'status_active', 'company_id', 'note'
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
    ];

    public function gsmPreActive()
    {
        return $this->belongsTo(GsmPreActive::class);
    }

    public function gsmTerminate()
    {
        return $this->hasMany(GsmTerminate::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
<<<<<<< HEAD
=======

    public function detailCustomer()
    {
        return $this->hasMany(DetailCustomer::class);
    }
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
}
