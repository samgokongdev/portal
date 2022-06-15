<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarfppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftarfpps', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nama_fpp');
            $table->string('posisi');
            $table->string('kelompok');
            $table->string('kode_fpp');
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
        Schema::dropIfExists('daftarfpps');
    }
}
