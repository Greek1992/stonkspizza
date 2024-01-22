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
        $pizzaid = Pizza::all('pizzaid');
        $pizzaid = $pizzaid->map(function ($pizzaid)
        {
            return substr($pizzaid->pizzaid, 0);
        });
        $naam = Pizza::all('naam');
        $naam = $naam->map(function ($naam)
        {
            return substr($naam->naam, 0);
        });
        $prijs = Pizza::all('prijs');
        $prijs = $prijs->map(function ($prijs)
        {
            return substr($prijs->prijs, 0);
        });
        $afb = Pizza::all('afb');
        $afb = $afb->map(function ($afb)
        {
            return substr($afb->afb, 0);
        });
        $pizzaingredient = Pizza::all('pizzaingredient');

        $maat = Maat::all('maat');
        $maat = $maat->map(function ($maat)
        {
            return substr($maat->maat, 0);
        });
        $prijsindex = Maat::all('prijsindex');
        $prijsindex = $prijsindex->map(function ($prijsindex)
        {
            return substr($prijsindex->prijsindex, 0);
        });

        return view('pizzastore', ['pizzaidData' => $pizzaid, 'naamData' => $naam, 'prijsData' => $prijs,
        'afbData' => $afb, 'pizzaingredientData' => $pizzaingredient, 'pizzamaatData' => $maat, 'pizzamaatindexData' => $prijsindex]);
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

        return view('ingredients', ['allingredientsData' => $ingredienten, 'usedingredientsData' => $usedIngredientsArray]);
    }
}
