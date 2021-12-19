<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerbandinganKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbandingan_kriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kriteria1')->constrained('kriteria')->cascadeOnDelete();
            $table->foreignId('kriteria2')->constrained('kriteria')->cascadeOnDelete();
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
        Schema::dropIfExists('perbandingan_kriteria');
    }
}
