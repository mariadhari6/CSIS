<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmMaster extends Model
{
    use HasFactory;

    protected $table = 'gsm_masters';

    protected $fillable = [
        'gsm_number', 'serial_number', 'icc_id', 'imsi', 'res_id', 'expired_date', 'note', 'status_gsm'
    ];

}
