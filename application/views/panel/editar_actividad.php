<?php
/**
 * Created by PhpStorm.
 * User: Nikollai Hernandez
 * Date: 24/05/2016
 * Time: 08:37 AM
 */



 $this->load->view('panel/includes/tags');

 ?>

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
                        <a href="<?= base_url() ?>actividad/paquetes/<?= $id_actividad ?>"><button class="btn btn-success btn-sm"><i style="margin-right: 5px;" class="fa fa-shopping-cart"></i> Lista de actividades del paquete</button></a>
                        <a href="<?= base_url() ?>actividad/modificarpaquete/<?= $id_actividad ?>/-1"><button class="btn btn-success btn-sm"><i style="margin-right: 5px;" class="fa fa-plus"></i>Construir un paquete</button></a>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Agregar actividad</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
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
                                </div>
                                <!-- Informacion basica de la actividad -->
                                <?
                                    if ($lenguajes != 0) {
                                        $i = 0;
                                        foreach ($lenguajes as $lenguaje) {
                                            $existe = false;
                                            for ($j=0; $j < count($actividad); $j++) { 
                                                if ($lenguaje['id_lenguaje'] == $actividad[$j]['id_lenguaje']) {
                                                    $posicion_idioma = $j;
                                                    $existe = true;
                                                }
                                            }
                                ?>
                                                <!-- 
                                                @autor Estiven Amaya
                                                Este es el select del estado para que el administrador seleccione el estado del paquete
                                                 -->
                                        <!--

                                              <div style="<? echo ($i > 0) ? 'display:none;' : ''; ?>" id="info-lenguaje-<?= $lenguaje['id_lenguaje'] ?>" class="conjunto-lenguaje">

                                                 <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Estado</label>
                                                  </div>
                                                  <select class="custom-select" id="selectorEstado" name="selectEstado">
                                                    <option selected>Seleccionar...</option>
                                                    <option value="1">Nuevo</option>
                                                    <option value="2">Destacado</option>
                                                    <option value="3">Oferta</option>
                                                    <option value="3">Inactivo</option>
                                                  </select>
                                                </div>
                                        -->

                                                <?
                                                if(isset($_POST['selectEstado'])){

                                                 $actividades['estado_actividades']=$_POST['selectEstado'];

                                                 echo $actividades['estado_actividades'];
                                             }

                                                ?>


                                                   <div class="row">
                                                        <input type="hidden" name="info-actividad-<?= $lenguaje['id_lenguaje'] ?>[id_lenguaje]" value="<?= $lenguaje['id_lenguaje'] ?>">
                                                        <input type="hidden" name="info-actividad-<?= $lenguaje['id_lenguaje'] ?>[id_galeria]" value="<? echo (isset($actividad[0])) ? $actividad[0]['id_galeria'] : 'null' ?>">
                                                        <div class="col-md-6 form-group">
                                                            <label>Titulo <?= ($lenguaje['nombre_lenguaje']) ?></label>
                                                            <input type="text" class="form-control" name="info-actividad-<?= $lenguaje['id_lenguaje'] ?>[titulo_actividades]" value="<? echo ($existe) ? $actividad[$posicion_idioma]['titulo_actividades'] : '' ?>">
                                                        </div>
                                                        <div class="col-md-3 form-group">
                                                            <label>Precio COP</label>
                                                            <input type="number" class="form-control" name="info-actividad-<?= $lenguaje['id_lenguaje'] ?>[precio_actividades_cop]" value= "<? echo ($existe) ? $actividad[$posicion_idioma]['precio_actividades_cop'] : '' ?>">

                                                        </div>
                                                        <div class="col-md-3 form-group">
                                                            <label>Precio USD</label>
                                                            <input step="0.01" type="number" class="form-control" name="info-actividad-<?= $lenguaje['id_lenguaje'] ?>[precio_actividades_usd]" value="<? echo ($existe) ? $actividad[$posicion_idioma]['precio_actividades_usd'] : '' ?>">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-18 form-group">
                                                            <label>Descripcion <?= ($lenguaje['nombre_lenguaje']) ?></label>
                                                            <textarea id="ck-<?= $lenguaje['id_lenguaje'] ?>-1" class="form-control ckeditor" name="info-actividad-<?= $lenguaje['id_lenguaje'] ?>[descripcion_actividades]">
                                                                <? echo ($existe) ? $actividad[$posicion_idioma]['descripcion_actividades'] : '' ?>
                                                                  </textarea>


                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 form-group">
                                                            <label> Importante <?= ($lenguaje['nombre_lenguaje']) ?></label>
                                                            <textarea id="ck-<?= $lenguaje['id_lenguaje'] ?>-2" class="form-control ckeditor" name="info-actividad-<?= $lenguaje['id_lenguaje'] ?>[importante_actividades]">
                                                                <? echo ($existe) ? $actividad[$posicion_idioma]['importante_actividades'] : '' ?>
                                                            </textarea>
                                                        </div>

                                                        <div class="col-md-6 form-group">
                                                            <label>Ruta <?= ($lenguaje['nombre_lenguaje']) ?></label>
                                                            <textarea id="ck-<?= $lenguaje['id_lenguaje'] ?>-3" class="form-control ckeditor" name="info-actividad-<?= $lenguaje['id_lenguaje'] ?>[ruta_actividades]">
                                                                <? echo ($existe) ? $actividad[$posicion_idioma]['ruta_actividades'] : '' ?>
                                                            </textarea>
                                                        </div>
                                                    </div> 
                                                </div>
                                <?
                                            $i++;
                                            
                                        }
                                    }
                                ?>
                                <!-- Fin informacion basica de la actividad -->

      <!-- Codigo para botones guardar y cancelar-->

         <div class="row">
          <div style="text-align: right;" class="col-md-12">
            <a href="<?= base_url() ?>actividad/lista"><div class="btn btn-default">Cancelar</div></a>
             <button type="Submit" class="btn btn-primary">Guardar</button>
              </div>
                </div>
                 </form>  
                        
                                
                            <!-- =========== Imagenes del actividades ============== -->
                            <?php if ($id_actividad != '-1') { ?>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Imagenes de la actividad</h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#">Settings 1</a>
                                                            </li>
                                                            <li><a href="#">Settings 2</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                    </li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="photos-products" class="x_content photo-product">
                                                <div class="load-photos main-gallery-product">
                                                    <!-- Image files -->
                                                    <?php

                                                    $i = 0;
                                                    if (isset($imagenes) && $imagenes != 0) {

                                                        foreach ($imagenes as $imagen){ ?>
                                                            <form name="formulario_<?= $i ?>" id="formulario_<?= $i ?>" enctype="multipart/form-data" class="col-md-4 col-sm-4 col-xs-12 thumb-photo">
                                                                <input type="hidden" id="id_product_rel_<?= $i ?>" value="<?= $actividad[0]['id_galeria'] ?>">
                                                                <input type="hidden" name="db_id_photo_<?= $i ?>" id="db_id_photo_<?= $i ?>" value="<?= $imagen['id_galeria_archivos'] ?>">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-preview thumbnail form-control"  id="thumb_<?= $i ?>"  >
                                                                        <?php
                                                                        if (isset ($imagen['archivo']) ) { ?>
                                                                            <img id="img-photo-<?= $i ?>" src="<?php echo base_url().'uploads/actividades/'. $actividad[0]['id_galeria']. '/s'.$imagen['archivo']; ?>" />
                                                                        <?php }else{ ?>
                                                                            <img id="img-photo-<?= $i ?>" src="<?php echo base_url().'uploads/actividades/404-img.jpg'; ?>" />
                                                                        <?php } ?>
                                                                        <div class="overflow">
                                                                        <span class=" fileupload btn btn-file btn-alt btn-sm">
                                                                             <input onchange="readUrlProduct(this, <?= $i ?>, <?= $id_actividad ?>, 'actividad');" class="input-photo-product" type="file" name='file_<?= $i ?>' class='fileup' id='file_<?= $i ?>'  />
                                                                             <i class="fa fa-upload" aria-hidden="true"></i>
                                                                        </span>
                                                                            <span class="btn btn-file btn-alt btn-sm btn-del" data-dismiss="fileupload" onClick="deletePhoto(<?= $imagen['id_galeria_archivos'] ?>, <?= $i ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <?php
                                                            $i++;
                                                        }
                                                    }
                                                    ?>


                                                    
                                                    <form method="post" name="formulario_<?= $i ?>" id="formulario_<?= $i ?>" enctype="multipart/form-data" class="col-md-4 col-sm-4 col-xs-12 thumb-photo">
                                                        <input type="hidden" id="id_product_rel_<?= $i ?>" value="<?= $actividad[0]['id_galeria'] ?>">
                                                        <input type="hidden" name="status_<?= $i ?>" id="status_<?= $i ?>" value="1">
                                                        <input type="hidden" name="db_id_photo_<?= $i ?>" id="db_id_photo_<?= $i ?>" value="-1">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="fileupload-preview thumbnail form-control"  id="thumb_<?= $i ?>"  >

                                                                <img id="img-photo-<?= $i ?>" src="<?= base_url(); ?>uploads/actividades/upload-file.jpg" />

                                                                <div class="overflow">
                                                                    <span class=" fileupload btn btn-file btn-alt btn-sm">
                                                                         <input onchange="readUrlProduct(this, <?= $i ?>, <?= $id_actividad ?>, 'actividad');" class="input-photo-product" type="file" name='file_<?= $i ?>' class='fileup' id='file_<?= $i ?>'  />
                                                                         <i class="fa fa-upload" aria-hidden="true"></i>
                                                                    </span>
                                                                    <span style="display: none;" class="btn btn-file btn-alt btn-sm btn-del" data-dismiss="fileupload" onClick="eliminar(<?= $i ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>   

                                <?php } ?>

                                <!-- ===== Fin imagenes ===== -->
                             </div>
                        </div>
                 </div>
                </div>
        </div>

            
     <!-- /page content -->

</div>


<!-- Bootstrap Colorpicker -->
<script src="<?= base_url(); ?>resources/panel/js/theme/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<!-- Bootstrap Colorpicker -->
<script>
    $(document).ready(function() {
        $('.demo2').colorpicker();



        $('#demo_forceformat').colorpicker({
            format: 'rgba',
            horizontal: true
        });

        $('#demo_forceformat3').colorpicker({
            format: 'rgba',
        });

        $('.demo-auto').colorpicker();
    });
</script>
<!-- /Bootstrap Colorpicker -->

<!-- Select2 -->
<script src="<?= base_url(); ?>resources/panel/js/theme/select2/dist/js/select2.full.min.js"></script>

<!-- Select2 -->
<script>
    $(document).ready(function() {
        $(".select2_single").select2({
            placeholder: "Select a state",
            allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
            maximumSelectionLength: 10,
            placeholder: "Seleccionar las tallas",
            allowClear: true
        });
    });
</script>
<!-- /Select2 -->

<!-- Javascript Libraries -->
<?php $this->load->view('panel/includes/footer') ?>

<!-- Photos -->
<script src="<?= base_url(); ?>resources/panel/js/products-photo.js"></script>




<!-- jQuery autocomplete -->
<script>
    function verConjunto(id_lenguaje){
        jQuery('.conjunto-lenguaje').hide();
        jQuery('#info-lenguaje-' + id_lenguaje).show();

        jQuery('.btn-lenguaje').removeClass('btn-primary');
        jQuery('.btn-lenguaje').removeClass('btn-default');
        jQuery('.btn-lenguaje').addClass('btn-default');
        jQuery('#btn-lenguaje-' + id_lenguaje).addClass('btn-primary');
    }
</script>
<!-- /jQuery autocomplete -->




