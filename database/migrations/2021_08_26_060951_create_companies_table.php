<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->foreignId('seller_id')->constrained('sellers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('customer_code');
            $table->string('no_po');
            $table->date('po_date');
            $table->foreignId('no_agreement_letter_id')->constrained('sellers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status');
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
        Schema::dropIfExists('companies');
    }
}
