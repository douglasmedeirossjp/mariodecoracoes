<?php

require_once ABSPATH_REPOSITORIO . '/models/Galeria.php';
require_once ABSPATH_REPOSITORIO . '/dao/GaleriaDAO.php';
require_once ABSPATH_REPOSITORIO . '/dao/CategoriaDAO.php';

class GaleriaController extends MainController {

    public $login_required = false;

    public function index($acao) {

        $dao = new CategoriaDAO();
        $dao_galeria = new GaleriaDAO();
        
        $this->ViewBag->categorias = $dao->BuscarTodosAtivos();

        if (!empty($acao)) {

            // acao é a categoria
            // buscar galeria da categoria

            if (empty($this->parametros[0])) {

                $categoria = $dao->BuscarPorUrlAmigavel($acao);
                
                $this->ViewBag->categoria = $categoria; 
                $this->ViewBag->galerias = $dao_galeria->BuscarTodosAtivosPorCategoria($categoria->id);
                
            } else {

                // buscar fotos do album
                $url_amigavel = $this->parametros[0];
              
                $galeria = $dao_galeria->BuscarPorUrlAmigavel($url_amigavel);
                $galeria->fotos =$dao_galeria->BuscarFotosPorGaleria($galeria->id);
                
                $this->ViewBag->galeria = $galeria; 
                
            }
        }

        $this->carregarView("index", "Site");
    }

}
