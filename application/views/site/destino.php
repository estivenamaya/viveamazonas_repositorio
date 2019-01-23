<?= $this->load->view('site/includes/tags') ?>
<body>

<?= $this->load->view('site/includes/header') ?>
<style type="text/css">
    #map-marker{
        position: absolute;
        left: 0;
        right: 0;
        top: 40%;
        margin: 0 auto;
    }
</style>
<section id="Breadcrumb">
    <div class="container-fluid">
        <div class="area-breacrumbs auto_margin">
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url() ?>">Inicio</a>
                </li>
                <li class="active"><?= $destino[0]['nombre_destino'] ?></li>
            </ol>
            <h2>Destino: <?= $destino[0]['nombre_destino'] ?></h2>
        </div>
    </div>
</section>

<section id="Main">
    <div class="container-fluid">
        <div class="area-detalle-plan auto_margin">
            <div class="row">
                <div class="col-md-9 col-sm-12">

                    <div class="Mod1">
                        <div class="gallery">
                            <section class="rev_slider_wrapper">
                                <div id="slider2" class="rev_slider" data-version="5.0">
                                    <ul>
                                       
                                                <?
                                                    if ($destino[0]['imagenes'] != 0) {
                                                        for ($i=0; $i < count($destino[0]['imagenes']); $i++) { 
                                                ?>
                                                             <li data-transition="fade" data-slotamount="<?= $i ?>" data-masterspeed="1000" class="waves-effect">
                                                                <div class="slotholder">
                                                                    <div class="defaultimg" src="<?= base_url() ?>uploads/destinos/<?= $destino[0]['id_galeria'] ?>/b<?= $destino[0]['imagenes'][$i]['archivo'] ?>"></div>
                                                                </div>
                                                            </li>
                                                <?
                                                        }
                                                    }else{
                                                ?>
                                                		<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" class="waves-effect">
                                                            <div class="slotholder">
                                                                <div class="defaultimg" src="<?= base_url() ?>uploads/destinos/404.jpg"></div>
                                                            </div>
                                                        </li>
                                                <?
                                                    }
                                                ?>
                                    </ul>
                                </div>
                            </section>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <article>
                                    <img src="<?= base_url() ?>resources/site/images/rating.png" alt="">
                                    <h1><?= $destino[0]['nombre_destino'] ?></h1>
                                    <?= $destino[0]['descripcion_destino'] ?>
                                </article>
                            </div>
                        </div>
                    </div>

                    

                    <div class="Mod3">
                        <!-- TAB NAVIGATION -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Ubicacion</a></li>
                        </ul>
                        <!-- TAB CONTENT -->
                        <div class="tab-content">
                            <div class="active tab-pane fade in" id="tab1">
                                <div id="map" style="width: 100%; position: relative;">
                                    <img id="map-marker" src="<?= base_url() ?>resources/site/images/4.png">
                                	<img style="width: 100%;" class="map-image" src="https://api.mapbox.com/styles/v1/mapbox/streets-v8/static/<?= $destino[0]['longitud_destino'] ?>,<?= $destino[0]['latitud_destino'] ?>,13,0,60/817x306?access_token=pk.eyJ1IjoieWFuY2FybG9zbWFyaW5vc29yaW8iLCJhIjoiY2lmb2hyNHd2aGM0NXJzbTc3cXdiYmlkayJ9.7g2es3a3dfvCTpLcBc_wew">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="Mod4">
                        <div class="head">
                            <h5>Comentarios de usuarios que realizaron esta destino</h5>
                        </div>
                        <div class="list-review">

                            <!-- Item 
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"> <img alt="64x64" class="media-object img-circle" data-src="holder.js/64x64" src="<?= base_url() ?>resources/site/images/t1.png"
                                                      data-holder-rendered="true" style="width: 64px; height: 64px;"> </a>
                                </div>
                                <div class="media-body">
                                    <span class="date">18 SEP 2016</span>
                                    <h4 class="media-heading">Claudio Gaston Rubiolo</h4>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio,
                                        vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                                        felis in faucibus.</p>
                                </div>
                            </div>

                            <!-- Item 
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"> <img alt="64x64" class="media-object img-circle" data-src="holder.js/64x64" src="<?= base_url() ?>resources/site/images/t2.png"
                                                      data-holder-rendered="true" style="width: 64px; height: 64px;"> </a>
                                </div>
                                <div class="media-body">
                                    <span class="date">18 SEP 2016</span>
                                    <h4 class="media-heading">Claudio Gaston Rubiolo</h4>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio,
                                        vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                                        felis in faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>

                 <div class="col-md-3 col-sm-4">
                    <div class="plan-shop-pack">
                        <div class="head">
                            <h3>Mi Paquete</h3>
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
                                                                                $<?= number_format($carro['precio_usd'][$i] * $carro['cantidad'][$i], 2, ',', '.') ?> USD
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
                                                                                                <span class="tt">+ PAQUETE x <?= $carro['paquetes'][$i][$j]['cantidad'] ?></span>
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
                                                                                                        $<?= number_format($carro['paquetes'][$i][$j]['precio_usd'] * $carro['paquetes'][$i][$j]['cantidad'], 2, ',', '.') ?> USD
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
                                                        <strong>$<?= number_format($total_usd, 2 ,',', '.') ?> USD</strong>
                                            <?
                                                  }
                                            ?>
                                        </div>
                                        <a href="<?= base_url() ?>main/carrito"><button class="btn btn-success waves-effect waves-light">Finalizar Compra</button></a>
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