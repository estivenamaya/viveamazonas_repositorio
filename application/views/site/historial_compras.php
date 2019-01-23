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
                <li class="active"><?= $this->lang->line('header_link_record'); ?></li>
            </ol>
            <h2><?= $this->lang->line('header_link_record'); ?></h2>
        </div>
    </div>
</section>


<section id="Main">
    <div class="container-fluid">
        <div class="shopping-cart auto_margin">
            <div class="height_20"></div>
            <div class="row">
                <div class="shop-table">
                	<?
                		if ($ordenes != 0) {
                			foreach ($ordenes as $orden) {
                				$total = 0;
                				$total_usd = 0
                	?>
                				<!-- item table-->
			                    <div class="td-body">
			                        <div class="table-responsive">
			                            <div class="td-head">
			                                <div class="row">
			                                    <div class="col-md-12"><span class="title1"><?= $this->lang->line('record_order'); ?> #<?= $orden['id_orden'] ?> | <?= $orden['fecha_orden'] ?></span></div>
			                                </div>
			                            </div>
			                            <table class="table table-hover">
			                                <thead>
			                                <tr>
			                                    <th>#</th>
			                                    <th><?= $this->lang->line('record_type'); ?></th>
			                                    <th><?= $this->lang->line('record_name'); ?></th>
			                                    <th><?= $this->lang->line('record_activity'); ?></th>
			                                    <th><?= $this->lang->line('record_quantity'); ?></th>
			                                    <th><?= $this->lang->line('record_price'); ?></th>
			                                    <th>Total</th>
			                                </tr>
			                                </thead>
			                                <tbody>
			                                	<?
			                                		$i = 1;
			                                		if ($orden['actividades'] != 0) {
			                                			foreach ($orden['actividades'] as $actividad) {
			                                				$total = $total + ($actividad['cantidad_orden_articulos'] * $actividad['valor_orden_articulos_cop']);
			                                				$total_usd = $total_usd + ($actividad['cantidad_orden_articulos'] * $actividad['valor_orden_articulos_usd']);
			                                	?>
			                                				<tr>
			                                					<td><?= $i ?></td>
			                                					<td><?= $this->lang->line('record_activity'); ?></td>
			                                					<td><a href="<?= base_url() ?>actividad/ver/<?= $actividad['id_actividad'].'/'.stringtourl($actividad['titulo_actividades']) ?>"><?= $actividad['titulo_actividades'] ?></a></td>
			                                					<td><a href="<?= base_url() ?>actividad/ver/<?= $actividad['id_actividad'].'/'.stringtourl($actividad['titulo_actividades']) ?>"><?= $actividad['titulo_actividades'] ?></a></td>
			                                					<td><?= $actividad['cantidad_orden_articulos'] ?></td>
			                                					<td>$
			                                						<?
			                                                          if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
			                                                      	?>
			                                                                  <?= number_format($actividad['valor_orden_articulos_cop'],0,',','.') ?> COP
			                                                      	<?
			                                                          }
			                                                          else{
			                                                      	?>
			                                                                <?= number_format($actividad['valor_orden_articulos_usd'],2,',','.') ?> USD
			                                                      	<?
			                                                          }
			                                                      	?>
			                                                    </td>
			                                					<td>$
			                                						<?
			                                                          if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
			                                                      	?>
			                                                                  <?= number_format($actividad['cantidad_orden_articulos'] * $actividad['valor_orden_articulos_cop'],0,',','.') ?> COP
			                                                      	<?
			                                                          }
			                                                          else{
			                                                      	?>
			                                                                <?= number_format($actividad['cantidad_orden_articulos'] * $actividad['valor_orden_articulos_usd'],2,',','.')  ?> USD
			                                                      	<?
			                                                          }
			                                                      	?>
			                                                    </td>
			                                				</tr>
			                                	<?
			                                				$i++;
			                                			}
			                                		}
			                                	?>
			                                	<?
			                                		if ($orden['paquetes'] != 0) {
			                                			foreach ($orden['paquetes'] as $paquete) {
			                                				$total = $total + ($paquete['cantidad_orden_articulos'] * $paquete['valor_orden_articulos_cop']);
			                                				$total_usd = $total_usd + ($paquete['cantidad_orden_articulos'] * $paquete['valor_orden_articulos_usd']);
			                                	?>
			                                				<tr>
			                                					<td><?= $i ?></td>
			                                					<td><?= $this->lang->line('record_package'); ?></td>
			                                					<td><a href="<?= base_url() ?>actividad/ver/<?= $paquete['id_actividad'].'/'.stringtourl($paquete['titulo_actividades']) ?>"><?= $paquete['titulo_planes_actividad'] ?></a></td>
			                                					<td><a href="<?= base_url() ?>actividad/ver/<?= $paquete['id_actividad'].'/'.stringtourl($paquete['titulo_actividades']) ?>"><?= $actividad['titulo_actividades'] ?></a></td>
			                                					<td><?= $paquete['cantidad_orden_articulos'] ?></td>
			                                					<td>$
			                                						<?
			                                                          if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
			                                                      	?>
			                                                                  <?= number_format($paquete['valor_orden_articulos_cop'],0,',','.') ?> COP
			                                                      	<?
			                                                          }
			                                                          else{
			                                                      	?>
			                                                                <?= number_format($paquete['valor_orden_articulos_usd'],2,',','.') ?> USD
			                                                      	<?
			                                                          }
			                                                      	?>
			                                                    </td>
			                                					<td>$
			                                						<?
			                                                          if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
			                                                      	?>
			                                                                  <?= number_format($paquete['cantidad_orden_articulos'] * $paquete['valor_orden_articulos_cop'],0,',','.') ?> COP
			                                                      	<?
			                                                          }
			                                                          else{
			                                                      	?>
			                                                                <?= number_format($paquete['cantidad_orden_articulos'] * $paquete['valor_orden_articulos_usd'],2,',','.') ?> USD
			                                                      	<?
			                                                          }
			                                                      	?>
			                                					</td>
			                                				</tr>
			                                	<?
			                                				$i++;
			                                			}
			                                		}
			                                	?>
			                                	<tr>
                                					<td style="text-align: center;" colspan="6">
                                						<strong>TOTAL</strong>
                                					</td>
                                					<td>
                                						<?
                                                          if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
                                                      	?>
                                                                  <strong>$<?= number_format($total,0,',','.') ?> COP</strong>
                                                      	<?
                                                          }
                                                          else{
                                                      	?>
                                                                <strong>$<?= number_format($total_usd,2,',','.') ?> USD</strong>
                                                      	<?
                                                          }
                                                      	?>
                                						
                                					</td>
                                				</tr>
			                                </tbody>
			                            </table>
			                        </div>
			                    </div>
			                    <!--end item table-->
                	<?
                			}
                		}
                	?>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<div class="height_20"></div>

<img src="<?= base_url() ?>resources/site/images/round-f.png" class="center-block" alt="">
<? $this->load->view('site/includes/footer') ?>

</body>
</html>