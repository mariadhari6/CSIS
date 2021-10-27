<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('company_id');
            $table->string('licence_plate');
            $table->string('vihecle_type');
            $table->foreignId('po_id');
            $table->integer('harga_layanan');
            $table->foreignId('po_date');
            $table->string('status_po');
            $table->string('imei');
            $table->foreignId('gps_id');
            $table->string('type');
            $table->foreignId('gsm_id');
            $table->string('provider');
            $table->string('sensor_all');
            $table->string('pool_name');
            $table->string('pool_location');
            $table->date('waranty');
            $table->string('status_layanan');
            $table->date('tanggal_pasang');
            $table->date('tanggal_non_aktif')->nullable();
            $table->date('tgl_reaktivasi_gps')->nullable();
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
        Schema::dropIfExists('detail_customers');
    }
}
