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
            $table->foreignId('company_id');
            $table->string('internal_eksternal');
            $table->foreignId('pic');
            $table->string('vehicle');
            $table->dateTime('waktu_info');
<<<<<<< HEAD
=======
            $table->dateTime('waktu_respond');
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
            $table->longText('task');
            $table->string('platform');
            $table->longText('detail_task');
            $table->string('divisi');
<<<<<<< HEAD
            $table->string('waktu_respond');
=======
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
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
<<<<<<< HEAD
}
=======
}
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
