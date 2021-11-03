<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;


class TamplatePic implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return new EloquentCollection([
            [
                'Company*', 'PIC Name*', 'Phone*', 'Email*', 'Position*', 'date_of_birth'
            ]
        ]);
    }
}
