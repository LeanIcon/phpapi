<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drug extends ApiModel
{
    protected $table = 'drugs';
    protected $fillable = ['code','active_ingredient', 'associative_name','dosage_form',' category', 'strength', 'class', 'type'];


    public function DrugsCategory()
    {
        return array('OTC', 'Prescription');
    }

    public function DrugsType()
    {
        return array('Original ', 'Generic');
    }
}
