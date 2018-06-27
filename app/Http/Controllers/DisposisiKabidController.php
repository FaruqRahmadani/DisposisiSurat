<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HCrypt;
use HAuth;

use App\DisposisiKabid;
use App\DisposisiKadin;
use App\Disposisi;

class DisposisiKabidController extends Controller
{
  public function Data(){
    $DisposisiId = DisposisiKadin::where('bidang_id', HAuth::Data()->bidang_id)
                                 ->pluck('id')
                                 ->all();

    $Disposisi = Disposisi::whereIn('status', [2,3])
                          ->whereIn('id', $DisposisiId)
                          ->orderBy('id', 'desc')
                          ->get();
    return view('DisposisiKabid.Data', ['Disposisi' => $Disposisi]);
  }

  public function Update($Id){
    $Id = HCrypt::Decrypt($Id);
    $Disposisi = Disposisi::findOrFail($Id);

    return view('DisposisiKabid.Update',  ['Disposisi' => $Disposisi]);
  }

  public function submitUpdate(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Disposisi = Disposisi::findOrFail($Id);
    $Disposisi->status = 3;
    $Disposisi->save();

    $DisposisiKabid = new DisposisiKabid();
    $DisposisiKabid->fill($request->all());
    $DisposisiKabid->disposisi_id = $Id;
    $DisposisiKabid->save();

    return redirect()->route('Data-Disposisi-Kepala-Bidang')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Update']);
  }
}
