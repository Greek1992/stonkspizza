<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
</head>
<body>
    <header><h1>Stonk's Pizzaria</h1></header>
    <div class="pizzamenu">
        <table>
            <?php
            foreach($pizzaidData as $index => $value)
            {
            ?>
            <tr>
                <th>
                    <label>Pizza naam:</label>
                    {{ $naamData[$index] }}
                </th>
                <th>
                    <label>Pizza prijs:</label>
                    {{ $prijsData[$index] }}
                </th>
                <img src="{{ asset('img/' . $afbData[$index]) }}" alt="gerelateerde pizza">
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
