<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisposisisTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('disposisis', function (Blueprint $table) {
      $table->increments('id');
      $table->string('dari');
      $table->string('nomor');
      $table->date('tanggal_surat');
      $table->date('tanggal_terima');
      $table->string('nomor_agenda');
      $table->tinyInteger('sifat');
      $table->string('perihal');
      $table->tinyInteger('status')->default(1);
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
    Schema::dropIfExists('disposisis');
  }
}
