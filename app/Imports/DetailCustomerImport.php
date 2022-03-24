<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\DetailCustomer;
use Maatwebsite\Excel\Concerns\ToModel;

class DetailCustomerImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
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
        $jml =  Company::all('company_name')->count();
        for ($i = 0; $i <= $jml - 1; $i++) {
            if ($row[0] == Company::all('company_name')[$i]->company_name) {
                $row[0] = Company::all('id')[$i]->id;
                break;
            } else {
                $row[0] = 0;
            }
        }
        return new DetailCustomer([
            //

            'company_id' => $row[0],
            'licence_plate' => $row[1],
            'vehicle_id' => $row[2],
            'po_id' => $row[3],
            'harga_layanan' => $row[4],
            'po_date' => $row[5],
            'status_po' => $row[6],
            'imei' => $row[7],
            'gps_id' => $row[8],
            'type' => $row[9],
            'gsm_id' => $row[10],
            'provider' => $row[11],
            'sensor_all' => $row[12],
            'serial_number_sensor' => $row[13],
            'sensor_id' => $row[13],
            'merk_sensor' => $row[14],
            'pool_name' => $row[15],
            'pool_location' => $row[16],
            'waranty' => $row[17],
            'status_id' => $row[18],
            'tanggal_pasang' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[19]),
            'tanggal_non_aktif' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[20]),
            'tgl_reaktivasi_gps' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[21]),
            'jumlah_sensor' => $row[22]
        ]);
    }
}
