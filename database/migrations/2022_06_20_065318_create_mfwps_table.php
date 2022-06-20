<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMfwpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfwps', function (Blueprint $table) {
            $table->id();
            $table->string('npwp')->nullable();
            $table->string('nama_wp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('propinsi')->nullable();
            $table->string('bentuk')->nullable();
            $table->string('jenis_wp')->nullable();
            $table->string('klu')->nullable();
            $table->date('tgl_daftar')->nullable();
            $table->date('tgl_pkp')->nullable();
            $table->date('tgl_pkp_cabut')->nullable();
            $table->string('nik')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('status')->nullable();
            $table->string('nip_ar')->nullable();
            $table->string('ar')->nullable();  
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
        Schema::dropIfExists('mfwps');
    }
}
