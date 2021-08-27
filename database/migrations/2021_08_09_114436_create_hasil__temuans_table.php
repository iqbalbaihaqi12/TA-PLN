<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilTemuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil__temuans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nomor_temuan');
            $table->string('konstruksi');
            $table->string('kategori_temuan');
            $table->string('detail_temuan');
            $table->string('section');
            $table->string('alamat_temuan');
            $table->string('koordinat');
            $table->string('potensi_bahaya');
            $table->string('evidence');
            $table->unsignedBigInteger('jadwal_inspeksi_id');
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
        Schema::dropIfExists('hasil__temuans');
    }
}
