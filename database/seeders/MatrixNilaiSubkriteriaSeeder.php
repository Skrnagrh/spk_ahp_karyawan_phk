<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MatrixNilaiSubkriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MatrixNilaiSubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $matrixNilaiSubkriteriaData = [
            [
                'id_kriteria' => 1,
                'id_subkriteria' => 1,
                'nilai' => 0.11111111111111,
                'urutan' => 1,
            ],
            [
                'id_kriteria' => 1,
                'id_subkriteria' => 1,
                'nilai' => 0.076923076923077,
                'urutan' => 2,
            ],
            [
                'id_kriteria' => 1,
                'id_subkriteria' => 1,
                'nilai' => 0.1304347826087,
                'urutan' => 3,
            ], //batas subkriteria 1
            [
                'id_kriteria' => 1,
                'id_subkriteria' => 2,
                'nilai' => 0.33333333333333,
                'urutan' => 1,
            ],
            [
                'id_kriteria' => 1,
                'id_subkriteria' => 2,
                'nilai' => 0.23076923076923,
                'urutan' => 2,
            ],
            [
                'id_kriteria' => 1,
                'id_subkriteria' => 2,
                'nilai' => 0.21739130434783,
                'urutan' => 3,
            ], //batas subkriteria 2
            [
                'id_kriteria' => 1,
                'id_subkriteria' => 3,
                'nilai' => 0.55555555555556,
                'urutan' => 1,
            ],
            [
                'id_kriteria' => 1,
                'id_subkriteria' => 3,
                'nilai' => 0.69230769230769,
                'urutan' => 2,
            ],
            [
                'id_kriteria' => 1,
                'id_subkriteria' => 3,
                'nilai' => 0.65217391304348,
                'urutan' => 3,
            ],
            //Batas Kriteria 1

        ];

        foreach ($matrixNilaiSubkriteriaData as $data) {
            MatrixNilaiSubkriteria::create($data);
        }
    }
}
