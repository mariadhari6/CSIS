<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGpsTemporariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gps_temporaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merk')->nullable();
            $table->foreignId('type')->nullable();
            $table->bigInteger('imei')->nullable();
            $table->date('waranty');
            $table->date('po_date');
            $table->string('status');
            $table->string('status_ownership')->nullable();
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
        Schema::dropIfExists('gps_temporaries');
    }
}