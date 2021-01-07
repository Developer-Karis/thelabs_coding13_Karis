<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('para');
            $table->string('mini_title');
            $table->string('address');
            $table->string('postcode');
            $table->string('phone_number');
            $table->string('website');
            $table->string('buttonForm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_contacts');
    }
}
