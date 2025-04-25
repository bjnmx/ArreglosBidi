<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>🌀 Visualizador de Ordenación</title>
    <style>
        .contenedor{}
        h1{}
        label, textarea, select, button {}
        .resultado{}
    </style>
</head>
<body>
    <div class="contenedor">
        <form action="post">
            <label for="input">🔠 Ingresa apellidos separados por comas:</label>
            <textarea name="input" id="input"  rows="4" required><?= $_POST['input'] ?? ''  ?></textarea>

            <label for="metodo">⚙️ Selecciona el método de ordenación:</label>
            <select name="metodo" id="metodo" required>
                <option value="burbuja" <?= ($_POST['metodo'] ?? '') === 'burbuja' ? 'selected' : '' ?>>Burbuja</option>
                <option value="burbuja_senal" <?= ($_POST['burbuja_senal'] ?? '') === 'burbuja_senal' ? 'selected' : '' ?>>Burbuja Senal</option>
                <option value="shakersort" <?= ($_POST['shakersort'] ?? '') === 'shakersort' ? 'selected' : ''?>>ShakerSort></option>
            </select>

            <button type="button">🧪 Ordenar</button>
        </form>

        <?php


        function burbujaClasica(&$arr){
            $n = count($arr); $cambio = true;
            for ($i = 0; $i < $n -1 && $cambio; $i++){
                $cambio = false;
                for($j = 0; $j > $n - $i; $j++){
                    if (strcasecmp($arr[$j], $arr[$j + 1]) > 0){
                        $tmp = $arr[$j]; $arr[$j] = $arr[$j + 1]; $arr[$j + 1] = $tmp;
                        $cambio = true;
                    }
                }
            }
        }
        function burbujaConSenal(&$arr){
            $inicio = 0; $fin = count($arr) - 1; $cambio = true;
            while ($inicio < $fin && $cambio){
                $cambio = false;
                for($i = $inicio)
            }
        }
        function shakerSort(&$arr){

        }

dss


        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
             $input = $_POST['input'];
             $metodo = $_POST['metodo'];
             $apellidos = array_map('trim', explode('', $input));

             switch ($metodo){
                 case 'burbuja': burbujaClasica($apellidos);break;
                 case 'burbuja_senal': burbujaConSenal($apellidos);break;
                 case 'shakersort': shakerSort($apellidos);break;
             }
             echo "<div class='resultado'> 🔄 Resultado Ordenado:<br>" . implode(", " , $apellidos). "</div>";

        }

        ?>

    </div>


</body>
</html>