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
            $table->foreignId('company_id')->nullable(); // detail customer
            $table->string('internal_eksternal')->nullable();
            $table->foreignId('pic_id')->nullable(); // Master PIC
            $table->foreignId('vehicle')->nullable(); // Detail customer
            $table->dateTime('waktu_info')->nullable();
            $table->foreignId('task')->nullable(); // master Task
            $table->string('platform')->nullable();
            $table->longText('detail_task')->nullable();
            $table->string('divisi')->nullable();
            $table->datetime('waktu_respond')->nullable();
            $table->string('respond')->nullable();
            $table->dateTime('waktu_kesepakatan')->nullable();
            $table->dateTime('waktu_solve')->nullable();
            $table->string('status')->nullable();
            $table->string('status_akhir')->nullable(); // from pemasangan dan mutasi
            $table->foreignId('imei')->nullable(); // detail customer
            $table->foreignId('gsm_pemasangan')->nullable(); //Master GSM yg statusnya ready
            $table->foreignId('equipment_terpakai_gps')->nullable(); // master GPS
            $table->string('equipment_terpakai_sensor')->nullable(); // master sensor
            $table->foreignId('teknisi_pemasangan')->nullable(); // tabel Teknisi
            $table->integer('uang_transportasi')->nullable();
            $table->string('type_visit')->nullable();
            $table->string('note_pemasangan')->nullable();
            $table->foreignId('kendaraan_pasang')->nullable(); // $table->string('status_pemasangan')->nullable();// from maintenance
            $table->foreignId('type_gps_id')->nullable(); // Master GPS
            $table->foreignId('equipment_gps_id')->nullable(); // Master GPS
            $table->foreignId('equipment_sensor_id')->nullable(); // Master Sensor
            $table->foreignId('equipment_gsm')->nullable(); // Master gsm Ready
            $table->string('ketersediaan_kendaraan')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('hasil')->nullable();
            $table->string('biaya_transportasi')->nullable();
            $table->foreignId('teknisi_maintenance')->nullable(); // tabel teknisi
            $table->string('req_by')->nullable();
            $table->longText('note_maintenance')->nullable(); // $table->string('status_maintenance')->nullable();
            $table->timestamps();
            $table->string('status_waktu_respon')->nullable();
            $table->string('status_waktu_solve')->nullable();
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
