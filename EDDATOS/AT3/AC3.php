<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Camino Interno y Externo - Árbol Dewey</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 30px; }
        .resultados { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 5px #ccc; }
        h2 { color: #2c3e50; }
    </style>
</head>
<body>

<h1>📘 Ejercicio 3 - Longitudes del Camino Interno y Externo</h1>

<?php
// Nodos dados en notación de Dewey
$nodos = [
    "1.A", "1.1.B", "1.1.1.D", "1.1.2.E", "1.1.2.1.I", "1.1.2.2.J",
    "1.1.3.F", "1.1.4.G", "1.1.4.1.K", "1.1.4.1.1.M", "1.1.4.1.2.N",
    "1.2.C", "1.2.1.H", "1.2.1.1.L"
];

// Convertir a estructura [clave => profundidad]
$estructura = [];
foreach ($nodos as $nodo) {
    $partes = explode('.', $nodo);
    $etiqueta = array_pop($partes); // letra
    $clave = implode('.', $partes);
    $estructura[$nodo] = count($partes); // profundidad
}

// Determinar cuáles son hojas (no tienen nodos hijos)
$hojas = [];
$internos = [];

foreach ($estructura as $nodo => $profundidad) {
    $esPadre = false;
    foreach ($estructura as $otroNodo => $_) {
        if ($nodo !== $otroNodo && str_starts_with($otroNodo, $nodo . '.')) {
            $esPadre = true;
            break;
        }
    }
    if ($esPadre) {
        $internos[] = $nodo;
    } else {
        $hojas[] = $nodo;
    }
}

// Calcular longitudes
$longitudInterna = 0;
foreach ($internos as $nodo) {
    $longitudInterna += $estructura[$nodo];
}

$longitudExterna = 0;
foreach ($hojas as $nodo) {
    $longitudExterna += $estructura[$nodo];
}

?>

<div class="resultados">
    <h2>📌 Resultados:</h2>
    <p><strong>✔️ Nodos internos:</strong> <?= implode(', ', $internos) ?></p>
    <p><strong>✔️ Nodos hoja:</strong> <?= implode(', ', $hojas) ?></p>
    <p><strong>📏 Longitud del camino interno:</strong> <?= $longitudInterna ?></p>
    <p><strong>📏 Longitud del camino externo:</strong> <?= $longitudExterna ?></p>
</div>

</body>
</html>
