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
                    <div class="title_left">
                        <a href="modificar/-1"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Agregar destino</button></a>
                    </div>
                    
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Lista de destinos</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table id="destinos" class="table table-striped table-bordered table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Calificacion</th>
                                        <th>Estado</th>
                                        <th>Opciones</th
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php foreach($destinos as $destino) { ?>
                                        <tr id="row_<?= $destino['id_destino'] ?>">
                                            <td><?= $destino['id_destino'] ?></td>
                                            <td><?= $destino['nombre_destino'] ?></td>
                                            <td><?= $destino['descripcion_destino'] ?></td>
                                            <td><?= $destino['calificacion_destino'] ?></td>
                                            <td><?= $destino['estado_destino'] ?></td>
                                            <td style="width:200px"><a class="btn btn-mini edit-btn" href="<?= base_url() ?>destino/modificar/<?= $destino['id_destino']  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a class="delete btn btn-mini btn-danger delete-btn"  onclick = "deleteOnList(<?= $destino['id_destino'] ?>, '<?= $destino['nombre_destino'] ?>', 'destinos', '../destino/eliminar')" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- /page content -->

                </div>
            </div>


            <!-- FastClick -->
            <script src="<?= base_url(); ?>/resources/panel/js/theme/fastclick/lib/fastclick.js"></script>
            <!-- NProgress -->
            <script src="<?= base_url(); ?>/resources/panel/js/theme/nprogress/nprogress.js"></script>
            <!-- datatables Libraries -->
            <?php $this->load->view('panel/includes/datatables') ?>

            <script src="<?= base_url(); ?>/resources/panel/js/theme/jszip/dist/jszip.min.js"></script>
            <script src="<?= base_url(); ?>/resources/panel/js/theme/pdfmake/build/pdfmake.min.js"></script>
            <script src="<?= base_url(); ?>/resources/panel/js/theme/pdfmake/build/vfs_fonts.js"></script>

            <script>
                function borrar(id){
                    if(confirm("Está Seguro de eliminar el destino?")){
                        var nTr = $("#row_"+id)[0];
                        var oTable = $('#destinos').dataTable();


                        oTable.fnDeleteRow(nTr, function(){
                            $.post('<?= site_url()?>destino/eliminar',{id : id},
                                function(data){
                                    respuesta = eval('(' +data+ ')');

                                    $().toastmessage('showToast', {text : respuesta.mensaje, position : 'top-center', type : respuesta.estado });

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
                    var handleDataTableButtons = function() {
                        if ($("#datatable-buttons").length) {
                            $("#datatable-buttons").DataTable({
                                dom: "Bfrtip",
                                buttons: [
                                    {
                                        extend: "copy",
                                        className: "btn-sm"
                                    },
                                    {
                                        extend: "csv",
                                        className: "btn-sm"
                                    },
                                    {
                                        extend: "excel",
                                        className: "btn-sm"
                                    },
                                    {
                                        extend: "pdfHtml5",
                                        className: "btn-sm"
                                    },
                                    {
                                        extend: "print",
                                        className: "btn-sm"
                                    },
                                ],
                                responsive: true
                            });
                        }
                    };

                    TableManageButtons = function() {
                        "use strict";
                        return {
                            init: function() {
                                handleDataTableButtons();
                            }
                        };
                    }();

                    $('#datatable').dataTable();
                    $('#datatable-keytable').DataTable({
                        keys: true
                    });

                    $('#datatable-responsive').DataTable();

                    $('#datatable-scroller').DataTable({
                        ajax: "js/datatables/json/scroller-demo.json",
                        deferRender: true,
                        scrollY: 380,
                        scrollCollapse: true,
                        scroller: true
                    });

                    var table = $('#datatable-fixed-header').DataTable({
                        fixedHeader: true
                    });

                    TableManageButtons.init();
                });
            </script>
            <!-- /Datatables -->
</body>
</html>

