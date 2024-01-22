@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: #FFA500;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h2 class="text-center">Geselecteerde Ingrediënten - Pizzeria</h2>
                    </div>
                    <div class="card-body">
                        @if(!is_null($selectedIngredients) && count($selectedIngredients) > 0)
                            <p>Geselecteerde ingrediënten:</p>
                            <ul>
                                @foreach($selectedIngredients as $ingredientId)
                                    @php
                                        $ingredient = \App\Models\Ingredient::find($ingredientId);
                                    @endphp
                                    <li>{{ $ingredient ? $ingredient->naam : 'Onbekend ingrediënt' }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>Geen ingrediënten geselecteerd.</p>
                        @endif

                        <a href="{{ route('ingredients.index') }}" class="btn btn-primary">Terug naar ingrediëntenlijst</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container text-center mt-4" style="font-family: Arial, sans-serif;">
        <h3>Welkom bij Ingrediënten Pizzeria</h3>
        <p>Oprichtingsdatum: {{ now()->year - 5 }} - Kom genieten van onze heerlijke pizza's!</p>
    </div>
@endsection



