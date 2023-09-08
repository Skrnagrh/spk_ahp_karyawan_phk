<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AlternatifDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlternatifDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alternatifIds = range(1, 20);
        $subkriteriaData = [
            [1, 5, 9, 10],
            [2, 4, 8, 10],
            [3, 5, 7, 12],
            [2, 6, 7, 11],
            [2, 6, 8, 10],
            [3, 5, 7, 12],
            [1, 5, 8, 10],
            [2, 4, 7, 10],
            [2, 5, 7, 10],
            [2, 5, 8, 10],
            [1, 6, 7, 10],
            [1, 5, 7, 10],
            [1, 5, 8, 10],
            [3, 4, 8, 10],
            [3, 5, 7, 10],
            [1, 4, 7, 10],
            [3, 4, 7, 11],
            [2, 4, 7, 11],
            [3, 5, 7, 10],
            [1, 5, 7, 11],

            // [2,4,7,11],
            // [2,4,7,10],
            // [1,6,8,10],
            // [1,4,8,11],
            // [2,5,7,11],
            // [2,4,8,10],
            // [1,4,9,10],
            // [2,4,8,10],
            // [1,5,7,11],
            // [1,5,9,10],
            // [2,5,8,10],
            // [1,5,9,10],
            // [2,5,7,11],
            // [1,5,7,12],
            // [2,5,7,11],
            // [2,5,7,11],
            // [2,5,8,11],
            // [2,5,8,10],
            // [3,4,7,10],
            // [2,5,8,10],
            // [3,5,7,11],
            // [2,6,8,10],
            // [2,5,7,10],
            // [2,4,8,10],
            // [2,5,7,10],
            // [2,5,8,10],
            // [1,5,7,11],
            // [2,4,8,10],
            // [2,4,8,11],
            // [2,5,7,11],
            // [3,4,8,11],
            // [2,5,7,11],
            // [1,5,8,11],
            // [2,4,8,11],
            // [2,4,7,11],
            // [2,4,7,11],
            // [1,5,7,11],
            // [2,4,7,10],
            // [1,5,8,11],
            // [2,4,7,11],
            // [2,5,7,10],
            // [2,5,8,11],
            // [2,4,8,10],
            // [2,5,8,10],
            // [1,5,8,11],
            // [3,4,8,10],
            // [1,5,8,11],
            // [2,4,8,11],
            // [2,4,8,10],
            // [2,4,7,11],
            // [1,4,7,11],
            // [1,5,7,11],
            // [1,5,8,10],
            // [1,5,7,10],
            // [1,5,8,11],
            // [2,4,8,11],
            // [1,5,7,11],
            // [1,4,8,11],
            // [2,5,8,10],
            // [2,4,8,11],
            // [2,4,8,10],
            // [2,5,8,10],
            // [1,5,9,10]
        ];

        // Iterasi melalui setiap alternatif
        foreach ($alternatifIds as $index => $alternatifId) {
            $idKriterias = range(1, 4); // Kumpulan ID kriteria yang ingin Anda gunakan

            // Iterasi melalui setiap kriteria
            foreach ($idKriterias as $idKriteria) {
                // Mendapatkan data subkriteria yang sesuai untuk alternatif saat ini
                $idSubkriteria = $subkriteriaData[$alternatifId - 1][$idKriteria - 1];

                // Membuat entri baru di tabel alternatif_details
                AlternatifDetail::create([
                    'id_alternatif' => $alternatifId,
                    'id_kriteria' => $idKriteria,
                    'id_subkriteria' => $idSubkriteria,
                ]);
            }
        }
    }
}
