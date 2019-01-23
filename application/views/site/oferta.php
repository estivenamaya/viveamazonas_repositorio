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



</body>

</html>
