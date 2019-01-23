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
                <li class="active"><?= $this->lang->line('header_link_contact'); ?></li>
            </ol>
            <h2><?= $this->lang->line('header_link_contact'); ?></h2>
        </div>
    </div>
</section>


<section id="Main">
    <div class="container-fluid">
        <div class="area-content auto_margin">
            <div class="contents">
                <article>
                    
                    <br>
                    <form action="" method="POST" role="form" class="row">
                        <div class="form-group col-sm-6">
                            <label for=""><?= $this->lang->line('contact_name'); ?></label>
                            <input required="" type="text" class="form-control" name="data[nombre]" id="" placeholder="">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for=""><?= $this->lang->line('contact_email'); ?></label>
                            <input required="" type="email" class="form-control" name="data[email]" id="" placeholder="">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for=""><?= $this->lang->line('contact_message'); ?></label>
                            <textarea name="data[mensaje]" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="col-md-12">
                          <?
                            if (isset($tipo)) {
                          ?>
                              <div id="response-form">
                                <p style="color:#fff; padding:3px 10px;" class="label-<? echo ($tipo == 'error') ? 'warning' : 'success' ?>"><?= $respuesta  ?></p>
                              </div>
                          <?
                            }
                          ?>
                        </div>
                        
                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn-default btn-lg"><?= $this->lang->line('contact_button_send'); ?></button>
                        </div>
                    </form>
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