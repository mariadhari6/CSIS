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
            $table->foreignId('company_id')->nullable();
            $table->foreignId('tanggal')->nullable();
            $table->foreignId('kendaraan_awal')->nullable();
            $table->foreignId('imei')->nullable();
            $table->foreignId('gsm_pemasangan')->nullable();
            $table->foreignId('kendaraan_pasang')->nullable();
            $table->foreignId('jenis_pekerjaan')->nullable();
            $table->foreignId('equipment_terpakai_gps')->nullable();
            $table->foreignId('equipment_terpakai_sensor')->nullable();
            $table->string('teknisi');
            $table->string('uang_transportasi');
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
