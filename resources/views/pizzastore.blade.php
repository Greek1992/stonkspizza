<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
</head>
<body>
    <header><h1>Stonk's Pizzaria</h1></header>
    <div class="buttons1">
        <button class="buttons2">Account maken</button>
        <br>
        <button class="buttons2">Inloggen</button>
        <br>
        <button class="buttons2" onclick="window.location='{{ url('/pizzastore') }}'">Pizza bestellen</button>
    </div>
</body>
</html>
