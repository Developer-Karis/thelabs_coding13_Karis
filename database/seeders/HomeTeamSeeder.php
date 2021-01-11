<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_teams')->insert([
            [
                'title' => 'GET IN THE LAB AND MEET THE (TEAM)',
                'imageTeam' => '1.jpg',
                'fullName'  => 'Christinne Williams',
                'function'  => 'PROJECT MANAGER'
            ],
            [
                'title' => null,
                'imageTeam' => '2.jpg',
                'fullName'  => 'Juliette Fournier',
                'function'  => 'JUNIOR DEVELOPER'
            ],
            [
                'title' => null,
                'imageTeam' => '3.jpg',
                'fullName'  => 'Lucas Portier',
                'function'  => 'DIGITAL DESIGNER'
            ],
        ]);
    }
}
