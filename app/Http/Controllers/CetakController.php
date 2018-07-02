<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HCrypt;
use PDF;

use App\Disposisi;

class CetakController extends Controller
{
  public function Disposisi($Id){
    $Id = HCrypt::Decrypt($Id);
    $Disposisi = Disposisi::findOrFail($Id);
    $pdf = PDF::loadview('Cetak.Disposisi', ['Disposisi' => $Disposisi]);
    return $pdf->setPaper('a4', 'potrait')->stream();
  }
}
