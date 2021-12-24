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
                'nama_kriteria' => 'Pekerjaan (Pendapatan per kapita)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K002',
                'nama_kriteria' => 'Asset/Tabungan (Luas tanah)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K003',
                'nama_kriteria' => 'Kesehatan (Kemampuan membayar biaya keseahtan)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K004',
                'nama_kriteria' => 'Ketahanan pangan (Sumber pangan)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K005',
                'nama_kriteria' => 'Fasilitas air bersih dan sanitasi (Cara mendapatkan air bersih)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K006',
                'nama_kriteria' => 'Pendidikan (Jumlah anggota keluarga masih bersekolah)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K007',
                'nama_kriteria' => 'Perumahan (Status tanah yang ditempati)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K008',
                'nama_kriteria' => 'Penerangan rumah (Sumber penerangan)',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
