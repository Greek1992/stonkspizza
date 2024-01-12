<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
</head>
<body>
    <header><h1>Stonk's Pizzaria</h1></header>
    <div class="pizzamenu">
        <?php
        foreach($pizzaidData as $index => $value)
        {
        ?>
        <div style="margin: 20px; display: flex; flex-direction: column">
            <img src="{{ asset('img/' . $afbData[$index]) }}" alt="gerelateerde pizza">
            <th>
                <label>{{ $naamData[$index] }}</label>
            </th>
            <th>
                <label>€ {{ $prijsData[$index] }}</label>
            </th>
            <th>
                <form method="GET" action="ingredientview" class="ingredientbutton">
                    <input type="hidden" name="aidee" value= {{ $pizzaidData[$index] }}>
                    <button>Ingredienten</button>
                </form>
                <form method="GET" action="addfood" class="bestelbutton">
                    <input type="hidden" name="aidee" value= {{ $pizzaidData[$index] }}>
                    <button>Voeg toe aan winkelmand</button>
                </form>
            </th>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="bestelmenu">
        <h1>Bestel menu</h1>
        <div>

        </div>
        <div>
            <label>Totaal:</label>
        </div>
        <button class="ingredientbutton">Bezorgen</button>
        <button class="bestelbutton">Afhalen</button>
    </div>
</body>
</html>
