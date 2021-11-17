<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGpsTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gps_temp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merk');
            $table->foreignId('type');
            $table->bigInteger('imei');
            $table->date('waranty');
            $table->date('po_date');
            $table->string('status');
            $table->string('status_ownership');
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
        Schema::dropIfExists('gps_temp');
    }
}