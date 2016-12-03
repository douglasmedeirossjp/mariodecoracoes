<?php if (!defined('ABSPATH')) exit; ?>

<header id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
        <?php
        $cont = 0;
        foreach ($this->ViewBag->banners as $key => $value) {
            ?>            
            <li data-target="#myCarousel" data-slide-to="<?= $cont; ?>" <?php
            if ($cont == 0) {
                echo "class='active'";
            }
            ?>></li>
                <?php
                $cont++;
            }
            ?>  
    </ol> 
    <div class="carousel-inner"> 
        <?php
        $cont = 0;
        foreach ($this->ViewBag->banners as $key => $value) {
            ?>
            <div class="item <?php
            if ($cont == 0) {
                echo "active";
            }
            ?>">
                     <?php if ($value->link != "" && $value->link != "#") { ?>
                    <a href="<?= $value->link; ?>">
                        <div class="fill" style="background-image:url('<?= $value->imagem; ?>');" title="<?= $value->titulo; ?>"></div>
                    </a> 
                <?php } else { ?> 
                    <div class="fill" style="background-image:url('<?= $value->imagem; ?>');" title="<?= $value->titulo; ?>"></div>
                <?php } ?> 
            </div>
            <?php
            $cont++;
        }
        ?>                    
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
