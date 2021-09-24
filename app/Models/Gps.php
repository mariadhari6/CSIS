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
<<<<<<< HEAD
=======

    public function pemasanganMutasiGps()
    {
        return $this->hasMany(PemasanganMutasiGps::class);
    }
    public function detailCustomer()
    {
        return $this->hasMany(DetailCustomer::class);
    }
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
}
