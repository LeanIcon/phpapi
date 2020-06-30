<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'user_details';
    protected $fillable = ['location','digital_address', 'business_address','image_url', 'reg_no', 'contact_person', 'practise_group', 'users_id', 'town_id', 'contact_person_phone'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
