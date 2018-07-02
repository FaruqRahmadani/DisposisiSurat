<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
  protected $fillable = [
    'tanggal',
    'uraian',
    'tempat',
    'keterangan',
  ];
}
