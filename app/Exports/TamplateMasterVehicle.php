<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;


class TamplateMasterVehicle implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        return new EloquentCollection([
            [
                'company_id*', 'license_plate*', 'vehicle_id*', 'pool_name*', 'pool_location*', 'status*'
            ]
        ]);
    }
}
