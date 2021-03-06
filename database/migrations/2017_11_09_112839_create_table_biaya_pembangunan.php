<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBiayaPembangunan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biayaPembangunan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim',11);
            $table->date('tanggalBayar');
            $table->integer('jumlahBayar');
            $table->integer('sisa');
            $table->string('status',11);
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
        Schema::table('biayaPembangunan', function (Blueprint $table) {
            //
        });
    }
}
