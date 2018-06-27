<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisposisiKadinsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('disposisi_kadins', function (Blueprint $table) {
      $table->increments('id');
      $table->string('status');
      $table->string('catatan');
      $table->integer('disposisi_id');
      $table->integer('bidang_id');
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
    Schema::dropIfExists('disposisi_kadins');
  }
}
