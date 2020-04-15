<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends ApiController
{
  public function __construct(Town $town)
  {
      parent::__construct($town);
  }
}
