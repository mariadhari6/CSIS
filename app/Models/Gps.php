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

    public function pemasanganMutasiGps()
    {
        return $this->hasOne(PemasanganMutasiGps::class);
    }
    public function detailCustomer()
    {
        return $this->hasMany(DetailCustomer::class);
    }
=======
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
}
