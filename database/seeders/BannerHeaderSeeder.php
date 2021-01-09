<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banner_headers')->insert([
            [
                'title' => 'Services',
                'lienPrecedent' => 'Home',
                'lienActuel' => 'Services',
            ],
            [
                'title' => 'Blog',
                'lienPrecedent' => 'Home',
                'lienActuel' => 'Blog',
            ],
            [
                'title' => 'Contact',
                'lienPrecedent' => 'Home',
                'lienActuel' => 'Contact',
            ],
        ]);
    }
}
