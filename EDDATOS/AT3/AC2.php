<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Árbol Binario - Ejercicio</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .resultado { background: #f0f0f0; padding: 15px; border-radius: 10px; margin-top: 20px; }
        h2 { color: #3a6ea5; }
    </style>
</head>
<body>

<h1>🌳 Análisis de Árbol</h1>

<?php

// Representación simplificada del árbol en forma de nodos con hijos
$arbol = [
    "A" => ["B", "C", "D"],
    "B" => ["E", "F"],
    "E" => ["K"],
    "F" => [],
    "K" => [],
    "C" => ["G"],
    "G" => ["L", "M"],
    "L" => [],
    "M" => ["N"],
    "N" => [],
    "D" => ["H", "I", "O", "P", "Q", "R", "J"],
    "H" => [], "I" => [], "O" => [], "P" => [], "Q" => [], "R" => [], "J" => []
];

// Función para encontrar el grado del árbol (máximo número de hijos de cualquier nodo)
function gradoArbol($arbol) {
    $max = 0;
    foreach ($arbol as $hijos) {
        $max = max($max, count($hijos));
    }
    return $max;
}

// Función para encontrar el grado de un nodo específico
function gradoNodo($arbol, $nodo) {
    return isset($arbol[$nodo]) ? count($arbol[$nodo]) : 0;
}

// Función para calcular la altura del árbol
function alturaArbol($arbol, $nodo) {
    if (empty($arbol[$nodo])) return 1;
    $alturas = [];
    foreach ($arbol[$nodo] as $hijo) {
        $alturas[] = alturaArbol($arbol, $hijo);
    }
    return 1 + max($alturas);
}

// Función para obtener hojas (nodos sin hijos)
function obtenerHojas($arbol) {
    $hojas = [];
    foreach ($arbol as $nodo => $hijos) {
        if (empty($hijos)) $hojas[] = $nodo;
    }
    return $hojas;
}

// Función para obtener nodos interiores (con al menos un hijo)
function nodosInteriores($arbol) {
    $interiores = [];
    foreach ($arbol as $nodo => $hijos) {
        if (!empty($hijos)) $interiores[] = $nodo;
    }
    return $interiores;
}

// Cálculos
$grado = gradoArbol($arbol);
$gradoG = gradoNodo($arbol, "G");
$altura = alturaArbol($arbol, "A");
$hojas = obtenerHojas($arbol);
$interiores = nodosInteriores($arbol);

?>

<div class="resultado">
    <h2>📌 Resultados del Árbol</h2>
    <p><strong>Grado del árbol:</strong> <?= $grado ?></p>
    <p><strong>Grado del nodo G:</strong> <?= $gradoG ?></p>
    <p><strong>Altura del árbol:</strong> <?= $altura ?></p>
    <p><strong>Nodos terminales (hojas):</strong> <?= implode(", ", $hojas) ?></p>
    <p><strong>Nodos interiores:</strong> <?= implode(", ", $interiores) ?></p>
</div>

</body>
</html>
