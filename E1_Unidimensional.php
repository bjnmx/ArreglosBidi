<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas de Cosecha</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .container { width: 50%; margin: auto; }
        .result { margin-top: 20px; padding: 10px; background: #f4f4f4; }
    </style>
</head>
<body>
<div class="container">
    <h2>Estadísticas de Cosecha Anual</h2>
    <?php
    $cosechas = [120, 150, 180, 200, 90, 130, 170, 160, 140, 110, 100, 190];

    $total = array_sum($cosechas);
    $promedio = $total / count($cosechas);

    $superior = count(array_filter($cosechas, fn($c) => $c > $promedio));
    $inferior = count(array_filter($cosechas, fn($c) => $c < $promedio));
    ?>
    <div class="result">
        <p><strong>Promedio anual de toneladas cosechadas:</strong> <?php echo number_format($promedio, 2); ?> toneladas</p>
        <p><strong>Meses con cosecha superior al promedio:</strong> <?php echo $superior; ?></p>
        <p><strong>Meses con cosecha inferior al promedio:</strong> <?php echo $inferior; ?></p>
    </div>
</div>
</body>
</html>
