<!DOCTYPE html>
<html>
<head>
<?php include "head.php"; ?>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<style>
    .crud-action {
    float: none!important;
    margin-left: 0px!important;
    padding: 0px;
    margin-right: 0px!important;
    }
    a {
    color: #fff!important;
    text-decoration: none;
    }
    .btn-success {
        background-color: #1c84c6!important;
        border-color: #1c84c6!important;
        color: #FFFFFF!important;
    }
</style>
<body>
    <div id="wrapper">
        <?php include "menu.php";?>
        <div id="page-wrapper" class="gray-bg">
            <?php include "top.php"; ?>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h1>Cierre de Caja</h>
                        </div>
                        <div class="ibox-title">
                            <div style='height:20px;'></div>  
                            <div style="padding: 10px">
                                <?php echo $output; ?>
                            </div>
                            <?php foreach($js_files as $file): ?>
                                <script src="<?php echo $file; ?>"></script>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>  
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sucursalInput = document.getElementById('ID_Sucursal_field_box');
            var cajeroInput = document.getElementById('ID_Cajero_field_box');
            var totalInput = document.getElementById('Total_field_box');
            var TotalDiaInput = document.getElementById('TotalDia_field_box');
            var Caja_FijaInput = document.getElementById('Caja_Fija_field_box');
            if (sucursalInput) {
                sucursalInput.style.display = 'none';
            }
            if (cajeroInput) {
                cajeroInput.style.display = 'none';
            }
            if (totalInput) {
                totalInput.style.display = 'none';
            }
            if (TotalDiaInput) {
                TotalDiaInput.style.display = 'none';
            }
            if (Caja_FijaInput) {
                Caja_FijaInput.style.display = 'none';
            }
            let saveButton = document.getElementById("form-button-save");
            if (saveButton) {
                saveButton.style.display = "none";
            }
        });
    </script>                             
</body>
</html>
