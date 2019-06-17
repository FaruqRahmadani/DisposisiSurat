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
    $Bidang = Bidang::where('nama', $request->nama)->count();
    if ($Bidang) {
      return back()->withInput()->with(['alert' => 'alert', 'tipe' => 'error', 'judul' => 'Terjadi Kesalahan', 'pesan' => 'Nama Bidang Sudah Ada']);
    }

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
    if ($Bidang->nama != $request->nama) {
      $BidangValidate = Bidang::where('nama', $request->nama)->count();
      if ($BidangValidate) {
        return back()->withInput()->with(['alert' => 'alert', 'tipe' => 'error', 'judul' => 'Terjadi Kesalahan', 'pesan' => 'Nama Bidang Sudah Ada']);
      }
    }
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
