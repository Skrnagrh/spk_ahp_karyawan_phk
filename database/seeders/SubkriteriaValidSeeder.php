<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubkriteriaValid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubkriteriaValidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $subkriteriaValidData = [
            [
                'id_kriteria' => 1,
                'is_valid' => true,
            ],
            [
                'id_kriteria' => 2,
                'is_valid' => false,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        foreach ($subkriteriaValidData as $data) {
            SubkriteriaValid::create($data);
        }
    }
}
