<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ApiModel extends Model implements CommonModel
{
  use CommonFunctions;

  public $option_key = 'id';
  public $option_label = 'name';

  protected static $logName = 'default';
  protected static $logFillable = true;
  protected static $logOnlyDirty = true;
  protected static $submitEmptyLogs = false;

  public static function sub_array(array $haystack, array $needle)
  {
    return array_intersect_key($haystack, array_flip($needle));
  }

}
