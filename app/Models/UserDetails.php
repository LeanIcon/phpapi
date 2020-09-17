<?php

namespace App\Models;

use App\User;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'user_details';
    protected $fillable = ['location','digital_address', 'business_address','image_url', 'reg_no', 'contact_person', 'practise_group', 'user_id', 'town_id', 'contact_person_phone'];

    public $appends = [
        'user_location'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUserLocationAttribute()
    {
        $location  = Location::where('id', $this->location);
        return $location;
    }
}
