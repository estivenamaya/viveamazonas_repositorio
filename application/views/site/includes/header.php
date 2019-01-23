<div class="abs-post-inner">
    <section id="bar-top">
        <div class="container-fluid">
            <div class="area-bar auto_margin">
                <div class="row">
                    <div class="col-md-3 col-sm-4 hidden-xs">
                        <div class="follow">
                            <a href="https://www.facebook.com/mundocomputo.quindio" class="icon facebook" title="Facebook" target="_blank">facebook</a>
                            <a href="#" class="icon twitter" title="twitter" target="_blank">twitter</a>
                            <a href="#" class="icon google" title="google" target="_blank">google+</a>
                            <a href="#" class="icon linkedin" title="linkedin" target="_blank">linkedin</a>
                            <a href="#" class="icon instagram" title="linkedin" target="_blank">instagram</a>
                            <a href="#" class="icon pinterest" title="pinterest" target="_blank">pinterest</a>
                            <a href="#" class="icon youtube" title="youtube" target="_blank">youtube</a>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-8">
                        <div id="user-menu" class="shop-mega-menu">
                            <ul class="mcollapse changer">
                                
                            <?
                                if (isset($this->session->userdata('userdata')['id_usuario'])) {
                            ?>
                                    <li><a href="<?= base_url() ?>main/carrito"><i class="mdi mdi-basket"></i> <span><?= $this->lang->line('header_top_shopping_cart'); ?></span> <span id="cantidad-cesta" class="badge"><?= cantidadCesta(); ?></span></a>
                                        <ul class="drop-down full-width hover-fade" style="max-width:360px;">
                                            <?
                                                $carro = $this->session->userdata('carro');
                                                $total = 0;
                                                if (isset($carro['producto'][0])) {
                                                    for ($i=0; $i < count($carro['producto']); $i++) { 
                                                        if ($carro['estado'][$i] == 1) {
                                                            $total = $total + ($carro['precio_cop'][$i] * $carro['cantidad'][$i]);
                                            ?>
                                                            <li>
                                                                <table class="table">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <a href="<?= base_url() ?>actividad/ver/<?= $carro['producto'][$i] ?>" class="item">
                                                                                <figure><img src="<?= $carro['imagen'][$i] ?>" alt=""></figure>
                                                                            </a>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?= base_url() ?>actividad/ver/<?= $carro['producto'][$i] ?>" class="item">
                                                                                <h4><?= $carro['nombre'][$i] ?></h4>
                                                                                <p><?= $this->lang->line('cart_aside_quantity'); ?>: <?= $carro['cantidad'][$i] ?></p>
                                                                                <p><?= $this->lang->line('cart_aside_price'); ?>: $<?= number_format($carro['precio_cop'][$i],0,',','.') ?></p>
                                                                            </a>
                                                                        </td>
                                                                        <td style="cursor:pointer"><a onclick="eliminarArticulo(<?= $i ?>, 0, 1);"><i class="mdi mdi-delete"></i></a></td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </li>
                                            <?
                                                        }

                                                        if (($carro['paquetes'][$i]) != '') {
                                                            for ($j=1; $j <= count($carro['paquetes'][$i]); $j++) { 
                                                                if ($carro['paquetes'][$i][$j]['estado']) {
                                                                    $total = $total + ($carro['paquetes'][$i][$j]['precio_cop'] * $carro['paquetes'][$i][$j]['cantidad']);
                                            ?>
                                                                    <li>
                                                                        <table class="table">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <a href="<?= base_url() ?>actividad/ver/<?= $carro['producto'][$i] ?>" class="item">
                                                                                        <figure><img src="<?= $carro['imagen'][$i] ?>" alt=""></figure>
                                                                                    </a>
                                                                                </td>
                                                                                <td>
                                                                                    <a href="<?= base_url() ?>actividad/ver/<?= $carro['producto'][$i] ?>" class="item">
                                                                                        <h4><?= $carro['paquetes'][$i][$j]['titulo_paquete'] ?></h4>
                                                                                        <p>Cantidad: <?= $carro['paquetes'][$i][$j]['cantidad'] ?></p>
                                                                                        <p>Precio unidad: $<?= number_format($carro['paquetes'][$i][$j]['precio_cop'],0,',','.') ?></p>
                                                                                    </a>
                                                                                </td>
                                                                                <td style="cursor:pointer"><a onclick="eliminarArticulo(<?= $i ?>, <?= $j ?>, 0);"><i class="mdi mdi-delete"></i></a></td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </li>
                                            <?
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            ?>
                                            <li>
                                                <hr>
                                                <h2 class="precio-cesta">Total:  $ <?= number_format($total,0,',','.'); ?></h2>
                                                <div class="check-out">
                                                    <a style="padding: 0;" href="<?= base_url() ?>main/carrito">
                                                        <button style="float: right;" class="btn btn-danger waves-effect waves-light">Checkout</button>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a href="#"> <i class="mdi mdi-account"></i> <span><?= $this->lang->line('header_top_hello'); ?>,  <?= strtoupper($this->session->userdata('userdata')['nombre']) ?></span></a>
                                        <ul class="drop-down one-column hover-fade" style="width: 195px;">
                                            <li><a href="<?= base_url() ?>cliente/cuenta"><?= $this->lang->line('header_top_account'); ?></a></li>
                                            <li><a href="<?= base_url() ?>cliente/historial"><?= $this->lang->line('header_top_bought'); ?></a></li>
                                            <li><a href="<?= base_url() ?>cliente/favoritos"><?= $this->lang->line('header_top_favorites'); ?></a></li>
                                            <li><a href="<?= base_url() ?>cliente/salir"><?= $this->lang->line('header_top_exit'); ?></a></li>
                                        </ul>
                                    </li>

                                    <li> 
                                        
                                            <a href="<?= base_url() ?>cliente/favoritos"><i class="mdi mdi-heart"></i> <span><div id="likes"><? echo (isset($likes) && $likes != 0) ? count($likes) : '0' ?></div></span></a>
                                    </li>
                            <?      
                                }else{
                            ?>
                                    <li><a href="" data-toggle="modal" data-target=".login-modal-sm" data-dismiss="modal">  
                                        <i class="mdi mdi-account"></i> <span><?= $this->lang->line('header_top_login'); ?></span></a>
                                    </li>
                            <?
                                }
                            ?>
                                <?
                                    if (isset($lenguajes) && count($lenguajes) > 1) {
                                ?>
                                        <li><a href=""> <i style="margin-right: 5px;" class="fa fa-language"></i><span> <?= $this->lang->line('header_top_languague'); ?></span></a>
                                            <ul class="drop-down one-column hover-fade" style="width: 195px; cursor: pointer;">
                                                <?
                                                    foreach ($lenguajes as $lenguaje) {
                                                ?>
                                                        <li onclick="cambiarIdioma(<?= $lenguaje['id_lenguaje'] ?>);" <? echo ((isset($this->session->userdata('userdata')['idioma']) && $lenguaje['id_lenguaje'] == $this->session->userdata('userdata')['idioma'] ) || (!isset($this->session->userdata('userdata')['idioma']) && $lenguaje['id_lenguaje'] == 1)) ? 'style = "background: #e61a60;"'  : '' ?>><a <? echo ((isset($this->session->userdata('userdata')['idioma']) && $lenguaje['id_lenguaje'] == $this->session->userdata('userdata')['idioma']) || (!isset($this->session->userdata('userdata')['idioma']) && $lenguaje['id_lenguaje'] == 1)) ? 'style = "color: #fff;"'  : '' ?>><?= $lenguaje['nombre_lenguaje'] ?></a></li>
                                                <?
                                                    }
                                                ?>
                                            </ul>
                                        </li>
                                <?
                                    }
                                ?>
                                <li><a href=""> <i style="margin-right: 5px;" class="fa fa-dollar"></i><span> <?= $this->lang->line('header_top_currency'); ?></span></a>
                                    <ul class="drop-down one-column hover-fade" style="width: 195px; cursor: pointer;">
                                        
                                                <li onclick="cambiarMoneda(2);"<? echo (isset($this->session->userdata('userdata')['moneda']) && $this->session->userdata('userdata')['moneda'] == 2) ? 'style = "background: #e61a60;"'  : '' ?>><a <? echo (isset($this->session->userdata('userdata')['moneda']) && $this->session->userdata('userdata')['moneda'] == 2) ? 'style = "background: #e61a60;"'  : '' ?>>USD - Dolar Americano</a></li>
                                                <li onclick="cambiarMoneda(1);"<? echo (!isset($this->session->userdata('userdata')['moneda']) || $this->session->userdata('userdata')['moneda'] == 1) ? 'style = "background: #e61a60;"'  : '' ?>><a <? echo (!isset($this->session->userdata('userdata')['moneda']) || $this->session->userdata('userdata')['moneda'] == 1) ? 'style = "color: #fff;"'  : '' ?>>COP - Peso Colombiano</a></li>
                            
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <header>
        <div class="container-fluid">
            <div class="area-header auto_margin">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo"><a href="<?= base_url() ?>"><img src="<?= base_url() ?>resources/site/images/logo.png" class="img-retina" data-2x="<?= base_url() ?>resources/site/images/logo@2x.png" width="310" alt=""></a></div>
                    </div>
                    <div class="col-sm-8">

                        <div class="topMenu">

                            <div class="flat-mega-menu">
                                <ul id="idrop" class="mcollapse changer">

                                    <li><a href="<?= base_url() ?>"><?= $this->lang->line('header_menu_home'); ?></a></li>

                                    <li><a href="<?= base_url() ?>actividad/todas"><?= $this-> title='PLANES TURISTICOS' ?></a></li>
                        

                                    <li><a><?= $this-> title='OFERTAS'; ?></a>
                                      <ul class="drop-down one-column hover-fade">
                                            <ul>
                                                <?
                                                    if (isset($ofertas) && $ofertas != 0) {
                                                        foreach ($ofertas as $oferta) {
                                                ?>
                                                            <li><a href="<?= base_url() ?>actividad/ver/<?= $oferta['id_actividad'] ?>"><?= $oferta['titulo_actividades'] ?></a></li>
                                                <?
                                                        }
                                                    }
                                                    else{
                                                ?>
                                                        <li><a>No existen ofertas disponibles</a></li>
                                                <?
                                                    }
                                                ?>
                                            </ul>
                                           
                                        </ul>
                                    </li>

                                
                                   <!--<li><a href="<?= base_url() ?>destino/todos"><?= $this->lang->line('header_menu_fates'); ?></a></li>
                                     -->

                                    <li><a href="<?= base_url() ?>main/contactenos"><?= $this->lang->line('header_menu_contact'); ?></a></li>
                                </ul>
                            </div>
                            <!-- end menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="mobile"></div>
</div>