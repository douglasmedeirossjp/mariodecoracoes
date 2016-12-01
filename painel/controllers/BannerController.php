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

                $path = ABSPATH . "/views/_arquivos/uploads/banner/";

                $uploadfile = $path . $_FILES['file']['name'];

                if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {

                    $dao = new BannerDAO();
                    $banner = new Banner();

                    $banner->titulo = $this->parametros["titulo"];
                    $banner->imagem = $_FILES['file']['name'];
                    $banner->link = $this->parametros["link"];
                    $banner->ordem = $dao->BuscarOrdenacao();
                    $banner->ativo = $this->parametros["ativo"];

                    $dao->Cadastrar($banner);
                } else {
                    $this->ViewBag->Exception = "Arquivo não enviado, tente novamente!";
                }
                
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
