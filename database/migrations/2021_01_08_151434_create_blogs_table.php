<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('date_jour');
            $table->string('date_mois_annee');
            $table->string('titre');
            $table->string('auteur');
            $table->text('texte');
            $table->string('photo_profil');
            $table->text('texte_auteur');
            $table->text('fonction');
            $table->text('description');
            $table->boolean('confirmer')->default(false);
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
        Schema::dropIfExists('blogs');
    }
}
