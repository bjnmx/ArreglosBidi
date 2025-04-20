<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>🌀 Visualizador de Ordenación</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 40px; }
        .contenedor { background: white; padding: 30px; max-width: 600px; margin: auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.2); }
        h1 { text-align: center; color: #2e7d32; }
        label, textarea, select, button { display: block; width: 100%; margin-top: 15px; font-size: 16px; }
        .resultado { margin-top: 25px; padding: 15px; background: #e0f2f1; border-radius: 6px; font-weight: bold; color: #004d40; }
    </style>
</head>
<body>
<div class="contenedor">
    <h1>🌀 Visualizador de Ordenación</h1>

    <form method="post">
        <label for="input">🔠 Ingresa apellidos separados por comas:</label>
        <textarea name="input" id="input" rows="4" required><?= $_POST['input'] ?? '' ?></textarea>

        <label for="metodo">⚙️ Selecciona el método de ordenación:</label>
        <select name="metodo" id="metodo" required>
            <option value="burbuja" <?= ($_POST['metodo'] ?? '') === 'burbuja' ? 'selected' : '' ?>>Burbuja</option>
            <option value="burbuja_senal" <?= ($_POST['metodo'] ?? '') === 'burbuja_senal' ? 'selected' : '' ?>>Burbuja con señal</option>
            <option value="shakersort" <?= ($_POST['metodo'] ?? '') === 'shakersort' ? 'selected' : '' ?>>ShakerSort</option>
        </select>

        <button type="submit">🧪 Ordenar</button>
    </form>


    <?php

    function burbujaClasica(&$arr) {
        $n = count($arr);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if (strcasecmp($arr[$j], $arr[$j + 1]) > 0) {
                    $tmp = $arr[$j]; $arr[$j] = $arr[$j + 1]; $arr[$j + 1] = $tmp;
                }
            }
        }
    }

    function burbujaConSenal(&$arr) {
        $n = count($arr); $cambio = true;
        for ($i = 0; $i < $n - 1 && $cambio; $i++) {
            $cambio = false;
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if (strcasecmp($arr[$j], $arr[$j + 1]) > 0) {
                    $tmp = $arr[$j]; $arr[$j] = $arr[$j + 1]; $arr[$j + 1] = $tmp;
                    $cambio = true;
                }
            }
        }
    }

    function shakerSort(&$arr) {
        $inicio = 0; $fin = count($arr) - 1; $cambio = true;
        while ($inicio < $fin && $cambio) {
            $cambio = false;
            for ($i = $inicio; $i < $fin; $i++) {
                if (strcasecmp($arr[$i], $arr[$i + 1]) > 0) {
                    $tmp = $arr[$i]; $arr[$i] = $arr[$i + 1]; $arr[$i + 1] = $tmp;
                    $cambio = true;
                }
            }
            $fin--;
            for ($i = $fin; $i > $inicio; $i--) {
                if (strcasecmp($arr[$i - 1], $arr[$i]) > 0) {
                    $tmp = $arr[$i]; $arr[$i] = $arr[$i - 1]; $arr[$i - 1] = $tmp;
                    $cambio = true;
                }
            }
            $inicio++;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = $_POST['input'];
        $metodo = $_POST['metodo'];
        $apellidos = array_map('trim', explode(',', $input));

        $start = microtime(true); // 🕒 INICIO DE TIEMPO

        switch ($metodo) {
            case 'burbuja': burbujaClasica($apellidos); break;
            case 'burbuja_senal': burbujaConSenal($apellidos); break;
            case 'shakersort': shakerSort($apellidos); break;
        }

        $end = microtime(true); // 🕒 FIN DE TIEMPO
        $tiempo = $end - $start; // ⏱️ DIFERENCIA EN SEGUNDOS

        echo "<div class='resultado'>🔄 Resultado ordenado: <br>" . implode(', ', $apellidos) . "</div>";
        echo "<p class='resultado'>⏱️ Tardó: " . number_format($tiempo, 6) . " segundos en ordenar.</p>";

    }
    ?>

</div>
</body>
</html>

