<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternatifBansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alternatif_bansos')->insert([
            [
                'jenis_bansos_id' => '1',
                'alternatif_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_bansos_id' => '1',
                'alternatif_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_bansos_id' => '1',
                'alternatif_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
