<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Análisis de Gráficas</title>
    <style>
        body { font-family: sans-serif; }
        .graph-container { display: inline-block; margin: 10px; border: 1px solid #ccc; padding: 10px; }
        .result-container { margin-top: 20px; border: 1px solid #eee; padding: 10px; }
        .result-container h3 { margin-top: 0; }
        .graph { position: relative; width: 100px; height: 100px; }
        .node {
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: yellow;
            border: 1px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.8em;
        }
        .edge {
            position: absolute;
            height: 2px;
            background-color: black;
        }
        /* Posiciones de los nodos para cada gráfica (ajustar según sea necesario) */
        .graph-a .node-a { top: 10px; left: 10px; }
        .graph-a .node-b { top: 10px; left: 70px; }
        .graph-a .node-c { top: 70px; left: 40px; }
        .graph-a .node-d { top: 70px; left: 10px; }

        .graph-b .node-a { top: 10px; left: 10px; }
        .graph-b .node-b { top: 10px; left: 70px; }
        .graph-b .node-c { top: 70px; left: 10px; }
        .graph-b .node-d { top: 70px; left: 70px; }
        .graph-b .node-e { top: 40px; left: 40px; }

        .graph-c .node-a { top: 10px; left: 10px; }
        .graph-c .node-b { top: 10px; left: 70px; }
        .graph-c .node-c { top: 70px; left: 70px; }
        .graph-c .node-d { top: 70px; left: 10px; }

        .graph-d .node-a { top: 10px; left: 10px; }
        .graph-d .node-b { top: 10px; left: 70px; }
        .graph-d .node-e { top: 40px; left: 40px; }
        .graph-d .node-f { top: 70px; left: 10px; }
        .graph-d .node-g { top: 70px; left: 70px; }

        /* Dibujar las aristas (ajustar según sea necesario) */
        .graph-a .edge-ab { top: 20px; left: 20px; width: 50px; transform: rotate(0deg); }
        .graph-a .edge-ac { top: 30px; left: 15px; width: 60px; transform: rotate(60deg); }
        .graph-a .edge-ad { top: 40px; left: 15px; width: 60px; transform: rotate(-60deg); }
        .graph-a .edge-bc { top: 30px; left: 55px; width: 60px; transform: rotate(-60deg); }

        .graph-b .edge-ab { top: 20px; left: 20px; width: 50px; transform: rotate(0deg); }
        .graph-b .edge-ac { top: 40px; left: 15px; width: 60px; transform: rotate(60deg); }
        .graph-b .edge-ad { top: 40px; left: 45px; width: 40px; transform: rotate(-60deg); }
        .graph-b .edge-ae { top: 25px; left: 25px; width: 40px; transform: rotate(45deg); }
        .graph-b .edge-bc { top: 40px; left: 45px; width: 40px; transform: rotate(-60deg); }
        .graph-b .edge-bd { top: 40px; left: 75px; width: 40px; transform: rotate(60deg); }
        .graph-b .edge-be { top: 25px; left: 45px; width: 40px; transform: rotate(-45deg); }
        .graph-b .edge-cd { top: 80px; left: 20px; width: 50px; transform: rotate(0deg); }
        .graph-b .edge-ce { top: 55px; left: 25px; width: 40px; transform: rotate(-45deg); }
        .graph-b .edge-de { top: 55px; left: 45px; width: 40px; transform: rotate(45deg); }

        .graph-c .edge-ab { top: 20px; left: 20px; width: 50px; transform: rotate(0deg); }
        .graph-c .edge-ad { top: 40px; left: 15px; width: 60px; transform: rotate(-60deg); }
        .graph-c .edge-bc { top: 40px; left: 55px; width: 60px; transform: rotate(60deg); }
        .graph-c .edge-cd { top: 80px; left: 20px; width: 50px; transform: rotate(0deg); }

        .graph-d .edge-ab { top: 20px; left: 20px; width: 50px; transform: rotate(0deg); }
        .graph-d .edge-ae { top: 25px; left: 25px; width: 40px; transform: rotate(45deg); }
        .graph-d .edge-af { top: 40px; left: 15px; width: 60px; transform: rotate(-60deg); }
        .graph-d .edge-ag { top: 40px; left: 45px; width: 40px; transform: rotate(-30deg); }
        .graph-d .edge-be { top: 25px; left: 45px; width: 40px; transform: rotate(-45deg); }
        .graph-d .edge-bg { top: 25px; left: 55px; width: 40px; transform: rotate(30deg); }
        .graph-d .edge-ef { top: 55px; left: 25px; width: 40px; transform: rotate(-45deg); }
        .graph-d .edge-eg { top: 55px; left: 45px; width: 40px; transform: rotate(45deg); }
        .graph-d .edge-fg { top: 80px; left: 20px; width: 50px; transform: rotate(0deg); }
    </style>
</head>
<body>
<h1>EJERCICIO 1 (cap 7) Gráficas</h1>

<div class="graph-container">
    <h3>Gráfica a)</h3>
    <div class="graph graph-a">
        <div class="node node-a">a</div>
        <div class="node node-b">b</div>
        <div class="node node-c">c</div>
        <div class="node node-d">d</div>
        <div class="edge edge-ab"></div>
        <div class="edge edge-ac"></div>
        <div class="edge edge-ad"></div>
        <div class="edge edge-bc"></div>
    </div>
</div>

<div class="graph-container">
    <h3>Gráfica b)</h3>
    <div class="graph graph-b">
        <div class="node node-a">a</div>
        <div class="node node-b">b</div>
        <div class="node node-c">c</div>
        <div class="node node-d">d</div>
        <div class="node node-e">e</div>
        <div class="edge edge-ab"></div>
        <div class="edge edge-ac"></div>
        <div class="edge edge-ad"></div>
        <div class="edge edge-ae"></div>
        <div class="edge edge-bc"></div>
        <div class="edge edge-bd"></div>
        <div class="edge edge-be"></div>
        <div class="edge edge-cd"></div>
        <div class="edge edge-ce"></div>
        <div class="edge edge-de"></div>
    </div>
</div>

<div class="graph-container">
    <h3>Gráfica c)</h3>
    <div class="graph graph-c">
        <div class="node node-a">a</div>
        <div class="node node-b">b</div>
        <div class="node node-c">c</div>
        <div class="node node-d">d</div>
        <div class="edge edge-ab"></div>
        <div class="edge edge-ad"></div>
        <div class="edge edge-bc"></div>
        <div class="edge edge-cd"></div>
    </div>
</div>

<div class="graph-container">
    <h3>Gráfica d)</h3>
    <div class="graph graph-d">
        <div class="node node-a">a</div>
        <div class="node node-b">b</div>
        <div class="node node-e">e</div>
        <div class="node node-f">f</div>
        <div class="node node-g">g</div>
        <div class="edge edge-ab"></div>
        <div class="edge edge-ae"></div>
        <div class="edge edge-af"></div>
        <div class="edge edge-ag"></div>
        <div class="edge edge-be"></div>
        <div class="edge edge-bg"></div>
        <div class="edge edge-ef"></div>
        <div class="edge edge-eg"></div>
        <div class="edge edge-fg"></div>
    </div>
</div>

<div class="result-container">
    <h2>Análisis de las Gráficas</h2>
<?php
function esConectada($nodos, $aristas) {
    if (empty($nodos)) return true;
    $visitados = [];
    $cola = [reset($nodos)];
    $visitados[reset($nodos)] = true;

    while (!empty($cola)) {
        $actual = array_shift($cola);
        foreach ($aristas as $arista) {
            $vecino = null;
            if ($arista[0] == $actual && !isset($visitados[$arista[1]])) {
                $vecino = $arista[1];
            } elseif ($arista[1] == $actual && !isset($visitados[$arista[0]])) {
                $vecino = $arista[0];
            }
            if ($vecino) {
                $visitados[$vecino] = true;
                $cola[] = $vecino;
            }
        }
    }
    return count($visitados) == count($nodos);
}

function esCiclica($nodos, $aristas) {
    // Una forma sencilla (no exhaustiva para todos los casos)
    // es verificar si el número de aristas es mayor o igual al número de nodos.
    // Esto no es una condición suficiente ni necesaria para grafos desconectados o más complejos.
    // Para una detección completa de ciclos se requeriría un algoritmo más complejo (DFS con detección de back-edges).
    return count($aristas) >= count($nodos);
}

function esConexa($nodos, $aristas) {
    return esConectada($nodos, $aristas); // Conexa es sinónimo de conectada en grafos no dirigidos.
}

function esCompleta($nodos, $aristas) {
    $n = count($nodos);
    $num_aristas_esperadas = $n * ($n - 1) / 2;
    return count($aristas) == $num_aristas_esperadas;
}

function obtenerParesAdyacentes($aristas) {
    $pares = [];
    foreach ($aristas as $arista) {
        $pares[] = "(" . $arista[0] . ", " . $arista[1] . ")";
    }
    return implode(", ", $pares);
}

function existeCamino($inicio, $fin, $nodos, $aristas) {
    if (!in_array($inicio, $nodos) || !in_array($fin, $nodos)) {
        return false;
    }
    if ($inicio == $fin) {
        return true;
    }
    $visitados = [];
    $cola = [$inicio];
    $visitados[$inicio] = true;

    while (!empty($cola)) {
        $actual = array_shift($cola);
        foreach ($aristas as $arista) {
            $vecino = null;
            if ($arista[0] == $actual && !isset($visitados[$arista[1]])) {
                $vecino = $arista[1];
            } elseif ($arista[1] == $actual && !isset($visitados[$arista[0]])) {
                $vecino = $arista[0];
            }
            if ($vecino) {
                if ($vecino == $fin) {
                    return true;
                }
                $visitados[$vecino] = true;
                $cola[] = $vecino;
            }
        }
    }
    return false;
}

function esCaminoCerrado($nodos, $aristas) {
    // Un camino cerrado implica la existencia de un ciclo.
    return esCiclica($nodos, $aristas);
}

function esCaminoSimpleEntreTodos($nodos, $aristas) {
    // Un camino simple entre cualquier par de vértices implica que el grafo es un camino o una trayectoria.
    // Esto requiere que cada nodo tenga un grado de 2 (excepto los dos extremos que tienen grado 1).
    $grados = obtenerGrados($nodos, $aristas);
    $n_grado_uno = 0;
    $n_grado_dos = 0;
    foreach ($grados as $grado) {
        if ($grado == 1) $n_grado_uno++;
        elseif ($grado == 2) $n_grado_dos++;
        else return false;
    }
    return count($nodos) > 0 && ($n_grado_uno == 0 && $n_grado_dos == count($nodos) || $n_grado_uno == 2 && $n_grado_dos == count($nodos) - 2);
}

function obtenerGrados($nodos, $aristas) {
    $grados = array_fill_keys($nodos, 0);
    foreach ($aristas as $arista) {
        $grados[$arista[0]]++;
        $grados[$arista[1]]++;
    }
    return $grados;
}

// Datos de las gráficas
$grafos = [
    'a' => ['nodos' => ['a', 'b', 'c', 'd'], 'aristas' => [['a', 'b'], ['a', 'c'], ['a', 'd'], ['b', 'c']]],
    'b' => ['nodos' => ['a', 'b', 'c', 'd', 'e'], 'aristas' => [['a', 'b'], ['a', 'c'], ['a', 'd'], ['a', 'e'], ['b', 'c'], ['b', 'd'], ['b', 'e'], ['c', 'd'], ['c', 'e'], ['d', 'e']]],
    'c' => ['nodos' => ['a', 'b', 'c', 'd'], 'aristas' => [['a', 'b'], ['a', 'd'], ['b', 'c'], ['c', 'd']]],
    'd' => ['nodos' => ['a', 'b', 'e', 'f', 'g'], 'aristas' => [['a', 'b'], ['a', 'e'], ['a', 'g' ], ['b', 'e'], ['b', 'g'], ['e', 'f'], ['e', 'g'], ['f', 'g']]]
];

foreach ($grafos as $clave => $grafo) {
    echo "<h3>Gráfica $clave)</h3>";
    echo "<p><strong>Nodos:</strong> " . implode(", ", $grafo['nodos']) . "</p>";
    echo "<p><strong>Aristas:</strong> " . obtenerParesAdyacentes($grafo['aristas']) . "</p>";
    echo "<ul>";
    echo "<li>¿Es conexa?: " . (esConexa($grafo['nodos'], $grafo['aristas']) ? "Sí" : "No") . "</li>";
    echo "<li>¿Es cíclica?: " . (esCiclica($grafo['nodos'], $grafo['aristas']) ? "Sí" : "No") . "</li>";
    echo "<li>¿Es completa?: " . (esCompleta($grafo['nodos'], $grafo['aristas']) ? "Sí" : "No") . "</li>";
    echo "<li>¿Existe camino cerrado?: " . (esCaminoCerrado($grafo['nodos'], $grafo['aristas']) ? "Sí" : "No") . "</li>";
    echo "<li>¿Es un camino simple entre todos?: " . (esCaminoSimpleEntreTodos($grafo['nodos'], $grafo['aristas']) ? "Sí" : "No") . "</li>";
    echo "<li>¿Existe camino entre a y d?: " . (existeCamino("a", "d", $grafo['nodos'], $grafo['aristas']) ? "Sí" : "No") . "</li>";
    echo "</ul>";
}
?>
</div>

</body>
</html>
