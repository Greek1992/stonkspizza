<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
</head>
<body>
    <header><h1>Stonk's Pizzaria</h1></header>
    <nav style="float: left;">
        <ul id="ulmenu">
            <li>
                <a class="bezorgbutton" onclick="window.location='{{ url('/') }}'">Home pagina</a>
            </li>
            <li>
                <a class="bestelbutton" onclick="window.location='{{ url('/bestelfinal') }}'">Mijn bestellingen</a>
            </li>
        </ul>
    </nav>
    <div style="display: flex; justify-content: space-between">
        <div class="pizzamenu">
            <?php
            foreach($pizzaidData as $pizzaidindex => $value)
            {
                $niks = $value;
            ?>
            <div class="pizzamenuitem">
                <img src="{{ asset('img/' . $afbData[$pizzaidindex]) }}" alt="gerelateerde pizza">
                <th>
                    <label>{{ $naamData[$pizzaidindex] }}</label>
                </th>
                <th>
                    <label>€ {{ $prijsData[$pizzaidindex] }}</label>
                </th>
                <div class="ingredientbutton">
                    <?php
                    foreach ($allingredientsData as $ingredientindex => $value)
                    {
                        $ingredient = $allingredientsData[$ingredientindex];
                        $isChecked = in_array($ingredient, $usedingredientsData[$niks]);
                    ?>
                        <div>
                            <label>
                                <input type="checkbox" disabled="disabled" <?php echo $isChecked ? 'checked' : ''; ?>>
                                <?php echo $ingredient; ?>
                            </label>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <th>
                    <form method="GET" action="addfood" class="bestelbutton">
                        <input type="hidden" name="aidee" value= {{ $pizzaidData[$pizzaidindex] }}>
                        <input type="number" name="quantity" style="color:black" placeholder="Hoeveel" required>
                        <select name="maat" style="color:black">
                            <?php
                            foreach ($pizzamaatData as $index => $value)
                            {
                            ?>
                                <option value="{{ $pizzamaatindexData[$index] }}">{{ $pizzamaatData[$index] }}</option>
                            <?php
                            }
                            ?>
                        </select>
                        <button>Voeg toe aan winkelmand</button>
                    </form>
                </th>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="wagenmenu">
            <h1>Bestel menu</h1>
            <ul>
                @foreach(session('winkelwagen', []) as $item)
                    <li class="wagenitem">
                        <label class="wagenitemitem">{{ $item['aantal'] }}X</label>
                        <label class="wagenitemitem">{{ $item['maat'] }}</label>
                        <label class="wagenitemitem">{{ $item['naam'] }}</label>
                        <label class="wagenitemitem">€{{ $item['prijs'] }}</label>
                        <form method="POST" action="{{ url('/deletefood') }}">
                            @csrf
                            <input type="hidden" name="index" value="{{ $loop->index }}">
                            <button type="submit" style="color: red; font-size: x-large">X</button>
                        </form>
                        <form method="GET" action="ingredients">
                            @csrf
                            <input type="hidden" name="aidee" value= {{ $pizzaidData[$index] }}>
                            <button type="submit" style="color: lightseagreen; font-size: x-large">Wijzig</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <h3>Total Price: €{{ array_sum(array_column(session('winkelwagen', []), 'prijs')) }}</h3>
            <form method="GET" action="bestel" class="bezorgbutton">
                @csrf
                @foreach(session('winkelwagen', []) as $index => $item)
                    <input type="hidden" name="items[{{ $index }}][aantal]" value="{{ $item['aantal'] }}">
                    <input type="hidden" name="items[{{ $index }}][maat]" value="{{ $item['maat'] }}">
                    <input type="hidden" name="items[{{ $index }}][naam]" value="{{ $item['naam'] }}">
                    <input type="hidden" name="items[{{ $index }}][prijs]" value="{{ $item['prijs'] }}">
                @endforeach
                <input type="hidden" name="aidee" value="winkelwagen">
                <button>Bezorgen</button>
            </form>

            <button class="bestelbutton" onclick="myFunction()" id="demo">Afhalen</button>
        </div>
    </div>

    <script>
        function myFunction()
        {
          alert("COMING SOON!");
        }
    </script>
</body>
</html>
