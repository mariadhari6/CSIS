<?php

namespace App\Imports;

use App\Models\MerkSensor;
use App\Models\Sensor;
use App\Models\SensorName;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class SensorImport implements ToModel, WithStartRow
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

        return new Sensor([
            //
            'sensor_name'    =>  $row[0],
            'merk_sensor'     =>  $row[1],
            'serial_number'     =>  $row[2],
            'rab_number'     =>  $row[3],
            'waranty'     => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]),
            'status'     =>  $row[5],
        ]);
    }
}
