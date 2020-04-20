<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends ApiModel
{
    protected $table = 'town';
    protected $fillable = ['name status', 'created_at', 'updated_at', 'region_id'];
}
