<?php

namespace App\Imports;

use App\Models\Gps;
use App\Models\GpsTemporary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;



class GpsImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new GpsTemporary([
            'merk'     => $row[0],
            'type'    => $row[1],
            'imei'    => $row[2],
            'waranty'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3]),
            'po_date'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]),
            'status'    => $row[5],
            'status_ownership'    => $row[6],
        ]);
    }
}
