<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeGps extends Model
{
    use HasFactory;

    public function Gps()
    {
        return $this->hasMany(Gps::class);
    }
}
