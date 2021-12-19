<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaBansosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_bansos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_bansos_id')->constrained('jenis_bansos')->cascadeOnDelete();
            $table->foreignId('kriteria_id')->constrained('kriteria')->cascadeOnDelete();
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
        Schema::dropIfExists('kriteria_bansos');
    }
}
