<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navbars')->insert([
            'navLogo' => 'logo.png',
            'link1' => 'Home',
            'link2' => 'Services',
            'link3' => 'Blog',
            'link4' => 'Contact'
        ]);
    }
}
