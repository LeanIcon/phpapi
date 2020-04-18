<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends ApiModel
{
    protected $table = 'equipments';
    protected $fillable = ['model', 'status'];
}
