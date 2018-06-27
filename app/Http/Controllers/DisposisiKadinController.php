<?php

namespace App\Http\Controllers;

use HCrypt;

use Illuminate\Http\Request;

use App\DisposisiKadin;
use App\Disposisi;
use App\Bidang;

class DisposisiKadinController extends Controller
{
  public function Data(){
    $Disposisi = Disposisi::whereIn('status', [1,2])
                          ->orderBy('id', 'desc')
                          ->get();
    return view('DisposisiKadin.Data', ['Disposisi' => $Disposisi]);
  }

  public function Update($Id){
    $Id = HCrypt::Decrypt($Id);
    $Disposisi = Disposisi::findOrFail($Id);
    $Bidang = Bidang::all();

    return view('DisposisiKadin.Update', ['Disposisi' => $Disposisi, 'Bidang' => $Bidang]);
  }

  public function submitUpdate(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Disposisi = Disposisi::findOrFail($Id);
    $Disposisi->status = 2;
    $Disposisi->save();

    $DisposisiKadin = new DisposisiKadin;
    $DisposisiKadin->fill($request->all());
    if ($request->status == 'custom'){
      $DisposisiKadin->status = $request->status_custom;
    }
    $DisposisiKadin->disposisi_id = $Id;
    $DisposisiKadin->save();

    return redirect()->route('Data-Disposisi-Kepala-Dinas')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Update']);
  }
}
