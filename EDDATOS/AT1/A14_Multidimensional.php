<?php
// Definir dimensiones dentro de los límites dados
$M = rand(1, 10); // Número de filas
$N = rand(1, 20); // Número de columnas

// Función para generar una matriz con valores aleatorios reales
function generarMatriz($M, $N) {
    $matriz = [];
    for ($i = 0; $i < $M; $i++) {
        for ($j = 0; $j < $N; $j++) {
            $matriz[$i][$j] = round((rand(0, 100) / 10), 2); // Números reales con 2 decimales
        }
    }
    return $matriz;
}

// Función para sumar dos matrices
function sumarMatrices($A, $B, $M, $N) {
    $C = [];
    for ($i = 0; $i < $M; $i++) {
        for ($j = 0; $j < $N; $j++) {
            $C[$i][$j] = $A[$i][$j] + $B[$i][$j];
        }
    }
    return $C;
}

// Generamos las matrices A y B
$A = generarMatriz($M, $N);
$B = generarMatriz($M, $N);

// Calculamos la matriz C
$C = sumarMatrices($A, $B, $M, $N);

// Función para imprimir una matriz
function imprimirMatriz($matriz, $nombre) {
    echo "<h3>Matriz $nombre:</h3>";
    echo "<table border='1' cellpadding='5'>";
    foreach ($matriz as $fila) {
        echo "<tr>";
        foreach ($fila as $valor) {
            echo "<td>$valor</td>";
        }
        echo "</tr>";
    }
    echo "</table><br>";
}

// Mostramos las matrices
echo "<h2>Dimensiones: $M x $N</h2>";
imprimirMatriz($A, "A");
imprimirMatriz($B, "B");
imprimirMatriz($C, "C = A + B");
?>

<hmtl>
    <title>Matrices</title>
</hmtl>
