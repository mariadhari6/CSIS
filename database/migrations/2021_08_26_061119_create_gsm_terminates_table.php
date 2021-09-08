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
            $table->date('active_date');
            $table->foreignId('gsm_active_id')->constrained('gsm_pre_actives')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status_active');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade')->onUpdate('cascade')->nullable();
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
