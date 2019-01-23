<?php


/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 23/05/2016
 * Time: 03:40 PM
 */
?>
<?php $this->load->view('panel/includes/tags') ?>


<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <!-- sidebar menu -->
                <?php $this->load->view('panel/includes/side-bar') ?>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <?php $this->load->view('panel/includes/top_navigation'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <a href="<?= base_url() ?>actividad/modificarpaquete/<?= $id_actividad ?>/-1"><button  type="button" class="btn btn-primary btn-sm"><i style="margin-right: 5px;" class="fa fa-plus"></i>Agregar actividad al paquete</button></a>
                        <a href="<?= base_url() ?>actividad/modificar/<?= $id_actividad ?>"><button  type="button" class="btn btn-primary btn-sm"><i style="margin-right: 5px;" class="fa fa-shopping-cart"></i>Modificar paquete</button></a>
                        <!-- <button id="show-category-btn" type="button" class="btn btn-primary">Administrar categorias</button> -->
                    </div>


                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Actividad: <?= $actividad[0]['titulo_actividades'] ?></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <table id="paquetes" class="table table-striped table-bordered table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th style="width: 200px;">Titulo</th>
                                        <th>Precio COP</th>
                                        <th>Precio USD</th>
                                        <th>Duracion</th>
                                        <th>Destinos</th>
                                        <th>Estado</th>
                                        <th style="width: 100px;">Opciones</th>
                                    </tr>
                                    </thead>
                                        <?
                                            if ($paquetes != 0) {
                                                foreach ($paquetes as $paquete) {
                                        ?>
                                                    <tr title="" id="row_<?= $paquete['id_planes_actividad'] ?>">
                                                        <td><?= $paquete['id_planes_actividad'] ?></td>
                                                        <td><?= $paquete['titulo_planes_actividad'] ?></td>
                                                        <td>$<?= number_format($paquete['precioa_planes_actividad_cop'], 0, ',', '.') ?></td>
                                                        <td>$<?= number_format($paquete['precioa_planes_actividad_usd'], 2, '.', ',') ?></td>
                                                        <td><?= $paquete['duracion_planes_actividad'] ?></td>
                                                        <td>
                                                            <?
                                                                $destinos = explode(',', $paquete['destino_planes_actividad']);
                                                                if (count($destinos) > 0 && !empty($paquete['destino_planes_actividad'])) {
                                                                    for($i = 0; $i < count($destinos); $i++) {
                                                            ?>
                                                                        <span class="label label-success"><?= $destinos[$i] ?></span>
                                                            <?
                                                                    }
                                                                } 
                                                            ?>
                                                        </td>
                                                       <td><?= $paquete['estado_planes_actividad'] ?></td>
                                                        <td style="width:100px">
                                                            <a class="btn btn-mini edit-btn" href="<?= base_url() ?>actividad/modificarpaquete/<?= $id_actividad ?>/<?= $paquete['id_paquete']  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 

                                                            <!-- El botón eliminar actividad no quiere funcionar, hay que modificiar -->

                                                            <a class="delete btn btn-mini btn-danger delete-btn" href="javascript:eliminar_PlanActividad(<?= $paquete['id_planes_actividad'] ?>)" ><i class="fa fa-trash" aria-hidden="true"></i></a>




                                                        </td>
                                                    </tr>
                                        <?
                                                }
                                            }
                                        ?>
                                    <tbody>
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- /page content -->

                </div>
            </div>

            <!-- datatables Libraries -->
            <?php $this->load->view('panel/includes/datatables') ?>

   

            <!-- Javascript Libraries -->
            <?php $this->load->view('panel/includes/footer') ?>

            <!-- Datatables -->
            <script>
                $(document).ready(function() {
                    

                    $('#paquetes').dataTable({
                         "order": [[ 0, "desc" ]]
                    });
                   
                });
            </script>
            <!-- /Datatables -->
</body>
</html>
