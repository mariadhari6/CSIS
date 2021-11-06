<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;


class TamplateSeller implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return new EloquentCollection([
            [
                'seller_name*', 'seller_code*', 'no_agreement_letter*', 'status*'
            ]
        ]);
    }
}
