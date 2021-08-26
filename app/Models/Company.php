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

    public function sellers()
    {
        return $this->belongsTo(Seller::class);
    }
    public function pic()
    {
        return $this->hasMany(Pic::class);
    }

    public function gsmActive()
    {
        return $this->belongsTo(GsmActive::class);
    }
}
