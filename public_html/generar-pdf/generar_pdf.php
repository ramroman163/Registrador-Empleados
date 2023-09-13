<?php

session_start();

include '../../protected/home/conexion.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SESSION['loggedin'] !== true) {
  header("location: ../index.php");
  exit;
} else {
    require 'vendor/autoload.php';

    $dompdf = new Dompdf();
    
    $options = new Options();

    $options->set('isRemoteEnabled', TRUE);

    $dompdf = new DOMPDF($options);

    $sql = "SELECT * FROM Tb_Registro";
    $result = mysqli_query($link, $sql);
    
    $table_data = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $table_data .= '<tr>';
        foreach ($row as $key => $value) {
            $table_data .= '<td>' . $value . '</td>';
        }
    }

    $html = '
    <html>
        <head>
            <meta charset="utf-8">
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700;800&display=swap" rel
            ="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        </head>
        <style>
            .encabezado img{
                float: left;
            }
            
            .encabezado div{
                padding-left: .5cm;
                float: left;
            }
            
            .encabezado h1{
                font-family: "Montserrat", sans-serif;
                margin-top: 9px;
            }
    
            .registros {
                margin-top: 2.5cm;
                border-collapse: collapse;
                width: 100%;
                font-family: "Roboto", sans-serif;
            }

            .registros th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 2px 0px 2px 5px;
            }

            .registros th {
                background-color: #4A4A4A;
                color: white;
            }
    
            img{
                width: 2cm;
                height: 2cm;
            }
        </style>
        <body>
            <div class="encabezado">
                <img src="https://registroingresoem.000webhostapp.com/assets/logo-metalurgica.png">
                <div>
                    <h1>Registro completo de empleados</h1>
                </div>
            </div>
            <table class="registros">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha</th>
                    <th>Id registro</th>
                </tr>
    ' . $table_data . '</table></body></html>';
    
    
    
    $dompdf->loadHtml($html);

    $dompdf->render();

    $dompdf->stream("documento.pdf", array('Attachment' => '0'));
}
?>
