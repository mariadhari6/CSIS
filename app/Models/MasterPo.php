<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPo extends Model
{
    use HasFactory;
    protected $table = 'master_pos';

    protected $fillable = [
        'company_id', 'po_number', 'po_date', 'harga_layanan', 'jumlah_unit_po', 'status_po', 'selles', 'count'
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function sales()
    {
        return $this->belongsTo(Sales::class);
    }

    public function detail()
    {
        return $this->hasMany(DetailCustomer::class);
    }
    // public function detailHargalayanan()
    // {
    //     return $this->hasMany(DetailCustomer::class, 'harga_layanan', 'id');
    // }
    // public function detailPonumber()
    // {
    //     return $this->hasMany(DetailCustomer::class);
    // }
}
