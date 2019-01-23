<? $this->load->view('site/includes/tags') ?>
<body>

<? $this->load->view('site/includes/header') ?>

<section id="Breadcrumb">
    <div class="container-fluid">
        <div class="area-breacrumbs auto_margin">
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url() ?>">HOME</a>
                </li>
                <li class="active"><?= $contenido[0]['titulo'] ?></li>
            </ol>
            <h2><?= $contenido[0]['titulo'] ?></h2>
        </div>
    </div>
</section>


<section id="Main">
    <div class="container-fluid">
        <div class="area-content auto_margin">
            <div class="contents">
                <article>
                	<?= $contenido[0]['contenido'] ?>
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