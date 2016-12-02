<?php

require_once ABSPATH_REPOSITORIO . '/models/Banner.php';
require_once ABSPATH_REPOSITORIO . '/dao/BannerDAO.php';

class HomeController extends MainController {

    public $login_required = false;

    public function index() {
 
        $dao = new BannerDAO(); 
        $this->ViewBag->banners = $dao->BuscarTodos();

        $this->carregarView("index", "Site");
        
    } 
}
