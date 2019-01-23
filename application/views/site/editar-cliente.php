<? $this->load->view('site/includes/tags') ?>

</head>
<body>

<? $this->load->view('site/includes/header'); ?>

 
    <div class="wrapper_content" id="account-edit">
        <div class="container_24">
        	<div class="clear"></div>
			<div class="grid_24 em-breadcrumbs">
				 <div class="breadcrumbs">
					<ul>
					   <li class="home">
						  <a href="<?= base_url() ?>" title="Inicio">Inicio</a>
						  <span class="separator">/ </span>
					   </li>
					   <li class="my_account">
						  <a href="<?= base_url() ?>cliente/cuenta" title="Cuenta">Mi cuenta</a>
						  <span class="separator">/ </span>
					   </li>
					   <li class="edit">
						  <strong>Editar informacion</strong>
						  
					   </li>
					</ul>
				 </div>
			</div>
			<br>
            <div class="home-top-information">
                <h3>Editar informacion</h3>
                    
                <form method="post">
                	<div class="fieldset">
                		<ul class="form-list">
                			<li class="flieds">
                				<div class="field">
									<label for="confirmation" class="required"><em>*</em>Identificacion</label>
									<div class="input-box">
									   <input required="" type="number" name="perfil[identificacion]" title="Confirm Password" id="confirmation" class="input-text required-entry" value="<?= $cliente['identificacion'] ?>">
									</div>
								 </div>
								 <div class="field">
									<label for="confirmation" class="required"><em>*</em>Nombre completo</label>
									<div class="input-box">
									   <input type="text" required="" title="" id="confirmation" class="input-text required-entry" value="<?= $cliente['nombres'] ?>" name="perfil[nombres]">
									</div>
								</div>
                			</li>

                			<li class="flieds">
                				<div class="field">
									<label for="confirmation" class="required"><em>*</em>Direccion</label>
									<div class="input-box">
									   <input type="text" required="" name="perfil[direccion]" title="" id="confirmation" class="input-text required-entry" value="<?= $cliente['direccion'] ?>">
									</div>
								</div>
								 <div class="field">
									 <label  class="required"><em>*</em>País</label>
									 <div class="input-box">
										<select required="" name="perfil[id_pais]"  id="pais" value="" title="Pais" class="input-select">
			                             	<option value="52">Colombia</option>
			                            </select>
									 </div>
								</div>
                			</li>

                			<li class="flieds">
                				<div class="field">
									 <label  class="required"><em>*</em>Departamento</label>
									 <div class="input-box">
										<select required="" onchange="getCityD('municipio');"  name="perfil[id_departamento]"  id="departamento" value="" title="Depto" class="input-select ">
											<?
												foreach ($departamentos as $departamento) { 
													if ($cliente['id_departamento'] == $departamento['id_departamento']) { ?>
														<option selected value="<?= $departamento['id_departamento'] ?>"><?= $departamento['nombre'] ?></option>
													<? }
														else{ ?>
															<option value="<?= $departamento['id_departamento'] ?>"><?= $departamento['nombre'] ?></option>
														<? }
													?>
													
												<? }
											?>
			                            </select>
									 </div>
								</div>
								 <div class="field">
									 <label  class="required"><em>*</em>Ciudad</label>
									 <div class="input-box">
										<select required=""  name="perfil[id_municipio]"  id="municipio" value="" title="Ciudad" class="input-select">
											<option value="<?= $cliente['id_municipio'] ?>"><?= $cliente['nombre_municipio'] ?></option>
			                            </select>
									 </div>
								</div>
                			</li>

                			<li class="flieds">
                				<div class="field">
									<label for="confirmation" class="required">Empresa</label>
									<div class="input-box">
									   <input type="text" name="perfil[empresa]" title="Confirm Password" id="confirmation" class="input-text required-entry" value="<?= $cliente['empresa'] ?>">
									</div>
								 </div>
								 <div class="field">
									<label for="confirmation" class="required"><em>*</em>Email (Usuario)</label>
									<div class="input-box">
									   <input readonly="" required="" type="email"  title="" id="confirmation" class="input-text required-entry" value="<?= $cliente['email'] ?>" name="perfil[email]">
									</div>
								</div>
                			</li>

                			<li class="flieds">
                				<div class="field">
									<label for="confirmation" class="required">Telefono</label>
									<div class="input-box">
									   <input type="number" title="Confirm Password" id="confirmation" class="input-text required-entry" value="<?= $cliente['telefono'] ?>" name="perfil[telefono]">
									</div>
								 </div>
								 <div class="field">
									<label for="confirmation" class="required"><em>*</em>Movil</label>
									<div class="input-box">
									   <input type="number" title="" id="confirmation" class="input-text required-entry" value="<?= $cliente['movil'] ?>" name="perfil[movil]">
									</div>
								</div>
                			</li>

                			<li class="flieds">
                				<div class="field">
									<label for="confirmation" class="required">Contreseña actual</label>
									<div class="input-box">
									   <input type="password" required="" title="Confirm Password" id="confirmation" class="input-text required-entry" name="password[current-password]">
									</div>
								 </div>
                			</li>

                			<li class="flieds">
                				<div class="field">
									<label for="confirmation" class="required">Nueva contraseña</label>
									<div class="input-box">
									   <input type="password" title="Confirm Password" id="confirmation" class="input-text required-entry" name="password[new-password]">
									</div>
								 </div>
								 <div class="field">
									<label for="confirmation" class="required">Repetir contraseña</label>
									<div class="input-box">
									   <input type="password" title="" id="confirmation" class="input-text required-entry" name="password[rnew-password]">
									</div>
								</div>
                			</li>

                		</ul>
                	</div>

                	<div class="buttons-set">
                		<br>
                		<?
                			if (!empty($response)) { ?>
                				<span class="<?= $response_type ?>-form"><?= $response ?></span><br>
                			<? }
                		?>
                		
					   <br><p class="required">* Campos requeridos</p><br>
					   <button type="submit" title="Submit" class="button"><span><span>Guardar</span></span></button>
					   <p class="back-link"><a href="<?= base_url() ?>" class="back-link"><small>« </small>Cancelar</a></p>
					</div>
                </form>
            </div>
        </div>
    </div>


<? $this->load->view('site/includes/footer') ?>

<style type="text/css">
	#account-edit .home-top-information{
		padding: 20px;
	}

	.error-form{
		padding: 5px;
	    border: 1px solid #f00;
	    background: rgba(255, 0, 0, 0.24);
	    color: #fff;
	    border-radius: 3px;
	}

	.success-form{
		padding: 5px;
	    border: 1px solid rgb(37, 234, 71);
	    background: rgba(0, 255, 137, 0.2);
	    color: #1b1b20;
	    border-radius: 3px;
	}

	.form-search input.input-text{
		height: 100% !important;
	}

</style>

</body>
</html>
