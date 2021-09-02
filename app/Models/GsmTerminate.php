<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmTerminate extends Model
{
    use HasFactory;
    protected $table = 'gsm_terminates';

    protected $fillable = [
        'gsm_active_id', 'request_date', 'active_date', 'status_active', 'company_id', 'note'
    ];

    public function gsmActive()
    {

        return $this->belongsTo(GsmActive::class);
    }

    public function company()
    {
        return $this->belongsTo(GsmActive::class);
    }
}
