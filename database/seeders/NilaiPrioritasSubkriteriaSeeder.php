<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MatrixNilaiSubkriteria;
use App\Models\NilaiPrioritasSubkriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NilaiPrioritasSubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $nilaiPrioritasSubkriteriaData = [
            [
                'id_kriteria' => 1,
                'id_subkriteria' => 1,
                'jml_nilai' => 0.31846897064288,
                'nilai_prioritas' => 0.10615632354763,
            ],
            [
                'id_kriteria' => 1,
                'id_subkriteria' => 2,
                'jml_nilai' => 0.78149386845039,
                'nilai_prioritas' => 0.26049795615013,
            ],
            [
                'id_kriteria' => 1,
                'id_subkriteria' => 3,
                'jml_nilai' => 1.9000371609067,
                'nilai_prioritas' => 0.63334572030224,
            ],
            // Batas id kriteria 1

            [
                'id_kriteria' => 2,
                'id_subkriteria' => 4,
                'jml_nilai' => 0.31846897064288,
                'nilai_prioritas' => 0.10615632354763,
            ],
            [
                'id_kriteria' => 2,
                'id_subkriteria' => 5,
                'jml_nilai' => 0.78149386845039,
                'nilai_prioritas' => 0.26049795615013,
            ],
            [
                'id_kriteria' => 2,
                'id_subkriteria' => 6,
                'jml_nilai' => 1.9000371609067,
                'nilai_prioritas' => 0.63334572030224,
            ],
            // Batas id kriteria 2

            [
                'id_kriteria' => 3,
                'id_subkriteria' => 7,
                'jml_nilai' => 0.31846897064288,
                'nilai_prioritas' => 0.10615632354763,
            ],
            [
                'id_kriteria' => 3,
                'id_subkriteria' => 8,
                'jml_nilai' => 0.78149386845039,
                'nilai_prioritas' => 0.26049795615013,
            ],
            [
                'id_kriteria' => 3,
                'id_subkriteria' => 9,
                'jml_nilai' => 1.9000371609067,
                'nilai_prioritas' => 0.63334572030224,
            ],
            // Batas id kriteria 3

            [
                'id_kriteria' => 4,
                'id_subkriteria' => 10,
                'jml_nilai' => 0.31846897064288,
                'nilai_prioritas' => 0.10615632354763,
            ],
            [
                'id_kriteria' => 4,
                'id_subkriteria' => 11,
                'jml_nilai' => 0.78149386845039,
                'nilai_prioritas' => 0.26049795615013,
            ],
            [
                'id_kriteria' => 4,
                'id_subkriteria' => 12,
                'jml_nilai' => 1.9000371609067,
                'nilai_prioritas' => 0.63334572030224,
            ],
            // Batas id kriteria 4
        ];

        foreach ($nilaiPrioritasSubkriteriaData as $data) {
            NilaiPrioritasSubkriteria::create($data);
        }
    }
}
