
<html>
<?= $this->load->view('site/includes/tags') ?>


<body>

<? $this->load->view('site/includes/header') ?>

<!-- Slide -->
<section class="rev_slider_wrapper" style="background: #f8f8f8; position: absolute;top: 0; z-index: 0;">
    <div id="slider1" class="rev_slider" data-version="5.0">
        <ul>
            <? 
              if ($slides != 0) {
                  foreach ($slides as $slide) {
            ?>
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000">
                        <div class="slotholder">
                            <div class="defaultimg" src="<?= base_url() ?>uploads/slides/<?= $slide['imagen'] ?>" style="background-position: -75px;"></div>
                        </div>
                    </li>
            <?
                  }
              }
            ?>
        </ul>
    </div>
</section>
<div class="roundtop"></div>



<section id="Planes">
<div class="container-fluid">

    <div class="home-list-packs auto_margin">
        <div class="head">
            <h1 style="color:#1E90FF";>EL AMAZONAS TE ESTÁ ESPERANDO</h1></center> 
            <h3 style="color:#4B0082" > Disfruta de nuestros planes turísticos Y vive una experiencia maravillosa </h3></center>

         <span class="hr"></span>

        </div>
        <H3 font-family= 'fantasy'> LO MAS NUEVO </H3>
       <div class="body">

            <div class="list-packs">
               <div class="row">

                    <div id="grid_ms">
                        <?
                            $width = 4;

                            // @Estiven Amaya
                            //La condicion que pregunta si el estado seleccionado es igual ah 2 'destacado'
                            

                            
                            $j = 1;
                            for ($i=0; $i < count($actividades); $i++) { 
                                if ($i < 6) {

                                    $j = $i + 1;
                                    $clase_like = '';
                                    if (isset($actividades[$i])) {
                                        if ($likes != 0) {
                                            if ($actividades['estados_actividades']==2) {
                                        
                                            foreach ($likes as $like) {
                                                if ($actividades[$i]['id_actividad'] == $like['id_articulo'] && $like['tipo_like'] == 'Actividad') {
                                                    $clase_like = 'like';
                                                }
                                            }
                                        }
                                        }
                            ?> 
                                        <!-- item -->

                                       <div class="grid-item col-md-<?= $width ?> col-sm-6">
                                            <div class="item">
                                                <?
                                                    if (isset($actividades[$i]['imagenes'][0]['archivo']) && !empty($actividades[$i]['imagenes'][0]['archivo'])) {
                                                        $imagen =  base_url().'uploads/actividades/'.$actividades[$i]['id_galeria'].'/g'.$actividades[$i]['imagenes'][0]['archivo'];
                                                    }
                                                    else{
                                                        $imagen = $imagen =  base_url().'uploads/actividades/404_actividades.jpg';
                                                    }
                                                ?>
                                                <figure><img src="<?= $imagen ?>" class="img-responsive" alt=""></figure>
                                                <div class="mask1"> </div>
                                                <article>
                                                    <h2><?= $actividades[$i]['titulo_actividades'] ?></h2>
                                                    <span class="hr"></span>
                                                    <div class="opt">
                                                        <?
                                                            if (isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) {
                                                        ?>
                                                                    <span class="price">$<?= number_format($actividades[$i]['precio_actividades_cop'], 0, ',', '.') ?> COP</span>
                                                        <?
                                                            }
                                                            else{
                                                        ?>
                                                                    <span class="price">$<?= number_format($actividades[$i]['precio_actividades_usd'], 2, ',', '.') ?> USD</span>
                                                        <?
                                                            }
                                                        ?>
                                                         <span class="more waves-effect"><a href="<?= base_url() ?>actividad/ver/<?= $actividades[$i]['id_actividad'].'/'.stringtourl($actividades[$i]['titulo_actividades']) ?>"><?= $this-> title='MAS DETALLES' ?></a></span>
                                                        <?
                                                            if (isset($this->session->userdata('userdata')['id_usuario'])) {
                                                        ?>
                                                                <i id="like-actividad-<?= $actividades[$i]['id_actividad'] ?>"  onclick="establecerLike(<?= $actividades[$i]['id_actividad'] ?>, 'Actividad');" class="mdi mdi-heart like-actividad <?= $clase_like ?>"></i>
                                                        <?
                                                            }
                                                        ?>
                                                    </div>
                                                </article>
                                                <a href="<?= base_url() ?>actividad/ver/<?= $actividades[$i]['id_actividad'].'/'.stringtourl($actividades[$i]['titulo_actividades']) ?>">
                                                    <div class="caption">
                                                        <div class="spc">
                                                            <p><?= substr($actividades[$i]['descripcion_actividades'], 0, 250)  ?>...</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                    
                                        <!-- end Item-->


                            <? 
                                    }
                                    if ($j %= 2) {
                                        if ($width == 4) {
                                            $width = 8;
                                        }else{
                                            $width = 4;
                                        }
                                    }
                                }
                            }
                     ?>
                 
                   </div>
                </div>
            </div>
       </div> 
    </div>
</div>
</section>


<!--
    @autor Estiven Amaya
    Codigo para vincular video sobre Amazonas en Colombia
-->

<span class='hr'> </span>
<span class="height_40"></span>

<section id="Parallax">
    <div class="parallax-container">
        <img src="<?= base_url() ?>resources/site/images/esq-top.png" class="center-block" alt="">
        <div class="parallax"><img src="<?= base_url() ?>resources/site/images/parallax.jpg"></div>
        <div class="contenidos auto_margin">
               <div>
                    <h2> Conoce un poco sobre este hermoso lugar </h2>
                <center>
                    <iframe width="700" height="320" src="https://www.youtube.com/embed/r9Nz7n0_zI4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </center>
                </div>



            <span class="height_20"></span>
            <div class="container-fluid">
                <div class="newsletter">
                    <form action="" method="POST" role="form" class="row">
                        <p style="text-align: left;" id="respues-suscripcion"></p>
                    </form>
                </div>
            </div>
        </div>
        <img src="<?= base_url() ?>resources/site/images/esq-bott.png" class="center-block" alt="">
    </div>
</section>

<section>
    <div class="testimonios auto_margin">
        <div class="head">
            <h2><?= $this->lang->line('index_testimony_title'); ?></h2>
            <p><?= $this->lang->line('index_testimony_subtitle'); ?></p>
        </div>

        <div class="owl-testimonios">
            <?
                if ($testimonios != 0) {
                    foreach ($testimonios as $testimonio) {
                        if (!empty($testimonio['imagen_testimonio'])) {
                           $imagen = base_url()."uploads/testimonios/".$testimonio['imagen_testimonio'];
                        }
                        else{
                            $imagen = base_url()."uploads/testimonios/404.jpg";
                        }
            ?>
                        <!-- item -->
                        <div class="item">
                            <figure class="img-circle"><img src="<?= $imagen ?>" class="img-circle img-responsive" alt="-<?= $testimonio['nombre_testimonio'] ?>-"></figure>
                            <span class="name">- <?= $testimonio['nombre_testimonio'] ?> -</span>
                            <p><?= $testimonio['texto_testimonio'] ?></p>
                        </div>
                        <!-- end item -->
            <?
                    }
                }
            ?>
        </div>
    </div>
</section>

<img src="<?= base_url() ?>resources/site/images/round-f.png" class="center-block" alt="">

<? $this->load->view('site/includes/footer') ?>

</body>
</html>