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
        <button class="buttons2"><a href="{{ route('register') }}">Account maken</a></button>
        <br>
        <button class="buttons2"><a href="{{ route('login') }}">Inloggen</a></button>
        <br>
        <button class="buttons2" onclick="window.location='{{ url('/pizzastore') }}'">Pizza bestellen</button>
    </div>
    <br>
    <div style="display: flex; justify-content: space-evenly">
        <img src="{{ asset('img/pizza.jpg') }}" alt="pizzaria">
        <img src="{{ asset('img/pizza1.jpg') }}" alt="pizzaria">
    </div>
</body>
</html>
