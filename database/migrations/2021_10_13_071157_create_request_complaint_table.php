<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestComplaintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_complaint', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable();
            $table->string('internal_eksternal')->nullable();
            $table->foreignId('pic_id')->nullable();
            $table->string('vehicle')->nullable();
            $table->dateTime('waktu_info')->nullable();
            $table->foreignId('task')->nullable();
            $table->string('platform')->nullable();
            $table->longText('detail_task')->nullable();
            $table->string('divisi')->nullable();
            $table->string('waktu_respond')->nullable();
            $table->string('respond')->nullable();
            $table->dateTime('waktu_kesepakatan')->nullable();
            $table->dateTime('waktu_solve')->nullable();
            $table->string('status')->nullable();
            $table->string('status_akhir')->nullable();
            // from pemasangan dan mutasi
            $table->foreignId('imei')->nullable();
            $table->foreignId('gsm_pemasangan')->nullable();
            $table->foreignId('equipment_terpakai_gps')->nullable();
            $table->foreignId('equipment_terpakai_sensor')->nullable();
            $table->string('teknisi_pemasangan')->nullable();
            $table->integer('uang_transportasi')->nullable();
            $table->string('type_visit')->nullable();
            $table->string('note_pemasangan')->nullable();
            // from maintenance
            $table->foreignId('type_gps_id')->nullable();
            $table->foreignId('equipment_gps_id')->nullable();
            $table->foreignId('equipment_sensor_id')->nullable();
            $table->integer('equipment_gsm')->nullable();
            $table->string('ketersediaan_kendaraan')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('hasil')->nullable();
            $table->string('biaya_transportasi')->nullable();
            $table->string('teknisi_maintenance')->nullable();
            $table->string('req_by')->nullable();
            $table->longText('note_maintenance')->nullable();
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
        Schema::dropIfExists('request_complaint');
    }
}
