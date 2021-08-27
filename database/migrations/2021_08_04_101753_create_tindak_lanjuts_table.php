<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTindakLanjutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tindak_lanjuts', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('keterangan_tindak_lanjut');
            $table->unsignedBigInteger('hasil_temuan_id');
            $table->unsignedBigInteger('sosialisasi_id');
            $table->unsignedBigInteger('upaya_pencegahan_id');
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
        Schema::dropIfExists('tindak_lanjuts');
    }
}
