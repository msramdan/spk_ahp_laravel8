<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaBansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kriteria_bansos')->insert([
            [
                'jenis_bansos_id' => '1',
                'kriteria_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_bansos_id' => '1',
                'kriteria_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_bansos_id' => '1',
                'kriteria_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
