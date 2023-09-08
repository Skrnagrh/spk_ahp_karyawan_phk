<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Database\Seeder;

class SubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // kriteria Pencapaian Kinerja
            ['nama_subkriteria' => '50 Tabung',  'id_kriteria' => Kriteria::find(1)->id], //1
            ['nama_subkriteria' => '< 30 Tabung',  'id_kriteria' => Kriteria::find(1)->id], //2
            ['nama_subkriteria' => '< 10 Tabung',  'id_kriteria' => Kriteria::find(1)->id], //3

            // kriteria Disiplin Waktu
            ['nama_subkriteria' => '> 5 Menit',  'id_kriteria' => Kriteria::find(2)->id], //5
            ['nama_subkriteria' => '> 10 Menit',  'id_kriteria' => Kriteria::find(2)->id], //6
            ['nama_subkriteria' => '> 30 Menit',  'id_kriteria' => Kriteria::find(2)->id], //7

            // kriteria Usia
            ['nama_subkriteria' => '> 35 Tahun',  'id_kriteria' => Kriteria::find(3)->id],
            ['nama_subkriteria' => '> 40 Tahun',  'id_kriteria' => Kriteria::find(3)->id],
            ['nama_subkriteria' => '> 50 Tahun',  'id_kriteria' => Kriteria::find(3)->id],

            // kriteria Kehadiran
            ['nama_subkriteria' => '> 1 Hari',  'id_kriteria' => Kriteria::find(4)->id],
            ['nama_subkriteria' => '> 3 Hari ',  'id_kriteria' => Kriteria::find(4)->id],
            ['nama_subkriteria' => '> 5 Hari',  'id_kriteria' => Kriteria::find(4)->id],

        ];

        foreach ($data as $item) {
            Subkriteria::create([
                'nama_subkriteria' => $item['nama_subkriteria'],
                'id_kriteria' => $item['id_kriteria']
            ]);
        }
    }
}
