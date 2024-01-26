<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maat;
use App\Models\Ingredient;
use App\Models\Pizza;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use function Laravel\Prompts\alert;

//use DB;

class CustomController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::all();
        $usedIngredientsArray = [];

        $pizzaid = $pizzas->pluck('pizzaid')->map(fn ($value) => substr($value, 0));
        $naam = $pizzas->pluck('naam')->map(fn ($value) => substr($value, 0));
        $prijs = $pizzas->pluck('prijs')->map(fn ($value) => substr($value, 0));
        $afb = $pizzas->pluck('afb')->map(fn ($value) => substr($value, 0));
        $pizzaingredient = $pizzas->pluck('pizzaingredient');

        $maat = Maat::all();
        $maat1 = $maat->pluck('maat')->map(fn ($value) => substr($value, 0));

        $maat = Maat::all();
        $prijsindex = $maat->pluck('prijsindex')->map(fn ($value) => substr($value, 0));

        $ingredienten = Ingredient::all('naam');
        $ingredienten = $ingredienten->map(function ($ingredienten)
        {
            return substr($ingredienten->naam, 0);
        });

        foreach ($pizzas as $pizza)
        {
            $ingredients = Ingredient::select('i.naam as ingredient_name', 'i.prijs as ingredient_price')
                ->join('pizzaingredient as pi', 'pi.ingredientid', '=', 'ingredient.ingredientid')
                ->join('pizza as p', 'p.pizzaingredient', '=', 'pi.pizzaingredient')
                ->join('ingredient as i', 'pi.ingredientid', '=', 'i.ingredientid')
                ->where('p.pizzaid', $pizza->pizzaid)
                ->get();

            $usedIngredientsArrays[$pizza->pizzaid] = $ingredients->pluck('ingredient_name')->toArray();
        }

        return view('pizzastore',
        ['pizzaidData' => $pizzaid,
        'naamData' => $naam,
        'prijsData' => $prijs,
        'afbData' => $afb,
        'pizzaingredientData' => $pizzaingredient,
        'pizzamaatData' => $maat1,
        'pizzamaatindexData' => $prijsindex,
        'allingredientsData' => $ingredienten,
        'usedingredientsData' => $usedIngredientsArrays]);
    }

    public function addfood(Request $request)
    {
        $pizzaidData = $request->query('aidee');
        $pizzaquantityData = $request->query('quantity');
        $pizzasizeData = $request->query('maat');

        $naamData2 = Pizza::where('pizzaid', $pizzaidData)->value('naam');
        $prijsData = Pizza::where('pizzaid', $pizzaidData)->value('prijs');
        $prijsData1 = $prijsData * $pizzasizeData;
        $prijsData2 = $prijsData1 * $pizzaquantityData;
        $prijsData3 = round($prijsData2, 2);

        if ($pizzasizeData == 0.8)
        {
            $pizzasizeData = "klein";
        }
        if ($pizzasizeData == 1)
        {
            $pizzasizeData = "medium";
        }
        if ($pizzasizeData == 1.2)
        {
            $pizzasizeData = "groot";
        }

        $winkelwagenItem = $request->session()->get('winkelwagen', []);
        $winkelwagenItem[] =
        [
            'aantal' => $pizzaquantityData,
            'maat' => $pizzasizeData,
            'naam' => $naamData2,
            'prijs' => $prijsData3,
        ];

        $request->session()->put('winkelwagen', $winkelwagenItem);

        return redirect()->back();
    }

    public function deletefood(Request $request)
    {
        $indexVerwijder = $request->input('index');

        $winkelwagenItem = $request->session()->get('winkelwagen', []);

        if (isset($winkelwagenItem[$indexVerwijder]))
        {
            unset($winkelwagenItem[$indexVerwijder]);
            $winkelwagenItem = array_values($winkelwagenItem);
            $request->session()->put('winkelwagen', $winkelwagenItem);
        }

        return redirect()->back();
    }

    public function inspectpizza(Request $request)
    {
        $inspectpizza = $request->input('aidee');

        $ingredienten = Ingredient::all('naam');
        $ingredienten = $ingredienten->map(function ($ingredienten)
        {
            return substr($ingredienten->naam, 0);
        });

        $ingredients = Ingredient::select('i.naam as ingredient_name', 'i.prijs as ingredient_price')
            ->join('pizzaingredient as pi', 'pi.ingredientid', '=', 'ingredient.ingredientid')
            ->join('pizza as p', 'p.pizzaingredient', '=', 'pi.pizzaingredient')
            ->join('ingredient as i', 'pi.ingredientid', '=', 'i.ingredientid')
            ->where('p.pizzaid', $inspectpizza)
            ->get();

        $usedIngredientsArray = $ingredients->pluck('ingredient_name')->toArray();

        return view('ingredients',
        ['allingredientsData' => $ingredienten,
        'usedingredientsData' => $usedIngredientsArray]);
    }

    public function bestelpizza(Request $request)
    {
        $winkelwagenItem = $request->session()->get('winkelwagen', []);

        foreach ($winkelwagenItem as $item)
        {
            $separateItem =
            [
                'aantal' => $item['aantal'],
                'maat' => $item['maat'],
                'naam' => $item['naam'],
                'prijs' => $item['prijs'],
            ];

            $request->session()->push('bestelwagen', $separateItem);
        }

        return view('bestel');
    }
}
