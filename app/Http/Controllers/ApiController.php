<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class ApiController extends Controller
{
  public function searchNip($nip){
    $Pegawai = Pegawai::where('nip', $nip)->count();
    return $Pegawai;
  }
}
