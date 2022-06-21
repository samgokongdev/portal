<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersuratansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persuratans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('no');
            $table->date('tgl')->default(date('Y-m-d'));
            $table->string('tahun')->default(date('Y'));
            $table->string('tujuan');
            $table->string('perihal');
            $table->string('sp2')->nullable();
            $table->date('tgl_sp2')->nullable();
            $table->string('sphp')->nullable();
            $table->date('tgl_sphp')->nullable();
            $table->string('konseptor')->nullable();
            $table->string('kelompok')->nullable();
            $table->string('status')->default('1');
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
        Schema::dropIfExists('persuratans');
    }
}
