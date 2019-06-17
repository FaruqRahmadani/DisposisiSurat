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
      $Disposisi = Disposisi::orderBy('created_at', 'desc')
                            ->get();
      $pdf = PDF::loadview('Cetak.DisposisiAll', ['Disposisi' => $Disposisi]);
      return $pdf->setPaper('a4', 'potrait')->stream();
    }
  }

  public function DisposisiFilter($Bulan, $Tahun, $Tipe){
    $Disposisi = Disposisi::whereMonth('tanggal_surat', $Bulan)
                          ->whereYear('tanggal_surat', $Tahun)
                          ->orderBy('created_at', 'desc');
    if ($Tipe) {
      $Disposisi->where('tipe', $Tipe);
    }
    $pdf = PDF::loadview('Cetak.DisposisiAllFilter', ['Disposisi' => $Disposisi->get(), 'Bulan' => $Bulan, 'Tahun' => $Tahun]);
    return $pdf->setPaper('a4', 'potrait')->stream();
  }
}
