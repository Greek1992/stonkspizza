<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
    <style>
        .save-button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        .back-button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
            display: inline-block; 
            text-align: center; 
            width: auto; 
        }

        .back-button:hover {
            background-color: rgb(205, 98, 22); 
        }
    </style>
</head>
<body>
    <header><h1>Stonk's Pizzaria</h1></header>
    
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="pizzamenu">
        <form method="POST" action="{{ route('save.ingredients') }}">
            @csrf
            @foreach ($allingredientsData as $index => $value)
                <?php
                $ingredient = $allingredientsData[$index];
                $isChecked = in_array($ingredient, session('selectedIngredients', []));
                ?>
                <div class="pizzamenuitem">
                    <label>
                        <input type="checkbox" name="ingredients[]" value="{{ $ingredient }}" {{ $isChecked ? 'checked' : '' }}>
                        {{ $ingredient }}
                    </label>
                </div>
            @endforeach
            <button type="submit" class="save-button">Opslaan</button>
        </form>
        
    </div>
    <div style="text-align: center;"> 
        <a href="{{ url('/pizzastore') }}" class="button back-button">Terug naar Pizza Store</a>
    </div>
</body>
</html>









