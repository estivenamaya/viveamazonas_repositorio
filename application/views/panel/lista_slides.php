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

                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Imagenes de la galeria principal
                                    <small>Tamaño recomendado (880 x 340)</small>
                                </h2>

                                <div class="clearfix">

                                </div>
                            </div>
                            <div id="photos-products" class="x_content">
                                <div class="load-photos">
                                    <!-- Image files -->
                                    <?php

                                    $i = 0;
                                    foreach ($slides as $imagen){ ?>
                                        <form name="formulario_<?= $i ?>" id="formulario_<?= $i ?>" enctype="multipart/form-data" class="col-md-4 col-sm-4 col-xs-12 thumb-photo slide-form">
                                            <input type="hidden" name="db_id_photo_<?= $i ?>" id="db_id_photo_<?= $i ?>" value="<?= $imagen['id_slide'] ?>">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-preview thumbnail form-control"  id="thumb_<?= $i ?>"  >
                                                    <?php
                                                    if (isset ($imagen['imagen']) ) { ?>
                                                        <img id="img-photo-<?= $i ?>" src="<?php echo base_url().'uploads/slides/small_'.$imagen['imagen']; ?>" />
                                                    <?php }else{ ?>
                                                        <img id="img-photo-<?= $i ?>" src="<?php echo base_url().'uploads/slides/404-img.jpg'; ?>" />
                                                    <?php } ?>
                                                    <div class="overflow">
                                                            <span class=" fileupload btn btn-file btn-alt btn-sm">
                                                                 <input onchange="readURLSlide(this, <?= $i ?>, <?= $imagen['id_slide'] ?>);" class="input-photo-product" type="file" name='file_<?= $i ?>' class='fileup' id='file_<?= $i ?>'  />
                                                                 <i class="fa fa-upload" aria-hidden="true"></i>
                                                            </span>
                                                        <span class="btn btn-file btn-alt btn-sm btn-del" data-dismiss="fileupload" onClick="deletePhotoSlide(<?= $imagen['id_slide'] ?>, <?= $i ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                    <form method="post" name="formulario_<?= $i ?>" id="formulario_<?= $i ?>" enctype="multipart/form-data" class="col-md-4 col-sm-4 col-xs-12 thumb-photo slide-form">
                                        <input type="hidden" name="db_id_photo_<?= $i ?>" id="db_id_photo_<?= $i ?>" value="-1">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-preview thumbnail form-control"  id="thumb_<?= $i ?>"  >

                                                <img id="img-photo-<?= $i ?>" src="<?= base_url(); ?>uploads/actividades/upload-file.jpg" />

                                                <div class="overflow">
                                                            <span class=" fileupload btn btn-file btn-alt btn-sm">
                                                                 <input onchange="readURLSlide(this, <?= $i ?>, <?= '2' ?>);" class="input-photo-product" type="file" name='file_<?= $i ?>' class='fileup' id='file_<?= $i ?>'  />
                                                                 <i class="fa fa-upload" aria-hidden="true"></i>
                                                            </span>
                                                    <span style="display: none;" class="btn btn-file btn-alt btn-sm btn-del" data-dismiss="fileupload" onClick="deletePhotoSlide(<?= $imagen['id_slide'] + 1 ?>, <?= $i ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                                <!-- <div onclick="addPhotoThumb();" class="col-md-4 col-sm-4 col-xs-12 add-photo thumb-photo">
                                    <span>
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </span>
                                </div> -->
                                <!-- End image file -->
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
    <script src="<?= base_url(); ?>/resources/panel/js/slide-photo.js"></script>

</body>
</html>


