<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GpsTemporary extends Model
{
    use HasFactory;
    protected $table = 'gps_temporaries';
    protected $fillable = [
        'merk', 'type', 'imei', 'waranty', 'po_date', 'status', 'status_ownership'
    ];

    public function merkGps()
    {
        return $this->belongsTo(MerkGps::class, 'merk');
    }
    public function typeGps()
    {
        return $this->belongsTo(TypeGps::class, 'type');
    }
}
