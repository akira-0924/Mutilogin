<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => 'パソコン・オフィス用品',
                'sort_order' => 1
            ],
            [
                'name' => '食品・飲料・お酒',
                'sort_order' => 2
            ],
            [
                'name' => 'スポーツ・アウトドア',
                'sort_order' => 3
            ]
        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'パソコン・タブレット',
                'sort_order' => 1,
                'primary_category_id' => 1
            ],
            [
                'name' => 'ディスプレイ・モニター',
                'sort_order' => 2,
                'primary_category_id' => 1
            ],
            [
                'name' => '無線LAN・ネットワーク機器',
                'sort_order' => 3,
                'primary_category_id' => 1
            ],
            [
                'name' => '全ての食品&飲料',
                'sort_order' => 4,
                'primary_category_id' => 2
            ],
            [
                'name' => 'ワイン・日本酒',
                'sort_order' => 5,
                'primary_category_id' => 2
            ],
            [
                'name' => 'グルメギフト',
                'sort_order' => 6,
                'primary_category_id' => 2
            ],
            [
                'name' => '自転車',
                'sort_order' => 7,
                'primary_category_id' => 3
            ],
            [
                'name' => '釣り',
                'sort_order' => 8,
                'primary_category_id' => 3
            ],
            [
                'name' => 'スポーツウェア&シューズ',
                'sort_order' => 9,
                'primary_category_id' => 3
            ],
        ]);
    }
}
