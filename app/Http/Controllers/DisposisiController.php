<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Storage;
use HCrypt;
use File;

use Illuminate\Http\Request;

use App\Disposisi;

class DisposisiController extends Controller
{
  public function Data(){
    $Disposisi = Disposisi::all();
    return view('Disposisi.Data', ['Disposisi' => $Disposisi]);
  }

  public function Tambah(){
    return view('Disposisi.Tambah');
  }

  public function submitTambah(Request $request){
    $Disposisi = new Disposisi;
    $Disposisi->fill($request->all());
    $FotoExt  = $request->foto->getClientOriginalExtension();
    $NamaFoto = Carbon::now()->format('dmYHis');
    $Foto = $NamaFoto.'.'.$FotoExt;
    $request->foto->move(public_path('img/lampiran'), $Foto);
    $Disposisi->foto = $Foto;
    $Disposisi->save();

    return redirect()->route('Data-Disposisi')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Simpan']);
  }

  public function Edit($Id){
    $Id = HCrypt::Decrypt($Id);
    $Disposisi = Disposisi::findOrFail($Id);

    return view('Disposisi.Edit', ['Disposisi' => $Disposisi]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Disposisi = Disposisi::findOrFail($Id);
    $Disposisi->fill($request->all());
    if ($request->foto) {
      $FotoExt  = $request->foto->getClientOriginalExtension();
      $NamaFoto = Carbon::now()->format('dmYHis');
      $Foto = $NamaFoto.'.'.$FotoExt;
      $request->foto->move(public_path('img/lampiran'), $Foto);
      File::delete('img/lampiran/'.$Disposisi->foto);
      $Disposisi->foto = $Foto;
      $Disposisi->save();
    }
    $Disposisi->save();

    return redirect()->route('Data-Disposisi')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Ubah']);
  }

  public function Hapus($Id){
    $Id = HCrypt::Decrypt($Id);
    $Disposisi = Disposisi::findOrFail($Id);
    $Disposisi->delete();

    return redirect()->route('Data-Disposisi')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Hapus']);
  }

  public function Info($Id){
    $Id = HCrypt::Decrypt($Id);
    $Disposisi = Disposisi::findOrFail($Id);

    return view('Disposisi.Info', ['Disposisi' => $Disposisi]);
  }
}
