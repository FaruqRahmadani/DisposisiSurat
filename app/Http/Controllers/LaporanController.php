<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Disposisi;

class LaporanController extends Controller
{
  public function Disposisi(){
    $DateMax = Carbon::parse(Disposisi::max('tanggal_terima'));

    return view('Laporan.Disposisi', ['DateMax' => $DateMax]);
  }

  public function DataDisposisi(Request $request){
    $Disposisi = Disposisi::whereMonth('tanggal_surat', $request->bulan)
                          ->whereYear('tanggal_surat', $request->tahun)
                          ->orderBy('created_at', 'desc')
                          ->get();
    return view('Disposisi.Data', ['Disposisi' => $Disposisi, 'Bulan' => $request->bulan, 'Tahun' => $request->tahun]);
  }
}
