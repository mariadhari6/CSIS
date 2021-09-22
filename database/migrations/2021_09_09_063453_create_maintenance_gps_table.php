<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceGpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_gps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('company')->nullable();
            $table->foreignId('vehicle')->nullable();
            $table->foreignId('tanggal')->nullable();
            $table->foreignId('type_gps')->nullable();
            $table->foreignId('equipment_gps')->nullable();
            $table->foreignId('equipment_sensor')->nullable();
            $table->foreignId('equipment_gsm')->nullable();
            $table->foreignId('permasalahan')->nullable();
            $table->string('ketersediaan_kendaraan');
            $table->string('keterangan');
            $table->string('hasil');
            $table->string('biaya_transportasi');
            $table->foreignId('teknisi')->nullable();
            $table->string('req_by');
            $table->longText('note');
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
        Schema::dropIfExists('maintenance_gps');
    }
}
