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
            'status_gsm' => $row[0],
            'gsm_number' => $row[1],
            'company_id' => $row[2],
            'serial_number' => $row[3],
            'icc_id' => $row[4],
            'imsi' => $row[5],
            'res_id' => $row[6],
            'request_date' => $row[7],
            'expired_date' => $row[8],
            'active_date' => $row[9],
            'terminate_date' => $row[10],
            'note' => $row[11]
        ]);
    }
}
