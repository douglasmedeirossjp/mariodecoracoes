<?php if (!defined('ABSPATH')) exit;

require_once ABSPATH_REPOSITORIO . '/models/Pagina.php';

$pagina = new Pagina(); 

$pagina = $this->ViewBag->pagina;
  
?>
 
<form action="<?= URL_PAINEL; ?>pagina/salvar/" name="form" class="form-horizontal group-border hover-stripped" enctype="multipart/form-data" method="post" role="form" id="validate">

    <input type="hidden" name="id" value="<?= $pagina->id; ?>" />
     
    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Título:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?= $pagina->titulo; ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Título Menu:</label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="titulo_menu" id="titulo_menu" class="form-control" value="<?= $pagina->titulo_menu; ?>">        
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> URL:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" readonly="readonly" name="url_amigavel" id="url_amigavel" class="form-control" value="<?= $pagina->url_amigavel; ?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Conteúdo:  </label>
        <div class="col-lg-8 col-md-8">
            <textarea name="conteudo" id="texteditor" class="form-control tinymce" rows="20"><?= $pagina->conteudo; ?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Ativo:  </label>
        <div class="col-lg-8 col-md-8">
            <select name="ativo" id="ativo" class="form-control">
                <option value="S">Sim</option>
                <option value="S">Não</option>
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

 
 