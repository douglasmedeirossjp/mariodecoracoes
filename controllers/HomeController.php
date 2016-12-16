<?php
 
require_once ABSPATH_REPOSITORIO . '/dao/BannerDAO.php';
require_once ABSPATH_REPOSITORIO . '/dao/InformacaoDAO.php';

class HomeController extends MainController {

    public $login_required = false;

    public function index() {
 
        $dao = new BannerDAO(); 
        $this->ViewBag->banners = $dao->BuscarTodosAtivos();
        
        $dao_info = new InformacaoDAO();        
        $this->ViewBag->informacao = $dao_info->BuscarInformacao(); 

        $this->carregarView("index", "SiteManutencao");
        
    } 
    
    public function index2() {
 
        $dao = new BannerDAO(); 
        $this->ViewBag->banners = $dao->BuscarTodosAtivos();
        
        $dao_info = new InformacaoDAO();        
        $this->ViewBag->informacao = $dao_info->BuscarInformacao(); 

        $this->carregarView("index2", "Site");
        
    } 
}
