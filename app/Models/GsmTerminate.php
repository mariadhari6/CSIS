<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmTerminate extends Model
{
    use HasFactory;
    protected $table = 'gsm_terminates';

    protected $fillable = [
<<<<<<< HEAD
        'gsm_active_id', 'request_date', 'active_date', 'status_active', 'company_id', 'note'
=======
        'request_date', 'active_date', 'gsm_active_id',  'status_active', 'company_id', 'note'
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
    ];

    public function gsmActive()
    {

        return $this->belongsTo(GsmActive::class);
    }

    public function company()
    {
<<<<<<< HEAD
        return $this->belongsTo(GsmActive::class);
=======
        return $this->belongsTo(GsmActive::class, 'company_id');
    }
    
    public function gsmPreActive()
    {
        return $this->belongsTo(GsmPreActive::class, 'gsm_number');
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
    }
}
