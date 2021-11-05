<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class VehicleImport implements ToModel, WithStartRow
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

        $jml =  VehicleType::all('name')->count();
        for ($i = 0; $i <= $jml - 1; $i++) {
            if ($row[2] == VehicleType::all('name')[$i]->name) {
                $row[2] = VehicleType::all('id')[$i]->id;
                break;
            } else {
                $row[2] = 0;
            }
        }
        return new Vehicle([
            'company_id'    => $row[0],
            'license_plate' => $row[1],
            'vehicle_id'    => $row[2],
            'pool_name'     => $row[3],
            'pool_location' => $row[4],
        ]);
    }
}
