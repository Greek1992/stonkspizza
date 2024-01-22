@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: #FFA500;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center">Ingrediënten Pizzeria</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('ingredients.order') }}">
                            @csrf

                            @foreach ($ingredients as $ingredient)
                                <div class="mb-3">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}"> {{ $ingredient->naam }}
                                    </label>
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-success">Toon geselecteerde ingrediënten</button>
                        </form>
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



