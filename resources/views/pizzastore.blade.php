<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
</head>
<body>
    <header><h1>Stonk's Pizzaria</h1></header>
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
                <div>
                    <?php
                    foreach ($allingredientsData as $ingredientindex => $value)
                    {

                        $ingredient = $allingredientsData[$ingredientindex];
                        $isChecked = in_array($ingredient, $usedingredientsData[$niks]);
                    ?>
                        <div>
                            <label>
                                <input type="checkbox" <?php echo $isChecked ? 'checked' : ''; ?>>
                                <?php echo $ingredient; ?>
                            </label>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                {{-- <th>
                    <form method="GET" action="addfood" class="bestelbutton">
                        <input type="hidden" name="aidee" value= {{ $pizzaidData[$index] }}>
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
                </th> --}}
            </div>
            <?php
            }
            ?>
        </div>
        <div class="bestelmenu">
            <h1>Bestel menu</h1>
            <ul>
                @foreach(session('winkelwagen', []) as $item)
                    <li class="bestelmenuitem">
                        <label>{{ $item['aantal'] }}X</label>
                        <label>{{ $item['maat'] }}</label>
                        <label>{{ $item['naam'] }}</label>
                        <label>€{{ $item['prijs'] }}</label>
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
            <button class="ingredientbutton">Bezorgen</button>
            <button class="bestelbutton">Afhalen</button>
        </div>
    </div>

    <button class="accordion">Waar neemt het evenement plaats?</button>
    <div class="panel">
        <p>Het neemt plaats in Utrecht tussen 15 en 30 oktober</p>
    </div>
</body>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++)
    {
        acc[i].addEventListener("click", function()
        {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block")
            {
            panel.style.display = "none";
            }
            else
            {
            panel.style.display = "block";
            }
        });
    }
</script>
</html>
