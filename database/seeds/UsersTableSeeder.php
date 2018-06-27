<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Pegawai;
use App\Bidang;

class UsersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $JumlahBidang = Bidang::count();
    if (!$JumlahBidang) {
      $Bidang = new Bidang;
      $Bidang->nama = 'Kepala Dinas';
      $Bidang->save();
    }

    $User = new User;
    $User->username = 'kadin';
    $User->password = 'kadin';
    $User->save();

    $Pegawai = new Pegawai;
    $Pegawai->nip = '01012011';
    $Pegawai->nama = 'Faruq Rahmadani';
    $Pegawai->golongan = 'Apalah';
    $Pegawai->bidang_id = $JumlahBidang ? 1 : $Bidang->id;
    $Pegawai->jabatan = 1;
    $Pegawai->user_id = $User->id;
    $Pegawai->save();

    $User = new User;
    $User->username = 'admin';
    $User->password = 'admin';
    $User->tipe = 1;
    $User->save();

    $Pegawai = new Pegawai;
    $Pegawai->nip = '123456789';
    $Pegawai->nama = 'Admin Ini Nih';
    $Pegawai->golongan = 'Admin';
    $Pegawai->bidang_id = $JumlahBidang ? 1 : $Bidang->id;
    $Pegawai->jabatan = 1;
    $Pegawai->user_id = $User->id;
    $Pegawai->save();
  }
}
