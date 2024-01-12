<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
</head>
<body>
    <header><h1>Stonk's Pizzaria</h1></header>
    <br>
    <div class="buttons1">
        <button class="buttons2">Account maken</button>
        <br>
        <button class="buttons2">Inloggen</button>
        <br>
        <button class="buttons2" onclick="window.location='{{ url('/pizzastore') }}'">Pizza bestellen</button>
    </div>
    <img style="grid-row: 6 / 10;" src="{{ asset('img/pizza.jpg') }}" alt="pizzaria">
    <img style="grid-row: 7 / 10;" src="{{ asset('img/pizza1.jpg') }}" alt="pizzaria">
</body>
</html>
