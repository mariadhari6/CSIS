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
            $table->string('company_id');
            $table->string('licence_plate');
            $table->string('vihecle_type');
            $table->string('po_number');
            $table->string('po_date');
            $table->string('status_po');
            $table->string('imei');
            $table->string('merk');
            $table->string('type');
            $table->string('gsm');
            $table->string('provider');
            $table->string('serial_number_sensor');
            $table->string('name_sensor');
            $table->string('merk_sensor');
            $table->string('pool_name');
            $table->string('pool_location');
            $table->date('waranty');
            $table->string('status_layanan');
            $table->date('tanggal_pasang');
            $table->date('tanggal_non_aktif');
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
