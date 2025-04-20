<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>🔍 Búsqueda de Nombre en Lista</title>
    <style>
        body { font-family: Arial, sans-serif; background: #eef2f3; padding: 40px; }
        .card { background: #fff; padding: 30px; border-radius: 12px; max-width: 600px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #2e7d32; text-align: center; }
        label, textarea, input, button { display: block; width: 100%; margin-top: 15px; font-size: 16px; }
        .resultado { margin-top: 25px; padding: 15px; background: #f0f4c3; border-radius: 6px; font-weight: bold; color: #33691e; }
    </style>
</head>
<body>
<div class="card">
    <h1>🔍 Buscar Nombre en Arreglo</h1>

    <form method="post">
        <label for="lista">📝 Nombres ordenados (separados por coma):</label>
        <textarea name="lista" id="lista" rows="4" required><?= $_POST['lista'] ?? '' ?></textarea>

        <label for="buscar">🔎 Nombre a buscar:</label>
        <input type="text" name="buscar" id="buscar" value="<?= $_POST['buscar'] ?? '' ?>" required>

        <button type="submit">Buscar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $lista = array_map('trim', explode(',', $_POST['lista']));
        $buscar = trim($_POST['buscar']);

        // Normalizamos para búsqueda insensible a mayúsculas
        $listaLower = array_map('mb_strtolower', $lista);
        $buscarLower = mb_strtolower($buscar);

        $pos = array_search($buscarLower, $listaLower);

        echo "<div class='resultado'>";
        if ($pos !== false) {
            echo "✅ El nombre <strong>$buscar</strong> se encontró en la posición <strong>$pos</strong> del arreglo.";
        } else {
            echo "❌ El nombre <strong>$buscar</strong> no se encuentra en la lista.";
        }
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
