<?php if (!defined('ABSPATH')) exit; ?> 
<div class="col-md-12">
    <form action="#" class="form-horizontal" enctype="multipart/form-data" id="fileupload_galeria" method="post" role="form">
        <div class="form-group">
            <label class="col-lg-3 col-md-3 col-sm-12 control-label">  </label>
            <div class="col-lg-6 col-md-6 text-center">
                <div class="row fileupload-buttonbar">
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Adicionar Arquivos...</span>
                        <input type="file" name="files[]" multiple>
                    </span>
                    <button type="submit" class="btn btn-primary start">
                        <i class="en-upload"></i>
                        <span>Carregar Todos</span>
                    </button>
                    <button type="reset" class="btn btn-warning cancel">
                        <i class="br-cancel"></i>
                        <span>Limpar Todos</span>
                    </button>
                    <input type="checkbox" class="toggle">
                    <span class="fileupload-process"></span>
                    <div class="col-lg-5 fileupload-progress fade">
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                        </div>
                        <div class="progress-extended">&nbsp;</div>
                    </div>
                </div>
                <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
            </div>
        </div> 
    </form>

    <div class="gallery"> 
        <div class="gallery-inner">
            <?php foreach ($this->ViewBag->lista as $item) { ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix sea">
                    <a href="#" class="thumbnail">
                        <img src="<?= HOME_URL . "repositorio/arquivos/enviados/galeria/" . $item->galeria->categoria->url_amigavel . "/" . $item->galeria->pasta . "/thumbs/" . $item->imagem ?>" alt="image" width="260" />
                    </a>
                    <div class="gallery-image-controls">
                        <div class="action-btn">
                            <a class="gallery-image-open btn btn-primary btn-round tipB" title="Abrir imagem" href="<?= HOME_URL . "repositorio/arquivos/enviados/galeria/" . $item->galeria->categoria->url_amigavel . "/" . $item->galeria->pasta . "/" . $item->imagem ?>"><i class="ec-search"></i></a>
                            <a class="gallery-image-delete btn btn-primary btn-round tipB" href="#" onclick="DeletarFoto(<?= $item->id; ?>)" title="Deletar"><i class="ec-trashcan"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?> 
        </div>
    </div>

    <div class="form-group">         
        <div class="col-lg-6 col-md-6 text-left">
            <a href="<?= URL_PAINEL . "galeria/editar/" . $this->ViewBag->id; ?>" class="btn btn-primary">Voltar</a>
        </div>
         <div class="col-lg-6 col-md-6 text-right">
            <a href="<?= URL_PAINEL . "galeria/" . $this->ViewBag->id; ?>" class="btn btn-primary">Concluir</a>
        </div>
    </div>


</div> 
<script src="//code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.ui/1.9.2/jquery-ui.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/mvc/3.0/jquery.unobtrusive-ajax.js"></script>

<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
    <td>
    <span class="preview"></span>
    </td>
    <td>
    <p class="name">{%=file.name%}</p>
    <strong class="error text-danger"></strong>
    </td>
    <td>

    <p class="size">Processando...</p>
    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
    </td>
    <td>
    {% if (!i && !o.options.autoUpload) { %}
    <button class="btn btn-primary start" style="display: none;" disabled>
    <i class="en-upload"></i>
    <span>Carregar</span>
    </button>
    {% } %}
    {% if (!i) { %}
    <button class="btn btn-warning cancel">
    <i class="br-cancel"></i>
    <span>Limpar</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
    <td>
    <span class="preview">
    {% if (file.thumbnailUrl) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
    {% } %}
    </span>
    </td>
    <td>
    <p class="name">
    {% if (file.url) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
    {% } else { %}
    <span>{%=file.name%}</span>
    {% } %}
    </p>
    </td>
    <td>
    <span class="size">{%=o.formatFileSize(file.size)%}</span>
    </td>
    <td>
    {% if (file.deleteUrl) { %}
    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
    <i class="im-remove2"></i>
    <span>Remover</span>
    </button>
    <input type="checkbox" name="delete" value="1" class="toggle">
    {% } else { %}
    <button class="btn btn-warning cancel">
    <i class="br-cancel"></i>
    <span>Limpar</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>
</div> 

<script>

                                $(document).ready(function () {

                                    $('#fileupload_galeria').fileupload({
                                        disableImageResize: false,
                                        autoUpload: false,
                                        url: '<?= URL_PAINEL ?>galeria/Upload/<?= $this->ViewBag->id; ?>',
                                                    success: function (retorno) {
                                                        if (retorno == true) {
                                                            setTimeout(function () {
                                                                window.location.reload(1);
                                                            }, 1);
                                                        }
                                                    }
                                                });
                                                $('#fileupload_galeria').fileupload('option', {
                                                    url: $('#fileupload_galeria').fileupload('option', 'url'),
                                                    maxFileSize: 1048576, // 1 mb
                                                    acceptFileTypes: /(\.|\/)(jpe?g)$/i,
                                                    maxNumberOfFiles: 10,
                                                });
                                            });

                                            function DeletarFoto(id) {

                                                bootbox.confirm({
                                                    message: "Tem certeza que deseja remover a foto?",
                                                    title: "Remover Foto?",
                                                    buttons: {
                                                        'cancel': {
                                                            label: 'Não'
                                                        },
                                                        'confirm': {
                                                            label: 'Sim'
                                                        }
                                                    },
                                                    callback: function (result) {
                                                        if (result) {
                                                            $.ajax({
                                                                type: "GET",
                                                                url: '<?= URL_PAINEL ?>galeria/removerfoto/',
                                                                data: {id: id},
                                                                success: function (retorno) {
                                                                    if (retorno == true) {
                                                                        setTimeout(function () {
                                                                            window.location.reload(1);
                                                                        }, 1);
                                                                    } else {
                                                                        alert("Erro ao deletar a foto, tente novamente!");
                                                                    }
                                                                }
                                                            });
                                                        }
                                                    }
                                                });
                                            }




</script>

