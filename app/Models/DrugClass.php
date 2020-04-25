<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrugClass extends Model
{
    protected $table = 'drug_class';
    protected $fillable = ['name'];
}
