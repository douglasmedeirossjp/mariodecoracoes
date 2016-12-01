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

        $this->ViewBag->titulo = "Editar Página";

        $id = $this->parametros[0];

        try {

            $dao = new PaginaDAO();

            $pagina = $dao->BuscarPorID($id);

            $this->ViewBag->pagina = $pagina;
            
        } catch (Exception $ex) {
            $this->ViewBag->Exception = $ex;
        }

        $this->carregarView("editar", "Form");
    }

    public function salvar() {

        $pagina = new Pagina();

        $pagina->id = $this->parametros['id'];
        $pagina->titulo = $this->parametros['titulo'];
        $pagina->titulo_menu = $this->parametros['titulo_menu'];
        $pagina->url_amigavel = $this->parametros['url_amigavel'];
        $pagina->conteudo = $this->parametros['conteudo'];
        $pagina->ativo = $this->parametros['ativo'];

        $dao = new PaginaDAO();

        $dao->Editar($pagina);
    }

}
