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
                'icon'  => 'flaticon-023-flask',
                'title' => 'GET IN THE LAB'
            ],
            [
                'icon'  => 'flaticon-011-compass',
                'title' => 'PROJECTS ONLINE'
            ],
            [
                'icon'  => 'flaticon-037-idea',
                'title' => 'SMART MARKETING'
            ],
            [
                'icon'  => 'flaticon-039-vector',
                'title' => 'SOCIAL MEDIA'
            ],
            [
                'icon'  => 'flaticon-036-brainstorming',
                'title' => 'BRAINSTORMING'
            ],
            [
                'icon'  => 'flaticon-026-search',
                'title' => 'DOCUMENTED'
            ],
            [
                'icon'  => 'flaticon-018-laptop-1',
                'title' => 'RESPONSIVE'
            ],
            [
                'icon'  => 'flaticon-043-sketch',
                'title' => 'RETINA READY'
            ],
            [
                'icon'  => 'flaticon-012-cube',
                'title' => 'ULTRA MODERN'
            ],
        ]);
    }
}
