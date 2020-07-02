<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends ApiModel
{
    protected $table = 'regions';
    protected $fillable = ['name','code', 'status', 'created_at', 'updated_at'];
}
