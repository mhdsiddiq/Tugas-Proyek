<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            // ([
            //     'name' => 'Ini Admin',
            //     'email' => 'admin@admin.com',
            //     'password'    => bcrypt('123'),
            //     'role_id' => 1,
            // ]),
            ([
                'name' => 'Ini Apoteker',
                'email' => 'apoteker@apoteker.com',
                'password'    => bcrypt('123'),
                'role_id' => 2,
            ]),
            // ([
            //     'name' => 'Ini Dokter',
            //     'email' => 'dokter@dokter.com',
            //     'password'    => bcrypt('123'),
            //     'role_id' => 3,
            // ]),
        ];

        User::insert($user);
    }
}
