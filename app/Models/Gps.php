<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gps extends Model
{
    use HasFactory;
    protected $table = 'gps';

    protected $fillable = [
        'merk', 'type', 'imei', 'waranty', 'po_date', 'status', 'status_ownership'
    ];


    public function detailCustomer()
    {
        return $this->hasMany(DetailCustomer::class);
    }

    public function requestComplaintMaintenanceType()
    {
        return $this->hasMany(RequestComplaint::class, 'type_gps_id', 'id');
    }

    public function requestComplaint()
    {
        return $this->hasMany(RequestComplaint::class, 'equipment_terpakai_gps', 'id');
    }
}
