<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends ApiModel
{
    protected $table = 'manufacturers';
    protected $fillable = ['name', 'status'];
}
