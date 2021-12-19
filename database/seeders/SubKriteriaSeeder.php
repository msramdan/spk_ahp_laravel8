<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_kriteria')->insert([
            [
                'kode_sub_kriteria' => 'SK001',
                'kriteria_id' => '1',
                'nama_sub_kriteria' => 'Penghasilan bawah 1jt',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
