<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_article_tags')->insert([
            [
                'article_id' => 1,
                'tag_id' => 1
            ],
            [
                'article_id' => 1,
                'tag_id' => 2
            ],
            [
                'article_id' => 1,
                'tag_id' => 3
            ],
        ]);
    }
}
