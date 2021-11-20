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
            $table->string('seller_id');
            $table->string('customer_code');
            $table->string('no_agreement_letter_id');
            $table->string('status');
            $table->string('fitur_yang_digunakan')->nullable();
            $table->string('business_type')->nullable();
            $table->string('description_business_type')->nullable();
            $table->string('address')->nullable();
            $table->string('coordinate_address')->nullable();
            $table->string('customer')->nullable();
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
