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

?>
    <div class="container">
        <!--<div style="text-align: center">
            <img alt="image" class="img-circle" src="<?php echo base_url();?>Tema/Static_Full_Version/img/factura.png" style="width: 70%;"/>
        </div>-->
        <table class="table table-bordered">
            <tr>
                <th colspan="3" style="text-align: center">Control de Monedas</th>
            </tr>
            <tr>
                <td class="cen">Billete</td>
                <td class="cen">Cantidad</td>
                <td class="cen">Total</td>
            </tr>
            <tr>
                <td>L 500</td>
                <td><?php echo $mon->{'500lemp'};?></td>
                <td><?php echo number_format(500 * ($mon->{'500lemp'}),0,'.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>L 200</td>
                <td><?php echo $mon->{'200lemp'};?></td>
                <td><?php echo number_format(200 * ($mon->{'200lemp'}),0,'.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>L 100</td>
                <td><?php echo $mon->{'100lemp'};?></td>
                <td><?php echo number_format(100 * ($mon->{'100lemp'}),0,'.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>L 50</td>
                <td><?php echo $mon->{'50lemp'};?></td>
                <td><?php echo number_format(50 * ($mon->{'50lemp'}),0,'.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>L 20</td>
                <td><?php echo $mon->{'20lemp'};?></td>
                <td><?php echo number_format(20 * ($mon->{'20lemp'}),0,'.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>L 10</td>
                <td><?php echo $mon->{'10lemp'};?></td>
                <td><?php echo number_format(10 * ($mon->{'10lemp'}),0,'.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>L 5</td>
                <td><?php echo $mon->{'5lemp'};?></td>
                <td><?php echo number_format(5 * ($mon->{'5lemp'}),0,'.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>L 2</td>
                <td><?php echo $mon->{'2lemp'};?></td>
                <td><?php echo number_format(2 * ($mon->{'2lemp'}),0,'.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>L 1</td>
                <td><?php echo $mon->{'1lemp'};?></td>
                <td><?php echo number_format(1 * ($mon->{'1lemp'}),0,'.',',');?> Lps.</td>
            </tr>
            <tr>
                <th colspan="2" class="cen"><Strong>Total</Strong></th>
                <td><?php echo number_format(1 * ($mon->{'Total'}),0,'.',',');?> Lps.</td>
            </tr>
            <tr>
                <th colspan="2" class="cen"><strong>(-) Total en Caja</strong></th>
                <td><?php echo number_format(1 * ($mon->{'Caja_Fija'}),0,'.',',');?> Lps.</td>
            </tr>
            <tr>
                <th colspan="2" class="cen"><strong>Disponible</strong></th>
                <td><?php echo number_format(1 * ($mon->{'TotalDia'}),0,'.',',');?> Lps.</td>
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
