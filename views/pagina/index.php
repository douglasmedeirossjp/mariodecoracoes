<?php if (!defined('ABSPATH')) exit; 

require_once ABSPATH_REPOSITORIO . '/models/Pagina.php';

$pagina = new Pagina(); 
$pagina = $this->ViewBag->pagina;

?>

<div class="container"> 
    <div class="row">         
        <h3 class="page-header"><?= $this->ViewBag->pagina->titulo; ?></h3> 
    </div> 
    <div class="row conteudo">         
        <div class="col-lg-12 col-md-12">            
          
             <?= $pagina->conteudo; ?>
        
        </div>
    </div> 
</div> 
