<?php
namespace App\Helpers;

use Auth;
use App\Pegawai;

class AuthHelper
{
  public static function Data(){
    $User = Auth::user();
    $Pegawai = Pegawai::findOrFail($User->id);
    return $Pegawai;
  }
}
