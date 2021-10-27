<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;


class TemplateGps implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return new EloquentCollection(
            [
                [
                    'Merk', 'Type', 'IMEI', 'Waranty', 'PO date', 'Status', 'Status ownership'
                ]

            ]
        );
    }
}
