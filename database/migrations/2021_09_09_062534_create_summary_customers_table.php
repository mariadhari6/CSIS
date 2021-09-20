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
            $table->id();
            $table->foreignId('po_number')->constrained('detail_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('jumlah_unit_di_po')->constrained('detail_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->integer('harga_layanan');
            $table->decimal('revenue');
            $table->string('status_po');
            $table->foreignId('merk_gps_terpasang')->constrained('detail_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('type_gps_terpasang')->constrained('detail_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('jumlah')->constrained('detail_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
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
