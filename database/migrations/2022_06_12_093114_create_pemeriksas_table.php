<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksas', function (Blueprint $table) {
            $table->id();
            $table->string('np2');
            $table->string('nd_penunjukan')->nullable();
            $table->date('tgl_nd_penunjukan')->nullable();
            $table->string('fpp1')->nullable();
            $table->string('fpp2')->nullable();
            $table->string('fpp3')->nullable();
            $table->string('fpp4')->nullable();
            $table->string('pic')->nullable();
            $table->string('progress')->nullable();
            $table->date('jt')->nullable();
            $table->string('nilai_lb')->nullable();
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
        Schema::dropIfExists('pemeriksas');
    }
}
