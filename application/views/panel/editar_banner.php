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
                                <h2>Banners
                                    <small></small>
                                </h2>

                                <div class="clearfix">

                                </div>
                            </div>
                            <div id="photos-banner" class="x_content">
                                <div class="load-photos">
                                    <!-- Image files -->
                                    <form method="post" name="imagen_principal" id="imagen_principal" enctype="multipart/form-data" class="col-md-12 col-sm-12 col-xs-12 thumb-photo">

                                    <?
                                        if (!empty($this->session->flashdata('error'))) { ?>
                                           <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <strong>Error!</strong> <?= $this->session->flashdata('error') ?>
                                            </div>
                                        <? }
                                    ?>
                                    <input type="hidden" name="info" value="1">
                                    <!-- Primer banner -->
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                        <label>Banner 1</label>
                                        <div id="photos-products" class="x_content services-photo">
                                            <div class="load-photos">
                                                <!-- Image files -->
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-preview thumbnail form-control"  id="thumb_"  >
                                                        <img id="imagen_banner_1" <?= ($banner['imagen_banner_1']!= '')?'<img src="'.base_url().'uploads/banner/'.$banner['imagen_banner_1'].'" />':'' ?>" />
                                                        <div class="overflow">
                                                            <span class=" fileupload btn btn-file btn-alt btn-sm">
                                                                 <input onchange="previewImage(this, '#imagen_banner_1')"  class="input-photo-product" type="file" name='imagen_banner_1' class='fileup' id='imagen_banner_1'  />
                                                                 <i class="fa fa-upload" aria-hidden="true"></i>
                                                            </span>
                                                            <span onclick="deleteBanner(1);" style="top: 32.7%;">
                                                                <i class="fa fa-trash"></i>
                                                            </span>
                                                            <h5 class="recommended-size" >(274 x 400)</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End image file -->
                                        </div>
                                    </div>
                                    <!-- Fin primer banner -->

                                    <!-- Segundo banner -->
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                        <label>Banner 2</label>
                                        <div id="photos-products" class="x_content services-photo">
                                            <div class="load-photos">
                                                <!-- Image files -->
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-preview thumbnail form-control"  id="thumb_"  >
                                                        <img id="imagen_banner_2" <?= ($banner['imagen_banner_2']!= '')?'<img src="'.base_url().'uploads/banner/'.$banner['imagen_banner_2'].'" />':'' ?>" />
                                                        <div class="overflow">
                                                            <span class=" fileupload btn btn-file btn-alt btn-sm">
                                                                 <input onchange="previewImage(this, '#imagen_banner_2')"  class="input-photo-product" type="file" name='imagen_banner_2' class='fileup' id='imagen_banner_2'  />
                                                                 <i class="fa fa-upload" aria-hidden="true"></i>
                                                            </span>
                                                            <span onclick="deleteBanner(2);" style="top: 32.7%;">
                                                                <i class="fa fa-trash"></i>
                                                            </span>
                                                            <h5 class="recommended-size" >(274 x 400)</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End image file -->
                                        </div>
                                    </div>
                                    <!-- Fin segundo banner -->

                                    <!-- Tercer banner -->
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                        <label>Banner 3</label>
                                        <div id="photos-products" class="x_content services-photo">
                                            <div class="load-photos">
                                                <!-- Image files -->
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-preview thumbnail form-control"  id="thumb_"  >
                                                        <img id="imagen_banner_3" <?= ($banner['imagen_banner_3']!= '')?'<img src="'.base_url().'uploads/banner/'.$banner['imagen_banner_3'].'" />':'' ?>" />
                                                        <div class="overflow">
                                                            <span class=" fileupload btn btn-file btn-alt btn-sm">
                                                                 <input onchange="previewImage(this, '#imagen_banner_3')"  class="input-photo-product" type="file" name='imagen_banner_3' class='fileup' id='imagen_banner_3'  />
                                                                 <i class="fa fa-upload" aria-hidden="true"></i>
                                                            </span>
                                                            <span onclick="deleteBanner(3);" style="top: 32.7%;">
                                                                <i class="fa fa-trash"></i>
                                                            </span>
                                                            <h5 class="recommended-size" >(274 x 400)</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End image file -->
                                        </div>
                                    </div>
                                    <!-- Fin tercer banner -->

                                        <div style="margin-top: 20px;" class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <button type="reset" onclick="goToLink('../lista')" class="btn btn-primary">Cancelar</button>
                                            <button type="submit" class="btn btn-success">Guardar</button>
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

    <script type="text/javascript">
        function deleteBanner(id_banner){
            $.ajax({
                url: '<?= base_url() ?>banner/eliminar',
                type: 'post',
                data: {id : id_banner},
                success: function(response){
                    if (response == 1) {
                        $('#imagen_banner_' + id_banner).attr('src', '');
                        alert('Banner eliminado correctamente.');
                    }
                },
                error: function(e){
                    console.log(e.resultText);
                }
            });
        }
    </script>

</body>
</html>


