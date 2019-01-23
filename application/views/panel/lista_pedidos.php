<?php
/**
 * Created by PhpStorm.
 * User: Nikollai Hernandez
 * Date: 23/05/2016
 * Time: 04:57 PM
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

                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Lista de ordenes<small></small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <p class="text-muted font-13 m-b-30">
                                    
                                </p>
                                <table id="ordenes" class="table table-striped table-bordered table-condensed">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Cliente</th>
                                        <th>Ubicación</th>
                                        <th>Fecha y hora</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <? 
                                            if ($ordenes != 0) {

                                                foreach($ordenes as $orden) { ?>
                                                    <tr id="row_<?= $orden['id_orden'] ?>">
                                                      <td><?= $orden['id_orden'] ?></td>
                                                      <td><?= $orden['nombre_usuarios'].' '.$orden['apellido_usuarios'] ?></td>
                                                      <td><?= $orden['nombre_municipio'].', '.$orden['nombre'] ?></td>
                                                      <td><?= $orden['fecha_orden'].', '.$orden['hora_orden'] ?></td>
                                                      <td><p class="btn-est est-<?= str_replace(' ', '-', strtolower($orden['estado_orden']))  ?>"><?= $orden['estado_orden'] ?></p></td>
                                                      <td style="width:100px"><a class="btn btn-mini btn-success" href="<?= base_url() ?>pedido/editar/<?= $orden['id_orden']  ?>"><i class="fa fa-eye"></i></a>  <a class="delete btn btn-mini btn-danger"  href="javascript:borrar(<?= $orden['id_orden'] ?>)" ><i class="fa fa-trash"></i></a></td>
                                                    </tr>
                                            <? }

                                            } ?>
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

            <script>
                function borrar(id){
                    if(confirm("Está Seguro de eliminar la orden?")){
                        var nTr = $("#row_"+id)[0];
                        var oTable = $('#ordenes').dataTable();


                        oTable.fnDeleteRow(nTr, function(){
                            $.post('<?= site_url()?>pedido/eliminar',{id : id},
                                function(data){

                                })
                        })
                    }
                }
            </script>

            <!-- Javascript Libraries -->
            <?php $this->load->view('panel/includes/footer') ?>

            <!-- Datatables -->
            <script>
                $(document).ready(function() {
                    $('#ordenes').dataTable({
                        order: [[0, 'desc']]
                    });
                });
            </script>
            <!-- /Datatables -->
</body>
</html>

