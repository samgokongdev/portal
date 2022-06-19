<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkpmaintainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skpmaintains', function (Blueprint $table) {
            $table->id();
            $table->string('id_dok')->nullable();
            $table->string('npwp');
            $table->string('jns_skp');
            $table->string('pasal_skp');
            $table->string('masa_1');
            $table->string('masa_2');
            $table->string('tahun_pajak');
            $table->string('nomor_ket')->unique();
            $table->string('tanggal_ket');
            $table->string('bulan_ket');
            $table->string('tahun_ket');
            $table->string('mata_uang');
            $table->string('jumlah_ket');
            $table->string('sumber');
            $table->string('no_dok');
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
        Schema::dropIfExists('skpmaintains');
    }
}
