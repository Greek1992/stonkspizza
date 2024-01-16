<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return view('pizzastore', ['pizzaidData' => $pizzaid, 'naamData' => $naam, 'prijsData' => $prijs,
        'afbData' => $afb, 'pizzaingredientData' => $pizzaingredient]);
    }

    public function addfood(Request $request)
    {
        $pizzaidData = $request->query('aidee');

        $naamData2 = Pizza::where('pizzaid', $pizzaidData)->value('naam');
        $prijsData2 = Pizza::where('pizzaid', $pizzaidData)->value('prijs');

        $winkelwagenItem = $request->session()->get('winkelwagen', []);
        $winkelwagenItem[] =
        [
            'naam' => $naamData2,
            'prijs' => $prijsData2,
        ];

        $aantalData = 0;
        if ($aantalData == 0)
        {
            $aantalData = 1;
            dd($aantalData);
        }

        $request->session()->put('winkelwagen', $winkelwagenItem);

        return redirect()->back()->with(['naamData2' => $naamData2, 'prijsData2' => $prijsData2]);
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
}
