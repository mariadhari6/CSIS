<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestComplaintCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_complaint_customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('internal_eksternal');
            $table->foreignId('pic_id')->constrained('pics')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('vehicle');
            $table->dateTime('waktu_info');
            $table->longText('task');
            $table->string('platform');
            $table->longText('detail_task');
            $table->string('divisi');
            $table->string('waktu_respond');
            $table->string('respond');
            $table->dateTime('waktu_kesepakatan');
            $table->dateTime('waktu_solve');
            $table->string('status');
            $table->string('status_akhir');
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
        Schema::dropIfExists('request_complaint_customers');
    }
}