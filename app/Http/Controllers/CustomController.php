<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use Illuminate\Support\Facades\DB;
//use DB;

class CustomController extends Controller
{
    public function index()
    {
        $pizzaid = Pizza::all('pizzaid');
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
}
