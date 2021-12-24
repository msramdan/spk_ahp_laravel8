<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePvSubKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pv_sub_kriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_kriteria_id')->constrained('sub_kriteria')->cascadeOnDelete();
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
        Schema::dropIfExists('pv_sub_kriteria');
    }
}
