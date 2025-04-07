<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 1 - Capítulo 7: Gráficas</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1, h2 { color: #333366; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 30px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .graficas { font-weight: bold; }
    </style>
</head>
<body>

<h1>Ejercicio 1 - Capítulo 7: Gráficas</h1>
<h2>Resolución para las gráficas de la figura 7.29</h2>

<?php
$graficas = [
    "a" => [
        "conectada" => true,
        "ciclica" => false,
        "conexa" => true,
        "completa" => false,
        "adyacentes" => ["a-b", "a-d", "b-c"],
        "camino_a_c" => true,
        "camino_cerrado" => false,
        "camino_simple" => true,
        "grado" => ["a" => 2, "b" => 2, "c" => 1, "d" => 1]
    ],
    "b" => [
        "conectada" => true,
        "ciclica" => true,
        "conexa" => true,
        "completa" => true,
        "adyacentes" => ["a-b", "a-c", "a-d", "b-c", "b-d", "c-d"],
        "camino_a_c" => true,
        "camino_cerrado" => true,
        "camino_simple" => true,
        "grado" => ["a" => 3, "b" => 3, "c" => 3, "d" => 3]
    ],
    "c" => [
        "conectada" => true,
        "ciclica" => true,
        "conexa" => true,
        "completa" => false,
        "adyacentes" => ["a-b", "b-c", "c-d", "d-a"],
        "camino_a_c" => true,
        "camino_cerrado" => true,
        "camino_simple" => true,
        "grado" => ["a" => 2, "b" => 2, "c" => 2, "d" => 2]
    ],
    "d" => [
        "conectada" => false,
        "ciclica" => false,
        "conexa" => false,
        "completa" => false,
        "adyacentes" => ["a-b", "b-d", "c-d"],
        "camino_a_c" => false,
        "camino_cerrado" => false,
        "camino_simple" => false,
        "grado" => ["a" => 1, "b" => 2, "c" => 1, "d" => 2]
    ]
];

function mostrarBool($valor) {
    return $valor ? "Sí" : "No";
}

echo "<table>";
echo "<tr><th>Inciso</th><th>Gráfica a</th><th>Gráfica b</th><th>Gráfica c</th><th>Gráfica d</th></tr>";

echo "<tr><td class='graficas'>a) Conectada</td>";
foreach ($graficas as $g) echo "<td>" . mostrarBool($g["conectada"]) . "</td>";
echo "</tr>";

echo "<tr><td class='graficas'>b) Cíclica</td>";
foreach ($graficas as $g) echo "<td>" . mostrarBool($g["ciclica"]) . "</td>";
echo "</tr>";

echo "<tr><td class='graficas'>c) Conexa</td>";
foreach ($graficas as $g) echo "<td>" . mostrarBool($g["conexa"]) . "</td>";
echo "</tr>";

echo "<tr><td class='graficas'>d) Completa</td>";
foreach ($graficas as $g) echo "<td>" . mostrarBool($g["completa"]) . "</td>";
echo "</tr>";

echo "<tr><td class='graficas'>e) Pares adyacentes</td>";
foreach ($graficas as $g) echo "<td>" . implode(", ", $g["adyacentes"]) . "</td>";
echo "</tr>";

echo "<tr><td class='graficas'>f) Camino entre a y c</td>";
foreach ($graficas as $g) echo "<td>" . mostrarBool($g["camino_a_c"]) . "</td>";
echo "</tr>";

echo "<tr><td class='graficas'>g) Camino cerrado (circuito)</td>";
foreach ($graficas as $g) echo "<td>" . mostrarBool($g["camino_cerrado"]) . "</td>";
echo "</tr>";

echo "<tr><td class='graficas'>h) Camino simple entre todos</td>";
foreach ($graficas as $g) echo "<td>" . mostrarBool($g["camino_simple"]) . "</td>";
echo "</tr>";

echo "<tr><td class='graficas'>i) Grado de cada vértice</td>";
foreach ($graficas as $g) {
    $grados = [];
    foreach ($g["grado"] as $vertice => $grado) {
        $grados[] = "$vertice: $grado";
    }
    echo "<td>" . implode("<br>", $grados) . "</td>";
}
echo "</tr>";

echo "</table>";
?>

</body>
</html>
