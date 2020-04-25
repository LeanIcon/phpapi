<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drug extends ApiModel
{
    protected $table = 'drugs';
    protected $fillable = ['code','active_ingredient', 'associative_name','dosage_form_id',' category', 'strength', 'class_id', 'type'];


    public function DrugsCategory()
    {
        return array('OTC', 'Prescription');
    }

    public function DrugsType()
    {
        return array('Original ', 'Generic');
    }

    public static function DosageForm()
    {
        $dosageForm =  array(
                        ['key' => 'capsules', 'name' => 'Capsules'],
                        ['key' => 'tablets', 'name' => 'Tablets'],
                        ['key' => 'syrup', 'name' => 'Syrup'],
                        ['key' => 'drops', 'name' => 'Drops'],
                    );
        return $dosageForm;
    }

    public static function DrugClass()
    {
        $drugClass =  array(
                        ['key' => 'analgesics', 'name' => 'Analgesics'],
                        ['key' => 'antibacterial', 'name' => 'Antibacterial'],
                        ['key' => 'vitamins', 'name' => 'Vitamins'],
                    );
        return $drugClass;
    }
}
