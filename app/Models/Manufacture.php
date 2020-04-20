<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends ApiModel
{
    protected $table = 'manufactures';
    protected $fillable = ['name', 'status'];
}
