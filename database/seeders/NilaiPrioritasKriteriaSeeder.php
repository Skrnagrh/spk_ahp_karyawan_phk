<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NilaiPrioritasKriteria;

class NilaiPrioritasKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $nilaiPrioritasKriteriaData = [
            [
                'id_kriteria' => 1,
                'jml_nilai' => 0.22755920550038,
                'nilai_prioritas' => 0.056889801375096,
            ],
            [
                'id_kriteria' => 2,
                'jml_nilai' => 0.48749045072574,
                'nilai_prioritas' => 0.12187261268144,
            ],
            [
                'id_kriteria' => 3,
                'jml_nilai' => 1.0533804430863,
                'nilai_prioritas' => 0.26334511077158,
            ],
            [
                'id_kriteria' => 4,
                'jml_nilai' => 2.2315699006875,
                'nilai_prioritas' => 0.55789247517189,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        foreach ($nilaiPrioritasKriteriaData as $data) {
            NilaiPrioritasKriteria::create($data);
        }
    }
}
