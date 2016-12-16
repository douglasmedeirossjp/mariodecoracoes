<?php

require_once ABSPATH_REPOSITORIO . '/models/Usuario.php';
require_once ABSPATH_REPOSITORIO . '/dao/UsuarioDAO.php';

class UsuarioController extends MainController {

    public function AlterarSenha() {

        $this->ViewBag->titulo = "Alterar Senha";


        $this->carregarView("AlterarSenha", "Form");
    }

    public function Salvar() {

        $this->ViewBag->titulo = "Alterar Senha";

        try {

            $dao = new UsuarioDAO();

            $usuario = $dao->BuscarUsuarioPorID($_SESSION['USID']);

            $this->ViewBag->usuario = $usuario;

            $senha = $this->parametros['password'];
            
            $senha_cript = $this->phpass->HashPassword($senha);
           
            $dao->AlterarSenhaUsuario($senha_cript);
            
 
        } catch (Exception $ex) {
            $this->ViewBag->Exception = $ex;
        }

        $this->carregarView("AlterarSenha", "Form");
    }

}
