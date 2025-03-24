<?php
session_start(); // Iniciar sesión para persistencia

// Definimos la interfaz para el manejo de proveedores
interface ProveedorManager {
    public function obtenerInformacionProveedor(string $nombreProveedor): array;
    public function actualizarCiudadProveedor(string $nombreProveedor, string $nuevaCiudad): void;
    public function actualizarArticulosProveedor(string $nombreProveedor, int $nuevaCantidad): void;
    public function agregarProveedor(string $nombreProveedor, string $ciudad, int $numArticulos): void;
    public function eliminarProveedor(string $nombreProveedor): void;
    public function getProveedores(): array;
}

// Implementamos la interfaz en una clase concreta
class GestorProveedores implements ProveedorManager {
    private $proveedores = [];
    private $ciudades = [];
    private $articulos = [];

    public function __construct() {
        if (!isset($_SESSION['proveedores'])) {
            $_SESSION['proveedores'] = [];
            $_SESSION['ciudades'] = [];
            $_SESSION['articulos'] = [];
        }
        $this->proveedores = &$_SESSION['proveedores'];
        $this->ciudades = &$_SESSION['ciudades'];
        $this->articulos = &$_SESSION['articulos'];
    }

    public function obtenerInformacionProveedor(string $nombreProveedor): array {
        $indice = array_search($nombreProveedor, $this->proveedores);
        if ($indice !== false) {
            return ['ciudad' => $this->ciudades[$indice], 'articulos' => $this->articulos[$indice]];
        }
        return [];
    }

    public function actualizarCiudadProveedor(string $nombreProveedor, string $nuevaCiudad): void {
        $indice = array_search($nombreProveedor, $this->proveedores);
        if ($indice !== false) {
            $this->ciudades[$indice] = $nuevaCiudad;
        }
    }

    public function actualizarArticulosProveedor(string $nombreProveedor, int $nuevaCantidad): void {
        $indice = array_search($nombreProveedor, $this->proveedores);
        if ($indice !== false) {
            $this->articulos[$indice] = $nuevaCantidad;
        }
    }

    public function agregarProveedor(string $nombreProveedor, string $ciudad, int $numArticulos): void {
        if (!in_array($nombreProveedor, $this->proveedores)) {
            $this->proveedores[] = $nombreProveedor;
            $this->ciudades[] = $ciudad;
            $this->articulos[] = $numArticulos;
        }
    }

    public function eliminarProveedor(string $nombreProveedor): void {
        $indice = array_search($nombreProveedor, $this->proveedores);
        if ($indice !== false) {
            array_splice($this->proveedores, $indice, 1);
            array_splice($this->ciudades, $indice, 1);
            array_splice($this->articulos, $indice, 1);
        }
    }

    public function getProveedores(): array {
        return $this->proveedores;
    }
}

$gestor = new GestorProveedores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        $nombre = $_POST['nombre'] ?? '';
        switch ($accion) {
            case 'obtener':
                $info = $gestor->obtenerInformacionProveedor($nombre);
                $mensaje = !empty($info) ? "Ciudad: {$info['ciudad']}, Artículos: {$info['articulos']}" : "Proveedor no encontrado.";
                break;
            case 'actualizar_ciudad':
                $gestor->actualizarCiudadProveedor($nombre, $_POST['nueva_ciudad']);
                $mensaje = "Ciudad actualizada.";
                break;
            case 'actualizar_articulos':
                $gestor->actualizarArticulosProveedor($nombre, (int)$_POST['nueva_cantidad']);
                $mensaje = "Cantidad de artículos actualizada.";
                break;
            case 'agregar':
                $gestor->agregarProveedor($nombre, $_POST['ciudad'], (int)$_POST['articulos']);
                $mensaje = "Proveedor agregado.";
                break;
            case 'eliminar':
                $gestor->eliminarProveedor($nombre);
                $mensaje = "Proveedor eliminado.";
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proveedores</title>
</head>
<body>
<h1>Gestión de Proveedores</h1>

<?php if (isset($mensaje)) { ?>
    <p><?php echo $mensaje; ?></p>
<?php } ?>

<form method="post">
    <label>Acción:</label>
    <select name="accion">
        <option value="obtener">Obtener Información</option>
        <option value="actualizar_ciudad">Actualizar Ciudad</option>
        <option value="actualizar_articulos">Actualizar Artículos</option>
        <option value="agregar">Agregar Proveedor</option>
        <option value="eliminar">Eliminar Proveedor</option>
    </select><br>

    <label>Nombre del Proveedor:</label>
    <input type="text" name="nombre" required><br>

    <div id="campos_adicionales"></div>

    <button type="submit">Ejecutar</button>
</form>

<script>
    document.querySelector('select[name="accion"]').addEventListener('change', function() {
        let camposHTML = '';
        if (this.value === 'actualizar_ciudad') {
            camposHTML = '<label>Nueva Ciudad:</label><input type="text" name="nueva_ciudad"><br>';
        } else if (this.value === 'actualizar_articulos') {
            camposHTML = '<label>Nueva Cantidad de Artículos:</label><input type="number" name="nueva_cantidad"><br>';
        } else if (this.value === 'agregar') {
            camposHTML = '<label>Ciudad:</label><input type="text" name="ciudad"><br><label>Artículos:</label><input type="number" name="articulos"><br>';
        }
        document.getElementById('campos_adicionales').innerHTML = camposHTML;
    });
</script>

<h2>Lista de Proveedores</h2>
<ul>
    <?php foreach ($gestor->getProveedores() as $proveedor) { ?>
        <li><?php echo htmlspecialchars($proveedor); ?></li>
    <?php } ?>
</ul>
</body>
</html>
