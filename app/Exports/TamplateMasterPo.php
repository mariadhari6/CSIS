<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;


class TamplateMasterPo implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return new EloquentCollection([
            [
                'company_id*', 'po_number*', 'po_date*', 'harga_layanan*', 'jumlah_unit_po*', 'status_po', 'selles'
            ]
        ]);
    }
}
