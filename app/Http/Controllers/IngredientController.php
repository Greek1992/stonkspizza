<?php
// IngredientController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IngredientController extends Controller
{
    public function saveIngredients(Request $request)
    {
        // Valideer het ingediende formulier
        $request->validate([
            'ingredients' => 'array', 
            'ingredients.*' => 'string', 
        ]);

        // Haal de geselecteerde ingrediënten op uit het ingediende formulier
        $selectedIngredients = $request->input('ingredients', []);

        // Sla de geselecteerde ingrediënten op in de sessie
        Session::put('selectedIngredients', $selectedIngredients);

        // Stuur een redirect terug naar de vorige pagina met een succesmelding
        return redirect()->back()->with('success', 'Ingrediënten zijn succesvol opgeslagen!');
    }
}



