<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_status', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2021_11_02_163655_create_service_status_table.php
            $table->string("service_status_name");
=======
            $table->string('service_status_name');

>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54:database/migrations/2021_11_05_070451_create_service_statuses_table.php
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
        Schema::dropIfExists('service_status');
    }
}
