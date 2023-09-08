<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'managerhrd', 'email' => 'managerhrd@gmail.com', 'password' => 'password', 'admin' => 'manager'],
            ['name' => 'staffhrd', 'email' => 'staffhrd@gmail.com', 'password' => 'password', 'admin' => 'staff hrd']
        ];

        foreach ($data as $item) {
            User::create([
                'name' => $item['name'],
                'email' => $item['email'],
                'password' => Hash::make($item['password']),
                'admin' => $item['admin'],
            ]);
        }
    }
}
