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

<form action="<?= URL_PAINEL; ?>banner/cadastrar/" class="form-horizontal group-border hover-stripped" enctype="multipart/form-data" method="post" role="form" id="validate">

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Título:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="titulo" id="titulo" class="form-control" maxlength="100" required="required">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label">Imagem:</label>
        <div class="col-lg-6 col-md-6">               
            <input type="text" name="imagem" id="ckfinder-input-1" readonly="" class="form-control" required="required">            
        </div>
        <div class="col-lg-2 col-md-2">                
            <button type="button" id="ckfinder-popup-1" class="btn btn-primary">Procurar</button>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Link:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="link" id="link" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Nova Guia:  </label>
        <div class="col-lg-8 col-md-8">
            <select name="novaguia" id="novaguia" class="form-control" required="required">                
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
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

<script src="<?= HOME_URL ?>repositorio/arquivos/editor/ckfinder/ckfinder.js" type="text/javascript"></script>
<script>
    var button1 = document.getElementById('ckfinder-popup-1');

    button1.onclick = function () {
        selectFileWithCKFinder('ckfinder-input-1');
    };
 
    function selectFileWithCKFinder(elementId) {
        CKFinder.popup({
            chooseFiles: true,
            width: 1024,
            height: 800,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files.first();
                    var output = document.getElementById(elementId);
                    output.value = file.getUrl();
                });

                finder.on('file:choose:resizedImage', function (evt) {
                    var output = document.getElementById(elementId);
                    output.value = evt.data.resizedUrl;
                });
            }
        });
    }
</script>