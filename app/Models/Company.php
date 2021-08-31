<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';

    protected $fillable = [
        'seller_id', 'company_name', 'status', 'customer_code', 'no_po', 'po_date'
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
        return $this->hasOne(GsmActive::class);
    }
    public function gsmTerminate()
    {
        return $this->hasOne(GsmTerminate::class);
    }
}
