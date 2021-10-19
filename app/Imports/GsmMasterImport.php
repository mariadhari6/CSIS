<?php

namespace App\Imports;

use App\Models\GsmTemporary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GsmMasterImport implements ToModel, WithStartRow
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
        $company = ($row[2] == "tes" ? 1 : 0);
        $row[2] = $company;
        return new GsmTemporary([
            'status_gsm' => $row[0],
            'gsm_number' => $row[1],
            'company_id' => $row[2],
            'serial_number' => $row[3],
            'icc_id' => $row[4],
            'imsi' => $row[5],
            'res_id' => $row[6],
            'request_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]),
            'expired_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8]),
            'active_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9]),
            'terminate_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]),
            'note' => $row[11]
        ]);
    }
}
