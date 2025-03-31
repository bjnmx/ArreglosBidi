<?php
// Definir el arreglo de profesores con nombre, sexo y edad
$profesores = [
    ["nombre" => "Juan", "sexo" => "M", "edad" => 45],
    ["nombre" => "Ana", "sexo" => "F", "edad" => 38],
    ["nombre" => "Carlos", "sexo" => "M", "edad" => 29],
    ["nombre" => "María", "sexo" => "F", "edad" => 50],
    ["nombre" => "Luis", "sexo" => "M", "edad" => 33],
    ["nombre" => "Sofía", "sexo" => "F", "edad" => 41],
];

// a) Calcular la edad promedio del grupo
$sumaEdades = 0;
$totalProfesores = count($profesores);
foreach ($profesores as $profesor) {
    $sumaEdades += $profesor["edad"];
}
$edadPromedio = $sumaEdades / $totalProfesores;

// b) Encontrar el profesor más joven
$profesorMasJoven = $profesores[0];
foreach ($profesores as $profesor) {
    if ($profesor["edad"] < $profesorMasJoven["edad"]) {
        $profesorMasJoven = $profesor;
    }
}

// c) Encontrar el profesor de mayor edad
$profesorMayorEdad = $profesores[0];
foreach ($profesores as $profesor) {
    if ($profesor["edad"] > $profesorMayorEdad["edad"]) {
        $profesorMayorEdad = $profesor;
    }
}

// d) Contar el número de profesoras con edad mayor al promedio
$profesorasMayorPromedio = 0;
foreach ($profesores as $profesor) {
    if ($profesor["sexo"] === "F" && $profesor["edad"] > $edadPromedio) {
        $profesorasMayorPromedio++;
    }
}

// e) Contar el número de profesores con edad menor al promedio
$profesoresMenorPromedio = 0;
foreach ($profesores as $profesor) {
    if ($profesor["edad"] < $edadPromedio) {
        $profesoresMenorPromedio++;
    }
}

// Mostrar los resultados
echo "<h2>Resultados:</h2>";
echo "<p><strong>a)</strong> Edad promedio del grupo: " . number_format($edadPromedio, 2) . " años</p>";
echo "<p><strong>b)</strong> Profesor más joven: " . $profesorMasJoven["nombre"] . " ({$profesorMasJoven['edad']} años)</p>";
echo "<p><strong>c)</strong> Profesor con más edad: " . $profesorMayorEdad["nombre"] . " ({$profesorMayorEdad['edad']} años)</p>";
echo "<p><strong>d)</strong> Número de profesoras con edad mayor al promedio: $profesorasMayorPromedio</p>";
echo "<p><strong>e)</strong> Número de profesores con edad menor al promedio: $profesoresMenorPromedio</p>";
?>
<hmtl>
<title>Departamento_Multidimensional</title>
</hmtl>