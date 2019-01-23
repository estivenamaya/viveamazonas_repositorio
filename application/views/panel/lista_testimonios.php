<?php
/**
 * Created by PhpStorm.
 * User: Nikollai Hernandez
 * Date: 23/05/2016
 * Time: 04:57 PM
 */
?>
<?php $this->load->view('panel/includes/tags'); ?>

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
                        <a href="<?= base_url() ?>testimonio/editar/-1"><button  type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Añadir testimonio</button></a>
                    </div>
                    
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><small>Lista de servicios</small></h2>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <p class="text-muted font-13 m-b-30">
                                    Lista de testimonios
                                </p>
                                <table id="testimonios" class="table table-striped table-bordered table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Testimonio</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php 

                                        if ($testimonios != 0) {

                                            foreach($testimonios as $testimonio) { 
                                                if (!empty($testimonio['imagen_testimonio'])) {
                                                   $imagen = base_url()."uploads/testimonios/".$testimonio['imagen_testimonio'];
                                                }
                                                else{
                                                    $imagen = base_url()."uploads/testimonios/404.jpg";
                                                }
                                    ?>
                                        
                                                <tr id="row_<?= $testimonio['id_testimonio'] ?>">
                                                <form enctype="multipart/form-data" method="post" name=form action="">
                                                    <td><?= $testimonio['id_testimonio'] ?>
                                                        <input type="hidden" value="<?= $testimonio['id_testimonio'] ?>" name="info[id_testimonio]" >
                                                    </td>
                                                    <td class="align-center"> 
                                                        <img id="img-testimonio-<?= $testimonio['id_testimonio'] ?>" style="margin-bottom: 10px;" width="70" height="70" src="<?= $imagen ?>">
                                                        
                                                    </td>
                                                    <td>
                                                        <?= $testimonio['nombre_testimonio'] ?>
                                                    </td>
                                                    
                                                    <td style="width:400px;"> 
                                                        <?= $testimonio['texto_testimonio'] ?>
                                                    </td>
                                                    <td style="width:150px">
                                                        <a href="<?= base_url() ?>testimonio/editar/<?= $testimonio['id_testimonio'] ?>" class="btn btn-mini edit-btn"><i class="fa fa-pencil" aria-hidden="true"></i>
                                                        </a>
                                                        <button class="btn-success btn" type="submit"><i class="fa fa-save" aria-hidden="true"></i></button>
                                                    </td>
                                                    <form>
                                                </tr>
                                        
                                    <?php
                                            } 
                                        }
                                    ?>
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
                    if(confirm("Está Seguro de eliminar el testimonio?")){
                        var nTr = $("#row_"+id)[0];
                        var oTable = $('#servicios').dataTable();


                        oTable.fnDeleteRow(nTr, function(){
                            $.post('<?= site_url()?>testimonio/eliminar',{id : id},
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

                    $('#testimonios').dataTable({
                        "order": [[ 0, "desc" ]]
                    });
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

