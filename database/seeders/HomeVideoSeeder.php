<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_videos')->insert([
            'video' => 'https://www.youtube.com/watch?v=LSFX9vrwJf8&ab_channel=TopGear',
        ]);
    }
}
