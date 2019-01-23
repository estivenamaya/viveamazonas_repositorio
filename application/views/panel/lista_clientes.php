<?php
/**
 * Created by PhpStorm.
 * User: Niko
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
                        <a href="editar/-1"><button  type="button" class="btn btn-primary">Añadir cliente</button></a>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>clientes<small>lista</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <p class="text-muted font-13 m-b-30">
                                </p>
                                <table id="clientes" class="table table-striped table-bordered table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombres</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>Ciudad</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php 
                                        if ($clientes != 0) {
 
                                            foreach($clientes as $cliente){
                                            ?>
                                                <tr id="row_<?= $cliente['id_usuarios'] ?>">
                                                    <td><?= $cliente['id_usuarios'] ?></td>
                                                    <td><?= $cliente['nombre_usuarios'].' '.$cliente['apellido_usuarios'] ?></td>
                                                    <td><?= $cliente['email_usuarios'] ?></td>
                                                    <td><?= $cliente['movil_usuarios'] ?></td>
                                                    <td><?= $cliente['direccion_usuarios'] ?></td>
                                                    <td><?= $cliente['nombre_municipio'].', '.$cliente['nombre'] ?></td>
                                                </tr>
                                        <?php } 
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

            <script>
                //borra un cliente
                function borrar(id){
                    if(confirm("Está Seguro de eliminar el cliente?")){
                        var nTr = $("#row_"+id)[0];
                        var oTable = $('#clientes').dataTable();


                        oTable.fnDeleteRow(nTr, function(){
                            $.post('<?= site_url()?>cliente/eliminar',{id : id},
                                function(data){
                                    respuesta = eval('(' +data+ ')');

                                    $().toastmessage('showToast', {text : respuesta.mensaje, position : 'top-center', type : respuesta.estado });

                                })
                        })
                    }
                }


                $('.check').on('ifChecked', function(e){

                    jQuery.post('<?= site_url()?>/cliente/cambiarPago',
                        { id : this.value, pagado : 'Si' },
                        function(data){
                            resp = eval('(' +data+ ')');
                            if(resp.estado == 'Success'){
                                alert('El pago del cliente ahora está activo');
                            }else{
                                alert(resp.mensaje);
                            }
                        })

                });

                $('.check').on('ifUnchecked', function(e){

                    jQuery.post('<?= site_url()?>/cliente/cambiarPago',
                        { id : this.value, pagado : 'No' },
                        function(data){
                            resp = eval('(' +data+ ')');
                            if(resp.estado == 'Success'){
                                alert('El pago del cliente ahora está inactivo');
                            }else{
                                alert(resp.mensaje);
                            }
                        })
                });
            </script>
</body>
</html>

