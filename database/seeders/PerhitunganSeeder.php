<?php

namespace Database\Seeders;

use App\Models\Perhitungan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerhitunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $perhitunganData = [
            ['id_kriteria' => 1, 'nilai' => 1, 'urutan' => 1],
            ['id_kriteria' => 1, 'nilai' => 0.3333333333333333, 'urutan' => 2],
            ['id_kriteria' => 1, 'nilai' => 0.2, 'urutan' => 3],
            ['id_kriteria' => 1, 'nilai' => 0.14285714285714285, 'urutan' => 4],
            ['id_kriteria' => 2, 'nilai' => 3, 'urutan' => 1],
            ['id_kriteria' => 2, 'nilai' => 1, 'urutan' => 2],
            ['id_kriteria' => 2, 'nilai' => 0.3333333333333333, 'urutan' => 3],
            ['id_kriteria' => 2, 'nilai' => 0.2, 'urutan' => 4],
            ['id_kriteria' => 3, 'nilai' => 5, 'urutan' => 1],
            ['id_kriteria' => 3, 'nilai' => 3, 'urutan' => 2],
            ['id_kriteria' => 3, 'nilai' => 1, 'urutan' => 3],
            ['id_kriteria' => 3, 'nilai' => 0.3333333333333333, 'urutan' => 4],
            ['id_kriteria' => 4, 'nilai' => 7, 'urutan' => 1],
            ['id_kriteria' => 4, 'nilai' => 5, 'urutan' => 2],
            ['id_kriteria' => 4, 'nilai' => 3, 'urutan' => 3],
            ['id_kriteria' => 4, 'nilai' => 1, 'urutan' => 4],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        foreach ($perhitunganData as $data) {
            Perhitungan::create($data);
        }
    }
}
