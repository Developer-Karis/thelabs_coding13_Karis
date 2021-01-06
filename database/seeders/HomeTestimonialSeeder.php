<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeTestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_testimonials')->insert([
            [
                'title' => 'WHAT OUR CLIENTS SAY',
                'avatar' => 'avatar/01.jpg',
                'fullName' => 'Michael Smith',
                'function' => 'CEO Company',
                'para' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
                elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.',
            ],
            [
                'title' => null,
                'avatar' => 'avatar/02.jpg',
                'fullName' => 'Michael Smith',
                'function' => 'CEO Company',
                'para' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
                elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.',
            ],
            [
                'title' => null,
                'avatar' => 'avatar/01.jpg',
                'fullName' => 'Michael Smith',
                'function' => 'CEO Company',
                'para' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
                elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.',
            ],
            [
                'title' => null,
                'avatar' => 'avatar/02.jpg',
                'fullName' => 'Michael Smith',
                'function' => 'CEO Company',
                'para' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
                elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.',
            ],
            [
                'title' => null,
                'avatar' => 'avatar/01.jpg',
                'fullName' => 'Michael Smith',
                'function' => 'CEO Company',
                'para' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
                elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.',
            ],
            [
                'title' => null,
                'avatar' => 'avatar/02.jpg',
                'fullName' => 'Michael Smith',
                'function' => 'CEO Company',
                'para' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
                elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.',
            ],
        ]);
    }
}
