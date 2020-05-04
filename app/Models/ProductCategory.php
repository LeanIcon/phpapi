<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends ApiModel
{
    const TYPE_PRES = 'prescription';
    const TYPE_OTC = 'otc';
    const TYPE_DENTAL = 'dental';
    const TYPE_LAB = 'lab';
    const TYPE_MEDICAL = 'medical';
    const TYPE_THEATRE = 'theatre';
    const TYPE_INDI = 'individual';

    const CAT_DRUG = 'drugs';
    const CAT_EQUIP = 'equipments';
    const CAT_CONS = 'consumables';

    protected $table ='product_category';
    protected $fillable = ['name','type', 'slug'];


}
