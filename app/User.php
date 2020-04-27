<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    CONST IS_ADMIN = 'admin';
    CONST IS_WHOLESALER = 'wholesaler';
    CONST IS_RETAILER = 'retailer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'firstname', 'lastname', 'phone','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->firstname.' '.$this->lastname;
    }


    public function scopeIsWholeSaler($query, $wholesalerId = null)
    {
        return $query->where('type', 'wholesaler');
    }

    public function scopeIsRetailer($query)
    {
        return $query->where('type', 'retailer');
    }
}
