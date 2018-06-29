<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'nip',
    'nama',
    'golongan',
    'bidang_id',
    'jabatan',
    'user_id'
  ];

  public function getJabatanTextAttribute()
  {
    if ($this->User->tipe == 1) {
      $return = 'Admin';
    }elseif ($this->bidang_id == 1) {
      $return = '';
    }else{
      switch ($this->jabatan) {
        case 1:
          $return = 'Kepala Bidang';
        break;
        case 2:
          $return = 'Staff Bidang';
        break;
        default:
          $return = '-';
      }
    }
    return $return;
  }

  public function Bidang(){
    return $this->belongsTo('App\Bidang')->withTrashed()->withoutGlobalScope('hideKadin');
  }

  public function User(){
    return $this->belongsTo('App\User');
  }
}
