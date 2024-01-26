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
        @foreach(session('bestelwagen', []) as $item)
        <ul>
            <button class="accordion"><p>{{ $item['naam'] }}</p></button>
            <div class="panel">
                <li class="bestelmenuitem">
                    <label class="bestelmenuitemitem">{{ $item['aantal'] }}X</label>
                    <label class="bestelmenuitemitem">{{ $item['maat'] }}</label>
                    <label class="bestelmenuitemitem">{{ $item['naam'] }}</label>
                    <label class="bestelmenuitemitem">€{{ $item['prijs'] }}</label>
                </li>
            </div>
        </ul>
        @endforeach
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
