<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends ApiModel
{
    protected $table = 'manufacturers';
    protected $fillable = ['name','status','slug'];
}
