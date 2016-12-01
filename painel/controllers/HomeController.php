<?php 

class HomeController extends MainController {
    
    public function index() { 
                  
        $this->ViewBag->titulo = "Painel Administrativo";
        
        $this->carregarView("index");
        
    } 
}

 
