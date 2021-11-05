<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;
    protected $table = 'teknisis';


    public function requestComplaint() {
        return $this->hasOne(RequestComplaint::class, 'id', 'teknisi_pemasangan');
    }

    public function requestComplaintMaintenance() {
        return $this->hasMany(RequestComplaint::class, 'id', 'teknisi_maintenance');
    }
}
