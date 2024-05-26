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
$resultC_E_E = "";
$resultC_E_V = "";
$resultC_O_E = "";
$resultI_E_R = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Calcular emisiones según el formulario enviado
    $activityData = 0;
    $emissionFactor = 0;
    $descripcion = "";

    if (isset($_POST["activityData1"])) {
        $activityData = floatval($_POST["activityData1"]);
        $descripcion = "Consumo eléctrico en edificios";
        $resultC_E_E = $descripcion . ": " . $activityData . " kWh<br>";
        $resultados[] = [
            'descripcion' => $descripcion,
            'activityData' => $activityData,
            'emissionFactor' => '',
            'emisiones' => $activityData
        ];
    } elseif (isset($_POST["activityData2"])) {
        $activityData = floatval($_POST["activityData2"]);
        $emissionFactor = floatval($_POST["emissionFactor2"]);
        $descripcion = "Consumo eléctrico en vehículos";
        $emisiones = calcularEmisiones($activityData, $emissionFactor);
        $resultC_E_V = $descripcion . ": " . $emisiones . " Kg CO2<br>";
        $resultados[] = [
            'descripcion' => $descripcion,
            'activityData' => $activityData,
            'emissionFactor' => $emissionFactor,
            'emisiones' => $emisiones
        ];
    } elseif (isset($_POST["activityData3"])) {
        $activityData = floatval($_POST["activityData3"]);
        $emissionFactor = floatval($_POST["emissionFactor3"]);
        $descripcion = "Consumos de otras energías: calor, vapor, frío o aire comprimido";
        $emisiones = calcularEmisiones($activityData, $emissionFactor);
        $resultC_O_E = $descripcion . ": " . $emisiones . " Kg CO2<br>";
        $resultados[] = [
            'descripcion' => $descripcion,
            'activityData' => $activityData,
            'emissionFactor' => $emissionFactor,
            'emisiones' => $emisiones
        ];
    } elseif (isset($_POST["activityData4"])) {
        $activityData = floatval($_POST["activityData4"]);
        $emissionFactor = floatval($_POST["emissionFactor4"]);
        $descripcion = "Instalaciones de energía renovable";
        $emisiones = calcularEmisiones($activityData, $emissionFactor);
        $resultI_E_R = $descripcion . ": " . $emisiones . " Kg CO2<br>";
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
    <title>Calculadoras de Alcance 2</title>
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
        <input type="radio" name="calculator" onclick="showCalculator('calc1')"> Consumo eléctrico en edificios<br>
        <input type="radio" name="calculator" onclick="showCalculator('calc2')"> Consumo eléctrico en vehículos<br>
        <input type="radio" name="calculator" onclick="showCalculator('calc3')"> Consumos de otras energías: calor, vapor, frío o aire comprimido<br>
        <input type="radio" name="calculator" onclick="showCalculator('calc4')"> Instalaciones de energía renovable<br>
    </p>

    <!-- Calculadora 1 -->
    <div id="calc1" class="calculator">
        <h3>Consumo eléctrico en edificios</h3>
        <form action="" method="POST">
            <label for="activityData1">kWh consumidos:</label>
            <input type="number" id="activityData1" name="activityData1" step="0.01" required>
            <br><br>
            <input type="submit" name="calculate" value="Calcular">
        </form>
    </div>

    <!-- Calculadora 2 -->
    <div id="calc2" class="calculator">
        <h3>Consumo eléctrico en vehículos</h3>
        <form action="" method="POST">
            <label for="activityData2">Dato de Actividad (en kWh):</label>
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
        <h3>Consumos de otras energías: calor, vapor, frío o aire comprimido</h3>
        <form action="" method="POST">
            <label for="activityData3">Dato de Actividad (en kWh):</label>
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
        <h3>Instalaciones de energía renovable</h3>
        <form action="" method="POST">
            <label for="activityData4">Dato de Actividad (en kWh):</label>
            <input type="number" id="activityData4" name="activityData4" step="0.01" required>
            <br><br>
            <label for="emissionFactor4">Factor de Emisión (F.E.):</label>
            <input type="number" id="emissionFactor4" name="emissionFactor4" step="0.01" required>
            <br><br>
            <input type="submit" name="calculate" value="Calcular">
        </form>
    </div>

    <?php
    // Mostrar los resultados
    if ($resultC_E_E) echo "<h2>Resultados:</h2>" . $resultC_E_E;
    if ($resultC_E_V) echo "<h2>Resultados:</h2>" . $resultC_E_V;
    if ($resultC_O_E) echo "<h2>Resultados:</h2>" . $resultC_O_E;
    if ($resultI_E_R) echo "<h2>Resultados:</h2>" . $resultI_E_R;
    ?>
    <form action="" method="POST">
        <input type="hidden" name="resultados" value='<?php echo json_encode($resultados); ?>'>
        <br>
        <input type="submit" name="export" value="Exportar a Excel">
    </form>
</section>

<footer>
    <p>Derechos de autor © 2024 - cal_2</p>
</footer>

</body>
</html>
