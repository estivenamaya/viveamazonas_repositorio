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
                        <a href="<?= base_url() ?>actividad/modificar/-1"><button  type="button" class="btn btn-primary">Agregar actividad</button></a>
                        <!-- <button id="show-category-btn" type="button" class="btn btn-primary">Administrar categorias</button> -->
                    </div>


                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Actividades</h2>
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

                                <table id="actividades" class="table table-striped table-bordered table-condensed">
                                    <thead> 
                                    <tr>
                                        <th>Id</th>
                                        <th style="width: 200px;">Titulo</th>
                                        <th>Precio COP</th>
                                        <th>Precio USD</th>
                                        <th>Descripcion corta</th>
                                        <th>Estado</th>
                                        <th style="width: 100px;">Opciones</th>
                                    </tr>
                                    </thead>
                                        <?
                                            if ($actividades != 0) {
                                                foreach ($actividades as $actividad) {
                                        ?>
                                                    <tr id="row_<?= $actividad['id_actividad'] ?>">
                                                        <td><?= $actividad['id_actividades'] ?></td>
                                                        <td><?= $actividad['titulo_actividades'] ?></td>
                                                        <td>$<?= number_format($actividad['precio_actividades_cop'], 0, ',', '.') ?></td>
                                                        <td>$<?= number_format($actividad['precio_actividades_usd'], 2, '.', ',') ?></td>
                                                        <td><?= $actividad['descripcion_actividades'] ?></td>
                                                        <td><?= $actividad['estado_actividades'] ?></td>
                                                        <td style="width:100px">
                                                            <a class="btn btn-mini edit-btn" href="<?= base_url() ?>actividad/modificar/<?= $actividad['id_actividad']  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                                            <a class="delete btn btn-mini btn-danger delete-btn"  href="javascript:eliminarActividad(<?= $actividad['id_actividad'] ?>)" ><i class="fa fa-trash" aria-hidden="true"></i></a> 
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
                    $('#actividades').dataTable({
                         "order": [[ 0, "desc" ]]
                    });
                   
                });
            </script>
            <!-- /Datatables -->
</body>
</html>
