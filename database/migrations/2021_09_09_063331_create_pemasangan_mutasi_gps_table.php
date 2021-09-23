<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasanganMutasiGpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasangan_mutasi_gps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->foreignId('tanggal');
            $table->foreignId('kendaraan_awal');
            $table->foreignId('imei');
            $table->foreignId('gsm_pemasangan');
            $table->foreignId('kendaraan_pasang');
            $table->foreignId('jenis_pekerjaan');
            $table->foreignId('equipment_terpakai_gps');
            $table->foreignId('equipment_terpakai_sensor');
            $table->string('teknisi');
            $table->integer('uang_transportasi');
            $table->string('type_visit');
            $table->string('note');
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
        Schema::dropIfExists('pemasangan_mutasi_gps');
    }
}
