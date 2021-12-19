<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifBansosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatif_bansos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_bansos_id')->constrained('jenis_bansos')->cascadeOnDelete();
            $table->foreignId('alternatif_id')->constrained('alternatif')->cascadeOnDelete();
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
        Schema::dropIfExists('alternatif_bansos');
    }
}
