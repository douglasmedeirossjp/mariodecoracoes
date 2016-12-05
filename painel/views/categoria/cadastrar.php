<?php if (!defined('ABSPATH')) exit; ?>

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

<form action="<?= URL_PAINEL; ?>categoria/cadastrar/" class="form-horizontal group-border hover-stripped" enctype="multipart/form-data" method="post" role="form" id="validate">

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Título:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="titulo" id="titulo" class="form-control" maxlength="100" required="required">
        </div>
    </div>
     
    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Ativo:  </label>
        <div class="col-lg-8 col-md-8">
            <select name="ativo" id="ativo" class="form-control" required="required">
                <option value="S">Sim</option>
                <option value="N">Não</option>
            </select>
        </div>
    </div>
        
    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label">   </label>
        <div class="col-lg-8 col-md-8">
            <input type="submit" class="btn btn-primary" value="Cadastrar">
        </div>
    </div>
    
</form>
 