<?php

require_once ABSPATH_REPOSITORIO . '/models/Banner.php';
require_once ABSPATH_REPOSITORIO . '/dao/BannerDAO.php';

class BannerController extends MainController {

    public function index() {

        $this->ViewBag->titulo = "Listar Banners";

        try {

            $dao = new BannerDAO();
            $lista = $dao->BuscarTodos();
            $this->ViewBag->lista = $lista;
            
        } catch (Exception $ex) {
            $this->ViewBag->Exception = $ex;
        }

        $this->carregarView("index");
    }

    public function cadastrar() {

        $this->ViewBag->titulo = "Cadastrar Banner";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            try {

                $dao = new BannerDAO();
                
                $banner = new Banner();
                $banner->titulo = $this->parametros["titulo"];
                $banner->imagem = $this->parametros["imagem"];
                $banner->link = $this->parametros["link"];
                $banner->ordem = $dao->BuscarOrdenacao();
                $banner->ativo = $this->parametros["ativo"];

                $dao->Cadastrar($banner);
                
            } catch (Exception $ex) {
                $this->ViewBag->Exception = $ex;
            }
        }

        $this->carregarView("cadastrar", "Form");
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
