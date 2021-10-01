<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGsmPreActivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsm_pre_actives', function (Blueprint $table) {
            $table->id();
            $table->string('gsm_number');
            $table->string('serial_number');
            $table->string('icc_id');
            $table->string('imsi');
            $table->string('res_id');
            $table->date('expired_date');
            $table->string('note');
            $table->string('status_gsm');

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
        Schema::dropIfExists('gsm_pre_actives');
    }
}
