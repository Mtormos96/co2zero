<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export to Excel</title>
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
    <p>FUNCIONAMIENTO DE LA APP + DESCRIPCION</p>
        <?php
        // Incluir la biblioteca PHPExcel
        require 'PHPExcel/Classes/PHPExcel.php';

        // Crear un nuevo objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        // Establecer propiedades del documento
        $objPHPExcel->getProperties()->setCreator("Variable usuario")
                                     ->setLastModifiedBy("Variable usuario")
                                     ->setTitle("Resultado")
                                     ->setSubject("Resultados de calculos alcance (VARIABLE ALCANCE)")
                                     ->setDescription("Archivo de Excel con los valores de los calculos huella de carbono")
                                     ->setKeywords("excel phpexcel php")
                                     ->setCategory("Resultados");

        // Agregar datos a las celdas
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Alcance 1')
                    ->setCellValue('B1', 'Alcance 2')
                    ->setCellValue('C1', 'Alcance 3')
                    ->setCellValue('A2', $cal_1_result)
                    ->setCellValue('B2', $cal_2_result)
                    ->setCellValue('C2', $cal_3_result);

        // Establecer estilo de las celdas
        $objPHPExcel->getActiveSheet()->getStyle('A1:C2')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        // Ajustar el ancho de las columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);

        // Nombre del archivo
        $filename = "resultados_calculo_CO2Zero.xlsx";

        // Configurar encabezados para descarga
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Guardar el archivo Excel en el formato adecuado
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
        ?>
</section>

<footer>
    <p>Derechos de autor © 2024 - Exportar documento a Excel</p>
</footer>

</body>
</html>