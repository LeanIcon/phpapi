<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrugClass extends Model
{
    const DOSAGE_CLASS_ANAL = 'analgesics';
    const DOSAGE_CLASS_ANTI = 'antibacterial';
    const DOSAGE_CLASS_VIT = 'vitamins';

    protected $table = 'drug_class';
    protected $fillable = ['name','slug'];
}
