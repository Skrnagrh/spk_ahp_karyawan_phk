<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_kriteria' => 'Pencapaian Kinerja'],
            ['nama_kriteria' => 'Disiplin Waktu'],
            ['nama_kriteria' => 'Usia '],
            ['nama_kriteria' => 'Kehadiran'],
        ];

        foreach ($data as $key => $item) {
            Kriteria::create([
                'nama_kriteria' => $item['nama_kriteria'],
            ]);
        }
    }
}
