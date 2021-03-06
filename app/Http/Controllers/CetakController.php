<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HCrypt;
use PDF;

use App\Disposisi;

class CetakController extends Controller
{
  public function Disposisi($Id=0){
    if ($Id) {
      $Id = HCrypt::Decrypt($Id);
      $Disposisi = Disposisi::findOrFail($Id);
      $pdf = PDF::loadview('Cetak.Disposisi', ['Disposisi' => $Disposisi]);
      return $pdf->setPaper('a4', 'potrait')->stream();
    }else{
      $Disposisi = Disposisi::all();
      $pdf = PDF::loadview('Cetak.DisposisiAll', ['Disposisi' => $Disposisi]);
      return $pdf->setPaper('a4', 'potrait')->stream();
    }
  }
}
