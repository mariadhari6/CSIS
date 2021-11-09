<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\MasterPo;
use Maatwebsite\Excel\Concerns\ToModel;

class MasterPoImport implements ToModel
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
        $jml =  Company::all('company_name')->count();
        for ($i = 0; $i <= $jml - 1; $i++) {
            if ($row[0] == Company::all('company_name')[$i]->company_name) {
                $row[0] = Company::all('id')[$i]->id;
                break;
            } else {
                $row[0] = 0;
            }
        }
        return new MasterPo([
            'company_id' => $row[0],
            'po_number'  => $row[1],
            'po_date'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[2]),
            'harga_layanan' => $row[3],
            'jumlah_unit_po' => $row[4],
            'status_po' => $row[5],
            'selles' => $row[6],
        ]);
    }
}
