<?= $this->load->view('site/includes/tags') ?>
<body>
<?
    $rating = 0;
    if ($comentarios != 0) {
        
        foreach ($comentarios as $comentario) {
            $rating = $rating + $comentario['calificacion_comentario'];
        }

        $rating = round($rating / count($comentarios),0);
    }

?>
<?= $this->load->view('site/includes/header') ?>

<section id="Breadcrumb">
    <div class="container-fluid">
        <div class="area-breacrumbs auto_margin">
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url() ?>"><?= $this->lang->line('header_link_home'); ?></a>
                </li>
                <li class="active"><?= $actividad[0]['titulo_actividades'] ?></li>
            </ol>
            <h2><?= $actividad[0]['titulo_actividades'] ?></h2>
        </div>
    </div>
</section>
 

<section id="Main">
    <div class="container-fluid">
        <div class="area-detalle-plan auto_margin">
            <div class="row">
                <?
                    if ($likes != 0) {
                        foreach ($likes as $like) {
                            if ($like['id_articulo'] == $actividad[0]['id_actividad'] && $like['tipo_like'] == 'Actividad') {
                ?>
                                    <i id="like-actividad-<?= $actividad[0]['id_actividad'] ?>"  onclick="establecerLike(<?= $actividad[0]['id_actividad'] ?>, 'Actividad');" class="mdi mdi-heart like-actividad like position-like"></i>
                <?
                            }
                        }
                    }
                ?>
                <div class="col-md-9 col-sm-12">
                    <div class="Mod1">
                        <div class="gallery">
                            <section class="rev_slider_wrapper">
                                <div id="slider2" class="rev_slider" data-version="5.0">
                                    <ul>
                                       
                                                <?
                                                    if ($actividad[0]['imagenes'] != 0) {
                                                        for ($i=0; $i < count($actividad[0]['imagenes']); $i++) { 
                                                ?>
                                                             <li data-transition="fade" data-slotamount="<?= $i ?>" data-masterspeed="1000" class="waves-effect">
                                                                <div class="slotholder">
                                                                    <div class="defaultimg" src="<?= base_url() ?>uploads/actividades/<?= $actividad[0]['id_galeria'] ?>/b<?= $actividad[0]['imagenes'][$i]['archivo'] ?>"></div>
                                                                </div>
                                                            </li>
                                                <?
                                                        }
                                                    }
                                                ?>
                                    </ul>
                                </div>
                            </section>
                        </div>
                        <div class="row">
                            <div class="col-sm-9">
                                <article>
                                    <div id="calificacion_actividad">
                                        <?
                                            for ($i=1; $i <= 5 ; $i++) { 
                                        ?>
                                                 <i class="fa fa-star calificacion-estrella <? echo ($i <= $rating) ? 'check-estrella' : '' ?>"></i>
                                        <?
                                            }
                                        ?>
                                    </div>
                                   
                                    <h1><?= $actividad[0]['titulo_actividades'] ?></h1>

                                    <?= $actividad[0]['descripcion_actividades'] ?>
                                 

                                </article>
                            </div>
                            <div class="col-sm-3">
                                <div class="price">
                                    <?= $this->lang->line('activity_price'); ?>
                                    <?
                                        if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
                                    ?>
                                                <span class="p1">$<?= number_format($actividad[0]['precio_actividades_cop'], 0, ',', '.') ?> COP</span>
                                    <?
                                        }
                                        else{
                                    ?>
                                                <span class="p1">$<?= number_format($actividad[0]['precio_actividades_usd'], 2, '.', ',') ?> USD</span>
                                    <?
                                        }
                                    ?>
                                </div>    
                                 
                                <div class="area-btn">
                                   
                                    <a onclick="agregarActividad(<?= $actividad[0]['id_actividad'] ?>, '1', '<?= $actividad[0]['titulo_actividades'] ?>', '$<?= number_format($actividad[0]['precio_actividades_cop'], 0, ',', '.') ?>');" class="btn btn-danger btn-lg waves-effect waves-light"><i class="mdi mdi-basket"></i><?= $this->lang->line('activity_button_buy'); ?></a>
                            
                                       
                                </div>
                                  

                            </div>
                        </div>
                    </div>

                    <div class="Mod2">
                        <div class="listOption">
                            <?
                                if ($paquetes != 0) {
                                    $i = 1;
                                    foreach ($paquetes as $paquete) {
                            ?>
                                        <!-- Se cambio la lista de opciones por la lista de actividades-->


                                        <!--  
                                        Estiven Amaya
                                        Dejar ver 150 caracteres de la descripcion y al presionar el boton leer mas  dejar ver el resto de la descripcion
                                         -->
                                        <div class="item">
                                            <div class="left-bg"></div>
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <div class="info">

                                                      <h4><strong> Actividad <?= $i ?>: </strong> <?= $paquete['titulo_planes_actividad'] ?></h4>
                                                        
                                                     <? $descripcion = $paquete['descripcion_planes_actividad']; ?>

                                                          
  

                                                                <a class="btn btn-outline-primary" data-toggle="collapse" href="#collapseExample<?= $i ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                VER DETALLES
                                                                </a> <br> <br>


                                                            <div class="collapse" id="collapseExample<?= $i ?>">
                                                              <div class="card card-body">
                                                                <?= $descripcion ?>
                                                              </div>
                                                            </div>
                                                               

                                                        <?
                                                            if (!empty($paquete['duracion_planes_actividad'])) {
                                                        ?>
                                                                <p><strong><?= $this->lang->line('activity_duration'); ?>: </strong><?= $paquete['duracion_planes_actividad'] ?></p>
                                                        <?
                                                            }
                                                        ?>
                                                        
                                                       

                                                        <!--
                                                        <?
                                                            if (!empty($paquete['destino_planes_actividad'])) {
                                                        ?>
                                                                <p><strong><?= $this->lang->line('activity_fates'); ?>: </strong>
                                                                <?
                                                                    $destinos = explode(',', $paquete['destino_planes_actividad']);
                                                                    for ($j=0; $j < count($destinos); $j++) { 
                                                        ?>
                                                                        <span class="label label-warning"><?= $destinos[$j] ?></span>
                                                        <?
                                                                    }
                                                                ?>
                                                                </p>
                                                        <?
                                                            }
                                                        ?> -->
                                                    </div>
                                                </div>

                                                <!--
                                                @autor Estiven Amaya
                                                Codigo donde aparece el boton agregar actividad al carrito solamente si el precio es diferente de cero
                                                 -->
                                                <div class="col-sm-3">
                                                    <div class="price">

                                                      <? if ($paquete['precioa_planes_actividad_cop']!=0) {
                                                         
                                                        ?>  
                                                        <strong><?= $this->lang->line('activity_price'); ?></strong>

                     
                                                        <?
                                                            if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
                                                        ?>
                                                                    <span class="p1">$<?= number_format($paquete['precioa_planes_actividad_cop'], 0, ',', '.') ?> COP</span>
                                                        <?
                                                            }
                                                            else{
                                                        ?>
                                                                    <span class="p1">$<?= number_format($paquete['precioa_planes_actividad_usd'], 2, '.', ',') ?> USD</span>
                                                        <?
                                                            }
                                                        ?>

                                                        <? } ?>


                                                        <?
                                                          if ($paquete['precioa_planes_actividad_cop']!=0){
                                                        ?>
                      
                                                        <a onclick="agregarPaquete(<?= $paquete['id_paquete'] ?>, <?= $paquete['id_actividad'] ?>, '<?= $paquete['titulo_planes_actividad'] ?>', '$<?= number_format($paquete['precioa_planes_actividad_cop'], 0, ',', '.') ?>');" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-basket"></i> <?= $this->lang->line('activity_add'); ?></a>
                                                      
                                                       <?
                                                         }
                                                          else{
                                                        ?> 
                                                            <a onclick="Hola">  </a>

                                                        <?
                                                            }
                                                        ?>   

                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end item Opt-->
                            <?
                                        $i++;
                                    }
                                }
                            ?>
                            
                        </div>
                    </div>

                    <div class="Mod3">
                        <!-- TAB NAVIGATION -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#tab1" role="tab" data-toggle="tab"><?= $this->lang->line('activity_important'); ?></a></li>
                          
                           <!-- Se quito la opcion de ruta en la vista del paquete --> 
                           <!--<li><a href="#tab2" role="tab" data-toggle="tab"><?= $this->lang->line('activity_routes'); ?></a></li> -->
                        </ul>
                        <!-- TAB CONTENT -->
                        <div class="tab-content">
                            <div class="active tab-pane fade in" id="tab1">
                                <?= $actividad[0]['importante_actividades'] ?>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <?= $actividad[0]['ruta_actividades'] ?>
                            </div> 
                        </div>
                    </div>

                    <?
                        if (isset($this->session->userdata('userdata')['id_usuario'])) {
                    ?>
                            <div style="padding: 10px; text-align: right;" class="Mod4">
                                <p style="text-align: left;"><?= $this->lang->line('activity_comment_text'); ?></p>
                                <input type="hidden" id="calificacion-comentario" name="" value="5">
                                <textarea id="contenido-comentario" rows="4" class="comentario-area"></textarea>
                                 <div id="response-error"></div>
                                <div class="row">
                                    <div class="col-md-8" style="text-align: left;">
                                        <?
                                            for ($i=1; $i <= 5; $i++) { 
                                        ?>
                                                <i onclick="calificar(<?= $i ?>);" id="calificacion-estrella-<?= $i ?>" class="fa fa-star calificacion-estrella check-estrella"></i>
                                        <?
                                            }
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <div onclick="agregarComentario(<?= $actividad[0]['id_actividad'] ?>);" style="margin: 10px 0" class="btn btn-success btn-md waves-effect"><i style="margin-right: 5px;" class="fa fa-save"></i><?= $this->lang->line('activity_comment_button'); ?></div>
                                    </div>
                                </div>
                                
                            </div>
                    <?
                        }
                    ?>

                    <div class="Mod4">
                        <div class="head">
                            <h5><?= $this->lang->line('activity_comments_title'); ?></h5>
                        </div>
                        <div class="list-review">
                            <div id="comentarios-actividad">
                        <?
                            if ($comentarios != 0) {
                                foreach ($comentarios as $comentario) {
                                    if (!empty($comentario['imagen_testimonio'])) {
                                       $imagen = base_url()."uploads/testimonios/t".$comentario['imagen_usuarios'];
                                    }
                                    else{
                                        $imagen = base_url()."uploads/testimonios/404.jpg";
                                    }
                        ?>
                                    <!-- Item -->
                                    <div id="comentario-<?= $comentario['id_comentarios_actividad'] ?>" class="media">
                                        <div class="media-left">
                                            <a href="#"> <img alt="64x64" class="media-object img-circle" data-src="" src="<?= $imagen ?>"
                                                              data-holder-rendered="true" style="width: 64px; height: 64px;"> </a>
                                        </div>
                                        <div style="position: relative;" class="media-body">
                                            <span class="date"><?= strtoupper(date('d M Y', strtotime($comentario['fecha_comentario']))) ?></span>
                                            <h4 class="media-heading"><?= ucwords($comentario['nombre_usuarios'].' '.$comentario['apellido_usuarios']) ?></h4>
                                            <p><?= $comentario['contenido_comentario'] ?></p>
                                            <?
                                                for ($i=1; $i <= $comentario['calificacion_comentario'] ; $i++) { 
                                            ?>
                                                    <i class="fa fa-star"></i>
                                            <?
                                                }
                                            ?>
                                            <?
                                                if (isset($this->session->userdata('userdata')['id_usuario']) && $this->session->userdata('userdata')['id_usuario'] == $comentario['id_usuario']) {
                                            ?>
                                                    <i onclick="eliminarComentario(<?= $comentario['id_comentarios_actividad'] ?>, <?= $this->session->userdata('userdata')['id_usuario'] ?>)" class="fa fa-trash-o borrar-comentario"></i>
                                            <?
                                                }
                                            ?>
                                        </div>
                                    </div>
                        <?
                                }
                            }
                            else{
                        ?>
                                <p style="padding: 10px;"><?= $this->lang->line('activity_comments_error'); ?></p>
                        <?
                            }
                        ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="plan-shop-pack">
                        <div class="head">
                            <h3><?= $this->lang->line('cart_aside_title'); ?></h3>
                        </div>
                        <div class="body">
                            <div id="paquete">
                                <ul >
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
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-xs-8">
                                                                <div class="dt1">
                                                                    <span class="tt">ACTIVIDAD x <?= $carro['cantidad'][$i] ?></span>
                                                                    <p><?= $carro['nombre'][$i] ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <?
                                                                    if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
                                                                ?>
                                                                            <div class="price">
                                                                                $<?= number_format($carro['precio_cop'][$i] * $carro['cantidad'][$i], 0, ',', '.') ?> COP
                                                                            </div>
                                                                <?
                                                                    }
                                                                    else{
                                                                ?>
                                                                            <div class="price">
                                                                                $<?= number_format($carro['precio_usd'][$i] * $carro['cantidad'][$i], 2, '.', ',') ?> USD
                                                                            </div>
                                                                <?
                                                                      }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <?
                                                            if (!empty($carro['paquetes'][$i])) {
                                                                for ($j=1; $j <=  count($carro['paquetes'][$i]); $j++) { 
                                                                    if ($carro['paquetes'][$i][$j]['estado'] == 1) {

                                                                        $total = $total + ($carro['paquetes'][$i][$j]['precio_cop'] * $carro['paquetes'][$i][$j]['cantidad']);
                                                                        $total_usd = $total_usd + ($carro['paquetes'][$i][$j]['precio_usd'] * $carro['paquetes'][$i][$j]['cantidad']);
                                                        ?>
                                                                        <ul>
                                                                            <li>
                                                                                <div class="row">
                                                                                    <div class="col-xs-8">
                                                                                        <div class="plus">
                                                                                            <div class="dt2">
                                                                                                <span class="tt">ACTIVIDAD DEL PAQUETE SUGERIDO x <?= $carro['paquetes'][$i][$j]['cantidad'] ?></span>
                                                                                                <p><?= $carro['paquetes'][$i][$j]['titulo_paquete'] ?></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xs-4">
                                                                                        <?
                                                                                            if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
                                                                                        ?>
                                                                                                    <div class="price">
                                                                                                        $<?= number_format($carro['paquetes'][$i][$j]['precio_cop'] * $carro['paquetes'][$i][$j]['cantidad'], 0, ',', '.') ?> COP
                                                                                                    </div>
                                                                                        <?
                                                                                            }
                                                                                            else{
                                                                                        ?>
                                                                                                    <div class="price">
                                                                                                        $<?= number_format($carro['paquetes'][$i][$j]['precio_usd'] * $carro['paquetes'][$i][$j]['cantidad'], 2, '.', ',') ?> USD
                                                                                                    </div>
                                                                                        <?
                                                                                              }
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                        <?
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                    </li>
                                    <?
                                                }
                                            }
                                        }
                                    ?>
                                    <li class="text-right">
                                        <div class="total">
                                            Total 
                                            <?
                                                if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
                                            ?>
                                                        <strong>$<?= number_format($total, 0 ,',', '.') ?> COP</strong>
                                            <?
                                                }
                                                else{
                                            ?>
                                                        <strong>$<?= number_format($total_usd, 2 ,'.', ',') ?> USD</strong>
                                            <?
                                                  }
                                            ?>
                                        </div>
                                        <a href="<?= base_url() ?>main/carrito"><button class="btn btn-success waves-effect waves-light"><?= $this->lang->line('cart_aside_button'); ?></button></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
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