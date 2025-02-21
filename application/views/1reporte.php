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
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        background-color: #ffffff;
        padding: 20px 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        max-width: 400px;
        width: 100%;
        text-align: center;
    }
    h1 {
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: #333;
    }
    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    label {
        font-size: 0.9rem;
        color: #666;
        text-align: left;
    }
    input[type="date"] {
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    button {
        padding: 10px 20px;
        font-size: 1rem;
        color: #fff;
        background-color: #007BFF;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    button:hover {
        background-color: #0056b3;
    }
    .error {
        color: red;
        font-size: 0.85rem;
        display: none;
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
                            <h1></h>
                        </div>
                        <div class="container">
                            <h1>Generar Reporte</h1>
                            <form id="reportForm" action="<?php echo base_url();?>index.php/Reporte/Ver" method="GET">
                                <div>
                                    <label for="startDate">Fecha Desde:</label>
                                    <input type="date" id="startDate" name="Desde" required>
                                </div>
                                <div>
                                    <label for="endDate">Fecha Hasta:</label>
                                    <input type="date" id="endDate" name="Hasta" required>
                                </div>
                                <p class="error" id="error">La fecha "Desde" no puede ser mayor que la fecha "Hasta".</p>
                                <button type="submit">Generar Reporte</button>
                            </form>
                            <div class="ibox-title" style="display: none">
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
    </div> 
    <?php include "footer.php";?>        
    <script>
        document.getElementById('reportForm').addEventListener('submit', function (event) {
            event.preventDefault();
            var form = document.getElementById('reportForm');
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const error = document.getElementById('error');

            // Validar que "Desde" no sea mayor que "Hasta"
            if (new Date(startDate) > new Date(endDate)) {
                error.style.display = 'block';
            } else {
                error.style.display = 'none';
                form.submit();
                // Aquí puedes realizar la acción deseada, como enviar los datos al servidor
            }
        });

        // Permitir el uso de "Enter" para enviar
        document.getElementById('reportForm').addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                document.querySelector('button[type="submit"]').click();
            }
        });
    </script>                     
</body>
</html>
