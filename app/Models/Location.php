<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = ['name', 'region_id', 'town_id'];


    public function getLocationName($location)
    {
        $location = self::find($location);
        return strtolower($location->name);
    }
}
