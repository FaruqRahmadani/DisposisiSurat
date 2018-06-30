<?php
namespace App\Helpers;

use App\Pegawai;
use App\Disposisi;

class PenerimaHelper
{
  public static function Pegawai($Disposisi){
    $Data = $Disposisi->DisposisiKadin;
    if ($Disposisi->DisposisiKadin->bidang_id == 127) {
      $Pegawai = Pegawai::where('bidang_id', 1)
                        ->first();
    } else {
      if ($Disposisi->DisposisiKabid->pegawai_id == 127) {
        $Pegawai = Pegawai::where('bidang_id', $Disposisi->DisposisiKadin->bidang_id)
                          ->where('jabatan', 1)
                          ->first();
      } else {
        $Pegawai = Pegawai::findOrFail($Disposisi->DisposisiKabid->pegawai_id);
      }
    }
    return $Pegawai;
  }

  public static function KepalaDinas(){
    $Pegawai = Pegawai::where('bidang_id', 1)
                      ->first();
    return $Pegawai;
  }
}
