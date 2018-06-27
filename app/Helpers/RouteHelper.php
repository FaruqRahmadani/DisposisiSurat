<?php
namespace App\Helpers;

use Request;

class RouteHelper
{
  public static function ActiveRoute($RouteName){
    $CurrentRouteName = Request::route()->getName();
    if (str_contains($CurrentRouteName, $RouteName)) {
      return 'class=active';
    }
  }

  public static function JudulRoute(){
    $CurrentRouteName = Request::route()->getName();
    return title_case(str_slug($CurrentRouteName, ' ', '-'));
  }
}
