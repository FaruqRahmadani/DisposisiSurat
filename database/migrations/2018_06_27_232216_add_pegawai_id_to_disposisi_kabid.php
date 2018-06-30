<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPegawaiIdToDisposisiKabid extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('disposisi_kabids', function (Blueprint $table) {
      $table->integer('pegawai_id')->after('catatan');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('disposisi_kabids', function($table) {
      $table->dropColumn('pegawai_id');
    });
  }
}
