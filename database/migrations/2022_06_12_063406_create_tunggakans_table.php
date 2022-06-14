<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTunggakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunggakans', function (Blueprint $table) {
            $table->id();
            $table->string('id_pemeriksaan');
            $table->string('np2');
            $table->string('npwp');
            $table->string('nama_wp');
            $table->string('periode_1');
            $table->string('periode_2');
            $table->string('kode_rik');
            $table->string('sp2')->nullable();
            $table->date('tgl_sppl')->nullable();
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
        Schema::dropIfExists('tunggakans');
    }
}
