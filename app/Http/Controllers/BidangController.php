<?php

namespace App\Http\Controllers;

use HCrypt;

use Illuminate\Http\Request;
use App\Bidang;

class BidangController extends Controller
{
  public function Data(){
    $Bidang = Bidang::all();
    return view('Bidang.Data', ['Bidang' => $Bidang]);
  }

  public function Tambah(){
    return view('Bidang.Tambah');
  }

  public function submitTambah(Request $request){
    $Bidang = new Bidang;
    $Bidang->fill($request->all());
    $Bidang->save();

    return redirect()->route('Data-Bidang')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Simpan']);
  }

  public function Edit($Id){
    $Id = HCrypt::Decrypt($Id);
    $Bidang = Bidang::findOrFail($Id);

    return view('Bidang.Edit', ['Bidang' => $Bidang]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Bidang = Bidang::findOrFail($Id);
    $Bidang->fill($request->all());
    $Bidang->save();

    return redirect()->route('Data-Bidang')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Ubah']);
  }

  public function Hapus($Id){
    $Id = HCrypt::Decrypt($Id);
    $Bidang = Bidang::findOrFail($Id);
    $Bidang->delete();

    return redirect()->route('Data-Bidang')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Hapus']);
  }
}
