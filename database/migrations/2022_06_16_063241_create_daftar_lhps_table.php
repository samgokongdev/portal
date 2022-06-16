<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarLhpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_lhps', function (Blueprint $table) {
            $table->id();
            $table->string('np2')->nullable();
            $table->string('up2')->nullable();
            $table->date('tgl_np2')->nullable();
            $table->date('tgl_mulai_rik')->nullable();
            $table->string('kode_rik')->nullable();
            $table->string('periode_1')->nullable();
            $table->string('periode_2')->nullable();
            $table->string('npwp')->nullable();
            $table->string('nama_wp')->nullable();
            $table->string('sp2')->nullable();
            $table->date('tgl_sp2')->nullable();
            $table->string('sphp')->nullable();
            $table->date('tgl_sphp')->nullable();
            $table->string('lhp')->nullable();
            $table->string('th_lhp')->nullable();
            $table->date('tgl_lhp')->nullable();
            $table->string('id_lhp')->nullable();
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
        Schema::dropIfExists('daftar_lhps');
    }
}
