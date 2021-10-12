<?php

namespace App\Imports;

use App\Models\GsmTemporary;
use Maatwebsite\Excel\Concerns\ToModel;

class GsmMasterImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new GsmTemporary([
            'status_gsm' => $row[1],
            'gsm_number' => $row[2],
            'company_id' => $row[3],
            'serial_number' => $row[4],
            'icc_id' => $row[5],
            'imsi' => $row[6],
            'res_id' => $row[7],
            'request_date' => $row[8],
            'expired_date' => $row[9],
            'active_date' => $row[10],
            'terminate_date' => $row[11],
            'note' => $row[12]
        ]);
    }
}
