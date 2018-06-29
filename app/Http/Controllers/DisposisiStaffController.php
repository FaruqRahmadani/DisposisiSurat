<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HAuth;
use HCrypt;

use App\DisposisiKabid;
use App\DisposisiStaff;
use App\Disposisi;

class DisposisiStaffController extends Controller
{
  public function Data(){
    $DisposisiId = DisposisiKabid::where('pegawai_id', HAuth::Data()->id)
                                 ->pluck('id')
                                 ->all();
    $Disposisi = Disposisi::whereIn('id', $DisposisiId)
                          ->orderBy('id', 'desc')
                          ->get();

    return view('DisposisiStaff.Data', ['Disposisi' => $Disposisi]);
  }

  public function Terima($Id){
    $Id = HCrypt::decrypt($Id);
    $Disposisi = Disposisi::findOrFail($Id);
    $Disposisi->status = 127;
    $Disposisi->save();

    $DisposisiStaff = new DisposisiStaff;
    $DisposisiStaff->disposisi_id = $Id;
    $DisposisiStaff->save();

    return redirect()->route('Data-Disposisi-Staff')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Disposisi Berhasil Diterima']);
  }
}
