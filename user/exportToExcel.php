<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export to Excel
    </title>
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
    <h1>Calculadora Alcance 3</h1>
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
    <h2>Exportar a Excel</h2>
    <p>Este apartado permitira exportar a Excel los calculos realizados en las calculadoras de alcance 1 y 2</p>
        <?php /*
        require __DIR__ . '/../vendor/autoload.php';
        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

        // Verificar si se debe exportar a Excel
        if (isset($_POST['export'])) {
            if (!empty($_POST['resultados'])) {
                $resultados = json_decode($_POST['resultados'], true);
                exportarAExcel($resultados);
            }
        } */
        ?>
</section>

<footer>
    <p>Derechos de autor © 2024 - Exportar documento a Excel</p>
</footer>

</body>
</html>