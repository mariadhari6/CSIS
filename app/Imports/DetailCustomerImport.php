<?php

namespace App\Imports;

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
        return new DetailCustomer([
            //
        ]);
    }
}
