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
    foreach ($mon as $mon2) {
    $TotalVenta =   $TotalVenta +
                    (doubleval($mon2->Efectivo)) +
                    (doubleval($mon2->Bac)) +
                    (doubleval($mon2->Promerica)) +
                    (doubleval($mon2->Banpais)) +
                    (doubleval($mon2->Transferencia)) +
                    (doubleval($mon2->Cheque)) +
                    (doubleval($mon2->Devoluciones)) +
                    (doubleval($mon2->Pedidos_Ya)) +
                    (doubleval($mon2->Deliverys)) +
                    (doubleval($mon2->Otro));
    }
    $TEfectivo = 0.00;
    $TBac = 0.00;
    $TPromerica = 0.00;
    $TBanpais = 0.00;
    $TTransaferencia = 0.00;
    $TCheque = 0.00;
    $TDevoluciones = 0.00;
    $TPedidosYa = 0.00;
    $TDeliverys = 0.00;
    $TOtro = 0.00;
    foreach ($mon as $mon3) {
        $TEfectivo = $TEfectivo + doubleval($mon3->Efectivo);
        $TBac = $TBac + doubleval($mon3->Bac);
        $TPromerica = $TPromerica + doubleval($mon3->Promerica);
        $TBanpais = $TBanpais + doubleval($mon3->Banpais);
        $TTransaferencia = $TTransaferencia + doubleval($mon3->Transferencia);
        $TCheque = $TCheque + doubleval($mon3->Cheque);
        $TDevoluciones = $TDevoluciones + doubleval($mon3->Devoluciones);
        $TPedidosYa = $TPedidosYa + doubleval($mon3->Pedidos_Ya);
        $TDeliverys = $TDeliverys + doubleval($mon3->Deliverys);
        $TOtro = $TOtro + doubleval($mon3->Otro);
    }
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
                <td colspan="2" class="cen"><?php echo "Desde: ".$_GET['Desde']." Hasta: ".$_GET['Hasta'];?></td>
            </tr>
            <tr>
                <td colspan="2">(+) Ingresos (Contado)</td>
            </tr>
            <tr>
                <td>Efectivo</td>
                <td><?php echo number_format($TEfectivo, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Bac</td>
                <td><?php echo number_format($TBac, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Promérica</td>
                <td><?php echo number_format($TPromerica, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Banpaís</td>
                <td><?php echo number_format($TBanpais, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Transferencia</td>
                <td><?php echo number_format($TTransaferencia, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Cheque</td>
                <td><?php echo number_format($TCheque, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Devoluciones</td>
                <td><?php echo number_format($TDevoluciones, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td colspan="2">(+) Ingresos (Crédito)</td>
            </tr>
            <tr>
                <td>Pedidos Ya</td>
                <td><?php echo number_format($TPedidosYa, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Deliverys</td>
                <td><?php echo number_format($TDeliverys, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <td>Otros</td>
                <td><?php echo number_format($TOtro, 2, '.', ',');?> Lps.</td>
            </tr>
            <tr>
                <th>Total Venta</th>
                <th><?php echo number_format($TotalVenta, 2, '.', ',');?> Lps.</th>
            </tr>
            <?php
            $TotalCyG = 0.00;
            foreach ($gas as $cyg) {
                if($cyg != null){ 
                    if($cyg->ID_Gasto == '1'){
                        $TotalCyG = $TotalCyG + (doubleval($cyg->Valor));
            ?>
            <?php
                    }
                }
            }
            ?>
            <tr>
                <td>(-)Total CyG:</td>
                <td><?php echo number_format($TotalCyG, 2, '.',',')." Lps.";?></td>
            </tr>
            <?php
            $TotalPG = 0.00;
            foreach ($gas as $pe) {
                if($pe != null){ 
                    if($pe->ID_Gasto == '2'){
                        $TotalPG = $TotalPG + (doubleval($pe->Valor));
                    }
                }
            }
            ?>
            <tr>
                <td>(-)Total Envíos:</td>
                <td><?php echo number_format($TotalPG, 2, '.',',')." Lps.";?></td>
            </tr>
            <?php
            $TotalADS = 0.00;
            foreach ($gas as $ads) {
                if($ads != null){ 
                    if($ads->ID_Gasto == '7'){
                        $TotalADS = $TotalCyG + (doubleval($ads->Valor));
                    }
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
            $Disponible =   ($TEfectivo) -
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
                <td>(-)Total Ads:</td>
                <td><?php echo number_format($TotalADS, 2, '.',',')." Lps.";?></td>
            </tr>
            <tr>
                <th>Total Salidas:</th>
                <th><?php echo number_format($TotalSalidas,2,'.',',')." Lps."?></th>
            </tr>
            <tr>
                <td>(+) Venta</td>
                <td><?php echo number_format($TEfectivo, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Tarjeta</td>
                <td><?php echo number_format($TotalTarjeta, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Transferencia</td>
                <td><?php echo number_format($TotalTransferencia, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Cheque</td>
                <td><?php echo number_format($TotalCheque, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Al Crédito</td>
                <td><?php echo number_format($TotalAlCredito, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) CyG</td>
                <td><?php echo number_format($TotalCyG, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Pagos Envíos</td>
                <td><?php echo number_format($TotalPG, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Ads</td>
                <td><?php echo number_format($TotalADS, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Devoluciones</td>
                <td><?php echo number_format($TotalDevoluciones, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <td>(-) Nota de Crédito</td>
                <td><?php echo number_format($TotalNotaCredddito, 2, '.',',');?> Lps.</td>
            </tr>
            <tr>
                <th>Total:</th>
                <th><?php echo number_format($Disponible, 2, '.',',');?> Lps.</th>
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
