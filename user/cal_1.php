<?php
// Incluir la biblioteca PHPExcel
require __DIR__ . '/../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Función para calcular las emisiones de CO2
function calcularEmisiones($activityData, $emissionFactor) {
    return $activityData * $emissionFactor;
}

// Función para exportar los resultados a Excel
function exportarAExcel($resultados) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Agregar encabezados
    $sheet->setCellValue('A1', 'Descripción');
    $sheet->setCellValue('B1', 'Dato de Actividad');
    $sheet->setCellValue('C1', 'Factor de Emisión');
    $sheet->setCellValue('D1', 'Emisiones de CO2');

    $row = 2;
    foreach ($resultados as $resultado) {
        $sheet->setCellValue('A' . $row, $resultado['descripcion']);
        $sheet->setCellValue('B' . $row, $resultado['activityData']);
        $sheet->setCellValue('C' . $row, $resultado['emissionFactor']);
        $sheet->setCellValue('D' . $row, $resultado['emisiones']);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    $fileName = 'emisiones_co2.xlsx';

    // Configurar encabezados para descarga
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    exit;
}

// Inicializar resultados
$resultados = [];

// Inicializar variables de resultados
$result1 = "";
$result2 = "";
$result3 = "";
$result4 = "";
$result5 = "";
$result6 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Calcular emisiones según el formulario enviado
    $activityData = 0;
    $emissionFactor = 0;
    $descripcion = "";

    if (isset($_POST["activityData1"])) {
        $activityData = floatval($_POST["activityData1"]);
        $emissionFactor = floatval($_POST["emissionFactor1"]);
        $descripcion = "Emisiones de CO2 (Instalaciones fijas)";
        $emisiones = calcularEmisiones($activityData, $emissionFactor);
        $result1 = $descripcion . ": " . $emisiones . " Kg CO2<br>";
        $resultados[] = [
            'descripcion' => $descripcion,
            'activityData' => $activityData,
            'emissionFactor' => $emissionFactor,
            'emisiones' => $emisiones
        ];
    } elseif (isset($_POST["activityData2"])) {
        $activityData = floatval($_POST["activityData2"]);
        $emissionFactor = floatval($_POST["emissionFactor2"]);
        $descripcion = "Emisiones de CO2 (Transporte por carretera)";
        $emisiones = calcularEmisiones($activityData, $emissionFactor);
        $result2 = $descripcion . ": " . $emisiones . " Kg CO2<br>";
        $resultados[] = [
            'descripcion' => $descripcion,
            'activityData' => $activityData,
            'emissionFactor' => $emissionFactor,
            'emisiones' => $emisiones
        ];
    } elseif (isset($_POST["activityData3"])) {
        $activityData = floatval($_POST["activityData3"]);
        $emissionFactor = floatval($_POST["emissionFactor3"]);
        $descripcion = "Emisiones de CO2 (Otros medios de transporte)";
        $emisiones = calcularEmisiones($activityData, $emissionFactor);
        $result3 = $descripcion . ": " . $emisiones . " Kg CO2<br>";
        $resultados[] = [
            'descripcion' => $descripcion,
            'activityData' => $activityData,
            'emissionFactor' => $emissionFactor,
            'emisiones' => $emisiones
        ];
    } elseif (isset($_POST["activityData4"])) {
        $activityData = floatval($_POST["activityData4"]);
        $emissionFactor = floatval($_POST["emissionFactor4"]);
        $descripcion = "Emisiones de CO2 (Maquinaria)";
        $emisiones = calcularEmisiones($activityData, $emissionFactor);
        $result4 = $descripcion . ": " . $emisiones . " Kg CO2<br>";
        $resultados[] = [
            'descripcion' => $descripcion,
            'activityData' => $activityData,
            'emissionFactor' => $emissionFactor,
            'emisiones' => $emisiones
        ];
    } elseif (isset($_POST["activityData5"])) {
        $activityData = floatval($_POST["activityData5"]);
        $emissionFactor = floatval($_POST["emissionFactor5"]);
        $descripcion = "Emisiones de CO2 (Fuga de gases fluorados)";
        $emisiones = calcularEmisiones($activityData, $emissionFactor);
        $result5 = $descripcion . ": " . $emisiones . " Kg CO2<br>";
        $resultados[] = [
            'descripcion' => $descripcion,
            'activityData' => $activityData,
            'emissionFactor' => $emissionFactor,
            'emisiones' => $emisiones
        ];
    } elseif (isset($_POST["activityData6"])) {
        $activityData = floatval($_POST["activityData6"]);
        $emissionFactor = floatval($_POST["emissionFactor6"]);
        $descripcion = "Emisiones de CO2 (Otros GEI)";
        $emisiones = calcularEmisiones($activityData, $emissionFactor);
        $result6 = $descripcion . ": " . $emisiones . " Kg CO2<br>";
        $resultados[] = [
            'descripcion' => $descripcion,
            'activityData' => $activityData,
            'emissionFactor' => $emissionFactor,
            'emisiones' => $emisiones
        ];
    }

    // Verificar si se debe exportar a Excel
    if (isset($_POST['export'])) {
        exportarAExcel($resultados);
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadoras de Emisiones</title>
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
            width: 100%;
        }
        input[type=range] {
            width: 300px;
        }
        .container {
            max-height: 100vh;
            overflow-y: auto;
        }
        .calculator {
            display: none;
        }
    </style>
    <script>
        function showCalculator(id) {
            var calculators = document.getElementsByClassName('calculator');
            for (var i = 0; i < calculators.length; i++) {
                calculators[i].style.display = 'none';
            }
            document.getElementById(id).style.display = 'block';
        }
    </script>
</head>
<body>
<header>
    <h1>Calculadoras de Emisiones</h1>
</header>

<nav>
    <a href="main.php">Inicio</a>
    <a href="cal_1.php">Calculadora Alcance 1</a>
    <a href="cal_2.php">Calculadora Alcance 2</a>
    <a href="cal_3.php">Calculadora Alcance 3</a>
    <a href="exportToPDF.php">Exportar PDF</a>
    <a href="exportToExcel.php">Exportar Excel</a>
    <a href="userPanel.php">Panel de usuario</a>
</nav>

<section class="container">
    <h2>Selecciona una calculadora</h2>
    <p>
        <input type="radio" name="calculator" onclick="showCalculator('calc1')"> Consumo de combustibles en instalaciones fijas<br>
        <input type="radio" name="calculator" onclick="showCalculator('calc2')"> Consumo de combustibles en transporte por carretera<br>
        <input type="radio" name="calculator" onclick="showCalculator('calc3')"> Consumo de combustibles en otros medios de transporte<br>
        <input type="radio" name="calculator" onclick="showCalculator('calc4')"> Consumo de combustibles en maquinaria<br>
        <input type="radio" name="calculator" onclick="showCalculator('calc5')"> Fuga de gases fluorados de equipos de refrigeración y/o climatización<br>
        <input type="radio" name="calculator" onclick="showCalculator('calc6')"> Actividades que generan otros GEI<br>
    </p>

    <!-- Calculadora 1 -->
    <div id="calc1" class="calculator">
        <h3>Consumo de combustibles en instalaciones fijas</h3>
        <form action="" method="POST">
            <label for="activityData1">Dato de Actividad (en Kg):</label>
            <input type="number" id="activityData1" name="activityData1" step="0.01" required>
            <br><br>
            <label for="emissionFactor1">Factor de Emisión (F.E.):</label>
            <input type="number" id="emissionFactor1" name="emissionFactor1" step="0.01" required>
            <br><br>
            <input type="submit" name="calculate" value="Calcular">
        </form>
    </div>

    <!-- Calculadora 2 -->
    <div id="calc2" class="calculator">
        <h3>Consumo de combustibles en transporte por carretera</h3>
        <form action="" method="POST">
            <label for="activityData2">Dato de Actividad (en Km o Litros):</label>
            <input type="number" id="activityData2" name="activityData2" step="0.01" required>
            <br><br>
            <label for="emissionFactor2">Factor de Emisión (F.E.):</label>
            <input type="number" id="emissionFactor2" name="emissionFactor2" step="0.01" required>
            <br><br>
            <input type="submit" name="calculate" value="Calcular">
        </form>
    </div>

    <!-- Calculadora 3 -->
    <div id="calc3" class="calculator">
        <h3>Consumo de combustibles en otros medios de transporte</h3>
        <form action="" method="POST">
            <label for="activityData3">Dato de Actividad (en Litros):</label>
            <input type="number" id="activityData3" name="activityData3" step="0.01" required>
            <br><br>
            <label for="emissionFactor3">Factor de Emisión (F.E.):</label>
            <input type="number" id="emissionFactor3" name="emissionFactor3" step="0.01" required>
            <br><br>
            <input type="submit" name="calculate" value="Calcular">
        </form>
    </div>

    <!-- Calculadora 4 -->
    <div id="calc4" class="calculator">
        <h3>Consumo de combustibles en maquinaria</h3>
        <form action="" method="POST">
            <label for="activityData4">Dato de Actividad (en Litros):</label>
            <input type="number" id="activityData4" name="activityData4" step="0.01" required>
            <br><br>
            <label for="emissionFactor4">Factor de Emisión (F.E.):</label>
            <input type="number" id="emissionFactor4" name="emissionFactor4" step="0.01" required>
            <br><br>
            <input type="submit" name="calculate" value="Calcular">
        </form>
    </div>

    <!-- Calculadora 5 -->
    <div id="calc5" class="calculator">
        <h3>Fuga de gases fluorados de equipos de refrigeración y/o climatización</h3>
        <form action="" method="POST">
            <label for="activityData5">Dato de Actividad (en Kg):</label>
            <input type="number" id="activityData5" name="activityData5" step="0.01" required>
            <br><br>
            <label for="emissionFactor5">Potencial de Calentamiento Global (PCG):</label>
            <input type="number" id="emissionFactor5" name="emissionFactor5" step="0.01" required>
            <br><br>
            <input type="submit" name="calculate" value="Calcular">
        </form>
    </div>

    <!-- Calculadora 6 -->
    <div id="calc6" class="calculator">
        <h3>Actividades que generan otros GEI</h3>
        <form action="" method="POST">
            <label for="activityData6">Dato de Actividad (en Kg):</label>
            <input type="number" id="activityData6" name="activityData6" step="0.01" required>
            <br><br>
            <label for="emissionFactor6">Potencial de Calentamiento Global (PCG):</label>
            <input type="number" id="emissionFactor6" name="emissionFactor6" step="0.01" required>
            <br><br>
            <input type="submit" name="calculate" value="Calcular">
        </form>
    </div>

    <?php
    // Mostrar los resultados
    if ($result1) echo "<h2>Resultados:</h2>" . $result1;
    if ($result2) echo "<h2>Resultados:</h2>" . $result2;
    if ($result3) echo "<h2>Resultados:</h2>" . $result3;
    if ($result4) echo "<h2>Resultados:</h2>" . $result4;
    if ($result5) echo "<h2>Resultados:</h2>" . $result5;
    if ($result6) echo "<h2>Resultados:</h2>" . $result6;
    ?>
    <form action="" method="POST">
        <br></br>
        <input type="submit" name="export" value="Exportar a Excel">
    </form>
</section>

<footer>
    <p>Derechos de autor © 2024 - cal_1</p>
</footer>

</body>
</html>

