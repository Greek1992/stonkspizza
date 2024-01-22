<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Laravel App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Voeg hier eventuele extra stylesheets toe -->
</head>
<body>

    <div id="app">
        @yield('content')
    </div>

</body>
</html>
