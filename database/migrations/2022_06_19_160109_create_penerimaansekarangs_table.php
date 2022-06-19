<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaansekarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaansekarangs', function (Blueprint $table) {
            $table->id();
            $table->string('npwp');
            $table->string('nama_wp');
            $table->string('kode_map');
            $table->string('kjs');
            $table->string('masa_pajak');
            $table->string('tgl_setor');
            $table->string('bln_setor');
            $table->string('thn_setor');
            $table->date('tanggal_gabung');
            $table->string('no_skp');
            $table->string('jumlah');
            $table->string('sumber');
            $table->string('keterangan');
            $table->string('ntpn');
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
        Schema::dropIfExists('penerimaansekarangs');
    }
}
