<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kegiatan;

class UserController extends Controller
{
  public function Dashboard(){
    $Kegiatan = Kegiatan::all();
    return view('User.Dashboard', ['Kegiatan' => $Kegiatan]);
  }
}
