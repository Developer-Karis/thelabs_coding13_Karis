<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'nom' => 'HTML'
            ],
            [
                'nom' => 'CSS'
            ],
            [
                'nom' => 'BOOTSTRAP'
            ],
            [
                'nom' => 'JAVASCRIPT'
            ],
            [
                'nom' => 'REACT JS'
            ],
            [
                'nom' => 'LARAVEL'
            ],
        ]);
    }
}
