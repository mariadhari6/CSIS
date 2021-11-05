<?php

namespace App\Models;
use App\Models\Company;
use App\Models\DetailCustomer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummaryCustomer extends Model
{
    protected $table = 'summary_customers';

    protected $fillable = [
        'company_id',
        'po_number_id',
        'jumlah_unit_di_po_id',
        'harga_layanan',
        'revenue',
        'status_po',
        'merk_gps_terpasang',
        'type_type_terpasang',
        'jumlah'

    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function detail()
    {
        return $this->belongsTo(DetailCustomer::class);
    }
}
