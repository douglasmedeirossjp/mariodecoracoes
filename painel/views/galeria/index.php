<?php if (!defined('ABSPATH')) exit; ?>

<a href="<?=URL_PAINEL;?>galeria/cadastrar" class="btn btn-primary">Cadastrar</a> <hr />

<table class="table table-striped">
    <thead>
        <tr>
            <th>
                Título
            </th>
            <th>
                Categoria
            </th>
            <th>
                Url Amigável
            </th> 
            <th>
                Ativo
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody> 
        
<?php foreach ($this->ViewBag->lista as $item) { ?>

        <tr>
            <td>
                <?=$item->titulo;?>
            </td>
            <td>
                <?=$item->categoria->titulo;?>
            </td>
            <td>
                <?=$item->url_amigavel;?>
            </td>
            <td>
                <?=$item->ativo;?>
            </td>
            <td>                
                <a href="<?=URL_PAINEL;?>galeria/editar/<?=$item->id;?>" class="btn btn-alt btn-primary"> Editar </a>
            </td>
        </tr>

<?php } ?>
        
    </tbody> 
</table> 

 