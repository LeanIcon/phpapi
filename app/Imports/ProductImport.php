<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $brand_name = Str::substr($row['brand_name'], 0, 3);
        $generic_name = Str::substr($row['generic_name'], 0, 3);

        return new Product([
            'packet_size' => $row['pack_size'],
            'strength' => $row['strength'],
            'manufacturer' => $row['manufacturer'],
            'product_name' => $row['brand_name'],
            'dosage_form' => $row['dosage_form'],
            'active_ingredient' => $row['generic_name'],
            'drug_legal_status' => $row['drug_legal_status'],
        ]);
    }
}
