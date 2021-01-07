<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
			NavbarSeeder::class,
			RoleSeeder::class,
			UserSeeder::class,
			BannerSeeder::class,
			BannerCarousSeeder::class,
			ServicesRapidesSeeder::class,
			HomePresentationSeeder::class,
			HomeVideoSeeder::class,
			HomeTestimonialSeeder::class,
			HomeTeamSeeder::class,
			HomeReadySeeder::class,
		]);
    }
}
