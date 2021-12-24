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
                'nama_sub_kriteria' => '< 350.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK002',
                'kriteria_id' => '1',
                'nama_sub_kriteria' => '350.000 - 750.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK003',
                'kriteria_id' => '1',
                'nama_sub_kriteria' => '> 750.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //kriteria 2
            [
                'kode_sub_kriteria' => 'SK004',
                'kriteria_id' => '2',
                'nama_sub_kriteria' => '< 2.500 Meter Persegi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK005',
                'kriteria_id' => '2',
                'nama_sub_kriteria' => '2.500 - 5.000 Meter Persegi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK006',
                'kriteria_id' => '2',
                'nama_sub_kriteria' => '> 5.000 meter persegi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //kriteria 3
            [
                'kode_sub_kriteria' => 'SK007',
                'kriteria_id' => '3',
                'nama_sub_kriteria' => 'Tidak mampu bayar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK008',
                'kriteria_id' => '3',
                'nama_sub_kriteria' => 'Hanya mampu bayar di puskesmas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK009',
                'kriteria_id' => '3',
                'nama_sub_kriteria' => 'Mampu bayar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //kriteria 4
            [
                'kode_sub_kriteria' => 'SK010',
                'kriteria_id' => '4',
                'nama_sub_kriteria' => 'Tidak ada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK011',
                'kriteria_id' => '4',
                'nama_sub_kriteria' => 'Bantuan pihak lain',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK012',
                'kriteria_id' => '4',
                'nama_sub_kriteria' => 'Pendapatan sendiri',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //kriteria 5
            [
                'kode_sub_kriteria' => 'SK013',
                'kriteria_id' => '5',
                'nama_sub_kriteria' => 'Dari sumur/sumber milik tetangga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK014',
                'kriteria_id' => '5',
                'nama_sub_kriteria' => 'Dari sumur/sumber milik sendiri',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK015',
                'kriteria_id' => '5',
                'nama_sub_kriteria' => 'Dari jaringan air bersih',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //kriteria 6
            [
                'kode_sub_kriteria' => 'SK016',
                'kriteria_id' => '6',
                'nama_sub_kriteria' => '> 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK017',
                'kriteria_id' => '6',
                'nama_sub_kriteria' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK018',
                'kriteria_id' => '6',
                'nama_sub_kriteria' => 'Tidak ada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //kriteria 7
            [
                'kode_sub_kriteria' => 'SK019',
                'kriteria_id' => '7',
                'nama_sub_kriteria' => 'Menumpang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK020',
                'kriteria_id' => '7',
                'nama_sub_kriteria' => 'Warisan yang belum dibagi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK021',
                'kriteria_id' => '7',
                'nama_sub_kriteria' => 'Milik sendiri',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Kriteria 8
            [
                'kode_sub_kriteria' => 'SK022',
                'kriteria_id' => '8',
                'nama_sub_kriteria' => 'Tidak menggunakan listrik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK023',
                'kriteria_id' => '8',
                'nama_sub_kriteria' => 'Listrik menyalur dari tetangga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_sub_kriteria' => 'SK024',
                'kriteria_id' => '8',
                'nama_sub_kriteria' => 'Listrik memasang sendiri',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
