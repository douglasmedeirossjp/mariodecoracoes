<?php if (!defined('ABSPATH')) exit; ?>
  
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                Título
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
                <?=$item->url_amigavel;?>
            </td>
            <td>
                <?=$item->ativo;?>
            </td>
            <td>                
                <a href="<?=URL_PAINEL;?>pagina/editar/<?=$item->id;?>" class="btn btn-alt btn-primary"> Editar </a>
            </td>
        </tr>

<?php } ?>
        
        
    </tbody> 
</table> 

 