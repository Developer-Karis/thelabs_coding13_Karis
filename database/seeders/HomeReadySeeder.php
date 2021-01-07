<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeReadySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_readies')->insert([
            'title' => 'Are you ready to stand out?',
            'sous_title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est.',
            'button' => 'BROWSE',
        ]);
    }
}
