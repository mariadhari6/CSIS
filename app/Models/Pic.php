<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    use HasFactory;

    protected $table = 'pics';

    protected $fillable = [
        'company_id', 'pic_name', 'phone', 'email', 'position', 'date_of_birth'
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
<<<<<<< HEAD
=======

>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
    public function requestComplaint()
    {
        return $this->hasMany(RequestComplaintCustomer::class);
    }
<<<<<<< HEAD
=======

    public function pemasanganMutasiGps()
    {
        return $this->hasMany(PemasanganMutasiGps::class);
    }
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
}
