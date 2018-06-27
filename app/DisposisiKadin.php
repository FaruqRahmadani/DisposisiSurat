<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisposisiKadin extends Model
{
  protected $fillable = [
    'status',
    'catatan',
    'bidang_id',
    'disposisi_id',
  ];

  public function Bidang(){
    return $this->belongsTo('App\Bidang');
  }
}
