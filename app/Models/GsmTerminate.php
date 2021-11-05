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

        return $this->belongsTo(GsmActive::class);
    }

    public function company()
    {
        return $this->belongsTo(GsmActive::class, 'company_id');
    }
    
    public function gsmPreActive()
    {
        return $this->belongsTo(GsmPreActive::class, 'gsm_number');
    }
}
