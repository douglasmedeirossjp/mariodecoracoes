<?php
if (!defined('ABSPATH'))
    exit;

require_once ABSPATH_REPOSITORIO . '/models/Informacao.php';

$informacao = new Informacao();

$informacao = $this->ViewBag->informacao;
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

<form action="<?= URL_PAINEL; ?>informacao/salvar/" name="form" class="form-horizontal group-border hover-stripped" enctype="multipart/form-data" method="post" role="form" id="validate">

    <input type="hidden" name="id" value="<?= $informacao->id; ?>" />

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Telefone:  </label>
        <div class="col-lg-3 col-md-3">
            <input type="text" name="telefone" id="telefone" class="form-control" required="required" maxlength="20" value="<?= $informacao->telefone; ?>">
        </div>

        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Celular:  </label>
        <div class="col-lg-3 col-md-3">
            <input type="text" name="celular" id="celular" class="form-control" maxlength="20" value="<?= $informacao->celular; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Endereço:  </label>
        <div class="col-lg-5 col-md-5">
            <input type="text" name="endereco" id="endereco" class="form-control" required="required" maxlength="255" value="<?= $informacao->endereco; ?>">
        </div>

        <label class="col-lg-1 col-md-1 col-sm-12 control-label"> Número:  </label>
        <div class="col-lg-2 col-md-2">
            <input type="text" name="numero" id="numero" class="form-control" required="required" maxlength="20" value="<?= $informacao->numero; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Bairro:  </label>
        <div class="col-lg-2 col-md-2">
            <input type="text" name="bairro" id="bairro" class="form-control" required="required" maxlength="50" value="<?= $informacao->bairro; ?>">
        </div>

        <label class="col-lg-1 col-md-1 col-sm-12 control-label"> Cidade:  </label>
        <div class="col-lg-3 col-md-3">
            <input type="text" name="cidade" id="cidade" class="form-control" required="required" maxlength="100" value="<?= $informacao->cidade; ?>">
        </div>

        <label class="col-lg-1 col-md-1 col-sm-12 control-label"> Estado:  </label>
        <div class="col-lg-1 col-md-1">
            <input type="text" name="estado" id="estado" class="form-control" required="required" maxlength="100" value="<?= $informacao->estado; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Horário de Atendimento:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="horario_atendimento" id="horario_atendimento" class="form-control" required="required" maxlength="100" value="<?= $informacao->horario_atendimento; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> E-mail para contato:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="email" id="email" class="form-control" required="required" maxlength="150" value="<?= $informacao->email; ?>">
        </div>
    </div>


    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Localização Google Maps:  </label>
        <div class="col-lg-8 col-md-8">
            <textarea type="text" name="googlemaps" rows="10" id="googlemaps" class="form-control"><?= $informacao->googlemaps; ?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Mensagem Contato:  </label>
        <div class="col-lg-8 col-md-8">
            <textarea name="mensagem_contato" id="editor1" class="form-control" required="required"><?= $informacao->mensagem_contato; ?></textarea>       
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Facebook:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="facebook" id="facebook" class="form-control" required="required" maxlength="255" value="<?= $informacao->facebook; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Instagram:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="instagram" id="instagram" class="form-control" required="required" maxlength="255" value="<?= $informacao->instagram; ?>">
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