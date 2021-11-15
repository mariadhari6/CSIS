<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class TemplateGsm implements FromCollection
{
    public function collection()
    {
        return new EloquentCollection([
            ['Status GSM', 'GSM Number', 'Company', 'Serial Number', 'ICC ID', 'IMSI', 'Res ID',
            'Request Date', 'Expired Date', 'Active Date', 'Terminated Date', 'Note', 'Provider']
        ]);
    }
}
