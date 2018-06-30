<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipeSuratToDisposisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('disposisis', function (Blueprint $table) {
        $table->integer('tipe')->after('nomor');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('disposisis', function($table) {
        $table->dropColumn('tipe');
      });
    }
}
