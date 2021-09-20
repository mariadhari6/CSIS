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

    public function requestComplaint()
    {
        return $this->hasMany(RequestComplaintCustomer::class);
    }

    public function pemasanganMutasiGps()
    {
        return $this->hasMany(PemasanganMutasiGps::class);
    }
=======
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
}
