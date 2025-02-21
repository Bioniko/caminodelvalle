<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link href="<?php echo base_url();?>Tema/Static_Full_Version/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <style>
        .table th {
            background-color: #c20003!important;
            color: #fff;
        }
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
//print_r($gas);
$TotalVenta = 0.00;
$TotalVenta =   (doubleval($mon->Efectivo)) +
                (doubleval($mon->Bac)) +
                (doubleval($mon->Promerica)) +
                (doubleval($mon->Banpais)) +
                (doubleval($mon->Transferencia)) +
                (doubleval($mon->Cheque)) +
                (doubleval($mon->Devoluciones)) +
                (doubleval($mon->Hugo)) +
                (doubleval($mon->Pedidos_Ya)) +
                (doubleval($mon->Distegu)) +
                (doubleval($mon->Ocho)) +
                (doubleval($mon->Deliverys)) +
                (doubleval($mon->HugoBusiness)) +
                (doubleval($mon->Speedy)) +
                (doubleval($mon->Empleados)) +
                (doubleval($mon->FamiliadelValle)) +
                (doubleval($mon->Otro));
//print_r($mon);
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
// Resultados
//echo "Fecha: $fecha\n";
//echo "Hora: $Hora\n";
?>
    <!--<button id="copyToClipboard" class="btn-whatsapp">Enviar por WhatsApp <i class="fa-brands fa-whatsapp"></i></button>-->
    <div id="capture" class="container">
    <div style="text-align: center">
            <img alt="image" class="img-circle" src="<?php echo base_url();?>Tema/Static_Full_Version/img/factura.png" style="width: 70%;"/>
        </div>
        <table class="table table-bordered">
            <tr>
                <th colspan="2" style="text-align: center">Camino del Valle - <?php echo $_COOKIE['Nombre'];?></th>
            </tr>
            <tr>
                <td class="cen">Arqueo de Caja #</td>
                <td class="cen"><?php echo $_GET['id']?></td>
            </tr>
            <tr>
                <td colspan="2" class="cen"><?php echo $fecha;?></td>
            </tr>
            <tr>
                <td>Hora:</td>
                <td><?php echo $hora;?></td>
            </tr>
            <tr>
                <td>Sucursal:</td>
                <td><?php echo $_COOKIE['Nombre'];?></td>
            </tr>
            <tr>
                <td>Arqueo de Caja #</td>
                <td><?php echo $_GET['id']?></td>
            </tr>
            <tr>
                <td colspan="2">(+) Ingresos (Contado)</td>
            </tr>
            <tr>
                <td>Efectivo</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Efectivo, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Bac</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Bac, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Promérica</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Promerica, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Banpaís</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Banpais, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Transferencia</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Transferencia, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Cheque</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Cheque, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Devoluciones</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Devoluciones, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td colspan="2">(+) Ingresos (Crédito)</td>
            </tr>
            <tr>
                <td>Hugo</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Hugo, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Pedidos Ya</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Pedidos_Ya, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Distegu</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Distegu, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Ocho</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Ocho, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Deliverys</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Deliverys, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Hugo Business</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->HugoBusiness, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Speedy</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Speedy, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Empleados</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Empleados, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Familia del Valle</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->FamiliadelValle, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Otros</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Otro, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <th>Total Venta</th>
                <th><?php echo number_format($TotalVenta, 2, '.', ',');?> Lps.</th>
            </tr>
            <tr>
                <td colspan="2">(-) Compras y Gastos</td>
            </tr>
            <?php
            $TotalCyG = 0.00;
            foreach ($gas as $cyg) {
                if($cyg != null){ 
                    if($cyg->ID_Gasto == '1'){
                        $TotalCyG = $TotalCyG + (doubleval($cyg->Valor));
            ?>
            <tr>
                <td><?php echo $cyg->Descripcion;?></td>
                <td><?php echo number_format($cyg->Valor, 2, '.', ',')." Lps.";?></td>
            </tr>
            <?php
                    }
                }else{
            ?>
            <tr>
                <td>-</td>
                <td>-</td>
            </tr>
            <?php
                }
            }
            ?>
            <tr>
                <th>Total CyG:</th>
                <th><?php echo number_format($TotalCyG, 2, '.',',')." Lps.";?></th>
            </tr>
            <tr>
                <td colspan="2">(-) Pago Envíos</td>
            </tr>
            <?php
            $TotalPG = 0.00;
            foreach ($gas as $pe) {
                if($pe != null){ 
                    if($pe->ID_Gasto == '2'){
                        $TotalPG = $TotalPG + (doubleval($pe->Valor));
            ?>
            <tr>
                <td><?php echo $pe->Descripcion;?></td>
                <td><?php echo number_format($pe->Valor, 2, '.', ',')." Lps.";?></td>
            </tr>
            <?php
                    }
                }else{
            ?>
            <tr>
                <td>-</td>
                <td>-</td>
            </tr>
            <?php
                }
            }
            ?>
            <tr>
                <th>Total Envíos:</th>
                <th><?php echo number_format($TotalPG, 2, '.',',')." Lps.";?></th>
            </tr>
            <tr>
                <td colspan="2">(-) Adelantos de Salario</td>
            </tr>
            <?php
            $TotalADS = 0.00;
            foreach ($gas as $ads) {
                if($ads != null){ 
                    if($ads->ID_Gasto == '7'){
                        $TotalADS = $TotalCyG + (doubleval($ads->Valor));
            ?>
            <tr>
                <td><?php echo $ads->Descripcion;?></td>
                <td><?php echo number_format($ads->Valor, 2, '.', ',')." Lps.";?></td>
            </tr>
            <?php
                    }
                }else{
            ?>
            <tr>
                <td>-</td>
                <td>-</td>
            </tr>
            <?php
                }
            }
            $TotalSalidda = 0.00;
            $TotalTarjeta = 0.00;
            $TotalTransferencia = 0.00;
            $TotalCheque = 0.00;
            $TotalAlCredito = 0.00;
            $TotalDevoluciones = 0.00;
            $TotalNotaCredddito = 0.00;
            $Disponible = 0.00;
            $TotalSalidas = 0.00;
            foreach ($gas as $valor) {
                if($valor != null){ 
                    if($valor->ID_Gasto == '3'){
                        $TotalTarjeta = $TotalTarjeta + (doubleval($valor->Valor));
                    }
                    if($valor->ID_Gasto == '4'){
                        $TotalTransferencia = $TotalTransferencia + (doubleval($valor->Valor));
                    }
                    if($valor->ID_Gasto == '5'){
                        $TotalCheque = $TotalCheque + (doubleval($valor->Valor));
                    }
                    if($valor->ID_Gasto == '6'){
                        $TotalAlCredito = $TotalAlCredito + (doubleval($valor->Valor));
                    }
                    if($valor->ID_Gasto == '8'){
                        $TotalDevoluciones = $TotalDevoluciones + (doubleval($valor->Valor));
                    }
                    if($valor->ID_Gasto == '9'){
                        $TotalNotaCredddito = $TotalNotaCredddito + (doubleval($valor->Valor));
                    }
                }
            }    
            $Disponible =   (doubleval($mon->Efectivo)) -
                            ($TotalTransferencia) -
                            ($TotalCheque) -
                            ($TotalAlCredito) -
                            ($TotalCyG) -
                            ($TotalPG) -
                            ($TotalADS) -
                            ($TotalDevoluciones) -
                            ($TotalNotaCredddito);
            $TotalSalidas = ($TotalCyG) + ($TotalPG) + ($TotalADS);
            ?>
            <tr>
                <th>Total Ads:</th>
                <th><?php echo number_format($TotalADS, 2, '.',',')." Lps.";?></th>
            </tr>
            <tr>
                <th>Total Salidas:</th>
                <th><?php echo number_format($TotalSalidas,2,'.',',')." Lps."?></th>
            </tr>
            <tr>
                <td colspan="2" class="cen"><strong>CÁLCULO</strong></td>
            </tr>
            <tr>
                <td>(+) Venta</td>
                <td style="background-color: #c4f0cf;color: #4c8a4a"><?php echo number_format($mon->Efectivo, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Tarjeta</td>
                <td style="background-color: #ffc4cf;color: #b96b74"><?php echo number_format($TotalTarjeta, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Transferencia</td>
                <td style="background-color: #ffc4cf;color: #b96b74"><?php echo number_format($TotalTransferencia, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Cheque</td>
                <td style="background-color: #ffc4cf;color: #b96b74"><?php echo number_format($TotalCheque, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Al Crédito</td>
                <td style="background-color: #ffc4cf;color: #b96b74"><?php echo number_format($TotalAlCredito, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) CyG</td>
                <td style="background-color: #ffc4cf;color: #b96b74"><?php echo number_format($TotalCyG, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Pagos Envíos</td>
                <td style="background-color: #ffc4cf;color: #b96b74"><?php echo number_format($TotalPG, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Ads</td>
                <td style="background-color: #ffc4cf;color: #b96b74"><?php echo number_format($TotalADS, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Devoluciones</td>
                <td style="background-color: #ffc4cf;color: #b96b74"><?php echo number_format($TotalDevoluciones, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Nota de Crédito</td>
                <td style="background-color: #ffc4cf;color: #b96b74"><?php echo number_format($TotalNotaCredddito, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <th>Disponible:</th>
                <th style="background-color: #ffc4cf;color: #fff"><?php echo number_format($Disponible, 2, '.',',');?> Lps.</th>
            </tr>
            <tr>
                <td colspan="2">Producto en existencia</td>
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
                <th colspan="2" class="cen"><strong>Observaciones</strong></th>
            </tr>
            <tr>
                <td colspan="2"><?php echo $mon->Descripcion;?></td>
            </tr>
            <tr>
                <td colspan="2" class="cen">Disponible Acumulado</td>
            </tr>
            <tr>
                <th>Por depositar</th>
                <th><?php echo number_format($Disponible, 2, '.',',');?> Lps.</th>
            </tr>
        </table>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const element = document.getElementById('capture');
            const scale = 2; // Aumentar la escala para mayor resolución

            html2canvas(element, {
                scale: scale, // Escala para alta resolución
                useCORS: true // Asegurar que se permita cargar recursos externos si los hay
            }).then(canvas => {
                canvas.toBlob(function (blob) {
                    const item = new ClipboardItem({ "image/png": blob });
                    navigator.clipboard.write([item]).then(() => {
                        const numeroTelefono = "504<?php echo $adm->Celular; ?>";
                        const urlWhatsApp = `https://web.whatsapp.com/send?phone=${numeroTelefono}`;
                        window.location.href = urlWhatsApp;
                    }).catch(err => {
                        alert("Error al copiar la imagen: " + err);
                    });
                });
            });
        });
    </script>
</body>
</html>
