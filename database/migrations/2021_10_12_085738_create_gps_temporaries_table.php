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
            $table->string('merk');
            $table->string('type');
            $table->bigInteger('imei');
            $table->date('waranty');
            $table->date('po_date');
            $table->string('status');
            $table->string('status_ownership');
            $table->foreignId('company_id')->nullable();
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
