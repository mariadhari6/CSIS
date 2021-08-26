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
            $table->foreignId('gsm_active_id')->constrained('gsm_actives')->onDelete('cascade')->onUpdate('cascade');
            $table->date('request_date');
            $table->date('active_date');
            $table->string('status_avtive');
            $table->foreignId('company')->constrained('companies')->onDelete('cascade')->onUpdate('cascade')->nullable();
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
