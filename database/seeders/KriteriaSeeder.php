<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kriteria')->insert([
            [
                'kode_kriteria' => 'K001',
                'nama_kriteria' => 'IPK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K002',
                'nama_kriteria' => 'Ekonomi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K003',
                'nama_kriteria' => 'Prestasi',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
