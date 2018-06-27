<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bidang extends Model
{
  protected static function boot()
  {
    parent::boot();

    static::addGlobalScope('id', function (Builder $builder) {
      $builder->where('id', '>', 1);
    });
  }
  use SoftDeletes;

  protected $fillable = ['nama'];


  public function Pegawai(){
    return $this->hasMany('App\Pegawai');
  }
}
