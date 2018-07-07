<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HCrypt;

use App\Kegiatan;

class KegiatanController extends Controller
{
  public function Data(){
    $Kegiatan = Kegiatan::all();
    return view('Kegiatan.Data', ['Kegiatan' => $Kegiatan]);
  }

  public function Tambah(){
    return view('Kegiatan.Tambah');
  }

  public function submitTambah(Request $request){
    $Kegiatan = new Kegiatan;
    $Kegiatan->fill($request->all());
    $Kegiatan->save();

    return redirect()->route('Data-Kegiatan')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Tambah']);
  }

  public function Edit($Id){
    $Id = HCrypt::Decrypt($Id);
    $Kegiatan = Kegiatan::findOrFail($Id);

    return view('Kegiatan.Edit', ['Kegiatan' => $Kegiatan]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Kegiatan = Kegiatan::findOrFail($Id);
    $Kegiatan->fill($request->all());
    $Kegiatan->save();

    return redirect()->route('Data-Kegiatan')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Ubah']);
  }

  public function Hapus($Id){
    $Id = HCrypt::Decrypt($Id);
    $Kegiatan = Kegiatan::findOrFail($Id);
    $Kegiatan->delete();

    return redirect()->route('Data-Kegiatan')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Hapus']);
  }
}
