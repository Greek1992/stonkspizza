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
        <div style="margin: 20px">
            <img src="{{ asset('img/' . $afbData[$index]) }}" alt="gerelateerde pizza">
            <th>
                <label>Pizza naam:</label>
                {{ $naamData[$index] }}
            </th>
            <th>
                <label>Pizza prijs:</label>
                {{ $prijsData[$index] }}
            </th>
            <th>
                <form method="GET" action="ingredientview">
                    @csrf
                    <input type="hidden" name="aidee" value= {{ $pizzaidData[$index] }}>
                    <button class="ingredientbutton">Ingredienten</button>
                </form>
                <button class="bestelbutton">Bestel online</button>
            </th>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
