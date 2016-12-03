<?php if (!defined('ABSPATH')) exit; ?>

<a href="<?=URL_PAINEL;?>banner/cadastrar" class="btn btn-primary">Cadastrar</a> <hr />

<table class="table table-striped">
    <thead>
        <tr>
            <th>
                Título
            </th>
            <th>
                Link
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
                <?=$item->link;?>
            </td>
            <td>
                <?=$item->ativo;?>
            </td>
            <td>                
                <a href="<?=URL_PAINEL;?>banner/editar/<?=$item->id;?>" class="btn btn-alt btn-primary"> Editar </a>
            </td>
        </tr>

<?php } ?>
        
    </tbody> 
</table> 

 