<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        .cen{
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
        .header h1 {
            margin: 0;
            font-size: 16px;
        }
        .header p {
            margin: 0;
            font-size: 12px;
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
        .totals {
            margin-top: 10px;
        }
        .totals td {
            padding: 5px;
            text-align: right;
        }
        .observations {
            margin-top: 10px;
            border: 1px solid #ddd;
            padding: 5px;
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
?>
    <div class="container">
        <!--<div style="text-align: center">
            <img alt="image" class="img-circle" src="<?php echo base_url();?>Tema/Static_Full_Version/img/factura.png" style="width: 70%;"/>
        </div>-->
        <table class="table table-bordered">
            <tr>
                <th colspan="2" class="cen">Camino del Valle - <?php echo $_COOKIE['Nombre']?></th>
            </tr>
            <tr>
                <td class="cen"><?php echo $fecha?></td>
                <td class="cen"><?php echo $hora?></td>
            </tr>
            <tr>
                <th colspan="2" class="cen"><strong>Existencia de producto</strong></th>
            </tr>
            <tr>
                <th><strong>Producto</strong></th>
                <th><strong>Existencia</strong></th>
            </tr>
            <?php
            foreach ($inv as $inv) {
            ?>
            <tr>
                <td><?php echo $inv->Producto;?></td>
                <td><?php echo $inv->Cantidad;?></td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <th colspan="2"><strong>Observacion</strong></th>
            </tr>
            <tr>
                <td colspan="2"><?php echo $mon->DescripcionInv;?></td>
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
