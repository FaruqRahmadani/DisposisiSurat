<?php

namespace App\Http\Controllers;

use HCrypt;

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
