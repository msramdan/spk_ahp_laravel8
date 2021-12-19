<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_bansos')->insert([
            [
                'nama_jenis_bansos' => 'Bansos A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jenis_bansos' => 'Bansos B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jenis_bansos' => 'Bansos C',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
