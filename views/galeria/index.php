<?php if (!defined('ABSPATH')) exit; ?>

<link href="<?= URL_PAINEL ?>views/_arquivos/assets/css/icons.css" rel="stylesheet" /> 
<link href="<?= URL_PAINEL ?>views/_arquivos/assets/css/plugins.css" rel="stylesheet" /> 

<div class="container"> 
    <div class="row">         
        <h3 class="page-header">Galeria</h3> 
    </div> 
    <div class="row conteudo">         
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="gallery">
                    <div class="gallery-toolbar">
                        <div class="col-lg-12"> 

                            <?php foreach ($this->ViewBag->categorias as $value) { ?>
                                <a href="<?= HOME_URL ?>galeria/<?= $value->url_amigavel ?>/" class="btn btn-default"><?= $value->titulo ?></a> 
                            <?php } ?>
                            <!--                            
                            <button class="filter btn btn-primary btn-alt mr5" data-filter=".casamentos">Casamentos</button>
                            <button class="filter btn btn-primary btn-alt mr5" data-filter=".aniversarios">Aniversários</button>       
                            -->
                        </div>
                    </div>
                    <div class="gallery-inner">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix casamentos" data-my-order="1">
                            <a href="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" class="gallery-image-open thumbnail">
                                <img src="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" alt="image">
                            </a>                           
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix casamentos" data-my-order="1">
                            <a href="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" class="gallery-image-open thumbnail">
                                <img src="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" alt="image">
                            </a>                           
                        </div> <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix casamentos" data-my-order="1">
                            <a href="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" class="gallery-image-open thumbnail">
                                <img src="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" alt="image">
                            </a>                           
                        </div> <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix casamentos" data-my-order="1">
                            <a href="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" class="gallery-image-open thumbnail">
                                <img src="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" alt="image">
                            </a>                           
                        </div>    

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix aniversarios" data-my-order="1">
                            <a href="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" class="gallery-image-open thumbnail">
                                <img src="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" alt="image">
                            </a>                           
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix aniversarios" data-my-order="1">
                            <a href="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" class="gallery-image-open thumbnail">
                                <img src="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" alt="image">
                            </a>                           
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix aniversarios" data-my-order="1">
                            <a href="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" class="gallery-image-open thumbnail">
                                <img src="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" alt="image">
                            </a>                           
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix aniversarios" data-my-order="1">
                            <a href="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" class="gallery-image-open thumbnail">
                                <img src="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" alt="image">
                            </a>                           
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix aniversarios" data-my-order="1">
                            <a href="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" class="gallery-image-open thumbnail">
                                <img src="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" alt="image">
                            </a>                           
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix aniversarios" data-my-order="1">
                            <a href="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" class="gallery-image-open thumbnail">
                                <img src="<?= URL_PAINEL ?>views/_arquivos/assets/img/gallery/1.jpg" alt="image">
                            </a>                           
                        </div>


                    </div>
                </div> 
            </div> 
        </div>
    </div> 
</div> 

<script src="<?= URL_PAINEL ?>views/_arquivos/assets/plugins/core/pace/pace.min.js"></script>
<!-- Important javascript libs(put in all pages) -->
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
    window.jQuery || document.write('<script src="<?= URL_PAINEL ?>views/_arquivos/assets/js/libs/jquery-2.1.1.min.js">\x3C/script>')
</script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
    window.jQuery || document.write('<script src="<?= URL_PAINEL ?>views/_arquivos/assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')
</script>
<!--[if lt IE 9]>
<script type="text/javascript" src="<?= URL_PAINEL ?>views/_arquivos/assets/js/libs/excanvas.min.js"></script>
<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="<?= URL_PAINEL ?>views/_arquivos/assets/js/libs/respond.min.js"></script>
<![endif]-->
<!-- Bootstrap plugins -->
<script src="<?= URL_PAINEL ?>views/_arquivos/assets/js/bootstrap/bootstrap.js"></script> 
<script src="<?= URL_PAINEL ?>views/_arquivos/assets/js/jRespond.min.js"></script> 
<script src="<?= URL_PAINEL ?>views/_arquivos/assets/plugins/core/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= URL_PAINEL ?>views/_arquivos/assets/plugins/core/slimscroll/jquery.slimscroll.horizontal.min.js"></script> 
<script src="<?= URL_PAINEL ?>views/_arquivos/assets/plugins/forms/icheck/jquery.icheck.js"></script>
<script src="<?= URL_PAINEL ?>views/_arquivos/assets/plugins/forms/tags/jquery.tagsinput.min.js"></script>
<script src="<?= URL_PAINEL ?>views/_arquivos/assets/plugins/forms/tinymce/tinymce.min.js"></script>
<script src="<?= URL_PAINEL ?>views/_arquivos/assets/plugins/misc/highlight/highlight.pack.js"></script>
<script src="<?= URL_PAINEL ?>views/_arquivos/assets/plugins/misc/countTo/jquery.countTo.js"></script>
<script src="<?= URL_PAINEL ?>views/_arquivos/assets/plugins/misc/gallery/jquery.magnific-popup.min.js"></script>
<script src="<?= URL_PAINEL ?>views/_arquivos/assets/plugins/misc/mixitup/jquery.mixitup.min.js"></script>
<script src="<?= URL_PAINEL ?>views/_arquivos/assets/js/jquery.sprFlat.js"></script>
<script src="<?= URL_PAINEL ?>views/_arquivos/assets/js/app.js"></script>
<script src="<?= URL_PAINEL ?>views/_arquivos/assets/js/pages/gallery.js"></script>