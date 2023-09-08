<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\KriteriaSeeder;
use Database\Seeders\AlternatifSeeder;
use Database\Seeders\NilaiBobotSeeder;
use Database\Seeders\PerhitunganSeeder;
use Database\Seeders\SubkriteriaSeeder;
use Database\Seeders\KriteriaValidSeeder;
use Database\Seeders\AlternatifDetailSeeder;
use Database\Seeders\SubkriteriaValidSeeder;
use Database\Seeders\KriteriaValidsTableSeeder;
use Database\Seeders\MatrixNilaiKriteriaSeeder;
use Database\Seeders\MatrixNilaiSubkriteriaSeeder;
use Database\Seeders\NilaiPrioritasKriteriaSeeder;
use Database\Seeders\PerhitunganSubkriteriaSeeder;
use Database\Seeders\MatrixNilaiKriteriasTableSeeder;
use Database\Seeders\NilaiPrioritasSubkriteriaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KriteriaSeeder::class,
            SubkriteriaSeeder::class,
            AlternatifSeeder::class,
            AlternatifDetailSeeder::class,

            MatrixNilaiKriteriaSeeder::class,
            NilaiPrioritasKriteriaSeeder::class,
            KriteriaValidSeeder::class,
            PerhitunganSeeder::class,

            MatrixNilaiSubkriteriaSeeder::class,
            NilaiPrioritasSubkriteriaSeeder::class,
            SubkriteriaValidSeeder::class,
            PerhitunganSubkriteriaSeeder::class,
        ]);
    }
}
