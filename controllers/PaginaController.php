<?php

require_once ABSPATH_REPOSITORIO . '/models/Pagina.php';
require_once ABSPATH_REPOSITORIO . '/dao/PaginaDAO.php';

class PaginaController extends MainController {

    public $login_required = false;
      
    public function index() {

        try {
            
            // pega o nome da página
            $page = $this->parametros['path'];
            
            if($page != null){                
                $dao = new PaginaDAO(); 
                $pagina = $dao->BuscarPorUrlAmigavel($page);
                $this->ViewBag->pagina = $pagina;            
            } 
            
        } catch (Exception $ex) {
            $this->ViewBag->Exception = $ex;
        }

        $this->carregarView("index", "Site");
    }
}
