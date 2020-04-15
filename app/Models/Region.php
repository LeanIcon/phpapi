<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends ApiModel
{
    protected $table = 'region';
    protected $fillable = ['name', 'status', 'created_at', 'updated_at'];
}
