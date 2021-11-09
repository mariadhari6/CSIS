<?php

namespace App\Imports;

use App\Models\Seller;
use Maatwebsite\Excel\Concerns\ToModel;

class SellerImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Seller([
            'seller_name' => $row[0],
            'seller_code' => $row[1],
            'no_agreement_letter' => $row[2],
            'status' => $row[3]
        ]);
    }
}
