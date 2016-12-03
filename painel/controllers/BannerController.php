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
            
            $this->goto_page(URL_PAINEL."banner/");
        }

        $this->carregarView("cadastrar", "Form");
    }

   public function editar() {

        $this->ViewBag->titulo = "Editar Banner";

        $id = $this->parametros[0];
          
        if(!empty($this->parametros[1]) && $this->parametros[1] == "true"){            
            $this->ViewBag->Msg = "Banner atualizado com sucesso!";
        } 
        
        try {

            $dao = new BannerDAO();

            $banner = $dao->BuscarPorID($id);
             
            $this->ViewBag->banner = $banner;
            
        } catch (Exception $ex) {
            
            $this->ViewBag->Exception = $ex->getMessage();
        }

        $this->carregarView("editar", "Form");
    }

    public function salvar() {

        $banner = new Banner();
 
        $banner->id = $this->parametros['id'];
        $banner->imagem = $this->parametros['imagem'];        
        $banner->titulo = $this->parametros['titulo'];
        $banner->link = $this->parametros['link'];
        $banner->novaguia = $this->parametros['novaguia'];
        $banner->ordem = $this->parametros['ordem'];
        $banner->ativo = $this->parametros['ativo'];
        
        $dao = new BannerDAO();

        $dao->Editar($banner);
          
        $this->goto_page(URL_PAINEL."banner/editar/" . $banner->id . "/true");
    }

}
