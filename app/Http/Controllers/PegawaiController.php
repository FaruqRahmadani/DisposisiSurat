<?php

namespace App\Http\Controllers;

use HCrypt;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Bidang;
use App\User;

class PegawaiController extends Controller
{
  public function Data(){
    $Pegawai = Pegawai::all();
    return view('Pegawai.Data', ['Pegawai' => $Pegawai]);
  }

  public function Tambah(){
    $Bidang = Bidang::all();
    return view('Pegawai.Tambah', ['Bidang' => $Bidang]);
  }

  public function submitTambah(Request $request){
    $validatedData = $request->validate([
      'username' => 'unique:users',
    ]);

    $ReqUser = $request->only(['username', 'password', 'tipe']);
    $ReqPegawai = $request->except(['username', 'password']);

    $User = new User();
    $User->fill($ReqUser);
    $User->save();

    $Pegawai = new Pegawai();
    $Pegawai->fill($ReqPegawai);
    $Pegawai->user_id = $User->id;
    $Pegawai->save();

    return redirect()->route('Data-Pegawai')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Simpan']);
  }

  public function Edit($Id){
    $Id = HCrypt::Decrypt($Id);
    $Pegawai = Pegawai::findOrFail($Id);
    $Bidang = Bidang::all();

    return view('Pegawai.Edit', ['Pegawai' => $Pegawai, 'Bidang' => $Bidang]);
  }

  public function submitEdit(Request $request, $Id){
    if ($request->password) {
      $ReqUser = $request->only(['username', 'password']);
    }else{
      $ReqUser = $request->only(['username', 'tipe']);
    }
    $ReqPegawai = $request->except(['username', 'password']);

    $Id = HCrypt::Decrypt($Id);
    $Pegawai = Pegawai::findOrFail($Id);
    $User = User::findOrFail($Pegawai->user_id);

    $User->fill($ReqUser);
    $User->save();

    $Pegawai->fill($ReqPegawai);
    $Pegawai->save();

    return redirect()->route('Data-Pegawai')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Ubah']);
  }

  public function Hapus($Id){
    $Id = HCrypt::Decrypt($Id);
    $Pegawai = Pegawai::findOrFail($Id);
    $Pegawai->delete();

    return redirect()->route('Data-Pegawai')->with(['alert' => 'alert', 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Hapus']);
  }
}
