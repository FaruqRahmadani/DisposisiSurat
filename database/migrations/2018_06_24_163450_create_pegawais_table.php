<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('pegawais', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nip');
      $table->string('nama');
      $table->string('golongan');
      $table->integer('bidang_id');
      $table->tinyInteger('jabatan')->default(2);
      $table->integer('user_id');
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('pegawais');
  }
}
