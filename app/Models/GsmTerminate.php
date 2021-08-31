<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmTerminate extends Model
{
    use HasFactory;
    protected $table = 'gsm_actives';

    protected $fillable = [
        'gsm_active_id', 'request_date', 'active_date', 'status_avtive', 'company', 'note'
    ];

    public function gsmActive()
    {
        return $this->belongsTo(GsmActive::class);
    }

    public function companys()
    {
        return $this->belongsTo(Company::class);
    }
}
