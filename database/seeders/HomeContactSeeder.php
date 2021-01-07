<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_contacts')->insert([
            'title' => 'CONTACT US',
            'para' => 'Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. 
            Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum.',
            'mini_title' => 'Main Office',
            'address' => 'C/ Libertad, 34',
            'postcode' => '05200 Arévalo',
            'phone_number' => '0034 37483 2445 322',
            'website' => 'hello@company.com',
            'buttonForm' => 'SEND'
        ]);
    }
}
