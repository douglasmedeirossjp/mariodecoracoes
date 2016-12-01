<?php

class HomeController extends MainController {

    public $login_required = false;
    
    public function index() {
        $this->carregarView("index", "Site");
    } 
}

 
