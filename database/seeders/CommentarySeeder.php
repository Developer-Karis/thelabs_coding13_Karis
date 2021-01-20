<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commentaries')->insert([
            [
                'photo_profil' => '01.jpg',
                'fullname' => 'Michael Smith',
                'title' => '03 nov 2017 | Reply',

                'message' => 'Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. 
                Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique.',

                'article_id' => 1,
                'user_id' => 1
            ],
            [
                'photo_profil' => '02.jpg',
                'fullname' => 'Juliette Portier',
                'title' => '04 dev 2019 | Reply',
                
                'message' => 'Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. 
                Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique.',

                'article_id' => 1,
                'user_id' => 1
            ],
            [
                'photo_profil' => '01.jpg',
                'fullname' => 'Michael Smith',
                'title' => '03 nov 2017 | Reply',

                'message' => 'Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. 
                Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique.',

                'article_id' => 2,
                'user_id' => 2
            ],
            [
                'photo_profil' => '02.jpg',
                'fullname' => 'Juliette Portier',
                'title' => '04 dev 2019 | Reply',
                
                'message' => 'Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. 
                Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique.',

                'article_id' => 2,
                'user_id' => 2
            ],
            [
                'photo_profil' => '01.jpg',
                'fullname' => 'Michael Smith',
                'title' => '03 nov 2017 | Reply',

                'message' => 'Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. 
                Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique.',

                'article_id' => 3,
                'user_id' => 3
            ],
            [
                'photo_profil' => '02.jpg',
                'fullname' => 'Juliette Portier',
                'title' => '04 dev 2019 | Reply',
                
                'message' => 'Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. 
                Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique.',

                'article_id' => 3,
                'user_id' => 3
            ],
        ]);
    }
}
