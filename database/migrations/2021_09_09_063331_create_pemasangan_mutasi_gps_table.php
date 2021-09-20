<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasanganMutasiGpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasangan_mutasi_gps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('request_complaint_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('tanggal')->constrained('request_complaint_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('kendaraan_awal')->constrained('request_complaint_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('imei')->constrained('detail_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('gsm_pemasangan')->constrained('detail_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('kendaraan_pasang')->constrained('request_complaint_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('jenis_pekerjaan')->constrained('request_complaint_customers')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('equipment_terpakai_gps')->constrained('gps')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('equipment_terpakai_sensor')->constrained('sensors')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('teknisi');
            $table->string('uang_transportasi');
            $table->string('type_visit');
            $table->string('note');
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
        Schema::dropIfExists('pemasangan_mutasi_gps');
    }
}
