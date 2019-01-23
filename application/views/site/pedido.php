<? $this->load->view('site/includes/tags'); ?>
	<?

	    $valor_total = 0;
	    for ($p=0; $p < count($productos); $p++) {
	    	if (!empty($productos[$p]['precio_oferta']) || $productos[$p]['precio_oferta'] != '') {
	    		$precio = $productos[$p]['precio_oferta'];
	    	}else{
	    		$precio = $productos[$p]['precio'];
	    	}

	        $valor_total = $valor_total + ($productos[$p]['cantidad_pedido'] * $precio);
	    }

	?>
   </head>
   <body class="customer-account-index adapt-3">
      <div class="wrapper ">
         <div class="page two-columns-right">
            <? $this->load->view('site/includes/header'); ?>

          	<? //$this->load->view('site/includes/menu') ?>
            
            <div class="wrapper_content">
			   <div class="container_24 ">
				  <div class="clear"></div>
				  <div class="grid_24 em-breadcrumbs">
					 <div class="breadcrumbs">
						<ul>
						   <li class="home">
							  <a href="./" title="Home">Home</a>
							  <span class="separator">/ </span>
						   </li>
						   <li class="my_account">
							  <strong>My Account</strong>
						   </li>
						</ul>
					 </div>
				  </div>
				  <div class="grid_18 em-main-wrapper">
					 <div class="my-account">
						<div class="dashboard">
						   <div class="box-account box-recent">
							  <div class="box-head">
								 <h2>Informacion del pedido - (<small><?= $pedido['fecha'].', '.$pedido['hora'] ?></small>) </h2>  
							  </div>
							  <table class="data-table" id="my-orders-table">
								 <colgroup>
									<col width="1">
									<col width="1">
									<col>
									<col width="1">
									<col width="1">
									<col width="1">
								 </colgroup>
								 <thead>
									<tr class="first last">
									   <th><b>Imagen</b></th>
									   <th><b>Nombre</b></th>
									   <th><b>Precio</b></th>
									   <th><b>Cantidad</b></th>
									   <th><b>Subtotal</b></th>
									</tr>
								 </thead>
								 <tbody>
									
									<?
										for ($p=0; $p < count($productos); $p++) { 
						                   		$color_product = '';
						                   		if (!empty($productos[$p]['color'])) {
						                   			$color_product = '<div style="background-color: '.$productos[$p]['color'].';" class="div-color car-show"></div>';
						                   		}

						                   		$talla_product = '';
						                   		if (!empty($productos[$p]['talla'])) {
						                   			$talla_product = 'Talla: '. $productos[$p]['talla'];
						                   		}

											if (!empty($productos[$p]['precio_oferta']) || $productos[$p]['precio_oferta'] != '') {
									    		$precio = $productos[$p]['precio_oferta'];
									    		$precio_mostrar = '$'.number_format($productos[$p]['precio'],0, ',','.').' - ($'.number_format($productos[$p]['precio_oferta'],0, ',','.').')';
									    	}else{
									    		$precio = $productos[$p]['precio'];
									    		$precio_mostrar = number_format($productos[$p]['precio'],0 ,',', '.');
									    	}
										?>
										<tr class="first odd">
											<td><img src="<?= base_url().'uploads/productos/'.$productos[$p]['id_producto'].'/t'.$productos[$p]['imagen'] ?>"></td>
											<td><?= $productos[$p]['nombre'] ?><br>
												<?= $color_product ?><br>
												<?= $talla_product ?>
											</td>
											<td><?= $precio_mostrar ?></td>	
											<td><?= $productos[$p]['cantidad_pedido'] ?></td>
											<td><?= '$'.number_format($productos[$p]['cantidad_pedido'] * $precio, 0 ,',', '.') ?></td>
										</tr>
										<? }
									?>
									
								 </tbody>
							  </table>
							  <script type="text/javascript">decorateTable('my-orders-table')</script>
						   </div>
						   <div class="grid_6"></div>
                            <div style="" class="grid_18 price-order">
                              <div class="table-responsive">
                                <table class="table"> 
                                  <tbody>
                                    <tr>
                                      <th style="width:50%"><b>Subtotal:</b></th>
                                      <td>$ <?= number_format($valor_total, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                      <th><b>Envio:</b></th>
                                      <td>$ 20.000</td>
                                    </tr>
                                    <tr>
                                      <th><b>Total:</b></th>
                                      <td>$ <?= number_format($valor_total + 20000, 0, ',', '.') ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
						   <div class="box-account box-info">
							  <div class="box-head">
								 <h2>Información de la cuenta</h2>
							  </div>
							  <div class="col2-set">
								 <div class="col-1">
									<div class="box">
									   <div class="box-title">
										  <h3>Información de logueo</h3>
									   </div>
									   <div class="box-content">
										  <p>
											 Customer<br/>
											 <?= $cliente['email'] ?><br/>
											 <a href="<?= base_url() ?>cliente/editar">Cambiar contraseña</a>
										  </p>
									   </div>
									</div>
								 </div>
								 <div class="col-2">
										  <h4>Información del cliente</h4>
										  <a href="#">Modificar</a>
										  <address>
											 <?= $cliente['nombres'] ?><br/>
											 <?

												if (!empty($cliente['movil']) && !empty($cliente['telefono'])) {
											 		echo $cliente['movil'].'  -  '.$cliente['telefono'].'<br>';
											 	}
											 	else{
											 		if (!empty($cliente['movil'])) {
											 			echo $cliente['movil'].'<br>';
											 		}
											 		if (!empty($cliente['telefono'])) {
											 			echo $cliente['telefono'].'<br>';
											 		}
											 	} 
											
											 ?>
											 <?= $cliente['email'] ?><br/>
											 <?= $cliente['nombre_municipio'].','.$cliente['nombre'] ?><br/>
											 Colombia<br/>
											 <?= $cliente['direccion'] ?>
											 <br/>
										  </address>
									   </div>
							  </div>
							 
						   </div>
						</div>
					 </div>
				  </div>
				  <div class="grid_6 em-col-right em-sidebar">
					 <div class="block block-account">
						<div class="block-title">
						   <strong><span>My Account</span></strong>
						</div>
						<div class="block-content">
						   <ul>
							  <li class="current"><strong>Account Dashboard</strong></li>
							  <li><a href="#">Account Information</a></li>
							  <li><a href="#">Address Book</a></li>
							  <li><a href="#">My Orders</a></li>
						   </ul>
						</div>
					 </div>
					 <div class="block-banner">
						<div class="widget widget-static-block ">
						   <p><a title="sample_banner" href="#"><img class="fluid" src="<?= base_url() ?>uploads/banner/<?= $banners['imagen_banner_2'] ?>" alt="sample_banner" alt="sample_banner"></a></p>
						</div>
					 </div>
				  </div>
				  <div class="clear"></div>
			   </div>
			</div>
            <? $this->load->view('site/includes/footer'); ?>
            <div>
            </div>
         </div>
      </div>
   </body>
</html>