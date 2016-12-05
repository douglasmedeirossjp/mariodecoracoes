<?php

require_once ABSPATH_REPOSITORIO . '/models/Categoria.php';
require_once ABSPATH_REPOSITORIO . '/dao/CategoriaDAO.php';
require_once ABSPATH_REPOSITORIO . '/funcionalidades/UrlAmigavel.php';

class CategoriaController extends MainController {

    public function index() {

        $this->ViewBag->titulo = "Listar Categorias";

        try {

            $dao = new CategoriaDAO();
            $lista = $dao->BuscarTodos();
            $this->ViewBag->lista = $lista;
        } catch (Exception $ex) {
            $this->ViewBag->Exception = $ex;
        }

        $this->carregarView("index");
    }

    public function cadastrar() {

        $this->ViewBag->titulo = "Cadastrar Categoria";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            try {

                $dao = new CategoriaDAO();
                $ua = new UrlAmigavel();

                $categoria = new Categoria();
                $categoria->titulo = $this->parametros["titulo"];
                $categoria->url_amigavel = $ua->GerarUrlAmigavel($categoria->titulo);
                $categoria->ativo = $this->parametros["ativo"];

                $dao->Cadastrar($categoria);
            } catch (Exception $ex) {
                $this->ViewBag->Exception = $ex;
            }

            $this->goto_page(URL_PAINEL . "categoria/");
        }

        $this->carregarView("cadastrar", "Form");
    }

    public function editar() {

        $this->ViewBag->titulo = "Editar Categoria";

        $id = $this->parametros[0];

        if (!empty($this->parametros[1]) && $this->parametros[1] == "true") {
            $this->ViewBag->Msg = "Categoria atualizada com sucesso!";
        }

        try {

            $dao = new CategoriaDAO();

            $categoria = $dao->BuscarPorID($id);

            $this->ViewBag->categoria = $categoria;
        } catch (Exception $ex) {

            $this->ViewBag->Exception = $ex->getMessage();
        }

        $this->carregarView("editar", "Form");
    }

    public function salvar() {

        $categoria = new Categoria();
        $dao = new CategoriaDAO();
        
        $ua = new UrlAmigavel();

        $categoria->id = $this->parametros['id'];
        $categoria->titulo = $this->parametros['titulo'];
        $categoria->url_amigavel = $ua->GerarUrlAmigavel($categoria->titulo);
        $categoria->ativo = $this->parametros["ativo"];
 
        $dao->Editar($categoria);

        $this->goto_page(URL_PAINEL . "categoria/editar/" . $categoria->id . "/true");
    }

}
