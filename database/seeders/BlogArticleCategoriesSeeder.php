<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogArticleCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_categorie')->insert([
            [
                'blog_id' => 1,
                'categorie_id' => 1
            ],
            [
                'blog_id' => 1,
                'categorie_id' => 2
            ],
            [
                'blog_id' => 1,
                'categorie_id' => 3
            ],
            [
                'blog_id' => 2,
                'categorie_id' => 2,
            ],
            [
                'blog_id' => 2,
                'categorie_id' => 3,
            ],
            [
                'blog_id' => 3,
                'categorie_id' => 1,
            ],
            [
                'blog_id' => 3,
                'categorie_id' => 2,
            ],
        ]);
    }
}
