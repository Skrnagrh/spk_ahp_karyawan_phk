<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PerhitunganSubkriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerhitunganSubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $perhitunganSubkriteriaData = [
            ['id_kriteria' => 1, 'id_subkriteria' => 1, 'nilai' => 1, 'urutan' => 1],
            ['id_kriteria' => 1, 'id_subkriteria' => 1, 'nilai' => 0.3333333333333333, 'urutan' => 2],
            ['id_kriteria' => 1, 'id_subkriteria' => 1, 'nilai' => 0.2, 'urutan' => 3],
            ['id_kriteria' => 1, 'id_subkriteria' => 2, 'nilai' => 3, 'urutan' => 1],
            ['id_kriteria' => 1, 'id_subkriteria' => 2, 'nilai' => 1, 'urutan' => 2],
            ['id_kriteria' => 1, 'id_subkriteria' => 2, 'nilai' => 0.3333333333333333, 'urutan' => 3],
            ['id_kriteria' => 1, 'id_subkriteria' => 3, 'nilai' => 5, 'urutan' => 1],
            ['id_kriteria' => 1, 'id_subkriteria' => 3, 'nilai' => 3, 'urutan' => 2],
            ['id_kriteria' => 1, 'id_subkriteria' => 3, 'nilai' => 1, 'urutan' => 3],
            // Batas Kriteria id 1

            ['id_kriteria' => 2, 'id_subkriteria' => 4, 'nilai' => 1, 'urutan' => 1],
            ['id_kriteria' => 2, 'id_subkriteria' => 4, 'nilai' => 0.3333333333333333, 'urutan' => 2],
            ['id_kriteria' => 2, 'id_subkriteria' => 4, 'nilai' => 0.2, 'urutan' => 3],
            ['id_kriteria' => 2, 'id_subkriteria' => 5, 'nilai' => 3, 'urutan' => 1],
            ['id_kriteria' => 2, 'id_subkriteria' => 5, 'nilai' => 1, 'urutan' => 2],
            ['id_kriteria' => 2, 'id_subkriteria' => 5, 'nilai' => 0.3333333333333333, 'urutan' => 3],
            ['id_kriteria' => 2, 'id_subkriteria' => 6, 'nilai' => 5, 'urutan' => 1],
            ['id_kriteria' => 2, 'id_subkriteria' => 6, 'nilai' => 3, 'urutan' => 2],
            ['id_kriteria' => 2, 'id_subkriteria' => 6, 'nilai' => 1, 'urutan' => 3],
            // Batas Kriteria id 2

            ['id_kriteria' => 3, 'id_subkriteria' => 7, 'nilai' => 1, 'urutan' => 1],
            ['id_kriteria' => 3, 'id_subkriteria' => 7, 'nilai' => 0.3333333333333333, 'urutan' => 2],
            ['id_kriteria' => 3, 'id_subkriteria' => 7, 'nilai' => 0.2, 'urutan' => 3],
            ['id_kriteria' => 3, 'id_subkriteria' => 8, 'nilai' => 3, 'urutan' => 1],
            ['id_kriteria' => 3, 'id_subkriteria' => 8, 'nilai' => 1, 'urutan' => 2],
            ['id_kriteria' => 3, 'id_subkriteria' => 8, 'nilai' => 0.3333333333333333, 'urutan' => 3],
            ['id_kriteria' => 3, 'id_subkriteria' => 9, 'nilai' => 5, 'urutan' => 1],
            ['id_kriteria' => 3, 'id_subkriteria' => 9, 'nilai' => 3, 'urutan' => 2],
            ['id_kriteria' => 3, 'id_subkriteria' => 9, 'nilai' => 1, 'urutan' => 3],
            // Batas Kriteria id 3

            ['id_kriteria' => 4, 'id_subkriteria' => 10, 'nilai' => 1, 'urutan' => 1],
            ['id_kriteria' => 4, 'id_subkriteria' => 10, 'nilai' => 0.3333333333333333, 'urutan' => 2],
            ['id_kriteria' => 4, 'id_subkriteria' => 10, 'nilai' => 0.2, 'urutan' => 3],
            ['id_kriteria' => 4, 'id_subkriteria' => 11, 'nilai' => 3, 'urutan' => 1],
            ['id_kriteria' => 4, 'id_subkriteria' => 11, 'nilai' => 1, 'urutan' => 2],
            ['id_kriteria' => 4, 'id_subkriteria' => 11, 'nilai' => 0.3333333333333333, 'urutan' => 3],
            ['id_kriteria' => 4, 'id_subkriteria' => 12, 'nilai' => 5, 'urutan' => 1],
            ['id_kriteria' => 4, 'id_subkriteria' => 12, 'nilai' => 3, 'urutan' => 2],
            ['id_kriteria' => 4, 'id_subkriteria' => 12, 'nilai' => 1, 'urutan' => 3],
            // Batas Kriteria id 4
        ];

        foreach ($perhitunganSubkriteriaData as $data) {
            PerhitunganSubkriteria::create($data);
        }
    }
}
