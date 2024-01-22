<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\Pizza;
use App\Models\PizzaIngredient;

class IngredientController extends Controller
{
    public function index()
    {
        // $pizzaidData= $_GET['aidee'];
        $pizzaidData= "3";
        $ingredients = Ingredient::select('i.naam as ingredient_name', 'i.prijs as ingredient_price')
        ->join('pizzaingredient as pi', 'pi.ingredientid', '=', 'ingredient.ingredientid')
        ->join('pizza as p', 'p.pizzaingredient', '=', 'pi.pizzaingredient')
        ->join('ingredient as i', 'pi.ingredientid', '=', 'i.ingredientid')
        ->where('p.pizzaid', $pizzaidData)
        ->get();

        dd($pizzaidData, $ingredients);

        $ingredients = Ingredient::all();
        return view('layouts.ingredients.index', compact('ingredients'));
    }

    public function show(Ingredient $ingredient)
    {
        return view('ingredients.show', compact('ingredient'));
    }

    public function order(Request $request)
    {
        $selectedIngredients = (array)$request->input('ingredients');

        return view('ingredients.selected', compact('selectedIngredients'));
    }
}
