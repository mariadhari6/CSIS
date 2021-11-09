<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\Seller;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class CompanyImport implements ToModel, WithStartRow
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
        $jml =  Seller::all('seller_name')->count();
        for ($i = 0; $i <= $jml - 1; $i++) {
            if ($row[0] == Seller::all('seller_name')[$i]->seller_name) {
                $row[0] = Seller::all('id')[$i]->id;
                break;
            } else {
                $row[0] = 0;
            }
        }

        $jml =  Seller::all('no_agreement_letter')->count();
        for ($i = 0; $i <= $jml - 1; $i++) {
            if ($row[1] == Seller::all('no_agreement_letter')[$i]->no_agreement_letter) {
                $row[1] = Seller::all('id')[$i]->id;
                break;
            } else {
                $row[1] = 0;
            }
        }

        return new Company([
            'company_name'     => $row[0],
            'seller_id'     => $row[1],
            'customer_code'     => $row[2],
            'no_agreement_letter_id'     => $row[3],
            'status'     => $row[4],




        ]);
    }
}
