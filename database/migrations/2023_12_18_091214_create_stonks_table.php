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
            $table->id('klantid')->unsigned();
            $table->string('naam');
            $table->string('adres');
            $table->string('woonplaats');
            $table->integer('telefoonnummer');
            $table->string('emailadress');
        });

        Schema::create('Ingredient', function (Blueprint $table)
        {
            $table->id('ingredientid')->unsigned();
            $table->string('naam');
            $table->integer('prijs');
        });

        Schema::create('Bestelling', function (Blueprint $table)
        {
            $table->id('bestellingid');
            $table->date('datum');
            $table->foreignId('klantid')->index()->references('klantid')->on('Klant');
            $table->foreignId('pizzaingredientid')->index()->references('pizzaingredientid')->on('PizzaIngredient');
        });

        Schema::create('Pizza', function (Blueprint $table)
        {
            $table->id('pizzaid')->unsigned();
            $table->string('naam');
            $table->integer('prijs');
            $table->foreignId('pizzaingredientid')->index()->references('pizzaingredientid')->on('PizzaIngredient');

        });

        Schema::create('PizzaIngredient', function (Blueprint $table)
        {
            $table->id('pizzaingredientid')->unsigned();
            $table->string('maat');
            $table->foreignId('ingredientid')->index()->references('ingredientid')->on('Ingredient');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Klant');
        Schema::dropIfExists('Bestelling');
        Schema::dropIfExists('Pizza');
        Schema::dropIfExists('PizzaIngredient');
        Schema::dropIfExists('Ingredient');
    }
};
