<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummaryCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('company');
            $table->foreignId('po_number');
            $table->foreignId('jumlah_unit_di_po');
            $table->integer('harga_layanan');
            $table->decimal('revenue');
            $table->string('status_po');
            $table->foreignId('merk_gps_terpasang');
            $table->foreignId('type_gps_terpasang');
            $table->foreignId('jumlah');
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
        Schema::dropIfExists('summary_customers');
    }
}
