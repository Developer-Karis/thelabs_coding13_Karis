<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerCarousSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banner_carouses')->insert([
            [
                'imageCarous' => '01.jpg',
            ],
            [
                'imageCarous' => '02.jpg',
            ],
        ]);
    }
}
