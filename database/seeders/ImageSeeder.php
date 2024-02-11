<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'owner_id' => 1,
                'title' => 'ダミー001',
                'filename' => 'sample001.png'
            ],
            [
                'owner_id' => 1,
                'title' => 'ダミー002',
                'filename' => 'sample002.png'
            ],
            [
                'owner_id' => 1,
                'title' => 'ダミー003',
                'filename' => 'sample003.png'
            ],
            [
                'owner_id' => 1,
                'title' => 'ダミー004',
                'filename' => 'sample004.png'
            ],
            [
                'owner_id' => 1,
                'title' => 'ダミー005',
                'filename' => 'sample005.png'
            ],
            [
                'owner_id' => 1,
                'title' => 'ダミー006',
                'filename' => 'sample006.png'
            ]
        ]);
    }
}
