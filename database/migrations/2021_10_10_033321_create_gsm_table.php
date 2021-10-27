<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateGsmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsm', function (Blueprint $table) {
            $table->id();
            $table->string('status_gsm');
            $table->string('gsm_number');
            $table->foreignId('company_id')->nullable();
            $table->string('serial_number');
            $table->string('icc_id');
            $table->string('imsi');
            $table->string('res_id');
            $table->date('request_date')->nullable();
            $table->date('expired_date')->nullable();
            $table->date('active_date')->nullable();
            $table->date('terminate_date')->nullable();
            $table->string('note')->nullable();
            $table->string('provider');
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
        Schema::dropIfExists('gsm');
    }
}
