<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "Admin",
                'email' => "admin@admin.com",
                'photo' => 'admin.png',
                'role_id' => 1,
                'password' => Hash::make('admin@admin.com'),
            ],
            [
                'name' => "Webmaster",
                'email' => "webmaster@webmaster.com",
                'photo' => 'image.jpg',
                'role_id' => 2,
                'password' => Hash::make('webmaster@webmaster.com'),
            ],
            [
                'name' => "Redacteur",
                'email' => "redacteur@redacteur.com",
                'photo' => 'naruto.jpg',
                'role_id' => 3,
                'password' => Hash::make('redacteur@redacteur.com'),
            ],
            [
                'name' => "Membre",
                'email' => "membre@membre.com",
                'photo' => 'multi.jpg',
                'role_id' => 4,
                'password' => Hash::make('membre@membre.com'),
            ],
        ]);
    }
}
