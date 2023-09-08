<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MatrixNilaiKriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MatrixNilaiKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $matrixNilaiKriteriaData = [
            [
                'id_kriteria' => 1,
                'nilai' => 0.0625,
                'urutan' => 1,
            ],
            [
                'id_kriteria' => 1,
                'nilai' => 0.035714285714286,
                'urutan' => 2,
            ],
            [
                'id_kriteria' => 1,
                'nilai' => 0.044117647058824,
                'urutan' => 3,
            ],
            [
                'id_kriteria' => 1,
                'nilai' => 0.085227272727273,
                'urutan' => 4,
            ],
            [
                'id_kriteria' => 2,
                'nilai' => 0.1875,
                'urutan' => 1,
            ],
            [
                'id_kriteria' => 2,
                'nilai' => 0.10714285714286,
                'urutan' => 2,
            ],
            [
                'id_kriteria' => 2,
                'nilai' => 0.073529411764706,
                'urutan' => 3,
            ],
            [
                'id_kriteria' => 2,
                'nilai' => 0.11931818181818,
                'urutan' => 4,
            ],
            [
                'id_kriteria' => 3,
                'nilai' => 0.3125,
                'urutan' => 1,
            ],
            [
                'id_kriteria' => 3,
                'nilai' => 0.32142857142857,
                'urutan' => 2,
            ],
            [
                'id_kriteria' => 3,
                'nilai' => 0.22058823529412,
                'urutan' => 3,
            ],
            [
                'id_kriteria' => 3,
                'nilai' => 0.19886363636364,
                'urutan' => 4,
            ],
            [
                'id_kriteria' => 4,
                'nilai' => 0.4375,
                'urutan' => 1,
            ],
            [
                'id_kriteria' => 4,
                'nilai' => 0.53571428571429,
                'urutan' => 2,
            ],
            [
                'id_kriteria' => 4,
                'nilai' => 0.66176470588235,
                'urutan' => 3,
            ],
            [
                'id_kriteria' => 4,
                'nilai' => 0.59659090909091,
                'urutan' => 4,
            ],
        ];

        foreach ($matrixNilaiKriteriaData as $data) {
            MatrixNilaiKriteria::create($data);
        }
    }
}
