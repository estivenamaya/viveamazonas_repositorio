<?php
/**
 * Created by PhpStorm.
 * User: Nikollai Hernandez
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
                                <h2>Editar testimonio</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="" method="post" enctype="multipart/form-data" name="form1" id="form_content" class="form-horizontal form-label-left input_mask">
                                    <?
                                        if (!empty($this->session->flashdata('error'))) { ?>
                                           <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <strong>Error!</strong> <?= $this->session->flashdata('error') ?>
                                            </div>
                                        <? }
                                    ?>
                                    <?php
                                        if (isset($testimonio[0]['id_testimonio']) && !empty($testimonio[0]['id_testimonio'])){
                                            $id_testimonio = $testimonio[0]['id_testimonio'];
                                        }else{
                                            $id_testimonio= '-1';
                                        }
                                    ?>
                                    <input type="hidden" name="info[id_testimonio]" value="<?= $id_testimonio ?>" />
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" value="<?= $testimonio[0]['nombre_testimonio'] ?>"  name="info[nombre_testimonio]">
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <label>Genero</label>
                                            <select name="info[genero_testimonio]" class="form-control">
                                                <option <? echo ($testimonio[0]['genero_testimonio'] == 'f') ? 'selected' : '' ?> value="f">Mujer</option>
                                                <option <? echo ($testimonio[0]['genero_testimonio'] == 'm') ? 'selected' : '' ?> value="m">Hombre</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                            <label>Foto</label>
                                            <div id="photos-products" class="x_content services-photo">
                                                <div class="load-photos">
                                                    <!-- Image files -->
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="fileupload-preview thumbnail form-control"  id="thumb_"  >
                                                            <img id="img-photo-service" <?= ($testimonio[0]['imagen_testimonio']!= '')?'<img src="'.base_url().'uploads/testimonios/'.$testimonio[0]['imagen_testimonio'].'" />':'2' ?>" />
                                                            <div class="overflow">
                                                                <span class=" fileupload btn btn-file btn-alt btn-sm">
                                                                     <input onchange="previewImage(this, '#img-photo-service')"  class="input-photo-product" type="file" name='img_input_testimonio_<?= $id_testimonio ?>' class='fileup' id='userfile'  />
                                                                     <i class="fa fa-upload" aria-hidden="true"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End image file -->
                                            </div>
                                        </div>

                                        <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                                            <label>Testimonio</label>
                                            <textarea name="info[texto_testimonio]" id="ck" class="form-control ckeditor"><?= $testimonio[0]['texto_testimonio'] ?></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div style="text-align: right;" class="col-md-12 col-sm-12 col-xs-12 ">
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


        <script>

        </script>

        <style>
            .meta-content{
                background: #eee;
                padding-top: 15px;
                padding-bottom: 15px;
                margin-bottom: 15px;
                border-radius: 3px;
                border: 1px solid #d0d0d0;
            }
        </style>





