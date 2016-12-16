<?php
if (!defined('ABSPATH'))
    exit;

require_once ABSPATH_REPOSITORIO . '/models/Usuario.php';

$usuario = new Usuario();

$usuario = $this->ViewBag->usuario;
 

?>



<?php if ($this->ViewBag->Msg != "") { ?>
    <div class="bs-callout bs-callout-info fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
        <p> <?= $this->ViewBag->Msg; ?></p>
    </div>
<?php } ?>

<?php if ($this->ViewBag->Exception != "") { ?>
    <div class="bs-callout bs-callout-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
        <p> <?= $this->ViewBag->Exception; ?></p>
    </div>
<?php } ?>

<form action="<?= URL_PAINEL; ?>usuario/salvar/" name="form" class="form-horizontal group-border hover-stripped" enctype="multipart/form-data" method="post" role="form" id="validate">
     
    <div class=form-group>
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Nova <label for="USSenha">Senha</label>  </label>
        <div class="col-lg-4 col-md-4">           
            <input type="password" class="form-control" id="password" name="password" placeholder="Informe a nova senha">
            <input type="password" class="form-control mt15" id="confirm_password" name="confirm_passowrd" placeholder="Repita a senha">
        </div>
    </div> 
 
    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label">   </label>
        <div class="col-lg-8 col-md-8">
            <input type="submit" class="btn btn-primary" value="Salvar">
        </div>
    </div>
     
</form> 

 