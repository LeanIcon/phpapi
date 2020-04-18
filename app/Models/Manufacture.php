<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class manufacture extends ApiModel
{
    protected $table = 'manufacture';
    protected $fillable = ['name', 'status'];
}
