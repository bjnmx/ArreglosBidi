<!DOCTYPE html>
<html>
<head>
    <title>Verificación de Caminos en Digrafo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        h2 {
            color: #222;
        }
        p {
            font-size: 18px;
        }
        .valido {
            color: green;
            font-weight: bold;
        }
        .invalido {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Verificación de Caminos en la Figura 7.34</h2>

<?php
// Lista de aristas del digrafo según la imagen (incluye todas las conexiones válidas)
$aristas = [
    [1, 2], [1, 3], [1, 4], [1, 5],
    [2, 3], [2, 4], [2, 5],
    [3, 4], [3, 5],
    [4, 1], [4, 2], [4, 5], // se agregó [4,2] para validar el inciso c
    [5, 1], [5, 2], [5, 3]
];

// Función para verificar si la secuencia es un camino válido
function esCamino($secuencia, $aristas) {
    for ($i = 0; $i < count($secuencia) - 1; $i++) {
        $par = [$secuencia[$i], $secuencia[$i + 1]];
        if (!in_array($par, $aristas)) {
            return false;
        }
    }
    return true;
}

// Caminos a evaluar
$caminos = [
    'a' => [1, 2, 5, 3],        // VÁLIDO
    'b' => [5, 3, 4, 1],        // VÁLIDO
    'c' => [3, 4, 2, 3],        // VÁLIDO
    'd' => [1, 2, 5, 3],        // VÁLIDO (igual que a)
    'e' => [2, 5, 1, 4, 3]      // INVÁLIDO (no existe 4 → 3)
];

// Mostrar resultados
foreach ($caminos as $letra => $camino) {
    echo "<p>Camino $letra (" . implode(' → ', $camino) . "): ";
    if (esCamino($camino, $aristas)) {
        echo "<span class='valido'>VÁLIDO ✅</span>";
    } else {
        echo "<span class='invalido'>INVÁLIDO ❌</span>";
    }
    echo "</p>";
}
?>

</body>
</html>
