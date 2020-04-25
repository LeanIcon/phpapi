<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosageForm extends Model
{
    protected $table = 'dosage_form';
    protected $fillable = ['name'];

    // public $timestamps = false;
}
