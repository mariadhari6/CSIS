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
            $table->foreignId('company_id');
            $table->foreignId('vehicle_id');
            $table->foreignId('tanggal_id');
            $table->foreignId('type_gps_id');
            $table->foreignId('equipment_gps_id');
            $table->foreignId('equipment_sensor_id');
            $table->integer('equipment_gsm');
            $table->foreignId('permasalahan_id');
            $table->string('ketersediaan_kendaraan');
            $table->string('keterangan');
            $table->string('hasil');
            $table->string('biaya_transportasi');
            $table->foreignId('teknisi_id');
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
