<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\GsmTemporary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
<<<<<<< HEAD
use App\Models\Company;


class GsmMasterImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

=======

class GsmMasterImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
>>>>>>> 7f4cdae6e5cf51380266d0b1ad6cf4f8384823f7
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $jml =  Company::all('company_name')->count();
<<<<<<< HEAD
        for ($i= 0; $i <= $jml-1; $i++) { 
            if( $row[2] == Company::all('company_name')[$i]->company_name){
=======
        for ($i = 0; $i <= $jml - 1; $i++) {
            if ($row[2] == Company::all('company_name')[$i]->company_name) {
>>>>>>> 7f4cdae6e5cf51380266d0b1ad6cf4f8384823f7
                $row[2] = Company::all('id')[$i]->id;
                break;
            } else {
                $row[2] = 0;
            }
        }
<<<<<<< HEAD

=======
>>>>>>> 7f4cdae6e5cf51380266d0b1ad6cf4f8384823f7
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
            'note' => $row[11],
            'provider' => $row[12]
        ]);
    }
}
