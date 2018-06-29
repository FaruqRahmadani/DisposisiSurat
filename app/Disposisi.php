<?php

namespace App;

use HTanggal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disposisi extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'dari',
    'nomor',
    'tipe',
    'tanggal_surat',
    'tanggal_terima',
    'nomor_agenda',
    'sifat',
    'perihal'
  ];

  public function getSifatTextAttribute()
  {
    switch ($this->sifat) {
      case 1:
        $return = 'Sangat Segera';
      break;
      case 2:
        $return = 'Segera';
      break;
      case 3:
        $return = 'Rahasia';
      break;
      default:
        $return = '-';
    }
    return $return;
  }

  public function getStatusTextAttribute()
  {
    switch ($this->status) {
      case 1:
        $return = 'Menunggu Aksi Kepala Dinas';
      break;
      case 2:
        $return = 'Menunggu Aksi Kepala Bidang';
      break;
      case 3:
        $return = 'Menunggu Aksi Staff Bidang';
      break;
      default:
        $return = 'Selesai';
    }
    return $return;
  }

  public function getJenisSuratAttribute()
  {
    switch ($this->tipe) {
      case 1:
        $return = 'Surat Masuk';
      break;
      case 2:
        $return = 'Surat Undangan';
      break;
      default:
        $return = '-';
    }
    return $return;
  }

  public function DisposisiKadin(){
    return $this->hasOne('App\DisposisiKadin');
  }

  public function DisposisiKabid(){
    return $this->hasOne('App\DisposisiKabid');
  }
}
