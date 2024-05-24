<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export to PDF</title>
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
    <h2>Exportar a PDF</h2>
    <p>FUNCIONAMIENTO DE LA APP + DESCRIPCION</p>
    <!-- CODIGO PDF EXPORT -->
    <?php
    require_once('tcpdf/tcpdf.php');

    // Crear nuevo objeto PDF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Establecer información del documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Autor');
    $pdf->SetTitle('Documento PDF');
    $pdf->SetSubject('Ejemplo de Exportación a PDF');
    $pdf->SetKeywords('PDF, ejemplo, exportar');

    // Establecer márgenes
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

    // Establecer tamaño de página
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // Establecer el lenguaje predeterminado
    $pdf->setLanguageArray($l);

    // Agregar una página
    $pdf->AddPage();

    // Contenido HTML que deseas exportar a PDF
    $html = '<h1>Ejemplo de Exportación a PDF</h1>
             <p>Este es un ejemplo de cómo exportar contenido HTML a un documento PDF utilizando TCPDF en PHP.</p>
             <p>Puedes incluir cualquier HTML válido aquí, incluidas tablas, imágenes, estilos CSS, etc.</p>';

    // Escribir el contenido HTML en el PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Cerrar el PDF y generar el archivo
    $pdf->Output('documento_pdf.pdf', 'D');
    ?>
</section>

<footer>
    <p>Derechos de autor © 2024 - Exportar documento a PDF</p>
</footer>

</body>
</html>