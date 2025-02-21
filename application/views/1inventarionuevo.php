<!DOCTYPE html>
<html>
<head>
<?php include "head.php"; ?>
<link href="<?php echo base_url();?>Tema/Static_Full_Version/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
</head>
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
                            <h1>Inventario</h>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($inv as $inve) {
                                    ?>
                                    <tr>
                                    <form action="<?php echo base_url();?>index.php/Inventario/InventarioActualizar" method="GET">
                                        <td><?php echo $inve->Producto;?></td>
                                        <td>
                                            <input type="number" value="<?php echo $inve->Cantidad;?>" name="Cantidad" class="form-control">
                                            <input type="hidden" value="<?php echo $inve->ID;?>" name="ID">
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-success  dim" type="button"><i class="fa-solid fa-floppy-disk"></i></button>
                                        </td>
                                    </form>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>Tema/Static_Full_Version/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url();?>Tema/Static_Full_Version/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>Tema/Static_Full_Version/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>Tema/Static_Full_Version/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?php echo base_url();?>Tema/Static_Full_Version/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>Tema/Static_Full_Version/js/inspinia.js"></script>
    <script src="<?php echo base_url();?>Tema/Static_Full_Version/js/plugins/pace/pace.min.js"></script>
    <?php include "footer.php"; ?>         
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]
            });
        });
    </script>                       
</body>
</html>
