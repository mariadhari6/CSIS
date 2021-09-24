<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGsmTerminatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsm_terminates', function (Blueprint $table) {
            $table->id();
            $table->date('request_date');
<<<<<<< HEAD
            $table->date('active_date');
=======
            $table->date('terminate_date');
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
            $table->foreignId('gsm_active_id');
            $table->string('status_active');
            $table->foreignId('company_id');
            $table->string('note');
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
        Schema::dropIfExists('gsm_terminates');
    }
}
