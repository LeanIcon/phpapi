<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends ApiModel
{
    protected $table = 'locations';
    protected $fillable = ['name', 'code', 'region_id', 'town_id'];


    public function getLocationName($location)
    {
        $location = self::find($location);
        return strtolower($location->name);
    }
}
