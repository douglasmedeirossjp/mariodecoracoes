<?php

require_once ABSPATH_REPOSITORIO . '/models/Pagina.php';
require_once ABSPATH_REPOSITORIO . '/dao/PaginaDAO.php';

class PaginaController extends MainController {

    public function index() {

        $this->ViewBag->titulo = "Todas as Páginas";

        try {

            $dao = new PaginaDAO();
            $lista = $dao->BuscarTodos();
            $this->ViewBag->lista = $lista;
            
        } catch (Exception $ex) {
            $this->ViewBag->Exception = $ex;
        }

        $this->carregarView("index");
    }
 
    public function editar() {

        $this->ViewBag->titulo = "Editar Banner";

        $dao = new BannerDAO();

        $dao->Editar($banner);

        $this->carregarView("editar");
    }

    public function excluir() {

        $this->ViewBag->titulo = "Excluir Banner";

        $this->carregarView("excluir");
    }

}
