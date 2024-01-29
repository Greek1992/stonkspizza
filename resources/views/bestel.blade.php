<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
</head>
<body style="background-color: goldenrod; margin: 2%; display: flex; flex-direction: column;">
    <header><h1>Stonk's Pizzaria</h1></header>
    <br>
    <div class="buttons1">
        <h1>bestellingen</h1>
    </div>
    <br>
    <div class="bestelmenu">
        <?php
        foreach($bestellingidData as $bestellingindex => $value)
        {
        ?>
            <ul>
                <button class="accordion"><p>Bestelling {{ $bestellingidData[$bestellingindex] }} | Status: {{ $statusData[$bestellingindex] }}</p></button>
                <div class="panel">
                    <li class="bestelmenuitem">
                        <label class="wagenitemitem">Bestelling id: {{ $bestellingidData[$bestellingindex] }}</label>
                        <label class="wagenitemitem">Datum: {{ $datumData[$bestellingindex] }}</label>
                        <label class="wagenitemitem">Klant id: {{ $klantidData[$bestellingindex] }}</label>
                            <?php
                            foreach($pizzaingredientidData as $pizzaingredientidindex => $value)
                            {
                            ?>
                                <label class="wagenitemitem">Ingredient: {{ $pizzaingredientidData[$pizzaingredientidindex] }}</label>
                            <?php
                            }
                            ?>
                        <label class="wagenitemitem">Maat: {{ $maatData[$bestellingindex] }}</label>
                    </li>
                </div>
            </ul>
        <?php
        }
        ?>
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
