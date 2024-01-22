@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: #FFA500;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        <h2 class="text-center">Ingrediënt Details - Pizzeria</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Naam:</strong> {{ $ingredient->naam }}</p>
                        <p><strong>Beschrijving:</strong> {{ $ingredient->description }}</p>
                        <p><strong>Prijs:</strong> {{ $ingredient->prijs }}</p>
                        <p><strong>Aangemaakt op:</strong> {{ $ingredient->created_at }}</p>
                        <p><strong>Bijgewerkt op:</strong> {{ $ingredient->updated_at }}</p>

                        <a href="{{ route('ingredients.index') }}" class="btn btn-primary">Terug naar ingrediëntenlijst</a>
                        <a href="{{ route('ingredients.edit', $ingredient) }}" class="btn btn-warning">Bewerken</a>
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
