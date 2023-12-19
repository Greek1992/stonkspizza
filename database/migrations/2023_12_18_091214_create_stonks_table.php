<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Klant', function (Blueprint $table)
        {
            $table->id('klantid');
            $table->string('naam');
            $table->string('adres');
            $table->string('woonplaats');
            $table->integer('telefoonnummer');
            $table->string('emailadress');
        });

        Schema::create('Bestelling', function (Blueprint $table)
        {
            $table->id('bestellingid');
            $table->date('datum');
            $table->integer('klantid');
            $table->string('maat');
            $table->integer('pizzaid');
            $table->integer('ingredientid');
        });

        Schema::create('Pizza', function (Blueprint $table)
        {
            $table->id('pizzaid');
            $table->string('naam');
            $table->integer('prijs');
            $table->integer('ingredientid');
        });

        Schema::create('Ingredient', function (Blueprint $table)
        {
            $table->id('ingredientid');
            $table->string('naam');
            $table->integer('prijs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stonks');
    }
};
