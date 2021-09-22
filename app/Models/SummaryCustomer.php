<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummaryCustomer extends Model
{
    use HasFactory;

    protected $table = 'summary_customers';

    protected $fillable = [
        'company',
        'po_number',
        'jumlah_unit_di_po',
        'harga_layanan',
        'revenue',
        'status_po',
        'merk_gps_terpasang',
        'type_type_terpasang',
        'jumlah'

    ];

}
