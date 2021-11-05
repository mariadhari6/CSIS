<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\Pic;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class PicImport implements ToModel, WithStartRow
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
        return new Pic([

            'company_id' => $row[0],
            'pic_name'   => $row[1],
            'phone'      => $row[2],
            'email'      => $row[3],
            'position'   => $row[4],
            'date_of_birth' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5]),
        ]);
    }
}
