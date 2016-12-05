<?php

require_once ABSPATH_REPOSITORIO . '/models/Galeria.php';
require_once ABSPATH_REPOSITORIO . '/dao/GaleriaDAO.php';
require_once ABSPATH_REPOSITORIO . '/dao/CategoriaDAO.php';

class GaleriaController extends MainController {

    public $login_required = false;

    public function index($acao) {
        
        $dao = new CategoriaDAO();
        
        $this->ViewBag->categorias = $dao->BuscarTodosAtivos();
          
        if (!empty($acao)) {
            
            // acao é a categoria
            
            // buscar galeria da categoria
          
            if (!empty($this->parametros[0])) {
                
                // buscar fotos do album
                echo $this->parametros[0];
            }
        } 
        
        $this->carregarView("index", "Site");
    }

}
