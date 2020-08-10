<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortageList extends ApiModel
{
    protected $table = 'shortage_list';

    protected $fillable = ['user_id' ,'instance', 'content', 'reference', 'reference_code'];

    protected $casts = [
        'content' => Json::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function shortlist_items()
    {
        $this->hasMany(ShortageListItems::class, 'shortage_id');
    }

}
