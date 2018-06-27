<?php
namespace App\Helpers;

use Carbon\Carbon;

class TanggalHelper
{
  public static function Now(){
    $return = Carbon::now()->format('Y-m-d');
    return $return;
  }

  public static function Format($Date){
    $return = Carbon::parse($Date)->format('d-m-Y');
    return $return;
  }
}
