<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class TemplateGsm implements FromCollection
{
<<<<<<< HEAD
    public function collection()
    {
        return new EloquentCollection([
            ['Status GSM', 'GSM Number', 'Company', 'Serial Number', 'ICC ID', 'IMSI', 'Res ID',
            'Request Date', 'Expired Date', 'Active Date', 'Terminated Date', 'Note', 'Provider']
=======
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return new EloquentCollection([
            [
                'Status GSM', 'GSM Number', 'Company', 'Serial Number', 'ICC ID', 'IMSI', 'Res ID',
                'Request Date', 'Expired Date', 'Active Date', 'Terminated Date', 'Note', 'Provider'
            ]
>>>>>>> 7f4cdae6e5cf51380266d0b1ad6cf4f8384823f7
        ]);
    }
}
