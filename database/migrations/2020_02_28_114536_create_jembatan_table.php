<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJembatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jembatan', function (Blueprint $table) {
            $table->increments('idLapor');
            $table->integer('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('pengguna');
            $table->string('image');
            $table->longText('deskripsi');
            $table->string('alamat');
            $table->string('kecamatan');
            $table->float('latitude', 10, 6);
            $table->float('longtitude', 10, 6);
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jembatan');
    }
}
