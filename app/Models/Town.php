<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends ApiModel
{
    protected $table = 'town';
    protected $fillable = ['name', 'region_id'];
}
