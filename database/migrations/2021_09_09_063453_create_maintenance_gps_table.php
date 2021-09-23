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
            $table->id();
            $table->foreignId('company');
            $table->foreignId('vehicle');
            $table->foreignId('tanggal');
            $table->foreignId('type_gps');
            $table->foreignId('equipment_gps');
            $table->foreignId('equipment_sensor');
            $table->foreignId('equipment_gsm');
            $table->foreignId('permasalahan');
            $table->string('ketersediaan_kendaraan');
            $table->string('keterangan');
            $table->string('hasil');
            $table->string('biaya_transportasi');
            $table->foreignId('teknisi');
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
