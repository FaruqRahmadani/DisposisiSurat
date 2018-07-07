<?php
namespace App\Helpers;

use Carbon\Carbon;

class TanggalHelper
{
  public static function Now(){
    $return = Carbon::now()->format('Y-m-d');
    return $return;
  }

  public static function Format($Date){
    $return = Carbon::parse($Date)->format('d-m-Y');
    return $return;
  }

  public static function DataBulan(){
    $Bulan = [
      ['id' => 1, 'nama' => 'Januari'],
      ['id' => 2, 'nama' => 'Februari'],
      ['id' => 3, 'nama' => 'Maret'],
      ['id' => 4, 'nama' => 'April'],
      ['id' => 5, 'nama' => 'Mei'],
      ['id' => 6, 'nama' => 'Juni'],
      ['id' => 7, 'nama' => 'Juli'],
      ['id' => 8, 'nama' => 'Agustus'],
      ['id' => 9, 'nama' => 'September'],
      ['id' => 10, 'nama' => 'Oktober'],
      ['id' => 11, 'nama' => 'November'],
      ['id' => 12, 'nama' => 'Desember']
    ];

    return $Bulan;
  }

  public static function NamaBulan($Id){
    switch ($Id) {
      case 1:
        return 'Januari';
        break;
      case 2:
        return 'Februari';
        break;
      case 3:
        return 'Maret';
        break;
      case 4:
        return 'April';
        break;
      case 5:
        return 'Mei';
        break;
      case 6:
        return 'Juni';
        break;
      case 7:
        return 'Juli';
        break;
      case 8:
        return 'Agustus';
        break;
      case 9:
        return 'September';
        break;
      case 10:
        return 'Oktober';
        break;
      case 11:
        return 'November';
        break;
      case 12:
        return 'Desember';
        break;
      default:
        return 'Unknown?';
        break;
    }
  }
}
