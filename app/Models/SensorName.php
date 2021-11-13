<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorName extends Model
{
    use HasFactory;

    protected $table = 'sensor_names';

    protected $fillable = ['sensor_name'];


}
