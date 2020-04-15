<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends ApiModel
{
    protected $table = 'customers';
    protected $fillable = ['firstname', 'lastname', 'location'];
}
