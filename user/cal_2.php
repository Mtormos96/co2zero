<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Alcance 2</title>
    <style>
        body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f0f0f0;
            }
        header {
                background-color: #28a745;
                color: #fff;
                padding: 20px;
                text-align: center;
            }
        nav {
                background-color: #f8f9fa;
                color: black;
                padding: 10px;
                text-align: center;
            }
        nav a {
                color: black;
                text-decoration: none;
                margin: 0 10px;
            }
        section {
                padding: 20px;
                text-align: center;
            }
        footer {
                background-color: #28a745;
                color: #fff;
                text-align: center;
                padding: 10px;
                position: fixed;
                bottom: 0;
                width: 100%;
            }
    </style>
</head>

<header>
    <h1>Calculadora Alcance 2</h1>
</header>
<body>

<nav>
    <a href="main.php">Inicio</a>
    <a href="cal_1.php">Calculadora Alcance 1</a>
    <a href="cal_2.php">Calculadora Alcance 2</a>
    <a href="cal_3.php">Calculadora Alcance 3</a>
    <a href="exportToPDF.php">Exportar PDF</a>
    <a href="exportToExcel.php">Exportar Excel</a>
    <a href="userPanel.php">Panel de usuario</a>
</nav>

<section>
    <h2>Bienvenido a la calculadora del alcance 2</h2>
    <p>FUNCIONAMIENTO DE LA CALCULADORA + DESCRIPCION</p>

    <div id="calculadora">
        <div id="encabezado">
            <h2>Calculadora Alcance 2</h2>
        </div>
        <div id="contenido">
            <input type="text" id="resultado" readonly>
            <!-- AQUI IRA EL CODIGO DE LA CALCULADORA -->
            <br>
            <input type="button" value="1" onclick="agregarNumero('1')">
            <input type="button" value="2" onclick="agregarNumero('2')">
            <input type="button" value="3" onclick="agregarNumero('3')">
            <input type="button" value="+" onclick="agregarOperador('+')">
            <br>
            <input type="button" value="4" onclick="agregarNumero('4')">
            <input type="button" value="5" onclick="agregarNumero('5')">
            <input type="button" value="6" onclick="agregarNumero('6')">
            <input type="button" value="-" onclick="agregarOperador('-')">
            <br>
            <input type="button" value="7" onclick="agregarNumero('7')">
            <input type="button" value="8" onclick="agregarNumero('8')">
            <input type="button" value="9" onclick="agregarNumero('9')">
            <input type="button" value="*" onclick="agregarOperador('*')">
            <br>
            <input type="button" value="C" onclick="limpiar()">
            <input type="button" value="0" onclick="agregarNumero('0')">
            <input type="button" value="=" onclick="calcular()">
            <input type="button" value="/" onclick="agregarOperador('/')">
        </div>
        <div id="pie">
            <p>Derechos de autor © 2024 - Calculadora Alcance 2</p>
        </div>
    </div>
    <!-- Fin de la calculadora -->
</section>

<footer>
    <p>Derechos de autor © 2024 - cal_2</p>
</footer>

<script>
        function agregarNumero(numero) {
        document.getElementById("resultado").value += numero;
    }

    function agregarOperador(operador) {
        document.getElementById("resultado").value += operador;
    }

    function limpiar() {
        document.getElementById("resultado").value = "";
    }

    function calcular() {
        var resultado = eval(document.getElementById("resultado").value);
        document.getElementById("resultado").value = resultado;
    }
</script>

</body>
</html>