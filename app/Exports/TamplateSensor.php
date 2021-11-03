<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;


class TamplateSensor implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return new EloquentCollection([
            [
                'sensor_name*', 'merk_sensor*', 'serial_number*', 'rab_number*', 'waranty', 'status'
            ]
        ]);
    }
}
