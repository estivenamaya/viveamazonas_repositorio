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
                <li class="active"><?= $this->lang->line('header_link_cart'); ?></li>
            </ol>
            <h2><?= $this->lang->line('header_link_cart'); ?></h2>
        </div>
    </div>
</section>


<section id="Main">
    <div class="container-fluid">
        <div class="shopping-cart auto_margin">
            <div class="height_20"></div>
            <div class="row">
                <div class="shop-table">
                    <div class="td-head">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12"><span class="title1"><?= $this->lang->line('cart_product'); ?></span></div>
                            <div class="col-md-2 hidden-sm hidden-xs"><span class="title"><?= $this->lang->line('cart_quantity'); ?></span></div>
                            <div class="col-sm-2 hidden-sm hidden-xs"><span class="title"><?= $this->lang->line('cart_price'); ?></span></div>
                            <div class="col-sm-2 hidden-sm hidden-xs"><span class="title">Total</span></div>
                        </div>
                    </div>
                    <!---->
                    <div class="td-body">
                    	<?
                            $carro = $this->session->userdata('carro');
                            $total = 0;
                            $total_usd = 0;
                            if (isset($carro['producto'][0])) {
                                for ($i=0; $i < count($carro['producto']); $i++) { 
                                    if ($carro['estado'][$i] == 1) {
                                        $total = $total + ($carro['precio_cop'][$i] * $carro['cantidad'][$i]);
                                        $total_usd = $total_usd + ($carro['precio_usd'][$i] * $carro['cantidad'][$i]);
                        ?>
                    					<!--item-->
				                        <div class="item" id="actividad-<?= $carro['producto'][$i] ?>">
				                            <div class="deleted">
				                                <a onclick="eliminarArticulo(<?= $i ?>, 0, 1);"><i class="mdi mdi-delete"></i></a>
				                            </div>
				                            <div class="row">
				                                <div class="col-md-1 col-sm-2 col-xs-3 td-cell">
				                                    <figure><img src="<?= $carro['imagen'][$i] ?>" alt="" class="img-responsive"></figure>
				                                </div>
				                                <div class="col-md-5 col-sm-4 col-xs-8 td-cell">
				                                    <div class="info">
				                                        <h2><a href="<?= base_url() ?>actividad/ver/<?= $carro['producto'][$i].'/'.stringtourl($carro['nombre'][$i]) ?>"><?= $carro['nombre'][$i] ?></a></h2>
				                                    </div>
				                                </div>
				                                <div class="col-md-2 col-sm-3 col-xs-12 col-md-push-0 col-sm-push-0 col-xs-push-3 td-cell">
				                                    <strong class="hidden-lg hidden-md">Cantidad: <br></strong>
				                                    <div class="sp-quantity">
				                                        <div onclick="downQty(<?= $carro['producto'][$i] ?>, '1', <?= $i ?>, 0, <? echo (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) ? '1' : '2' ?>);" class="sp-minus"><a class="" >-</a>
				                                        </div>
				                                        <div class="sp-input">
				                                            <input id="texto-actividad-cantidad-<?= $carro['producto'][$i] ?>" type="text" class="quntity-input" value="<?=  $carro['cantidad'][$i] ?>">
				                                        </div>
				                                        <div onclick="upQty(<?= $carro['producto'][$i] ?>, '1', <?= $i ?>, 0, <? echo (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) ? '1' : '2' ?>);" class="sp-plus fff"><a class="">+</a>
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="col-sm-2 col-xs-12 col-md-push-0 col-sm-push-0 col-xs-push-3 td-cell">
				                                    <strong class="hidden-lg hidden-md">Valor Unidad:</strong>
				                                    <input type="hidden" name="" id="valor-actividad-precio-<?= $carro['producto'][$i] ?>" value="<? echo (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) ? $carro['precio_cop'][$i] : $carro['precio_usd'][$i] ?>">
				                                    <?
                                                        if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
                                                    ?>
                                                                <span class="price1">$<?= number_format($carro['precio_cop'][$i], 0, ',', '.') ?> COP</span>
                                                    <?
                                                        }
                                                        else{
                                                    ?>
                                                                <span class="price1">$<?= number_format($carro['precio_usd'][$i], 2, ',', '.') ?> USD</span>
                                                    <?
                                                          }
                                                    ?>
				                                </div>
				                                <div class="col-sm-2 col-xs-12 col-md-push-0 col-sm-push-0 col-xs-push-3 td-cell">
				                                	<input id="valor-total-actividad-precio-<?= $carro['producto'][$i] ?>" type="hidden" class="quntity-input" value="">
				                                    <strong class="hidden-lg hidden-md">Valor Total:</strong>
				                                    <?
                                                        if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
                                                    ?>
                                                                <span id="texto-actividad-precio-<?= $carro['producto'][$i] ?>" class="price2">$<?= number_format($carro['precio_cop'][$i] * $carro['cantidad'][$i], 0, ',', '.') ?> COP</span>
                                                    <?
                                                        }
                                                        else{
                                                    ?>
                                                                <span id="texto-actividad-precio-<?= $carro['producto'][$i] ?>" class="price2">$<?= number_format($carro['precio_usd'][$i] * $carro['cantidad'][$i], 2, ',', '.') ?> USD</span>
                                                    <?
                                                          }
                                                    ?>
				                                </div>
				                            </div>
				                        </div>
				                        <!-- end-->
                        <?

                                        if (!empty($carro['paquetes'][$i])) {
                                            for ($j=1; $j <=  count($carro['paquetes'][$i]); $j++) { 
                                            	if ($carro['paquetes'][$i][$j]['estado'] == 1) {
                                                $total = $total + ($carro['paquetes'][$i][$j]['precio_cop'] * $carro['paquetes'][$i][$j]['cantidad']);
                                                $total_usd = $total_usd + ($carro['paquetes'][$i][$j]['precio_usd'] * $carro['paquetes'][$i][$j]['cantidad']);
                        ?>
	                        						<!--item-->
							                        <div class="item" style="width: 96%; float: right;">
							                            <div class="deleted">
							                                <a onclick="eliminarArticulo(<?= $i ?>, <?= $j ?>, 0);"><i class="mdi mdi-delete"></i></a>
							                            </div>
							                            <div class="row">
							                                <div class="col-md-1 col-sm-2 col-xs-3 td-cell">
							                                    <figure><img src="<?= $carro['imagen'][$i] ?>" alt="" class="img-responsive"></figure>
							                                </div>
							                                <div class="col-md-5 col-sm-4 col-xs-8 td-cell">
							                                    <div class="info">
							                                        <h2><a href="<?= base_url() ?>actividad/ver/<?= $carro['producto'][$i].'/'.stringtourl($carro['nombre'][$i]) ?>"><?= $this->lang->line('cart_package'); ?>: <?= $carro['paquetes'][$i][$j]['titulo_paquete'] ?></a></h2>
							                                    </div>
							                                </div>
							                                <div class="col-md-2 col-sm-3 col-xs-12 col-md-push-0 col-sm-push-0 col-xs-push-3 td-cell">
							                                    <strong class="hidden-lg hidden-md"><?= $this->lang->line('cart_quantity'); ?>: <br></strong>
							                                    <div class="sp-quantity">
							                                        <div onclick="downQty(<?= $carro['paquetes'][$i][$j]['id_paquete'] ?>, '0', <?= $j ?>, <?= $i ?>, <? echo (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) ? '1' : '2' ?>);" class="sp-minus fff"><a class="">-</a>
							                                        </div>
							                                        <div class="sp-input">
							                                            <input id="texto-paquete-cantidad-<?= $carro['paquetes'][$i][$j]['id_paquete'] ?>" type="text" class="quntity-input" value="<?=  $carro['paquetes'][$i][$j]['cantidad'] ?>">
							                                        </div>
							                                        <div onclick="upQty(<?= $carro['paquetes'][$i][$j]['id_paquete'] ?>, '0', <?= $j ?>, <?= $i ?>, <? echo (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) ? '1' : '2' ?>);" class="sp-plus fff"><a class="">+</a>
							                                        </div>
							                                    </div>
							                                </div>
							                                <div class="col-sm-2 col-xs-12 col-md-push-0 col-sm-push-0 col-xs-push-3 td-cell">
							                                	<input type="hidden" name="" id="valor-paquete-precio-<?= $carro['paquetes'][$i][$j]['id_paquete'] ?>" value="<? echo (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) ? $carro['paquetes'][$i][$j]['precio_cop'] : $carro['paquetes'][$i][$j]['precio_usd'] ?>">
							                                    <strong class="hidden-lg hidden-md"><?= $this->lang->line('cart_price'); ?>:</strong>
							                                    <?
			                                                        if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
			                                                    ?>
			                                                                <span class="price1">$<?= number_format($carro['paquetes'][$i][$j]['precio_cop'], 0, ',', '.') ?> COP</span>
			                                                    <?
			                                                        }
			                                                        else{
			                                                    ?>
			                                                                <span class="price1">$<?= number_format($carro['paquetes'][$i][$j]['precio_usd'], 2, ',', '.') ?> USD</span>
			                                                    <?
			                                                          }
			                                                    ?>
							                                </div>
							                                <div class="col-sm-2 col-xs-12 col-md-push-0 col-sm-push-0 col-xs-push-3 td-cell">
							                                	<input id="valor-total-paquete-precio-<?= $carro['paquetes'][$i][$j]['id_paquete'] ?>" type="hidden" class="quntity-input" value="">
							                                    <strong class="hidden-lg hidden-md">Total:</strong>
							                                    <?
			                                                        if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
			                                                    ?>
			                                                                <span id="texto-paquete-precio-<?= $carro['paquetes'][$i][$j]['id_paquete'] ?>" class="price2">$<?= number_format($carro['paquetes'][$i][$j]['precio_cop'] * $carro['paquetes'][$i][$j]['cantidad'], 0, ',', '.') ?> COP</span>
			                                                    <?
			                                                        }
			                                                        else{
			                                                    ?>
			                                                                <span id="texto-paquete-precio-<?= $carro['paquetes'][$i][$j]['id_paquete'] ?>" class="price2">$<?= number_format($carro['paquetes'][$i][$j]['precio_usd'] * $carro['paquetes'][$i][$j]['cantidad'], 2, ',', '.') ?> USD</span>
			                                                    <?
			                                                          }
			                                                    ?>
							                                </div>
							                            </div>
							                        </div>
							                        <!-- end-->
                        <?
                        						}
                                            }
                                        }
                                    }
                                }
                            }
                        ?>

                    </div>
                    <!---->
                    <div class="td-footer">
                        <!-- <div class="row">
                            <div class="col-md-8 col-sm-6 hidden-xs"></div>
                            <div class="col-md-2 col-sm-3 col-xs-5 bt-line"><span class="tb1">Sub Total</span></div>
                            <div class="col-md-2 col-sm-3 col-xs-7 bt-line"><span class="price1">$123.000</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-6 hidden-xs"></div>
                            <div class="col-md-2 col-sm-3 col-xs-5 bt-line"><span class="tb1">IVA 16%</span></div>
                            <div class="col-md-2 col-sm-3 col-xs-7 bt-line"><span class="price1">$123.000</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-6 hidden-xs"></div>
                            <div class="col-md-2 col-sm-3 col-xs-5 bt-line"><span class="tb1">Cupon</span></div>
                            <div class="col-md-2 col-sm-3 col-xs-7 bt-line"><span class="price1">$12.200</span></div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-6 col-sm-6 hidden-xs"></div>
                            <div class="col-md-3 col-sm-3 col-xs-5"><span class="tb2">Total</span></div>
                            <input type="hidden" name="" value="<? echo (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) ? $total : str_replace(',', '.', $total_usd)?>" id="valor-total-compra">
                            <div class="col-md-3 col-sm-3 col-xs-7">
                            	<?
                                    if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
                                ?>
                                            <span id="texto-total-compra" class="price2">$<?= number_format($total, 0, ',','.') ?> COP</span>
                                <?
                                    }
                                    else{
                                ?>
                                            <span id="texto-total-compra" class="price2">$<?= number_format($total_usd, 2, ',','.') ?> USD</span>
                                <?
                                      }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="td-action">
                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <a href="<?= base_url() ?>actividad/todas" class="btn btn-default btn-lg waves-effect"><i class="mdi mdi-basket"></i><?= $this->lang->line('cart_continue_shopping'); ?></a>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a onclick="slideDownDom('#metodos-pago');" class="btn btn-danger btn-lg waves-effect waves-light"><i class="fa fa-dollar"></i><?= $this->lang->line('cart_button_pay'); ?></a>
                                <div class="col-md-4"><p></p></div>
                                <div class="col-md-8" id="metodos-pago" style="display: none;">
                                	<p><?= $this->lang->line('cart_pay_subtitle'); ?></p>
                                	<ul class="checkout-types">
                                		<form method="post" action="<?= base_url() ?>actividad/compra" id="formulario-pago">
											 <li class="item-lista-metodos-pago">
											 	<input type="radio" id="product-1-1" checked="" name="tipo_pago" value="pagosonline"><?= $this->lang->line('cart_pay_payu'); ?>
											 	<div class="img-metodos-pago">
											 		<img title="Visa" src="http://mundocomputo.com/resources/site/assets/visa.png">
											 		<img title="Master Card" src="http://mundocomputo.com/resources/site/assets/mastercard.png">
											 		<img title="payU" src="http://mundocomputo.com/resources/site/assets/payu.png">
											 	</div>
											 </li>
											 <li class="item-lista-metodos-pago">
											 	<input type="radio" id="product-1-2" name="tipo_pago" value="paypal"><?= $this->lang->line('cart_pay_paypal'); ?>
											 	<div class="img-metodos-pago">
											 		<img title="Baloto" src="http://mundocomputo.com/resources/site/assets/baloto.png">
											 		<img title="Apuestas OchoA" src="http://mundocomputo.com/resources/site/assets/sured.png">
											 		<img title="Efecty" src="http://mundocomputo.com/resources/site/assets/efecty.png">
											 	</div>
											 </li>
										</form>
									</ul>
									<div class="row">
										<div id="confirmar-orden">
											<div class="col-xs-6"></div>
											<div class="col-xs-6 text-left">
												<?
													if (isset($this->session->userdata('userdata')['id_usuario'])) {
												?>
														<button onclick="confirmarOrden();" style="width: 100%;" class="btn btn-danger waves-effect"><i class="mdi mdi-check-circle"></i> Confirmar</button>
												<?
													}
													else{
												?>
														<button data-toggle="modal" data-target=".login-modal-sm" data-dismiss="modal" style="width: 100%;" class="btn btn-danger waves-effect"><i class="mdi mdi-check-circle"></i><?= $this->lang->line('cart_button_confirm'); ?></button>
												<?
													}
												?>
				                               
				                            </div>
			                            </div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="height_20"></div>

<script type="text/javascript">
	/**
	 * Descripcion: Aumenta la cantidad de un producto
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: String id -> Recibe el identificador del paquete o actividad a la cual se le aumentara la cantidad
	 * @param: Int tipo -> Recibe el tipo al cual se le desea aumentar la cantidad (1 -> Actividad, 0 -> Paquete)
	 * @return:
	 */
	 	function upQty(id, tipo, posicion, posicion_paquete, moneda){
	 		if (tipo == 1) {
	 			jQuery('#texto-actividad-cantidad-'+id).val(parseFloat(jQuery('#texto-actividad-cantidad-'+id).val()) + parseFloat(1));
	 			var cantidad = jQuery('#texto-actividad-cantidad-'+id).val();
	 			var precio = jQuery('#valor-actividad-precio-'+id).val();
				
		 		var total = jQuery('#valor-total-compra').val(parseFloat(jQuery('#valor-total-compra').val()) + parseFloat(precio)).val();


	 			$.post(site_url + 'actividad/cantidadCarrito',{articulo : 1 ,id_posicion : posicion, tipo : 1},
		            function(data){
		            	jQuery("#user-menu").load(location.href + " #user-menu");

		            	if (moneda == 1) {
		            		jQuery('#texto-total-compra').html('$'+number_format(total,0,',','.') + ' COP');
		            		jQuery('#texto-actividad-precio-'+id).html('$'+ number_format((cantidad * precio),0,'.',',') + ' COP');
		            	}
		                else{
		                	jQuery('#texto-total-compra').html('$'+number_format(total,2,',','.') + ' USD');
		                	jQuery('#texto-actividad-precio-'+id).html('$'+ number_format((cantidad * precio),2,'.',',') + ' USD');
		                }
			 			jQuery('#valor-total-actividad-precio-'+id).val(cantidad * precio);
		            }
		        )
	 		}else{
	 			jQuery('#texto-paquete-cantidad-'+id).val(parseFloat(jQuery('#texto-paquete-cantidad-'+id).val()) + parseFloat(1));
	 			var cantidad = jQuery('#texto-paquete-cantidad-'+id).val();
	 			var precio = jQuery('#valor-paquete-precio-'+id).val();

	 			var total = jQuery('#valor-total-compra').val(parseFloat(jQuery('#valor-total-compra').val()) + parseFloat(precio)).val();

	 			$.post(site_url + 'actividad/cantidadCarrito',{articulo : 0, id_posicion : posicion, tipo : 1, id_posicion_paquete : posicion_paquete},
		            function(data){
		            	jQuery("#user-menu").load(location.href + " #user-menu");

		            	if (moneda == 1) {
		            		jQuery('#texto-total-compra').html('$'+number_format(total,0,',','.') + ' COP');
		            		jQuery('#texto-paquete-precio-'+id).html('$'+ number_format((cantidad * precio),0,'.',',') + ' COP');
		            	}
		            	else{
		            		jQuery('#texto-total-compra').html('$'+number_format(total,2,',','.') + ' USD');
		            		jQuery('#texto-paquete-precio-'+id).html('$'+ number_format((cantidad * precio),2,'.',',') + ' USD');
		            	}
			 			jQuery('#valor-total-paquete-precio-'+id).val(cantidad * precio);
		            }
		        )	
	 		}

	 		jQuery("#user-menu").load(location.href + " #user-menu");
	 	}
	// ================================================================================ //

	/**
	 * Descripcion: Disminuye la cantidad de un producto
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: String id -> Recibe el identificador del paquete o actividad a la cual se le disminuira la cantidad
	 * @param: Int tipo -> Recibe el tipo al cual se le desea disminuir la cantidad (1 -> Actividad, 0 -> Paquete)
	 * @return:
	 */
	 	function downQty(id, tipo, posicion, posicion_paquete, moneda){
	 		if (tipo == 1) {
	 			var cantidad_actual = jQuery('#texto-actividad-cantidad-'+id).val();
	 			if (cantidad_actual > 1) {
	 				jQuery('#texto-actividad-cantidad-'+id).val(parseFloat(jQuery('#texto-actividad-cantidad-'+id).val()) - parseFloat(1));
	 				var cantidad = jQuery('#texto-actividad-cantidad-'+id).val();
		 			var precio = jQuery('#valor-actividad-precio-'+id).val();

		 			var total = jQuery('#valor-total-compra').val(parseFloat(jQuery('#valor-total-compra').val()) - parseFloat(precio)).val();

		 			$.post(site_url + 'actividad/cantidadCarrito',{articulo : 1, id_posicion : posicion, tipo : 0},
			            function(data){
			            	jQuery("#user-menu").load(location.href + " #user-menu");
			            	if (moneda == 1) {
			            		jQuery('#texto-total-compra').html('$'+number_format(total,0,',','.') + ' COP');
			            		jQuery('#texto-actividad-precio-'+id).html('$'+ number_format((cantidad * precio),0,'.',',') + 'COP');
			            	}
			            	else{
			            		jQuery('#texto-total-compra').html('$'+number_format(total,2,',','.') + ' USD');
			            		jQuery('#texto-actividad-precio-'+id).html('$'+ number_format((cantidad * precio),2,'.',',') + ' USD');
			            	}
				 			jQuery('#valor-total-actividad-precio-'+id).val(cantidad * precio);
			            }
			        )
	 			}
	 		}
	 		else{
	 			var cantidad_actual = jQuery('#texto-paquete-cantidad-'+id).val();
	 			if (cantidad_actual > 1) {
	 				jQuery('#texto-paquete-cantidad-'+id).val(parseFloat(jQuery('#texto-paquete-cantidad-'+id).val()) - parseFloat(1));
		 			var cantidad = jQuery('#texto-paquete-cantidad-'+id).val();
		 			var precio = jQuery('#valor-paquete-precio-'+id).val();

		 			var total = jQuery('#valor-total-compra').val(parseFloat(jQuery('#valor-total-compra').val()) - parseFloat(precio)).val();

		 			$.post(site_url + 'actividad/cantidadCarrito',{articulo : 0, id_posicion : posicion, tipo : 0, id_posicion_paquete : posicion_paquete},
			            function(data){
			            	jQuery("#user-menu").load(location.href + " #user-menu");
			            	if (moneda == 1) {
			            		jQuery('#texto-total-compra').html('$'+number_format(total,0,',','.') + ' COP');
			            		jQuery('#texto-paquete-precio-'+id).html('$'+ number_format((cantidad * precio),0,'.',',' ) + ' COP');
			            	}
			            	else{
			            		jQuery('#texto-total-compra').html('$'+number_format(total,2,',','.') + ' USD');
			            		jQuery('#texto-paquete-precio-'+id).html('$'+ number_format((cantidad * precio),2,'.',',') + ' USD');
			            	}
				 			jQuery('#valor-total-paquete-precio-'+id).val(cantidad * precio);
			            }
			        )	
	 			}
	 		}
	 	}
	// ================================================================================ //

	
</script>

<img src="<?=  base_url() ?>resources/site/images/round-f.png" class="center-block" alt="">
<? $this->load->view('site/includes/footer') ?>

</body>
</html>