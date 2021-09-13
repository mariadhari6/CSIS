<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmPreActive extends Model
{
    use HasFactory;

    protected $table = 'gsm_pre_actives';

    protected $fillable = [
        'request_date', 'active_date', 'gsm_active_id', 'status_active', 'company_id', 'note'
    ];
    public function gsmActive()
    {
        return $this->hasOne(GsmActive::class);
    }
}
