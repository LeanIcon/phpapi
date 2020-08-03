<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryTypes extends ApiModel
{
    const TYPE_PRES = 'prescription';
    const TYPE_OTC = 'otc';
    const TYPE_DENTAL = 'dental';
    const TYPE_LAB = 'lab';
    const TYPE_MEDICAL = 'medical';
    const TYPE_THEATRE = 'theatre';
    const TYPE_INDI = 'individual';

    protected $table = 'product_category_types';
    protected $fillable = ['product_category_id','name', 'status','slug'];

    public $timestamps = false;
}
