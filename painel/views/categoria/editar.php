<?php if (!defined('ABSPATH')) exit;

require_once ABSPATH_REPOSITORIO . '/models/Categoria.php';

$categoria = new Categoria();

$categoria = $this->ViewBag->categoria;
 
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

<form action="<?= URL_PAINEL; ?>categoria/salvar/" class="form-horizontal group-border hover-stripped" enctype="multipart/form-data" method="post" role="form" id="validate">

    <input type="hidden" name="id" value="<?= $categoria->id; ?>" /> 
    
    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Título:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="titulo" id="titulo" class="form-control" maxlength="100" required="required" value="<?= $categoria->titulo; ?>">
        </div>
    </div> 

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Ativo:  </label>
        <div class="col-lg-8 col-md-8">
            <select name="ativo" id="ativo" class="form-control" required="required">
                <option value="S" <?php if($categoria->ativo == "S"){   echo "selected";   }?>>Sim</option>
                <option value="N" <?php if($categoria->ativo == "N"){   echo "selected";   }?>>Não</option>
            </select>
        </div>
    </div>
     
    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label">   </label>
        <div class="col-lg-8 col-md-8">
            <input type="submit" class="btn btn-primary" value="Salvar">
        </div>
    </div>

</form>