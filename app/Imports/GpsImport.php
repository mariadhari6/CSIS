<?php

namespace App\Imports;

use App\Models\Gps;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GpsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Gps([
            'merk'     => $row['merk'],
            'type'    => $row['type'],
            'imei'    => $row['imei'],
            'waranty'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['waranty']),
            'po_date'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['po_date']),
            'status'    => $row['status'],
            'status_ownership'    => $row['status_ownership'],
        ]);
    }
}
