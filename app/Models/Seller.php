<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $table = 'sellers';

    protected $fillable = [
        'seller_name', 'seller_code', 'no_agreement_letter', 'status'
    ];

    public function company()
    {
        return $this->hasMany(Company::class);
    }
}
