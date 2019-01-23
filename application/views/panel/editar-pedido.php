<?php
/**
 * Created by PhpStorm.
 * User: Nikollai Hernandez
 * Date: 28/05/2016
 * Time: 09:49 AM
 */
?>

<?
    $valor_total = 0;
    $num_productos = 0;
    if ($orden['actividades'] != 0) {
      $num_productos = count($orden['actividades']);
      for ($p=0; $p < count($orden['actividades']); $p++) { 
         $valor_total = $valor_total + ($orden['actividades'][$p]['valor_orden_articulos_cop'] * $orden['actividades'][$p]['cantidad_orden_articulos']);
      }
    }

    if ($orden['paquetes'] != 0) {
      $num_productos = $num_productos + count($orden['paquetes']);
      for ($p=0; $p < count($orden['paquetes']); $p++) { 
         $valor_total = $valor_total + ($orden['paquetes'][$p]['valor_orden_articulos_cop'] * $orden['paquetes'][$p]['cantidad_orden_articulos']);
      }
    }    
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
                                <h2>Orden #<?= $orden['id_orden'] ?></h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">
                                <form action="" method="post">

                                    <div class="graphic-content col-md-12 col-sm-12 col-xs-12">
                                        <div class="g-calendar col-md-3 col-sm-4 col-xs-6">
                                          <i class="fa fa-calendar"></i> 
                                          <div class="graphic-info">
                                              <p class="graphic-title">Fecha</p>
                                              <p class="graphic-subtitle"><?= $orden['fecha_orden'] ?></p>
                                          </div>
                                        </div>

                                        <div class="g-dollar col-md-3 col-sm-4 col-xs-6">
                                          <i class="fa fa-money"></i> 
                                          <div class="graphic-info">
                                              <p class="graphic-title">Total</p>
                                              <p class="graphic-subtitle">$<?= number_format($valor_total, 0, ',', '.') ?></p>
                                          </div>
                                        </div>

                                        <div class="g-car col-md-3 col-sm-4 col-xs-6">
                                          <i class="fa fa-shopping-cart"></i> 
                                          <div class="graphic-info">
                                              <p class="graphic-title">Productos</p>
                                              <p class="graphic-subtitle"><?= $num_productos ?></p>
                                          </div>
                                        </div>

                                        <div class="g-user col-md-3 col-sm-4 col-xs-6">
                                          <i class="fa fa-user"></i> 
                                          <div class="graphic-info">
                                              <p class="graphic-title">Cliente</p>
                                              <p class="graphic-subtitle"><?= $orden['nombre_usuarios'].' '.$orden['apellido_usuarios'] ?></p>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div style="padding-top: 20px;" class="col-md-7 col-sm-7 col-xs-12">
                                        <label>Estado</label>
                                        <div class="input-group col-md-12 col-sm-12 col-xs-12">
                                            <select name="orden[estado_orden]" class="form-control">
                                                <option value="<?= $orden['estado_orden'] ?>"><?= $orden['estado_orden'] ?></option>
                                                <?
                                                    for ($i=0; $i < count($estados); $i++) { 
                                                        if ($estados[$i] != $orden['estado_orden']) {

                                                            ?>
                                                            <option value="<?= $estados[$i] ?>"><?= $estados[$i] ?></option>
                                                            <?
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <label>Observaciones</label>
                                            <div class="input-group col-md-12 col-sm-12 col-xs-12">
                                                <textarea cols="12" rows="5" name="orden[comentarios_orden]" class="col-md-12 col-sm-12 col-xs-12">
                                                    <?= $orden['comentarios_orden'] ?>
                                                </textarea>
                                            </div>
                                        </div>

                                    <div style="padding-top: 20px;" class="col-md-5 col-sm-5 col-xs-12">
                                        <label>Información del cliente</label>
                                        <table style="font-size: 14px;" class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                       <strong>Nombre </strong>
                                                    </td>
                                                    <td>
                                                        <?= $orden['nombre_usuarios'].' '.$orden['apellido_usuarios'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                       <strong>Telefono </strong>
                                                    </td>
                                                    <td>
                                                        <?= $orden['movil_usuarios']. ', ' .$orden['telefono_usuarios']?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                       <strong>Email </strong>
                                                    </td>
                                                    <td>
                                                        <?= $orden['email_usuarios'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                       <strong>Direccion de envio </strong>
                                                    </td>
                                                    <td>
                                                        <?= $orden['direccion_usuarios'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                       <strong>Ubicación</strong>
                                                    </td>
                                                    <td>
                                                        <?= $orden['nombre_municipio'].','.$orden['nombre'] ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
  
                                    </div>
                                    <input type="hidden" name="id_orden" value="<?php if (!isset($orden['id_orden'])){ echo '-1'; }else{ echo $orden['id_orden']; } ?>" />
                                    
                                    <table id="ordens" class="table table-striped table-bordered table-condensed">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tipo</th>
                                            <th>Nombre</th>
                                            <th>Actividad</th>
                                            <th>Cantidad</th>
                                            <th>Precio/U</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                            <!-- Lista de actividades -->
                                            <?
                                                if ($orden['actividades'] != 0) {
                                                   $actividades = $orden['actividades'];
                                                   foreach ($actividades as $actividad) {
                                                    $a = 1;
                                            ?>
                                                      <tr>
                                                        <td><?= $a ?></td>
                                                        <td>Actividad</td>
                                                        <td><?= $actividad['titulo_actividades'] ?></td>
                                                        <td><?= $actividad['titulo_actividades'] ?></td>
                                                        <td><?= $actividad['cantidad_orden_articulos'] ?></td>
                                                        <td>$<?= number_format($actividad['valor_orden_articulos_cop'],0,',','.') ?></td>
                                                        <td>$<?= number_format($actividad['valor_orden_articulos_cop'] * $actividad['cantidad_orden_articulos'],0,',','.') ?></td>
                                                      </tr>
                                            <?
                                                   }
                                                }
                                            ?>
                                            <!-- Fin lista de actividades -->
                                            <!-- Lista de paquetes -->
                                            <?
                                                if ($orden['paquetes'] != 0) {
                                                   $paquetes = $orden['paquetes'];
                                                   foreach ($paquetes as $paquete) {
                                                    $a = 1;
                                            ?>
                                                      <tr>
                                                        <td><?= $a ?></td>
                                                        <td>Paquete</td>
                                                        <td><?= $paquete['titulo_planes_actividad'] ?></td>
                                                        <td><?= $paquete['titulo_actividades'] ?></td>
                                                        <td><?= $paquete['cantidad_orden_articulos'] ?></td>
                                                        <td>$<?= number_format($paquete['valor_orden_articulos_cop'],0,',','.') ?></td>
                                                        <td>$<?= number_format($paquete['valor_orden_articulos_cop'] * $paquete['cantidad_orden_articulos'],0,',','.') ?></td>
                                                      </tr>
                                            <?
                                                   }
                                                }
                                            ?>
                                            <!-- Fin lista de paquetes -->
                                        </tbody>
                                    </table>
                                    <div class="row">
                                      <div class="col-xs-8"></div>
                                      <div class="col-xs-4">
                                        <div class="table-responsive">
                                          <table class="table">
                                            <tbody>
                                              <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td style="text-align: right;">$ <?= number_format($valor_total, 0, ',', '.') ?></td>
                                              </tr>

                                              <tr>
                                                <th>Total:</th>
                                                <td style="text-align: right;">$ <?= number_format($valor_total, 0, ',', '.') ?></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="row">
                                      <div class="col-xs-9 "></div>
                                        <div style="text-align: right;" class="form-group col-xs-3">
                                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                                <button type="reset" onclick="goToLink('../lista')" class="btn btn-primary">Cancelar</button>
                                                <button type="submit" class="btn btn-success">Guardar</button>
                                            </div>
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

        <!-- Photos -->
        <script src="<?= base_url(); ?>/resources/panel/js/products-photo.js"></script>






