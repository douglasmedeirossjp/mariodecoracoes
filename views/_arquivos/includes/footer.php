<?php if (!defined('ABSPATH'))  exit;
require_once ABSPATH_REPOSITORIO . '/dao/InformacaoDAO.php';
$dao = new InformacaoDAO();
$informacao = $dao->BuscarInformacao();
?>

<footer> 
    <div class="container"> 
        <div class="row info-rodape" > 
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 logo-rodape">
                <img src="<?= HOME_URL; ?>views/_arquivos/images/logo-rodape.png"   />
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 endereco-rodape">

                <img src="<?= HOME_URL; ?>views/_arquivos/images/icone-endereco.png" width="35" align="left" />

                <?= $informacao->endereco; ?>, <?= $informacao->numero; ?> <br />
                <?= $informacao->bairro; ?> - <?= $informacao->cidade; ?> - <?= $informacao->estado; ?>   

            </div>
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 horario-rodape">

                <img src="<?= HOME_URL; ?>views/_arquivos/images/icone-horario.png" width="35" align="left" />

                HORÁRIO DE ATENDIMENTO: <br />
                <?= $informacao->horario_atendimento; ?>   

            </div>
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 contato-rodape">

                <img src="<?= HOME_URL; ?>views/_arquivos/images/icone-contato.png" width="35" align="left" />

                <?= $informacao->ddd; ?> <span class="telefone"><?= $informacao->telefone; ?> </span><br />                 
                <?= $informacao->email; ?>

            </div>                    
        </div>
    </div>
</footer>  
</body> 
</html>
