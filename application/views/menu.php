<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header" style="text-align: center;">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url();?>Tema/Static_Full_Version/img/profile_small.png" style="width: 40%;"/>
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class=""> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_COOKIE['Nombre_Cajero']." ".$_COOKIE['Apellido_Cajero'];?></strong>
                             </span> <span class="text-muted text-xs block">Cuenta: <?php echo $_SESSION['tipo_acceso'];?></span> </span> </a>
                        </div>
                        <div class="logo-element">
                        <img alt="image" class="img-circle" src="<?php echo base_url();?>Tema/Static_Full_Version/img/profile_small.png" style="width: 40%;"/>
                        </div>
                    </li>
                    <?php 
                        if($_SESSION['tipo_acceso'] == 'Admin'){
                    ?>
                    <li>
                        <a href="#"><i class="fa-solid fa-gear"></i><span class="nav-label">Ajustes</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="<?php echo base_url();?>index.php/CajaFija/Show"><i class="fa-solid fa-money-bill"></i><span class="nav-label">Caja Fija</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/Cajeros/Show"><i class="fa-solid fa-circle-user"></i><span class="nav-label">Cajeros</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/Sucursal/Show"><i class="fa-solid fa-shop"></i><span class="nav-label">Sucursal</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/TipoGasto/Show"><i class="fas fa-sort-amount-down-alt"></i><span class="nav-label">Tipo de Gasto</span></a>
                            </li>
                        </ul>
                    </li>
                    <?php 
                        }
                    ?>
                    <li>
                        <a href="<?php echo base_url();?>index.php/GastoVenta/Show"><i class="fas fa-sort-amount-down-alt"></i><span class="nav-label">Gasto de Venta</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/Moneda/Show"><i class="fa-solid fa-cash-register"></i><span class="nav-label">Cierre de Caja</span></a>
                    </li>
                    <?php 
                        if($_SESSION['tipo_acceso'] == 'Admin'){
                    ?>
                    <li>
                        <a href="<?php echo base_url();?>index.php/Inventario/Show"><i class="fa-solid fa-carrot"></i> <span class="nav-label">Inventario</span></a>
                    </li>
                    <?php 
                        }else{
                    ?>
                    <li>
                        <a href="<?php echo base_url();?>index.php/Inventario/InventarioNuevo"><i class="fa-solid fa-carrot"></i> <span class="nav-label">Inventario</span></a>
                    </li>
                    <?php 
                        }
                    ?>
                    <?php 
                        if($_SESSION['tipo_acceso'] == 'Admin'){
                    ?>
                    <li>
                        <a href="<?php echo base_url();?>index.php/Reporte/Show"><i class="fa-regular fa-chart-bar"></i><span class="nav-label">Reporte</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/Login/Show"><i class="fa-solid fa-right-to-bracket"></i><span class="nav-label">Login</span></a>
                    </li>
                    <?php 
                        }
                    ?>
                </ul>

            </div>
        </nav>