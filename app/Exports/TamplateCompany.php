<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;


class TamplateCompany implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return new EloquentCollection([
            [
                'compny_name*', 'seller_id*', 'customer_code*', 'no_agreement_letter_id*', 'status*'
            ]
        ]);
    }
}
