<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->string('contact')->default('aucun');
            $table->integer('age')->default(0);
            $table->string('pays')->default('aucun');
            $table->string('regnion')->default('aucun');
            $table->string('ville')->default('aucun');
            $table->string('adresse')->default('aucun');
            $table->string('comptence')->default('Developpeur');
            $table->string('font_profil')->default('aucun');
            $table->string('image_profil')->default('default.pgj');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
};
