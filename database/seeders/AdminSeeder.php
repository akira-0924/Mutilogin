<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'admin001',
                'email' => 'admin001@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/01/01 11:11:11'
            ],
            [
                'name' => 'admin002',
                'email' => 'admin002@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/01/01 11:11:11'
            ],
        ]);
    }
}
