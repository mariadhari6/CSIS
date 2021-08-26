<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    use HasFactory;

    protected $table = 'pics';

    protected $fillable = [
        'company_id', 'pic_name', 'email', 'position', 'phone', 'date_of_birth'
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
