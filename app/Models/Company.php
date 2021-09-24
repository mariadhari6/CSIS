<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';

    protected $fillable = [
        'company_name', 'seller_id', 'customer_code', 'no_po', 'po_date', 'no_agreement_letter_id', 'status',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    public function pic()
    {
        return $this->hasMany(Pic::class);
    }

    public function gsmActive()
    {
        return $this->hasMany(GsmActive::class);
    }
    public function gsmTerminate()
    {
        return $this->hasMany(GsmTerminate::class);
    }
<<<<<<< HEAD
=======
    //---------------------//
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
    public function requestComplaint()
    {
        return $this->hasMany(RequestComplaintCustomer::class);
    }
<<<<<<< HEAD
=======
    public function details()
    {
        return $this->hasMany(DetailCustomer::class);
    }
    public function pemasanganMutasiGps()
    {
        return $this->hasMany(PemasanganMutasiGps::class);
    }
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
}
