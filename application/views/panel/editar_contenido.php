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
                        <a href="<?= base_url() ?>contenido/lista"><button  type="button" class="btn btn-primary btn-sm"><i style="margin-right: 5px;" class="fa fa-plus"></i>Lista contenidos</button></a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Agregar contenido 
                                    <small></small>
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
                                    <!-- Informacion basica de la contenido -->
                                    <?
                                        if ($lenguajes != 0) {
                                            $i = 0;
                                            foreach ($lenguajes as $lenguaje) {
                                                $existe = false;
                                                for ($j=0; $j < count($contenido); $j++) { 
                                                    if ($lenguaje['id_lenguaje'] == $contenido[$j]['id_lenguaje']) {
                                                        $posicion_idioma = $j;
                                                        $existe = true;
                                                    }
                                                }
                                    ?>

                                                    <div style="<? echo ($i > 0) ? 'display:none;' : ''; ?>" id="info-lenguaje-<?= $lenguaje['id_lenguaje'] ?>" class="conjunto-lenguaje">
                                                        <input type="hidden" name="info-contenido-<?= $lenguaje['id_lenguaje'] ?>[id_lenguaje]" value="<?= $lenguaje['id_lenguaje'] ?>">

                                                        <div class="meta-content col-md-12 col-sm-12 col-xs-12">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <p>Los siguientes campos le ayudaran a mejorar su posicionamiento(SEO) con los diferentes motores de busqueda.</p>
                                                            </div>

                                                            <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                                <label>Meta title (<?= $lenguaje['nombre_lenguaje'] ?>)</label>
                                                                <?
                                                                if ($existe) {
                                                                    $meta_title = $contenido[$posicion_idioma]['meta_title'];
                                                                }else{
                                                                    $meta_title = '';
                                                                }
                                                                ?>
                                                                <input type="text" class="form-control" value="<?= $meta_title ?>"  name="info-contenido-<?= $lenguaje['id_lenguaje'] ?>[meta_title]">
                                                            </div>

                                                            <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                                                                <label>Meta description (<?= $lenguaje['nombre_lenguaje'] ?>)</label>
                                                                <?
                                                                if ($existe) {
                                                                    $meta_description = $contenido[$posicion_idioma]['meta_description'];
                                                                }else{
                                                                    $meta_description = '';
                                                                }
                                                                ?>
                                                                <input type="text" class="form-control" value="<?= $meta_description ?>"  name="info-contenido-<?= $lenguaje['id_lenguaje'] ?>[meta_description]">
                                                            </div>

                                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                                <label>Meta keywords (<?= $lenguaje['nombre_lenguaje'] ?>)</label>
                                                                <?
                                                                if ($existe) {
                                                                    $meta_keywords = $contenido[$posicion_idioma]['meta_keywords'];
                                                                }else{
                                                                    $meta_keywords = '';
                                                                }
                                                                ?>
                                                                <input type="text" class="form-control" value="<?= $meta_keywords ?>"  name="info-contenido-<?= $lenguaje['id_lenguaje'] ?>[meta_keywords]">
                                                            </div>
                                                        </div>
                                                       <div class="row">
                                                            <div class="col-md-12 form-group">
                                                                <label>Titulo <?= strtolower($lenguaje['nombre_lenguaje']) ?></label>
                                                                <input type="text" class="form-control" name="info-contenido-<?= $lenguaje['id_lenguaje'] ?>[titulo]" value="<? echo ($existe) ? $contenido[$posicion_idioma]['titulo'] : '' ?>">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 form-group">
                                                                <label>Descripcion <?= strtolower($lenguaje['nombre_lenguaje']) ?></label>
                                                                <textarea id="ck-<?= $lenguaje['id_lenguaje'] ?>-1" class="form-control ckeditor" name="info-contenido-<?= $lenguaje['id_lenguaje'] ?>[contenido]">
                                                                    <? echo ($existe) ? $contenido[$posicion_idioma]['contenido'] : '' ?>
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                    <?
                                                $i++;
                                                
                                            }
                                        }
                                    ?>
                                    <!-- Fin informacion basica de la contenido -->

                                    <div class="row">
                                        <div style="text-align: right;" class="col-md-12">
                                            <a href="<?= base_url() ?>contenido/lista"><div class="btn btn-default">Cancelar</div></a>
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


