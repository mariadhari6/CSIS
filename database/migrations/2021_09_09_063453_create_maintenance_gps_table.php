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
            $table->foreignId('company')->constrained('request_complaint_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('vehicle')->constrained('request_complaint_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('tanggal')->constrained('request_complaint_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('type_gps')->constrained('gps')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('equipment_gps')->constrained('gps')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('equipment_sensor')->constrained('sensors')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('equipment_gsm')->constrained('gsm_actives')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('permasalahan')->constrained('request_complaint_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('ketersediaan_kendaraan');
            $table->string('keterangan');
            $table->string('hasil');
            $table->string('biaya_transportasi');
            $table->foreignId('teknisi')->constrained('pics')->onDelete('cascade')->onUpdate('cascade')->nullable();
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
