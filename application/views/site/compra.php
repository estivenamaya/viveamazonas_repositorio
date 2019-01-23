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
                <li class="active"><?= $this->lang->line('header_link_finish'); ?></li>
            </ol>
            <h2><?= $this->lang->line('header_link_finish'); ?></h2>
        </div>
    </div>
</section>


<section id="Main">
    <div class="container-fluid">
        <div class="area-content auto_margin">
            <div class="contents">
                <article>
                	<?= $this->lang->line('cart_finish'); ?>
                    <?
                        switch ($payment_m) {
                            case 'pagosonline':
                                ?>
                                <div style="display: block;" class="background-popup">
                                    <div class="loading-bar">
                                        <img style="width: 100px;" src="<?= base_url() ?>resources/site/images/loading2.gif">
                                        <p>Redireccionando a la pasarela de pagos, por favor espere un momento...</p>
                                    </div>
                                    
                                 </div>
                                <?= $form_payu ?>
                                <h3>Datos para realizar el pago a travez de Transferencia bancaria</h3>
                                <p>Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Sed porttitor lectus nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                <?
                                break;

                            case 'paypal':
                                ?>

                                <h3>Consignacion bancaria</h3>
                                <p>Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Sed porttitor lectus nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                <?
                                break;
                                break;

                            case 'giro':
                            ?>
                            <h3>Datos para realizar el pago a travez de Giro</h3>
                            <p>Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Sed porttitor lectus nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                            <?
                                break;
                            
                            default:
                                ?>
                                <p>Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Sed porttitor lectus nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                <?
                                break;
                                break;
                        }
                    ?>
                </article>
            </div>
        </div>
    </div>
</section>

<div class="height_20"></div>

<img src="<?= base_url() ?>resources/site/images/round-f.png" class="center-block" alt="">
<? $this->load->view('site/includes/footer') ?>

</body>
</html>

<style type="text/css">
    .abs-post-inner{
        z-index: 0;
    }

    footer, .center-block{
        opacity: 0;
    }
</style>

<script type="text/javascript">
    $( document ).ready(function() {
        setTimeout(function(){
            //$('#formulario_pago').submit();
        }, 2000);
    }); 
</script>