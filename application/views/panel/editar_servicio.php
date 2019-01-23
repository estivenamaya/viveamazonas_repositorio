<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 28/05/2016
 * Time: 09:03 AM
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

                    </div>

                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Editar servicio</h2>
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
                                <form action="" method="post" enctype="multipart/form-data" name="form1" id="form_content" class="form-horizontal form-label-left input_mask">
                                    <?php
                                        if (isset($servicio['id_servicio']) && !empty($servicio['id_servicio'])){
                                            $id_servicio = $servicio['id_servicio'];
                                        }else{
                                            $id_servicio = '-1';
                                        }
                                    ?>
                                    <input type="hidden" name="id_servicio" value="<?= $id_servicio ?>" />
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label>Titulo del servicio</label>
                                        <input type="text" class="form-control" value="<?= $servicio['titulo'] ?>"  name="info[titulo]">
                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label>Descripción corta</label>
                                        <input type="text" class="form-control" value="<?= $servicio['descripcion'] ?>"  name="info[descripcion]" >
                                    </div>


                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label>Imagen del servicio</label>
                                        <div id="photos-products" class="x_content services-photo">
                                            <div class="load-photos">
                                                <!-- Image files -->
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-preview thumbnail form-control"  id="thumb_"  >
                                                        <img id="img-photo-service" <?= ($servicio['imagen']!= '')?'<img src="'.base_url().'uploads/servicios/s'.$servicio['imagen'].'" />':'' ?>" />
                                                        <div class="overflow">
                                                            <span class=" fileupload btn btn-file btn-alt btn-sm">
                                                                 <input onchange="previewImage(this, '#img-photo-service')"  class="input-photo-product" type="file" name='userfile' class='fileup' id='userfile'  />
                                                                 <i class="fa fa-upload" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End image file -->
                                        </div>
                                    </div>


                                    <div class="col-md-12 m-b-15">
                                        <label>Contenido</label>
                                        <textarea  placeholder="Contenido:" name="info[contenido]" class='span12 ckeditor'  id="ck" ><?= $servicio['contenido'] ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                                            <button type="reset" onclick="goToLink('../lista')" class="btn btn-primary">Cancelar</button>
                                            <button type="submit" class="btn btn-success">Guardar</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /page content -->

        </div>
        
        <!-- Javascript Libraries -->
        <?php $this->load->view('panel/includes/footer') ?>

        <!-- Photos -->
        <script src="<?= base_url(); ?>/resources/panel/js/products-photo.js"></script>





