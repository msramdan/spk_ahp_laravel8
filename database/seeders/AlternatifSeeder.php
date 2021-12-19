<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alternatif')->insert([
            [
                'kode_alternatif' => 'A001',
                'nama_alternatif' => 'Ramdan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_alternatif' => 'A002',
                'nama_alternatif' => 'Anisa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_alternatif' => 'A003',
                'nama_alternatif' => 'Kira',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
