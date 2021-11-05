<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceStatus extends Model
{
    use HasFactory;
    protected $table = 'service_status';

    protected $fillable = ['service_status_name',];

    public function detail()
    {
        return $this->hasMany(DetailCustomer::class);
    }
}
