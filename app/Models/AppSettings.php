<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSettings extends ApiModel
{
    protected $table = 'app_settings';
    protected $fillable = ['user_id', 'settings'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
