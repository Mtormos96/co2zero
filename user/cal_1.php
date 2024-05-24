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
    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    // Definir variables para almacenar los resultados de cada calculadora
    $result1 = "";
    $result2 = "";
    $result3 = "";
    $result4 = "";
    $result5 = "";
    $result6 = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calculate'])) {
        // Obtener los valores del formulario
        $activityData = 0;
        $emissionFactor = 0;
        $co2Emissions = 0;
        $result = "";

        if (isset($_POST["activityData1"])) {
            $activityData = floatval($_POST["activityData1"]);
            $emissionFactor = floatval($_POST["emissionFactor1"]);
            $co2Emissions = $activityData * $emissionFactor;
            $result1 = "Emisiones de CO2 (Instalaciones fijas): " . $co2Emissions . " Kg CO2<br>";
        } elseif (isset($_POST["activityData2"])) {
            $activityData = floatval($_POST["activityData2"]);
            $emissionFactor = floatval($_POST["emissionFactor2"]);
            $co2Emissions = $activityData * $emissionFactor;
            $result2 = "Emisiones de CO2 (Transporte por carretera): " . $co2Emissions . " Kg CO2<br>";
        } elseif (isset($_POST["activityData3"])) {
            $activityData = floatval($_POST["activityData3"]);
            $emissionFactor = floatval($_POST["emissionFactor3"]);
            $co2Emissions = $activityData * $emissionFactor;
            $result3 = "Emisiones de CO2 (Otros medios de transporte): " . $co2Emissions . " Kg CO2<br>";
        } elseif (isset($_POST["activityData4"])) {
            $activityData = floatval($_POST["activityData4"]);
            $emissionFactor = floatval($_POST["emissionFactor4"]);
            $co2Emissions = $activityData * $emissionFactor;
            $result4 = "Emisiones de CO2 (Maquinaria): " . $co2Emissions . " Kg CO2<br>";
        } elseif (isset($_POST["activityData5"])) {
            $activityData = floatval($_POST["activityData5"]);
            $emissionFactor = floatval($_POST["emissionFactor5"]);
            $co2Emissions = $activityData * $emissionFactor;
            $result5 = "Emisiones de CO2 (Fuga de gases fluorados): " . $co2Emissions . " Kg CO2<br>";
        } elseif (isset($_POST["activityData6"])) {
            $activityData = floatval($_POST["activityData6"]);
            $emissionFactor = floatval($_POST["emissionFactor6"]);
            $co2Emissions = $activityData * $emissionFactor;
            $result6 = "Emisiones de CO2 (Otros GEI): " . $co2Emissions . " Kg CO2<br>";
        }

        // Mostrar los resultados
        echo "<h2>Resultados:</h2>";
        if ($result1) echo $result1;
        if ($result2) echo $result2;
        if ($result3) echo $result3;
        if ($result4) echo $result4;
        if ($result5) echo $result5;
        if ($result6) echo $result6;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['export'])) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Dato de Actividad');
        $sheet->setCellValue('B1', 'Factor de Emisión');
        $sheet->setCellValue('C1', 'Emisiones de CO2');

        $row = 2;
        if ($result1) {
            $sheet->setCellValue('A' . $row, $_POST["activityData1"]);
            $sheet->setCellValue('B' . $row, $_POST["emissionFactor1"]);
            $sheet->setCellValue('C' . $row, floatval($_POST["activityData1"]) * floatval($_POST["emissionFactor1"]));
            $row++;
        }
        if ($result2) {
            $sheet->setCellValue('A' . $row, $_POST["activityData2"]);
            $sheet->setCellValue('B' . $row, $_POST["emissionFactor2"]);
            $sheet->setCellValue('C' . $row, floatval($_POST["activityData2"]) * floatval($_POST["emissionFactor2"]));
            $row++;
        }
        if ($result3) {
            $sheet->setCellValue('A' . $row, $_POST["activityData3"]);
            $sheet->setCellValue('B' . $row, $_POST["emissionFactor3"]);
            $sheet->setCellValue('C' . $row, floatval($_POST["activityData3"]) * floatval($_POST["emissionFactor3"]));
            $row++;
        }
        if ($result4) {
            $sheet->setCellValue('A' . $row, $_POST["activityData4"]);
            $sheet->setCellValue('B' . $row, $_POST["emissionFactor4"]);
            $sheet->setCellValue('C' . $row, floatval($_POST["activityData4"]) * floatval($_POST["emissionFactor4"]));
            $row++;
        }
        if ($result5) {
            $sheet->setCellValue('A' . $row, $_POST["activityData5"]);
            $sheet->setCellValue('B' . $row, $_POST["emissionFactor5"]);
            $sheet->setCellValue('C' . $row, floatval($_POST["activityData5"]) * floatval($_POST["emissionFactor5"]));
            $row++;
        }
        if ($result6) {
            $sheet->setCellValue('A' . $row, $_POST["activityData6"]);
            $sheet->setCellValue('B' . $row, $_POST["emissionFactor6"]);
            $sheet->setCellValue('C' . $row, floatval($_POST["activityData6"]) * floatval($_POST["emissionFactor6"]));
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'emisiones_co2.xlsx';
        $writer->save($fileName);

        // Descargar el archivo
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        readfile($fileName);

        // Eliminar el archivo después de la descarga
        unlink($fileName);
        exit;
    }
    ?>
    <form action="" method="POST">
        <input type="submit" name="export" value="Exportar a Excel">
    </form>
</section>

<footer>
    <p>Derechos de autor © 2024 - cal_1</p>
</footer>

</body>
</html>

