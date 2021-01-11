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
        DB::table('blog_article_categories')->insert([
            [
                'article_id' => 1,
                'categorie_id' => 1
            ],
            [
                'article_id' => 1,
                'categorie_id' => 2
            ],
            [
                'article_id' => 1,
                'categorie_id' => 3
            ],
        ]);
    }
}
