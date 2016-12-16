<?php if (!defined('ABSPATH')) exit;

require_once ABSPATH_REPOSITORIO . '/models/Pagina.php';

$pagina = new Pagina();

$pagina = $this->ViewBag->pagina;

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

<form action="<?= URL_PAINEL; ?>pagina/salvar/" name="form" class="form-horizontal group-border hover-stripped" enctype="multipart/form-data" method="post" role="form" id="validate">

    <input type="hidden" name="id" value="<?= $pagina->id; ?>" />

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Título:  </label>
        <div class="col-lg-8 col-md-8">
                <input type="text" name="titulo" id="titulo" class="form-control" required="required" maxlength="150" value="<?= $pagina->titulo; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 control-label">Título Menu:</label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="titulo_menu" id="titulo_menu" class="form-control" required="required" maxlength="50"  value="<?= $pagina->titulo_menu; ?>">        
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> URL:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" readonly="readonly" name="url_amigavel" id="url_amigavel" class="form-control" required="required" value="<?= $pagina->url_amigavel; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Conteúdo:  </label>
        <div class="col-lg-8 col-md-8">
            <textarea name="conteudo" id="editor1" class="form-control" required="required"><?= $pagina->conteudo; ?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Ativo:  </label>
        <div class="col-lg-8 col-md-8">
            <select name="ativo" id="ativo" class="form-control" required="required">
                <option value="S" <?php if($pagina->ativo == "S"){   echo "selected";   }?>>Sim</option>
                <option value="N" <?php if($pagina->ativo == "N"){   echo "selected";   }?>>Não</option>
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