<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Nikollai Hernandez
 * Date: 23/05/2016
 * Time: 04:48 PM
 */
?>
<?
    ?>
<div class="top_nav">
    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?= 'Hola, '.$_SESSION['data_user']['nombre'] ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="<?= base_url().'usuario/editar/'.$_SESSION['data_user']['id_usuario'] ?>">Perfil</a></li>
                        <li><a href="<?= base_url().'usuario/salir' ?>">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
