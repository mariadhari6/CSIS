<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard_customer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_name')->constrained('detail_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('pic_name')->constrained('pics')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('email')->constrained('pics')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('phone')->constrained('pics')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('position')->constrained('pics')->onDelete('cascade')->onUpdate('cascade')->nullable();;
            $table->foreignId('date_of_birth')->constrained('pics')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('total_gps_installed')->constrained('detail_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('total_sensor_installed')->constrained('detail_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('nama_sensor')->constrained('detail_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('jumlah_sensor')->constrained('detail_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('vehicle_type')->constrained('detail_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('jumlah_vehicle')->constrained('detail_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
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
        Schema::dropIfExists('dashboard_customer');
    }
}
