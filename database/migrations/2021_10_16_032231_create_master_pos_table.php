<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterPosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_pos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->string('po_number');
            $table->string('po_date');
            $table->string('harga_layanan');
            $table->string('jumlah_unit_po');
            $table->string('status_po');
            $table->string('sales_id')->nullable;
            $table->timestamps();
            $table->string('count')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_pos');
    }
}
