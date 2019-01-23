<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 28/05/2016
 * Time: 09:03 AM
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

                    </div>

                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Editar usuario</h2>
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
                                        if (isset($usuario['id_usuarios']) && !empty($usuario['id_usuarios'])){
                                            $id_usuario = $usuario['id_usuarios'];
                                        }else{
                                            $id_usuario = '-1';
                                        }
                                    ?>

                                    <?
                                        if (!empty($this->session->flashdata('error'))) { ?>
                                           <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <strong>Error!</strong> <?= $this->session->flashdata('error') ?>
                                            </div>
                                        <? }else{

                                            if (!empty($this->session->flashdata('success'))) { ?>
                                                
                                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                    <strong>Exito!</strong> <?= $this->session->flashdata('success') ?>
                                                </div>

                                            <? }

                                        }
                                    ?> 

                                    <input type="hidden" name="info[id_usuarios]" value="<?= $id_usuario ?>" />

                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" value="<?= $usuario['nombre_usuarios'] ?>"  name="info[nombre_usuarios]">
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label>Apellidos</label>
                                        <input type="text" class="form-control" value="<?= $usuario['apellido_usuarios'] ?>"  name="info[apellido_usuarios]">
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label>Telefono</label>
                                        <input type="text" class="form-control" value="<?= $usuario['telefono_usuarios'] ?>"  name="info[telefono_usuarios]">
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label>Movil</label>
                                        <input type="text" class="form-control" value="<?= $usuario['movil_usuarios'] ?>"  name="info[movil_usuarios]">
                                    </div>

                                    <div class="col-md-8 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label>Direccion</label>
                                        <input type="text" class="form-control" value="<?= $usuario['direccion_usuarios'] ?>"  name="info[direccion_usuarios]">
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="<?= $usuario['email_usuarios'] ?>"  name="info[email_usuarios]" >
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label>Departamento</label>
                                        <select id="departamento" class="form-control" name='' onchange="getCity('city-select');" required="">
                                            <?php
                                                if (isset($usuario['id_departamento'])){ ?>
                                                    <option value="<?= $usuario['id_departamento'] ?>" ><?= $usuario['nombre'] ?></option>
                                                <?php }
                                            ?>
                                            <?php   foreach ($departamentos AS $departamento){ ?>
                                                <option value="<?= $departamento['id_departamento'] ?>" ><?= $departamento['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label>Municipio</label>
                                        <select id="city-select" class="form-control" name=info[id_ciudad] required="">
                                            <?php
                                            if (isset($usuario['id_municipio'])){ ?>
                                                <option value="<?= $usuario['id_municipio'] ?>" ><?= $usuario['nombre_municipio'] ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                        <label>Contraseña actual</label>
                                        <input type="password" class="form-control" value=""  name="info_pass[password]">
                                    </div>

                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                        <label>Contraseña nueva</label>
                                        <input type="password" class="form-control" value=""  name="info_pass[new_password]">
                                    </div>

                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                        <label>Repetir contraseña nueva</label>
                                        <input type="password" class="form-control" value=""  name="info_pass[rnew_password]">
                                    </div>

                                    <input type="hidden" value="<?= $usuario['password_usuarios'] ?>" name="info_pass[current_password]">

                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                                            <button type="reset" onclick="goToLink('../../slide/lista')" class="btn btn-primary">Cancelar</button>
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

        <script type="text/javascript">
            setTimeout(function(){
              getCity('city-select');
            }, 3000);
            
            setTimeout(function(){
              $("#city-select").val('<?= $usuario['id_municipio'] ?>');
            }, 4000);
        </script>
        
        <!-- Javascript Libraries -->
        <?php $this->load->view('panel/includes/footer') ?>

        <!-- Photos -->
        <script src="<?= base_url(); ?>/resources/panel/js/products-photo.js"></script>





