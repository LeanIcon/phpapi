<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends ApiModel
{
    protected $table ='product_category';
    protected $fillable = ['name','type'];


    public function ProductCategoryTypes()
    {
        return array(
                    'drugs' => ['Prescription', 'OTC'],
                    'equipment' => ['Dental', 'Lab', 'Theatre', 'Medical', 'Individual'],
                    'supplies' => ['Dental', 'Lab', 'Theatre', 'Medical'],
                    );
    }

    public static function ProductCategory()
    {
        $produtCat =  array(
                        ['key' => 'drugs', 'name' => 'Drugs'],
                        ['key' => 'equipments', 'name' => 'Equipments'],
                        ['key' => 'supplies', 'name' => 'Supplies'],
                    );
        return $produtCat;
    }

    
}
