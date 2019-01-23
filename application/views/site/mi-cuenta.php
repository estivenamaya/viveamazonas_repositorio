<? $this->load->view('site/includes/tags') ?>
<body>

<? $this->load->view('site/includes/header') ?>

<section id="Breadcrumb">
    <div class="container-fluid">
        <div class="area-breacrumbs auto_margin">
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url() ?>"><?= $this->lang->line('header_link_home'); ?></a>
                </li>
                <li class="active"><?= $this->lang->line('header_link_account'); ?></li>
            </ol>
            <h2><?= $this->lang->line('header_link_account'); ?></h2>
        </div>
    </div>
</section>


<section id="Main">
    <div class="container-fluid">
        <div class="area-checkout auto_margin">
            <div class="height_20"></div>
            <div class="row">
                <div class="col-sm-4 padding_20">
                    <div class="Mods">
                        <div class="head">
                            <h3><?= $this->lang->line('account_title'); ?></h3>
                        </div>
                        <div class="body">
                            <div id="datos-personales">
                                <hr>
                                <p>
                                    <strong><?= $this->lang->line('account_persona_data'); ?></strong> <br>
                                    <strong><?= $this->lang->line('account_name'); ?>:</strong> <?= $usuario['nombre_usuarios'].' '.$usuario['apellido_usuarios'] ?> <br>
                                    <strong><?= $this->lang->line('account_phone'); ?>:</strong> <?= $usuario['movil_usuarios'] ?> <br>
                                    <strong><?= $this->lang->line('account_email'); ?>:</strong> <?= $usuario['email_usuarios'] ?><br>
                                    <strong><?= $this->lang->line('account_address'); ?>:</strong> <?= $usuario['direccion_usuarios'] ?><br>
                                    <strong><?= $this->lang->line('account_location'); ?>:</strong> <?= $usuario['nombre_municipio'] ?>, <?= $usuario['nombre'] ?> - Colombia
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="mi-cuenta">
                        <h2><?= $this->lang->line('account_big_title'); ?></h2>

                        <form  method="POST" role="form" class="row" id='formulario-editar'>

                            <div class="form-group col-sm-12">
                                <div class="head">
                                    <h5><?= $this->lang->line('account_change_password'); ?></h5>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for=""><?= $this->lang->line('account_password'); ?></label>
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for=""><?= $this->lang->line('account_change_password'); ?></label>
                                <input type="password" class="form-control" name="r-password" value="">
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="head">
                                    <h5><?= $this->lang->line('account_persona_info'); ?></h5>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for=""><?= $this->lang->line('account_name'); ?> *</label>
                                <input type="text" class="form-control" name="nombre_usuarios" id="" placeholder="" value="<?= $usuario['nombre_usuarios'] ?>">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for=""><?= $this->lang->line('account_lastname'); ?> *</label>
                                <input type="text" class="form-control" name="apellido_usuarios" id="" placeholder="" value="<?= $usuario['apellido_usuarios'] ?>">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for=""><?= $this->lang->line('account_email'); ?> *</label>
                                <input type="text" class="form-control" name="email_usuarios" id="" placeholder="" value="<?= $usuario['email_usuarios'] ?>">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for=""><?= $this->lang->line('account_lenguague'); ?></label>
                                <select name="id_idioma" class="selectpicker" data-live-search="true">
                                    <?
                                        if ($lenguajes != 0) {
                                            foreach ($lenguajes as $lenguaje) {
                                    ?>
                                                <option <? echo ($lenguaje['id_lenguaje'] == $usuario['id_idioma']) ? 'selected' : '' ?> value="<?= $lenguaje['id_lenguaje'] ?>"><?= $lenguaje['nombre_lenguaje'] ?></option>
                                    <?
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for=""><?= $this->lang->line('account_phone'); ?></label>
                                <input type="text" class="form-control" name="telefono_usuarios" id="" placeholder="" value="<?= $usuario['telefono_usuarios'] ?>">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for=""><?= $this->lang->line('account_cellphone'); ?> *</label>
                                <input type="text" class="form-control" name="movil_usuarios" id="" placeholder="" value="<?= $usuario['movil_usuarios'] ?>">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for=""><?= $this->lang->line('account_address'); ?> *</label>
                                <input type="text" class="form-control" name="direccion_usuarios" id="" placeholder="" value="<?= $usuario['direccion_usuarios'] ?>">
                            </div>
                            <!-- <div class="form-group col-sm-12">
                                <label for="">País</label>
                                
                            </div> -->
                            <div class="form-group col-sm-6">
                                <label for=""><?= $this->lang->line('account_department'); ?></label>
                                <select id="departamento" onchange="getCity('municipio');" name="" class="selectpicker" data-live-search="true">
                                    <?
                                    	if ($departamentos != 0) {
                                    		foreach ($departamentos as $departamento) {
                                   	?>
                                   				<option <? echo ($departamento['id_departamento'] == $usuario['id_departamento']) ? 'selected' : '' ?> value="<?= $departamento['id_departamento'] ?>"><?= $departamento['nombre'] ?></option>
                                   	<?
                                    		}
                                    	}
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for=""><?= $this->lang->line('account_city'); ?></label>
                                <select id="municipio" name="id_ciudad" class="select-custom">
                                    <?
                                    	if ($municipios != 0) {
                                    		foreach ($municipios as $municipio) {
                                   	?>
                                   				<option <? echo ($municipio['id_municipio'] == $usuario['id_ciudad']) ? 'selected' : '' ?> value="<?= $municipio['id_municipio'] ?>"><?= $municipio['nombre_municipio'] ?></option>
                                   	<?
                                    		}
                                    	}
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-12">
                                <div style="margin-top: 5px;" id="response-form"></div>
                                <span class="height_10"></span>
                                <div onclick="modificarCliente();" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save-all"></i><?= $this->lang->line('account_button_save'); ?></div>
                            </div>
                            <span class="height_30"></span>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
    .select-custom{
        width: 100%;
        background: #fff;
        height: 40px;
        border: 1px solid #ccc;
        border-radius: 1px;
        font-weight: 400;
    }
</style>

<div class="height_20"></div>

<img src="<?= base_url() ?>resources/site/images/round-f.png" class="center-block" alt="">
<? $this->load->view('site/includes/footer') ?>

</body>
</html>