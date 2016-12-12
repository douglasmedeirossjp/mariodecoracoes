<?php if (!defined('ABSPATH')) exit;

require_once ABSPATH_REPOSITORIO . '/models/Galeria.php';

$galeria = new Galeria();

$galeria = $this->ViewBag->galeria;
 
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

<form action="<?= URL_PAINEL; ?>galeria/salvar/" name="form" class="form-horizontal group-border hover-stripped" enctype="multipart/form-data" method="post" role="form" id="validate">

    <input type="hidden" name="id" value="<?= $galeria->id; ?>" />

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Título:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="titulo" id="titulo" class="form-control" required="required" maxlength="150" value="<?=$galeria->titulo;?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Descrição:  </label>
        <div class="col-lg-8 col-md-8">
            <textarea name="descricao" id="editor1" class="form-control" required="required"><?=$galeria->descricao;?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Categoria:  </label>
        <div class="col-lg-8 col-md-8">
            <select name="categoria" id="categoria" class="form-control" required="required"> 
                <?php foreach ($this->ViewBag->categorias as $item) { ?>
                <option value="<?=$item->id;?>" <?php if($item->id == $galeria->categoria->id){     echo "selected";     } ?>><?=$item->titulo;?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Ativo:  </label>
        <div class="col-lg-8 col-md-8">
            <select name="ativo" id="ativo" class="form-control" required="required">
                <option value="S" <?php if($galeria->ativo == "S"){     echo "selected";     } ?>>Sim</option>
                <option value="N" <?php if($galeria->ativo == "N"){     echo "selected";     } ?>>Não</option>
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
<script src="<?= HOME_URL ?>repositorio/arquivos/editor/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?= HOME_URL ?>repositorio/arquivos/editor/ckfinder/ckfinder.js" type="text/javascript"></script>
<script>
    CKEDITOR.replace('editor1', {
        filebrowserBrowseUrl: '<?= HOME_URL ?>repositorio/arquivos/editor/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: '<?= HOME_URL ?>repositorio/arquivos/editor/ckfinder/ckfinder.html?Type=Images',
        filebrowserUploadUrl: '<?= HOME_URL ?>repositorio/arquivos/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '<?= HOME_URL ?>repositorio/arquivos/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserWindowWidth: '1000',
        filebrowserWindowHeight: '700'
    });
</script>
