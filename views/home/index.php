<?php if (!defined('ABSPATH')) exit; ?>

<header id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li> 
    </ol> 
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image:url('<?= HOME_URL; ?>views/_arquivos/images/banner.jpg');"></div>                     
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('<?= HOME_URL; ?>views/_arquivos/images/banner.jpg');"></div>                    
        </div>                
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header> 
<div class="container"> 
    <div class="row"> 
        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 text-center tipo-evento">
            <img src="<?= HOME_URL; ?>views/_arquivos/images/bg-casamentos.png" width="250" />
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12  text-center tipo-evento">
            <img src="<?= HOME_URL; ?>views/_arquivos/images/bg-15anos.png" width="250" />
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 text-center tipo-evento">
            <img src="<?= HOME_URL; ?>views/_arquivos/images/bg-eventos.png" width="250" />
        </div>
    </div> 
</div> 
