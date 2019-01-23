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
                <li class="active"><?= $this->lang->line('header_link_activities'); ?></li>
            </ol>
            <h2><?= $this->lang->line('header_link_activities'); ?></h2>
        </div>
    </div>
</section>


<section id="Main">
    <div class="container-fluid">
        <div class="area-content auto_margin">
            <div class="contents">
                <div class="list-packs">
                  <div class="row">
                      <div id="grid_ms">
                          <?
                              for ($i=0; $i < count($actividades); $i++) { 
                                  $clase_like = '';
                                  if (isset($actividades[$i])) {
                                    if ($likes != 0) {
                                        foreach ($likes as $like) {
                                            if ($actividades[$i]['id_actividad'] == $like['id_articulo'] && $like['tipo_like'] == 'Actividad') {
                                                $clase_like = 'like';
                                            }
                                        }
                                    }
                          ?>
                                      <!-- item -->
                                      <div class="grid-item col-md-4 col-sm-6 col-xs-12">
                                          <div class="item">
                                              <?
                                                  if (isset($actividades[$i]['imagenes'][0]['archivo']) && !empty($actividades[$i]['imagenes'][0]['archivo'])) {
                                                      $imagen =  base_url().'uploads/actividades/'.$actividades[$i]['id_galeria'].'/g'.$actividades[$i]['imagenes'][rand(0, (count($actividades[$i]['imagenes'])) - 1)]['archivo'];
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
                                                       <span class="more waves-effect"><a href="<?= base_url() ?>actividad/ver/<?= $actividades[$i]['id_actividad'].'/'.stringtourl($actividades[$i]['titulo_actividades']) ?>"><?= $this-> title='MAS DETALLES'; ?></a></span>
                                                      
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
                              }
                          ?>
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