<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSettings extends Model
{
    protected $table = 'app_settings';
    protected $fillable = ['user_id', 'content'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
