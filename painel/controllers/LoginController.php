<?php

require_once ABSPATH_REPOSITORIO . '/models/Usuario.php';
require_once ABSPATH_REPOSITORIO . '/dao/UsuarioDAO.php';

class LoginController extends MainController {
  
    public $login_required = false;
    
    public $phpass;
    
    public function index() {
  
        $MsgRetorno = null;
        
        if(!empty($_GET['MsgRetorno'])){
            $MsgRetorno = $_GET['MsgRetorno'];           
        }
         
        $this->entrar($MsgRetorno);
    }

    public function entrar($MsgRetorno = null) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
            $usuario = new Usuario();
            
            $usuario->setSenha($this->parametros['USSenha']);
            $usuario->setLogin($this->parametros['USLogin']);
            $usuario->setTokenLogin($this->parametros['token']);
            
            $dao = new UsuarioDAO();
            
            $retorno = $dao->ValidarUsuarioLogin($usuario);

            if ($retorno != null) {
 
                $this->registrar_sessao($retorno);
                
            } else {

                $this->ViewBag->msgLogin = "Erro ao realizar login, tente novamente!";
            }
        }
        
        if($MsgRetorno != null){            
            $this->ViewBag->msgLogin = $MsgRetorno;
        }
        
        $this->ViewBag->titulo = "Realizar Login - Painel Administrativo";
        $this->carregarView("entrar", "Login");
    }

    public function sair() {

        $this->logout();

        $this->ViewBag->titulo = "Sair - Painel Administrativo";
        $this->carregarView("sair", "Login");
    }

}
