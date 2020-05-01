<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosageForm extends Model
{
    const DOSAGE_FORM_CAPS = 'capsules';
    const DOSAGE_FORM_TABS = 'tablets';
    const DOSAGE_FORM_SYRUP = 'syrups';
    const DOSAGE_FORM_DROPS = 'drops';

    protected $table = 'dosage_form';
    protected $fillable = ['name', 'slug'];

    // public $timestamps = false;
}
