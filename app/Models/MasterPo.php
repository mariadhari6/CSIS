<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPo extends Model
{
    use HasFactory;

    protected $table = 'master_pos';

    protected $fillable = [
        'company_id', 'po_number', 'po_date', 'harga_layanan', 'jumlah_unit_po', 'status_po', 'selles'
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
