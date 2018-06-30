<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisposisiKabid extends Model
{
  protected $fillable = [
    'catatan',
    'pegawai_id',
  ];

  public function Pegawai(){
    return $this->belongsTo('App\Pegawai');
  }
}
