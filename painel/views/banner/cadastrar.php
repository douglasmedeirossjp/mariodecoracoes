<?php if (!defined('ABSPATH')) exit; ?>


<form class="form-horizontal group-border hover-stripped" enctype="multipart/form-data" method="post" role="form" id="validate">

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Título:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="titulo" id="titulo" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Imagem:</label>
        <div class="col-lg-10">
            <input type="file" name="file" id="file" class="form-control" style="display: none">            
        </div>
    </div>


    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Link:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="link" id="link" class="form-control">
        </div>
    </div>


    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label"> Ativo:  </label>
        <div class="col-lg-8 col-md-8">
            <input type="text" name="ativo" id="ativo" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 col-md-2 col-sm-12 control-label">   </label>
        <div class="col-lg-8 col-md-8">
            <input type="submit" class="btn btn-primary" value="Cadastrar">
        </div>
    </div>

</form>
