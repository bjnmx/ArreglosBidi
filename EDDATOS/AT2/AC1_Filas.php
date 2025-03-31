<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulación de Pila AC9</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        .container {
            width: 300px;
            margin: auto;
        }
        .pila {
            border: 2px solid black;
            width: 100px;
            height: 240px;
            display: flex;
            flex-direction: column-reverse;
            align-items: center;
            margin: auto;
            padding: 10px;
            background-color: #f0f0f0;
        }
        .elemento {
            width: 80px;
            height: 30px;
            margin: 2px;
            background-color: #4CAF50;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border-radius: 5px;
        }
        button {
            margin: 10px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Simulación de Pila</h2>
<div class="container">
    <input type="text" id="valor" placeholder="Ingresa un valor">
    <button onclick="push()">Push</button>
    <button onclick="pop()">Pop</button>
    <div class="pila" id="pila"></div>
</div>

<script>
    let pila = [];
    const maxSize = 8;

    function renderPila() {
        let pilaDiv = document.getElementById("pila");
        pilaDiv.innerHTML = "";
        for (let i = 0; i < pila.length; i++) {
            let div = document.createElement("div");
            div.className = "elemento";
            div.innerText = pila[i];
            pilaDiv.appendChild(div);
        }
    }

    function push() {
        let valor = document.getElementById("valor").value;
        if (valor === "") {
            alert("Ingresa un valor");
            return;
        }
        if (pila.length >= maxSize) {
            alert("La pila está llena");
            return;
        }
        pila.push(valor);
        document.getElementById("valor").value = "";
        renderPila();
    }

    function pop() {
        if (pila.length === 0) {
            alert("La pila está vacía");
            return;
        }
        pila.pop();
        renderPila();
    }
</script>

</body>
</html>
