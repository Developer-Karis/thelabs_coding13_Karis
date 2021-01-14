<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'nom' => 'branding'
            ],
            [
                'nom' => 'identy'
            ],
            [
                'nom' => 'video'
            ],
            [
                'nom' => 'design'
            ],
            [
                'nom' => 'inspiration'
            ],
            [
                'nom' => 'web design'
            ],
            [
                'nom' => 'photography'
            ],
            [
                'nom' => 'cars'
            ],
            [
                'nom' => 'books'
            ],
        ]);
    }
}
