<?php

namespace Database\Seeders;

use App\Models\KriteriaValid;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KriteriaValidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $kriteriaValidData = [
            [
                'is_valid' => true,
            ],
            [
                'is_valid' => false,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        foreach ($kriteriaValidData as $data) {
            KriteriaValid::create($data);
        }
    }
}
