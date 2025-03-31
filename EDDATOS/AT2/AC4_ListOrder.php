<?php
function mezclarListas($lista1, $lista2) {
    $mezcla = array_merge($lista1, $lista2);
    sort($mezcla);
    return $mezcla;
}

$resultado = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lista1 = array_map('trim', explode(',', $_POST["lista1"]));
    $lista2 = array_map('trim', explode(',', $_POST["lista2"]));

    $resultado = mezclarListas($lista1, $lista2);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mezcla de Listas Ordenadas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #f4f4f4;
            padding: 20px;
        }
        .contenedor {
            width: 350px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        input {
            width: 80%;
            padding: 8px;
            margin: 5px 0;
        }
        button {
            padding: 10px;
            border: none;
            background: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        .resultado {
            margin-top: 10px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

<h2>Mezcla de Dos Listas Ordenadas</h2>

<div class="contenedor">
    <form method="POST">
        <label>Lista 1 (valores separados por comas):</label>
        <input type="text" name="lista1" required><br>

        <label>Lista 2 (valores separados por comas):</label>
        <input type="text" name="lista2" required>

        <button type="submit">Mezclar Listas</button>
    </form>

    <?php if (!empty($resultado)): ?>
        <div class="resultado">
            <h3>Lista Mezclada Ordenada:</h3>
            <p><?php echo implode(", ", $resultado); ?></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
