<? $this->load->view('site/includes/tags') ?>
<body>

<? $this->load->view('site/includes/header') ?>

<section id="Breadcrumb">
    <div class="container-fluid">
        <div class="area-breacrumbs auto_margin">
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url() ?>">Inicio</a>
                </li>
                <li class="active">Recordar contraseña</li>
            </ol>
            <h2>Recordar contraseña</h2>
        </div>
    </div>
</section>


<section id="Main">
    <div class="container-fluid">
        <div class="area-content auto_margin">
            <div class="contents">
                <article>
                	<p>Por favor escriba el email con el cual se registro en el sistema, posterior a esto enviaremos un correo con toda la informacion necesaria para su cambio de contraseña.</p>
                	<div class="row">
                		<div class="form-group col-sm-6">
                            <label for="">Email</label>
                            <input required="" type="email" class="form-control" name="data[email]" id="email-form" placeholder="">
                            <div style="margin-top: 5px;" id="response-form"></div>
                        </div>
                        <div style="padding: 24px 0;" class="form-group col-sm-6">
                        	<button onclick="recordarContrasenia();" class="btn btn-success waves-effect">Enviar</button>
                        </div>
                	</div>
                </article>
            </div>
        </div>
    </div>
</section>

<div class="height_20"></div>

<img src="<?= base_url() ?>resources/site/images/round-f.png" class="center-block" alt="">
<? $this->load->view('site/includes/footer') ?>

</body>
</html>