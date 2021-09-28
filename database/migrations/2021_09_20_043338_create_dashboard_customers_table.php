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
            $table->id();
            $table->foreignId('company_name');
            $table->foreignId('pic_name');
            $table->foreignId('email');
            $table->foreignId('phone');
            $table->foreignId('position');;
            $table->foreignId('date_of_birth');
            $table->foreignId('total_gps_installed');
            $table->foreignId('total_sensor_installed');
            $table->foreignId('nama_sensor');
            $table->foreignId('jumlah_sensor');
            $table->foreignId('vehicle_type');
            $table->foreignId('jumlah_vehicle');
            $table->string('pool_name');
            $table->string('pool_location');
            $table->string('coordinate');
            $table->integer('jumlah_unit_per_pool');
            $table->string('fitur_yang_digunakan');
            $table->string('business_type');
            $table->string('description_business_type');
            $table->string('adress');
            $table->string('coordinate_adress');
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
