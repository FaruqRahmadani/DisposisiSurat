<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HCrypt;
use HAuth;

use App\DisposisiKabid;
use App\DisposisiKadin;
use App\Disposisi;
use App\Pegawai;

class DisposisiKabidController extends Controller
{
  public function Data(){
    $DisposisiId = DisposisiKadin::where('bidang_id', HAuth::Data()->bidang_id)
                                 ->pluck('disposisi_id')
                                 ->all();
    $Disposisi = Disposisi::whereIn('id', $DisposisiId)
                          ->orderBy('created_at', 'desc')
                          ->get();
    return view('DisposisiKabid.Data', ['Disposisi' => $Disposisi]);
  }

  public function Update($Id){
    $Id = HCrypt::Decrypt($Id);
    $Disposisi = Disposisi::findOrFail($Id);
    $Pegawai = Pegawai::where('jabatan', '<>',1)
                      ->where('bidang_id', HAuth::Data()->bidang_id)
                      ->get();

    return view('DisposisiKabid.Update',  ['Disposisi' => $Disposisi, 'Pegawai' => $Pegawai]);
  }

  public function submitUpdate(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Disposisi = Disposisi::findOrFail($Id);
    $Disposisi->status = $request->pegawai_id == 127 ? 127 : 3;
    $Disposisi->save();

    $DisposisiKabid = new DisposisiKabid();
    $DisposisiKabid->fill($request->all());
    $DisposisiKabid->disposisi_id = $Id;
    $DisposisiKabid->save();

    return redirect()->route('Data-Disposisi-Kepala-Bidang')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Update']);
  }
}
