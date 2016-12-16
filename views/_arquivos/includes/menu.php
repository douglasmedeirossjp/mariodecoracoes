<?php if (!defined('ABSPATH')) exit; 
require_once ABSPATH_REPOSITORIO . '/dao/InformacaoDAO.php';
$dao = new InformacaoDAO();
$informacao = $dao->BuscarInformacao();
?>
<div class="container topo">
    <div class="row"> 
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
            <a href="<?= HOME_URL; ?>"><img src="<?= HOME_URL; ?>views/_arquivos/images/logo.png"   style="max-width: 280px; " /></a>
        </div> 
        <div class="col-lg-6 col-md-6 col-sm-6">
            <ul class="nav nav-justified menu-horizontal">
                <li><a href="<?= HOME_URL; ?>">INÍCIO</a></li>
                <li><a href="<?= HOME_URL; ?>empresa">EMPRESA</a></li>
                <li><a href="<?= HOME_URL; ?>servicos">SERVIÇOS</a></li>
                <li><a href="<?= HOME_URL; ?>galeria">GALERIA</a></li>
                <li><a href="<?= HOME_URL; ?>contato">CONTATO</a></li>
            </ul>
        </div> 
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 info-topo">
            <div class="col-lg-6 col-md-6 col-sm-3 col-xs-6 text-center" >
                <a href="<?=$informacao->instagram;?>" target="_blank"><img src="<?= HOME_URL; ?>views/_arquivos/images/insta.png" width="70" /></a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-3 col-xs-6 text-center">
                <a href="<?=$informacao->facebook;?>" target="_blank"><img src="<?= HOME_URL; ?>views/_arquivos/images/face.png" width="70" /></a>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 text-center">
                <?= $informacao->ddd; ?> <span class="telefone"> <?= $informacao->telefone; ?>  </span>
            </div>
        </div> 
    </div>
</div> 