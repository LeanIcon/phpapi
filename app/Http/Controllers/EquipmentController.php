<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends ApiController
{
    public function __construct(Equipment $equipment)
  {
      parent::__construct($equipment);
  }
}
