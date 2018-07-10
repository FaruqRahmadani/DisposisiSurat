<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Disposisi;

class LaporanController extends Controller
{
  public function Disposisi(){
    $DateMax = Carbon::parse(Disposisi::max('tanggal_terima'));
    $DateMin = Carbon::parse(Disposisi::min('tanggal_terima'));

    return view('Laporan.Disposisi', ['DateMax' => $DateMax, 'DateMin' => $DateMin]);
  }

  public function DataDisposisi(Request $request){
    $Disposisi = Disposisi::whereMonth('tanggal_surat', $request->bulan)
                          ->whereYear('tanggal_surat', $request->tahun)
                          ->orderBy('created_at', 'desc');
    if ($request->tipe) {
      $Disposisi->where('tipe', $request->tipe);
    }
    return view('Disposisi.Data', ['Disposisi' => $Disposisi->get(), 'Bulan' => $request->bulan, 'Tahun' => $request->tahun, 'Tipe' => $request->tipe]);
  }
}
