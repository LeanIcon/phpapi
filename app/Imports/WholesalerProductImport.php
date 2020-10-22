<?php

namespace App\Imports;

use Illuminate\Support\Str;
use App\Models\WholesalerProduct;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WholesalerProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        $brand_name = Str::substr($row['brand_name'], 0, 3);
        $generic_name = Str::substr($row['generic_name'], 0, 3);

        return new WholesalerProduct([
            'wholesaler_id' => Auth::user()->id,
            'packet_size' => $row['pack_size'],
            'strength' => $row['strength'],
            'manufacturer' => $row['manufacturer'],
            'product_name' => $row['brand_name'],
            'dosage_form' => $row['dosage_form'],
            'active_ingredient' => $row['generic_name'],
            'drug_legal_status' => $row['drug_legal_status'],
            'price' => $row['price'],
        ]);
    }


    // public function model(array $row)
    // {
    //     return new WholesalerProduct([
    //         'product_code' => $row['product_code'] ,
    //         'wholesaler_id' => Auth::user()->id,
    //         'packet_size' => $row ['pack_size'],
    //         'strength' => $row['strength'],
    //         'manufacturer' => $row['manufacturer'],
    //         'product_name' => $row['brand_name'],
    //         'dosage_form' => $row['dosage_form'],
    //         'drug_legal_status' => $row['drug_legal_status'],
    //         'price' => $row['price'],
    //     ]);
    // }
}
