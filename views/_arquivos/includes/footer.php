<?php if (!defined('ABSPATH')) exit; ?>
<footer> 
    <div class="container"> 
        <div class="row info-rodape" > 
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 logo-rodape">
                <img src="<?= HOME_URL; ?>views/_arquivos/images/logo-rodape.png"   />
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 endereco-rodape">

                <img src="<?= HOME_URL; ?>views/_arquivos/images/icone-endereco.png" width="35" align="left" />

                Rua Voluntários da Pátria, 344  <br />
                Centro - São José dos Pinhais - PR   

            </div>
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 horario-rodape">

                <img src="<?= HOME_URL; ?>views/_arquivos/images/icone-horario.png" width="35" align="left" />

                HORÁRIO DE ATENDIMENTO: <br />
                Segunda à sexta das 8h às 18h   

            </div>
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 contato-rodape">

                <img src="<?= HOME_URL; ?>views/_arquivos/images/icone-contato.png" width="35" align="left" />

                41 <span class="telefone">3283-6165</span><br />
                contato@mariodecoracoes.com.br

            </div>                    
        </div>
    </div>
</footer> 
<script src="<?= HOME_URL; ?>views/_arquivos/js/jquery.js"></script>
<script src="<?= HOME_URL; ?>views/_arquivos/js/bootstrap.min.js"></script>
<script>
    $('.carousel').carousel({
        interval: 5000
    });
</script> 
</body> 
</html>
