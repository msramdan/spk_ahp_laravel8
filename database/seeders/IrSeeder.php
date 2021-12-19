<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ir')->insert([
            [
                'jumlah' => '1',
                'nilai' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jumlah' => '2',
                'nilai' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jumlah' => '3',
                'nilai' => '0.58',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jumlah' => '4',
                'nilai' => '0.9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jumlah' => '5',
                'nilai' => '1.12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jumlah' => '6',
                'nilai' => '1.24',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jumlah' => '7',
                'nilai' => '1.32',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jumlah' => '8',
                'nilai' => '1.41',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jumlah' => '9',
                'nilai' => '1.45',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jumlah' => '10',
                'nilai' => '1.49',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jumlah' => '11',
                'nilai' => '1.51',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jumlah' => '12',
                'nilai' => '1.48',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jumlah' => '13',
                'nilai' => '1.56',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jumlah' => '14',
                'nilai' => '1.57',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jumlah' => '15',
                'nilai' => '1.59',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
