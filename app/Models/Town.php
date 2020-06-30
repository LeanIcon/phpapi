<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends ApiModel
{
    protected $table = 'towns';
    protected $fillable = ['name', 'region_id'];



    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
