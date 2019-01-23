<?php
/**
 * Created by PhpStorm.
 * User: Nikollai Hernandez
 * Date: 23/05/2016
 * Time: 03:37 PM
 */
?>
<div class="navbar nav_title" style="border: 0; text-align: center;">
  <a href="" class="site_title"> <span>Vive Amazonas</span></a>
</div>

<div class="clearfix"></div>

<!-- menu profile quick info -->
<div class="profile">
  <div class="profile_pic">
    <img src="" alt="..." class="img-circle profile_img">
  </div>
  <div class="profile_info">
    <span>Welcome,</span>
    <h2>John Doe</h2>
  </div>
</div>
<!-- /menu profile quick info -->

<br />
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3> </h3>
    <br/>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-picture-o" aria-hidden="true"></i> Slides <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?= base_url() ?>slide/lista">Ver</a></li>
        </ul>
      </li>

      <li><a><i class="fa fa-shopping-cart"></i> Actividades <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?= base_url() ?>actividad/lista">Lista</a></li>
          <li><a href="<?= base_url() ?>actividad/modificar/-1">Añadir nuevo</a></li>
        </ul>
      </li>

      <li><a><i class="fa fa-tags"></i> Ordenes <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?= base_url() ?>pedido/lista">Lista</a></li>
        </ul>
      </li>

      <li><a><i class="fa fa-map-marker"></i> Destinos <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?= base_url() ?>destino/lista">Lista</a></li>
          <li><a href="<?= base_url() ?>destino/modificar/-1">Agregar nuevo</a></li>
        </ul>
      </li>

      <li><a><i class="fa fa-user" aria-hidden="true"></i> Clientes <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?= base_url() ?>cliente/lista">Lista</a></li>
        </ul>
      </li>

      <li><a><i class="fa fa-file-text-o"></i> Contenidos <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?= base_url() ?>contenido/lista">Lista</a></li>
          <li><a href="<?= base_url() ?>contenido/modificarcontenido/-1">Agregar nuevo</a></li>
        </ul>
      </li>

      <li><a><i class="fa fa-bullhorn"></i> Testimonios <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?= base_url() ?>testimonio/lista">Ver</a></li>
        </ul>
      </li>
    </ul>
  </div>

</div>

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Logout">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->