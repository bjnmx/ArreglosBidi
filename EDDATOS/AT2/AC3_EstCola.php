<?php
session_start();

class ColaCircular {
    private $cola;
    private $capacidad;
    private $frente;
    private $final;
    private $tamanio;

    public function __construct($capacidad) {
        $this->capacidad = $capacidad;
        $this->cola = array_fill(0, $capacidad, null);
        $this->frente = 0;
        $this->final = 0;
        $this->tamanio = 0;
    }

    public function insertar($elemento) {
        if ($this->tamanio == $this->capacidad) {
            return "Error: Desbordamiento. La cola está llena.";
        }
        $this->cola[$this->final] = $elemento;
        $this->final = ($this->final + 1) % $this->capacidad;
        $this->tamanio++;
        return "Elemento $elemento insertado.";
    }

    public function eliminar() {
        if ($this->tamanio == 0) {
            return "Error: Subdesbordamiento. La cola está vacía.";
        }
        $elemento = $this->cola[$this->frente];
        $this->cola[$this->frente] = null;
        $this->frente = ($this->frente + 1) % $this->capacidad;
        $this->tamanio--;
        return "Elemento $elemento eliminado.";
    }

    public function obtenerCola() {
        return $this->cola;
    }
}

// Inicializar la cola si no existe en sesión
if (!isset($_SESSION['cola'])) {
    $_SESSION['cola'] = new ColaCircular(6);
}

$cola = $_SESSION['cola'];
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['insertar']) && !empty($_POST['elemento'])) {
        $mensaje = $cola->insertar($_POST['elemento']);
    } elseif (isset($_POST['eliminar'])) {
        $mensaje = $cola->eliminar();
    } elseif (isset($_POST['reset'])) {
        $_SESSION['cola'] = new ColaCircular(6);
        $mensaje = "Cola reiniciada.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cola Circular en PHP</title>
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
        .cola {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 20px;
        }
        .elemento {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #4CAF50;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            border: 2px solid #2E7D32;
        }
        .vacio {
            background: #ccc;
            border: 2px solid #aaa;
        }
        .mensaje {
            margin-top: 10px;
            color: #d9534f;
            font-weight: bold;
        }
        button {
            margin-top: 10px;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .insertar { background: #4CAF50; color: white; }
        .eliminar { background: #FF5722; color: white; }
        .reset { background: #607D8B; color: white; }
    </style>
</head>
<body>

<h2>Simulación de Cola Circular</h2>

<div class="contenedor">
    <form method="POST">
        <input type="text" name="elemento" placeholder="Ingresa un valor">
        <button type="submit" name="insertar" class="insertar">Insertar</button>
        <button type="submit" name="eliminar" class="eliminar">Eliminar</button>
        <button type="submit" name="reset" class="reset">Reiniciar</button>
    </form>

    <h3 class="mensaje"><?php echo $mensaje; ?></h3>

    <div class="cola">
        <?php
        foreach ($cola->obtenerCola() as $elemento) {
            echo "<div class='elemento " . ($elemento ? "" : "vacio") . "'>" . ($elemento ?: "-") . "</div>";
        }
        ?>
    </div>
</div>

</body>
</html>
