<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesRapidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_rapides')->insert([
            [
                'main_title' => 'GET IN THE LAB AND SEE THE (SERVICES)',
                'icon'  => 'flaticon-023-flask',
                'title' => 'GET IN THE LAB',
                'para'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'button' => 'BROWSE',
            ],
            [
                'main_title' => null,
                'icon'  => 'flaticon-011-compass',
                'title' => 'PROJECTS ONLINE',
                'para'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'button' => null,
            ],
            [
                'main_title' => null,
                'icon'  => 'flaticon-037-idea',
                'title' => 'SMART MARKETING',
                'para'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'button' => null,
            ],
            [
                'main_title' => null,
                'icon'  => 'flaticon-039-vector',
                'title' => 'SOCIAL MEDIA',
                'para'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'button' => null,
            ],
            [
                'main_title' => null,
                'icon'  => 'flaticon-036-brainstorming',
                'title' => 'BRAINSTORMING',
                'para'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'button' => null,
            ],
            [
                'main_title' => null,
                'icon'  => 'flaticon-026-search',
                'title' => 'DOCUMENTED',
                'para'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'button' => null,
            ],
            [
                'main_title' => null,
                'icon'  => 'flaticon-018-laptop-1',
                'title' => 'RESPONSIVE',
                'para'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'button' => null,
            ],
            [
                'main_title' => null,
                'icon'  => 'flaticon-043-sketch',
                'title' => 'RETINA READY',
                'para'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'button' => null,
            ],
            [
                'main_title' => null,
                'icon'  => 'flaticon-012-cube',
                'title' => 'ULTRA MODERN',
                'para'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'button' => null,
            ],
        ]);
    }
}
