<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerbandinganSubKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbandingan_sub_kriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_kriteria1')->constrained('sub_kriteria')->cascadeOnDelete();
            $table->foreignId('sub_kriteria2')->constrained('sub_kriteria')->cascadeOnDelete();
            $table->foreignId('jenis_bansos_id')->constrained('jenis_bansos')->cascadeOnDelete();
            $table->float('nilai', 8,6);
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
        Schema::dropIfExists('perbandingan_sub_kriteria');
    }
}
