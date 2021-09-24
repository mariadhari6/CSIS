<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pics', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->foreignId('company_id');
=======
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade')->onUpdate('cascade');
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
            $table->string('pic_name');
            $table->string('phone');
            $table->string('email');
            $table->string('position');
            $table->date('date_of_birth');
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
        Schema::dropIfExists('pics');
    }
}
