<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
                'name' => 'owner001',
                'email' => 'owner001@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/01/01 11:11:11'
            ],
            [
                'name' => 'owner002',
                'email' => 'owner002@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/01/01 11:11:11'
            ],
            [
                'name' => 'owner003',
                'email' => 'owner003@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/01/01 11:11:11'
            ],
            [
                'name' => 'owner004',
                'email' => 'owner004@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/01/01 11:11:11'
            ],
            [
                'name' => 'owner005',
                'email' => 'owner005@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/01/01 11:11:11'
            ],
            [
                'name' => 'owner006',
                'email' => 'owner006@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/01/01 11:11:11'
            ],
            [
                'name' => 'owner007',
                'email' => 'owner007@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/01/01 11:11:11'
            ],
            [
                'name' => 'owner008',
                'email' => 'owner008@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/01/01 11:11:11'
            ],
            [
                'name' => 'owner009',
                'email' => 'owner009@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/01/01 11:11:11'
            ],
        ]);
    }
}
