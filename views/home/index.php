<?php
if (!defined('ABSPATH'))
    exit;
require_once ABSPATH_REPOSITORIO . '/dao/InformacaoDAO.php';
$dao = new InformacaoDAO();
$informacao = $dao->BuscarInformacao();
?> 
 
<div class="container"> 
    <div class="row">         
        <h3 class="page-header text-center">Novo site em desenvolvimento.</h3> 
    </div> 
    <div class="row conteudo">    
        <p class="text-center"> Entre em contato conosco através das informações abaixo: </p>
         
        <div class="col-lg-12 col-md-12"> 
            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 endereco-contato">

                <img src="<?= HOME_URL; ?>views/_arquivos/images/icone-endereco.png" width="35" align="left" />
                <?= $informacao->endereco; ?>, <?= $informacao->numero; ?> <br />
                <?= $informacao->bairro; ?> - <?= $informacao->cidade; ?> - <?= $informacao->estado; ?>   

            </div>
            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 horario-contato">

                <img src="<?= HOME_URL; ?>views/_arquivos/images/icone-horario.png" width="35" align="left" />

                HORÁRIO DE ATENDIMENTO: <br />
                <?= $informacao->horario_atendimento; ?> 

            </div>
            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 telefone-contato">
                
                <img src="<?= HOME_URL; ?>views/_arquivos/images/icone-contato.png" width="35" align="left" />

                <?= $informacao->ddd; ?> <b><?= $informacao->telefone; ?></b><br />                 
                <?= $informacao->email; ?>

            </div>   
        </div>
    </div>
</div> 
<div class="maps">
    <?= $informacao->googlemaps; ?>
</div>
