<?php

namespace App\Imports;

use App\Models\Gps;
use App\Models\GpsTemporary;
use App\Models\MerkGps;
use App\Models\TypeGps;
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
        $jml =  MerkGps::all('merk')->count();
        for ($i = 0; $i <= $jml - 1; $i++) {
            if ($row[0] == MerkGps::all('merk')[$i]->merk) {
                $row[0] = MerkGps::all('id')[$i]->id;
                break;
            } else {
                $row[0] = 0;
            }
        }

        $jml =  TypeGps::all('type_gps')->count();
        for ($i = 0; $i <= $jml - 1; $i++) {
            if ($row[1] == TypeGps::all('type_gps')[$i]->type_gps) {
                $row[1] = TypeGps::all('id')[$i]->id;
                break;
            } else {
                $row[1] = 0;
            }
        }
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
