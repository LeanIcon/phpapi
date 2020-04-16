<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class manufacture extends ApiModel
{
    protected $table = 'Manufacture';
    protected $fillable = ['name', 'status', 'created_at', 'updated_at'];
}
