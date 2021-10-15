<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCustomer extends Model
{
    use HasFactory;
    protected $table = 'detail_customers';

    protected $fillable = [
        'company_id',
        'licence_plate',
        'vihecle_type',
        'po_number',
        'po_date',
        'status_po',
        'imei',
        'merk',
        'type',
        'gsm',
        'provider',
        'serial_number_sensor',
        'name_sensor',
        'merk_sensor',
        'pool_name',
        'pool_location',
        'waranty',
        'status_layanan',
        'tanggal_pasang',
        'tanggal_non_aktif'
    ];


    public function requestComplaint()
    {
        return $this->hasMany(RequestComplaint::class, 'imei', 'id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
