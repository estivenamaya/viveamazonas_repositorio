<footer>
    <div class="container-fluid">
        <div class="area-footer auto_margin">
            <div class="row">
                <div class="col-md-3 col-sm-4 hidden-sm">
                    <div class="contt">
                        <h3><?= $this->lang->line('footer_us'); ?></h3>
                        <hr>
                        <p><?= $this->lang->line('footer_us_description'); ?></p>
                    </div>
                    <span class="height_10 hidden-md hidden-sm"></span>
                    <div class="contt">
                        <h3><?= $this->lang->line('footer_follow'); ?></h3>
                        <hr>
                        <div class="follow">
                            <a href="#" class="icon facebook" title="facebook" target="_blank">facebook</a>
                            <a href="#" class="icon twitter" title="twitter" target="_blank">twitter</a>
                            <a href="#" class="icon google" title="google" target="_blank">google+</a>
                            <a href="#" class="icon linkedin" title="linkedin" target="_blank">linkedin</a>
                            <a href="#" class="icon instagram" title="linkedin" target="_blank">instagram</a>
                            <a href="#" class="icon pinterest" title="pinterest" target="_blank">pinterest</a>
                            <a href="#" class="icon youtube" title="youtube" target="_blank">youtube</a>
                        </div>
                    </div>
                </div>
                <span class="height_10 hidden-lg hidden-md hidden-sm"></span>
                <div class="col-md-3 col-sm-4">
                    <div class="contt">
                        <h3><?= $this->lang->line('footer_location_contact'); ?></h3>
                        <hr>
                        <address>
                            <strong><?= $this->lang->line('footer_location'); ?></strong> <br>
                            My Company, 42 Puffin street 12345 <br>
                            Puffinville France
                        </address>
                        <p>
                            <strong><?= $this->lang->line('footer_phone'); ?></strong> <br>
                            +57 0123-456-789
                        </p>
                        <p>
                            <strong><?= $this->lang->line('footer_email'); ?></strong> <br>
                            sales@yourcompany.com
                        </p>
                    </div>
                </div>
                <span class="height_10 hidden-lg hidden-md hidden-sm"></span>

                <div class="col-md-3 col-sm-4">
                    <div class="contt">
                        <h3><?= $this->lang->line('footer_sales'); ?></h3>
                        <hr>
                        <ul>
                            <?
                                if (isset($contenidos_footer) && $contenidos_footer != 0) {
                                    foreach ($contenidos_footer as $contenido) {
                            ?>
                                        <li><a href="<?= base_url() ?>contenido/ver/<?= $contenido['id_contenido'].'/'.stringtourl($contenido['titulo']) ?>"><?= $contenido['titulo'] ?></a></li>
                            <?
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <span class="height_10 hidden-lg hidden-md hidden-sm"></span>
                <div class="col-md-3 col-sm-4">
                    <div class="contt">
                        <h3><?= $this->lang->line('footer_account'); ?></h3>
                        <hr>
                        <ul>
                            <?
                                if (isset($this->session->userdata('userdata')['id_usuario'])) {
                            ?>
                                    <li><a style="text-transform: lowercase;" href="<?= base_url() ?>cliente/cuenta"><?= $this->lang->line('footer_account'); ?></a></li>
                                    <li><a href="<?= base_url() ?>cliente/historial"><?= $this->lang->line('footer_buyed'); ?></a></li>
                                    <li><a href="<?= base_url() ?>cliente/favoritos"><?= $this->lang->line('footer_favorites'); ?></a></li>
                            <?
                                }
                            ?>
                            <li><a href="<?= base_url() ?>main/contactenos"><?= $this->lang->line('footer_contact'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<section id="Bottom">
    <div class="container-fluid">
        <div class="area-bottom auto_margin">
            <div class="row">
                <div class="col-sm-12">
                    <strong>© vivemazonas.com <?= date("Y") ?></strong> <?= $this->lang->line('footer_rights'); ?> <br>
                    <?= $this->lang->line('footer_rights_description'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Login modal -->
<div class="modal fade login-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?= $this->lang->line('login_title'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="loginForm">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for=""><?= $this->lang->line('login_email'); ?></label>
                                <input id="email_login" type="text" name="" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for=""><?= $this->lang->line('login_password'); ?></label>
                                <input id="password_login" type="password" name="" class="form-control"/>
                            </div>
                        </div>
                        <span class="height_5"></span>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button onclick="login();" class="btn btn-success full-width"><?= $this->lang->line('login_button'); ?></button>
                            </div>
                        </div>
                        <span class="height_5"></span>
                        <div class="col-sm-12">
                            <p id="login-error" class="error-form"></p>
                            <div class="link"><a href="<?= base_url() ?>cliente/recordarcontrasenia"><?= $this->lang->line('login_forgot'); ?></a></div>
                        </div>
                        <div class="col-sm-12">
                            <hr>
                        </div>
                        <!-- <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn-facebook">Ingresar con faceboook</button>
                                <button class="btn-twitter">Ingresar con Twitter</button>
                            </div>
                        </div> -->
                        <div class="rgline"></div>
                        <div class="col-sm-12">
                            <div class="link"><a href="" data-toggle="modal" data-target=".registro-modal-sm" data-dismiss="modal"><?= $this->lang->line('login_new'); ?>
                                <strong><?= $this->lang->line('login_singup'); ?></strong></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Registro Modal--> 
<div id="registro-modal" class="modal fade registro-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?= $this->lang->line('account_title'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="loginForm">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for=""><?= $this->lang->line('login_email'); ?></label>
                                <input id="email_registro" type="text" name="" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for=""><?= $this->lang->line('login_password'); ?></label>
                                <input id="password_registro" type="password" name="" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for=""><?= $this->lang->line('account_rpassword'); ?></label>
                                <input id="rpassword_registro" type="password" name="" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for=""><?= $this->lang->line('account_lastname'); ?></label>
                                <input id="apellidos_registro" type="text" name="" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for=""><?= $this->lang->line('account_name'); ?></label>
                                <input id="nombre_registro" type="text" name="" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-12"> 
                            <div class="form-group">
                                <div class="igree"><input id="igree" type="checkbox" name=""/> <?= $this->lang->line('account_terms'); ?></div>
                            </div>
                        </div>
                        <span class="height_5"></span>
                        <div class="col-sm-12">
                            <p id="registro-error" class="error-form"></p>
                            <div class="form-group">
                                <button onclick="registro();" class="btn btn-success full-width"><?= $this->lang->line('account_button'); ?></button>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <hr>
                        </div>
                        <!-- <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn-facebook">Registrarse con faceboook</button>
                                <button class="btn-twitter">Registrarse con Twitter</button>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="display: none;" id="checkout-modal" class="checkout-modal">
    <div class="left-checkout">
        <img class="bag-checkout" src="<?= base_url() ?>resources/site/images/bag.png">
        <div style="padding: 0 10px; margin-top: 40px;" class="bottom-left">
            <h3 class="titulo-producto-checkout"></h3>
            <h3 class="precio-producto-checkout">$0.00</h3>
        </div>
    </div>

    <dir class="right-checkout">
        <h3 class="titulo-checkout"><?= $this->lang->line('cart_success_title'); ?></h3>
        <p class="texto-checkout"><?= $this->lang->line('cart_success_description'); ?></p>
        <div class="bottom-right">
            <button onclick="slideUpDom('#checkout-modal');" class="btn button-close"><?= $this->lang->line('cart_button_continue'); ?></button>
            <a href="<?= base_url() ?>main/carrito"><button class="btn button-continue"><?= $this->lang->line('cart_button_go'); ?></button></a>
        </div>
    </dir>
</div>

<div style="display: none;" id="checkout-modal-error" class="checkout-modal">
    <div class="left-checkout">
        <img class="bag-checkout" src="<?= base_url() ?>resources/site/images/bag_error.png">
        <div style="padding: 0 10px; margin-top: 40px;" class="bottom-left">
            <h3 class="titulo-producto-checkout"></h3>
            <h3 class="precio-producto-checkout">$0.00</h3>
        </div>
    </div> 

    <dir class="right-checkout">
        <h3 class="titulo-checkout"><?= $this->lang->line('cart_error_title'); ?></h3>
        <p class="texto-checkout"><?= $this->lang->line('cart_error_description'); ?></p>
        <div class="bottom-right">
            <button onclick="slideUpDom('#checkout-modal-error');" class="btn button-close"><?= $this->lang->line('cart_button_continue'); ?></button>
        </div>
    </dir>
</div>

<style type="text/css">
    .error-form{
        color: red;
    }
</style>

<script src="<?= base_url() ?>resources/panel/js/ubicaciones.js"></script>

<!-- Global JS -->
<script src="<?= base_url() ?>resources/site/js/global.min.js"></script>
<script src="<?= base_url() ?>resources/site/js/libs/slider/extensions/revolution.extension.parallax.min.js"></script>
<script src="<?= base_url() ?>resources/site/js/libs/slider/extensions/revolution.extension.navigation.min.js"></script>
<script src="<?= base_url() ?>resources/site/js/libs/slider/extensions/revolution.extension.slideanims.min.js"></script>
<script src="<?= base_url() ?>resources/site/js/libs/all-functions.js"></script>