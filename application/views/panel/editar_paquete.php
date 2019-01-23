<?php

/**
 * Created by PhpStorm.
 * User: Nikollai Hernandez
 * Date: 27/05/2016
 * Time: 08:49 AM
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
                		<a href="<?= base_url() ?>actividad/paquetes/<?= $actividad ?>"><button  type="button" class="btn btn-primary btn-sm"><i style="margin-right: 5px;" class="fa fa-plus"></i>Lista de actividades del paquete</button></a>
                        <a href="<?= base_url() ?>actividad/modificar/<?= $actividad ?><? ?>"><button  type="button" class="btn btn-primary btn-sm"><i style="margin-right: 5px;" class="fa fa-shopping-cart"></i>Modificar paquete</button></a>
                        <a href="<?= base_url() ?>actividad/modificarpaquete/<?= $id_actividad ?>/-1"><button  type="button" class="btn btn-primary btn-sm"><i style="margin-right: 5px;" class="fa fa-plus"></i>Agregar actividad al paquete</button></a>
                	</div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Agregar Actividad<small></small>
                                </h2>
                                <div class="clearfix">

                                </div>
                            </div>
                            <div class="x_content">
                            	<?
                                    if ($lenguajes != 0) {
                                        $i = 0;
                                        foreach ($lenguajes as $lenguaje) {
                                ?>
                                            <button onclick="verConjunto(<?= $lenguaje['id_lenguaje'] ?>);" id="btn-lenguaje-<?= $lenguaje['id_lenguaje'] ?>" class="btn <? echo ($i == 0) ? 'btn-primary' : 'btn-default'; ?> btn-sm btn-lenguaje"><?= $lenguaje['nombre_lenguaje'] ?></button>
                                <?
                                        $i++;
                                        }
                                    }
                                ?>
                                <form action="" method="post" enctype="multipart/form-data" name="form1" id="form_content" class="form-horizontal form-label-left input_mask product-edit">
                                <div class="col-md-12">
                                	<hr>
                            		<!-- Informacion basica de la paquete -->
	                                <?
	                                    if ($lenguajes != 0) {
	                                        $i = 0;
	                                        foreach ($lenguajes as $lenguaje) {
	                                            $existe = false;
	                                            for ($j=0; $j < count($paquete); $j++) { 
	                                                if ($lenguaje['id_lenguaje'] == $paquete[$j]['id_lenguaje']) {
	                                                    $posicion_idioma = $j;
	                                                    $existe = true;
	                                                }
	                                            }
	                                ?>
	                                                <div style="<? echo ($i > 0) ? 'display:none;' : ''; ?>" id="info-lenguaje-<?= $lenguaje['id_lenguaje'] ?>" class="conjunto-lenguaje">
	                                                	<input type="hidden" name="info-paquete-<?= $lenguaje['id_lenguaje'] ?>[id_lenguaje]" value="<?= $lenguaje['id_lenguaje'] ?>">
	                                                   <div class="row">
	                                                        <div class="col-md-6 form-group">
	                                                            <label>Titulo <?= $lenguaje['nombre_lenguaje'] ?></label>
	                                                            <input type="text" class="form-control" name="info-paquete-<?= $lenguaje['id_lenguaje'] ?>[titulo_planes_actividad]" value="<? echo ($existe) ? $paquete[$posicion_idioma]['titulo_planes_actividad'] : '' ?>">
	                                                        </div>
	                                                        <div class="col-md-3 form-group">
	                                                            <label>Precio COP</label>
	                                                            <input type="number" class="form-control" name="info-paquete-<?= $lenguaje['id_lenguaje'] ?>[precioa_planes_actividad_cop]" value="<? echo ($existe) ? $paquete[$posicion_idioma]['precioa_planes_actividad_cop'] : '' ?>">
	                                                        </div>
	                                                        <div class="col-md-3 form-group">
	                                                            <label>Precio USD</label>
	                                                            <input step="0.01" type="number" class="form-control" name="info-paquete-<?= $lenguaje['id_lenguaje'] ?>[precioa_planes_actividad_usd]" value="<? echo ($existe) ? $paquete[$posicion_idioma]['precioa_planes_actividad_usd'] : '' ?>">
	                                                        </div>
	                                                        <!-- <div class="col-md-3 form-group">
	                                                            <label>Precio menores</label>
	                                                            <input type="number" class="form-control" name="info-paquete-<?= $lenguaje['id_lenguaje'] ?>[preciom_planes_actividad]" value="<? echo ($existe) ? $paquete[$posicion_idioma]['preciom_planes_actividad'] : '' ?>">
	                                                        </div> -->
	                                                    </div>

	                                                    <div class="row">
	                                                        <div class="col-md-6 form-group">
	                                                            <label>Duracion <?= $lenguaje['nombre_lenguaje'] ?></label>
	                                                            <input type="text" class="form-control" name="info-paquete-<?= $lenguaje['id_lenguaje'] ?>[duracion_planes_actividad]" value="<? echo ($existe) ? $paquete[$posicion_idioma]['duracion_planes_actividad'] : '' ?>">
	                                                        </div>
	                                                       <!-- <div class="col-md-6 form-group">
	                                                            <label>Destino <?= $lenguaje['nombre_lenguaje'] ?></label><br>
	                                                            <span>Por favor escriba los destinos separados por comas ( , )</span>
	                                                            <input type="text" class="form-control" name="info-paquete-<?= $lenguaje['id_lenguaje'] ?>[destino_planes_actividad]" value="<? echo ($existe) ? $paquete[$posicion_idioma]['destino_planes_actividad'] : '' ?>">
	                                                        </div> -->
	                                                    </div>

	                                                    <div class="row">
	                                                        <div class="col-md-12 form-group">
	                                                            <label>Descripcion <?= $lenguaje['nombre_lenguaje'] ?></label>
	                                                            <textarea id="ck-<?= $lenguaje['id_lenguaje'] ?>-1" class="form-control ckeditor" name="info-paquete-<?= $lenguaje['id_lenguaje'] ?>[descripcion_planes_actividad]">
	                                                                <? echo ($existe) ? $paquete[$posicion_idioma]['descripcion_planes_actividad'] : '' ?>
	                                                            </textarea>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                <?
	                                            $i++;
	                                            
	                                        }
	                                    }
	                                ?>
	                                <!-- Fin informacion basica de la paquete -->

	                                <div class="row">
	                                    <div style="text-align: right;" class="col-md-12">
	                                        <a href="<?= base_url() ?>actividad/modificar/<?= $id_actividad ?>"><div class="btn btn-default">Cancelar</div></a>
	                                        <button type="Submit" class="btn btn-primary">Guardar</button>
	                                    </div>
	                                </div>
                            	</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>

    <!-- Javascript Libraries -->
    <?php $this->load->view('panel/includes/footer') ?>

    <!-- Photos -->
    <!-- <script src="<?= base_url(); ?>/resources/panel/js/slide-photo.js"></script> -->

    <script type="text/javascript">
        function verConjunto(id_lenguaje){
	        jQuery('.conjunto-lenguaje').hide();
	        jQuery('#info-lenguaje-' + id_lenguaje).show();

	        jQuery('.btn-lenguaje').removeClass('btn-primary');
	        jQuery('.btn-lenguaje').removeClass('btn-default');
	        jQuery('.btn-lenguaje').addClass('btn-default');
	        jQuery('#btn-lenguaje-' + id_lenguaje).addClass('btn-primary');
	    }
    </script>

</body>
</html>


