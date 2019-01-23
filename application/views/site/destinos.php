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
                <li class="active"><?= $this->lang->line('header_link_fates'); ?></li>
            </ol>
            <h2><?= $this->lang->line('header_link_fates'); ?></h2>
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
                              for ($i=0; $i < count($destinos); $i++) { 
                                  $clase_like = '';
                                  if (isset($destinos[$i])) {
                                    if ($likes != 0) {
                                        foreach ($likes as $like) {
                                            if ($destinos[$i]['id_destino'] == $like['id_articulo'] && $like['tipo_like'] == 'Destino') {
                                                $clase_like = 'like';
                                            }
                                        }
                                    }
                          ?>
                                      <!-- item -->
                                      <div class="grid-item col-md-4 col-sm-6 col-xs-12">
                                          <div class="item">
                                              <?
                                                  if (isset($destinos[$i]['imagenes'][0]['archivo']) && !empty($destinos[$i]['imagenes'][0]['archivo'])) {
                                                      $imagen =  base_url().'uploads/destinos/'.$destinos[$i]['id_galeria'].'/g'.$destinos[$i]['imagenes'][rand(0, (count($destinos[$i]['imagenes'])) - 1)]['archivo'];
                                                  }
                                                  else{
                                                      $imagen = $imagen =  base_url().'uploads/destinos/404.jpg';
                                                  }
                                              ?>
                                              <figure><img src="<?= $imagen ?>" class="img-responsive" alt=""></figure>
                                              <div class="mask1"> </div>
                                              <article>
                                                  <h2><?= $destinos[$i]['nombre_destino'] ?></h2>
                                                  <span class="hr"></span>
                                                  <div class="opt">
                                                      <span class="more waves-effect"><a href="<?= base_url() ?>destino/ver/<?= $destinos[$i]['id_destino'].'/'.stringtourl($destinos[$i]['nombre_destino']) ?>"><?= $this->lang->line('button_information_fates'); ?></a></span>

                                                      <?
                                                          if (isset($this->session->userdata('userdata')['id_usuario'])) {
                                                      ?>
                                                            <i id="like-actividad-<?= $destinos[$i]['id_destino'] ?>"  onclick="establecerLike(<?= $destinos[$i]['id_destino'] ?>, 'Destino');" class="mdi mdi-heart like-actividad <?= $clase_like ?>"></i>
                                                      <?
                                                          }
                                                      ?>
                                                  </div>
                                              </article>
                                              <a href="<?= base_url() ?>destino/ver/<?= $destinos[$i]['id_destino'].'/'.stringtourl($destinos[$i]['nombre_destino']) ?>">
                                                <div class="caption">
                                                    <div class="spc">
                                                        <p><?= substr($destinos[$i]['descripcion_destino'], 0, 250)  ?>...</p>
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