<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = ['name', 'region_id'];


    public function getLocationName($location)
    {
        $location = self::find($location);
        return strtolower($location->name);
    }


    public function user()
    {
        return $this->hasMany(User::class);
    }


    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
