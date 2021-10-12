<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPo extends Model
{
    use HasFactory;

    protected $table = 'master_pos';

    protected $fillable = [
        'po_number', 'po_date', 'jumlah_unit_po', 'selles'
    ];
}
