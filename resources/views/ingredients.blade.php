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
        foreach ($allingredientsData as $index => $value)
        {
            $ingredient = $allingredientsData[$index];
            $isChecked = in_array($ingredient, $usedingredientsData);
        ?>
            <div class="pizzamenuitem">
                <label>
                    <input type="checkbox" <?php echo $isChecked ? 'checked' : ''; ?>>
                    <?php echo $ingredient; ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
