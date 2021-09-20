<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('pic_name');
            $table->string('email');
            $table->string('position');
            $table->string('date_birth');
            $table->integer('total_gps_installed');
            $table->integer('total_sensor_installed');
            $table->string('name_sensor');
            $table->integer('jumlah_sensor');
            $table->string('vehicle_type');
            $table->integer('jumlah_vehicle_type');
            $table->string('pool_name');
            $table->string('pool_location');
            $table->string('coordinate');
            $table->integer('jumlah_unit_per_pool');
            $table->string('fitur_digunakan');
            $table->string('business_type');
            $table->string('description_businnes_type');
            $table->string('address');
            $table->string('coordinate_address');
            $table->string('customer');
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
        Schema::dropIfExists('dashboard_customers');
    }
}
