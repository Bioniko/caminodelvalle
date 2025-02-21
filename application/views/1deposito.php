<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        .cen {
            text-align: center !important;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
            width: 80mm;
        }
        .container {
            width: 100%;
            padding: 5px;
        }
        .header {
            text-align: center;
        }
        .header img {
            max-width: 100%;
            height: auto;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .table th, .table td {
            text-align: left;
            padding: 5px;
        }
        .table th {
            background-color: #000;
            color: #fff;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #ddd;
        }
        .btn-whatsapp {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            background-color: #075e54;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-whatsapp:hover {
            background-color: #128c7e;
        }
    </style>
</head>
<body>
<?php
$fechaCompleta = $mon->Fecha;
$dateTime = new DateTime($fechaCompleta);
$fecha = $dateTime->format('d/m/Y');
$hora = $dateTime->format('h:i:s a');
//echo "Fecha: " . $fecha . "\n";
//echo "Hora: " . $hora;
// Fecha inicial
$fechaOriginal = $mon->Fecha;
// Crear un objeto DateTime
$datetime = new DateTime($fechaOriginal);
// Formatear la fecha
$diaSemana = $datetime->format('l'); // Nombre del día en inglés
$diasEspañol = [
    'Monday' => 'Lunes',
    'Tuesday' => 'Martes',
    'Wednesday' => 'Miércoles',
    'Thursday' => 'Jueves',
    'Friday' => 'Viernes',
    'Saturday' => 'Sábado',
    'Sunday' => 'Domingo'
];
$diaSemanaEsp = $diasEspañol[$diaSemana]; // Traducción al español
$mes = $datetime->format('F'); // Nombre del mes en inglés
$mesesEspañol = [
    'January' => 'enero',
    'February' => 'febrero',
    'March' => 'marzo',
    'April' => 'abril',
    'May' => 'mayo',
    'June' => 'junio',
    'July' => 'julio',
    'August' => 'agosto',
    'September' => 'septiembre',
    'October' => 'octubre',
    'November' => 'noviembre',
    'December' => 'diciembre'
];
$mesEsp = $mesesEspañol[$mes]; // Traducción al español
$dia = $datetime->format('j'); // Día del mes
$año = $datetime->format('Y'); // Año completo
$fecha = "$diaSemanaEsp, $dia de $mesEsp del $año";
// Formatear la hora
$hora = $datetime->format('h:i:s a'); // Hora con formato de 12 horas
$horaFormateada = str_replace(['am', 'pm'], ['a.m.', 'p.m.'], $hora); // Reemplazar AM/PM por a.m./p.m.
$Hora = $horaFormateada;
?>
    <div class="container">
        <!--<div style="text-align: center">
            <img alt="image" class="img-circle" src="<?php echo base_url();?>Tema/Static_Full_Version/img/factura.png" style="width: 70%;"/>
        </div>-->
        <table class="table table-bordered">
            <tr>
                <td colspan="2" class="cen">Camino del Valle - <?php echo $_COOKIE['Nombre']?></td>
            </tr>
            <tr>
                <th colspan="2" class="cen"><strong>Control de Desposito</strong></th>
            </tr>
            <tr>
                <td colspan="2" class="cen"><?php echo $fecha;?></td>
            </tr>
            <tr>
                <td>Hora:</td>
                <td><?php echo $hora;?></td>
            </tr>
            <tr>
                <td>Cajero:</td>
                <td><?php echo $caj->Nombre." ".$caj->Apellido; ?></td>
            </tr>
            <tr>
                <td>Sucursal:</td>
                <td><?php echo $_COOKIE['Nombre'];?></td>
            </tr>
            <tr>
                <td>Tipo</td>
                <td>Deposito</td>
            </tr>
            <tr>
                <td>Depositado por:</td>
                <td><?php echo $_COOKIE['Nombre'];?></td>
            </tr>
            <tr>
                <th><strong>Disponible</strong></th>
                <th><?php echo number_format($mon->Efectivo,2,'.',',');?></th>
            </tr>
            <tr>
                <th><strong>Otros Ingresos</strong></th>
                <th>-</th>
            </tr>
            <tr>
                <th><strong>Total</strong></th>
                <th><?php echo number_format($mon->Efectivo,2,'.',',');?></th>
            </tr>
            <tr>
                <th colspan="2" class="cen"><strong>Referencia</strong></th>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr>
            <tr>
                <th colspan="2" class="cen"><strong>Observacion</strong></th>
            </tr>
            <tr>
                <td colspan="2"><?php echo $mon->DescripcionDep?></td>
            </tr>
        </table>
    </div>
<?php

?>
<script>
    window.onafterprint=function(){
        window.close();
    }
    window.print();
    window.close();
</script>
</body>
</html>
