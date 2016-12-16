<?php

require_once ABSPATH_REPOSITORIO . '/models/Usuario.php';
require_once ABSPATH_REPOSITORIO . '/dao/UsuarioDAO.php';

class Login {
    
    /**
     * Método para verificar se o token que está vindo por post é válido 
     * @param type $token
     * @return boolean
     */
    public function VerificarToken($token = null) {

        // se tem algum token no post, verifica se é o mesmo que está vindo por post
        //se nao for, cria um token 

        if (isset($_POST['token'])) {
            if ($_SESSION['token'] != $_POST['token']) {
                return false;
            }
        } else {
            $_SESSION['token'] = $token;
        }

        return true;
    }

    /**
     * Método para verificar se está logado, se tem token e se é válido 
     */
    public function check_login() {

        /* # SEGURANÇA # */
        /*
         * Verifica se existe sessão "Logado" e "_TokenLogin"
         * 1 - Se não existir, redireciona para logout
         * 2 - Se existir, verifica se o _TokenLogin é válido
         * 3 - Se não for válido, redireciona para logout com mensagem q não é válido
         */
        if (empty($_SESSION["Logado"]) && empty($_SESSION["_TokenLogin"])) {
            $this->logout("Sessão expirada ou inválida!");
        } else {

            $dao = new UsuarioDAO();
            $retorno = $dao->ValidarTokenUsuario();

            if ($retorno == false) {
                $this->logout("O token não é válido para este usuário!");
            }
        }
    }

    /**
     * Método para registra a sessão após fazer login
     * @param Usuario $usuario
     */
    public function registrar_sessao(Usuario $usuario) {
        
        // registra sessão
        $_SESSION["USID"] = $usuario->getId();
        $_SESSION["USLogin"] = $usuario->getLogin();
        $_SESSION["Logado"] = true;
        $_SESSION["_TokenLogin"] = $usuario->getTokenLogin();

        // redireciona para pagina inicial do painel
        $this->goto_page(URL_PAINEL);
    }

    /**
     * Método para fazer logout do painel
     * @param type $MsgRetorno mensagem de retorno para exibir na tela de login
     */
    protected function logout($MsgRetorno = null) {

        if (!empty($_SESSION["Logado"])) {

            // remove token do db
            $dao = new UsuarioDAO();
            $dao->RemoverTokenUsuario();

            // destroi a sessão
            session_destroy();
        }

        $this->goto_login($MsgRetorno);
    }

    /**
     * Método para enviar para página de login
     * @param type $MsgRetorno mensagem de retorno para exibir na tela de login
     * @return type
     */
    protected function goto_login($MsgRetorno = null) {

        $login_url = URL_PAINEL . 'login/';
 
        if ($MsgRetorno != null) {

            echo '<meta http-equiv="Refresh" content="0; url=' . $login_url . '?MsgRetorno=' . $MsgRetorno . '">';
            echo '<script type="text/javascript">window.location.href = "' . $login_url . '?MsgRetorno=' . $MsgRetorno . '";</script>';
            
        } else {

            echo '<meta http-equiv="Refresh" content="0; url=' . $login_url . '">';
            echo '<script type="text/javascript">window.location.href = "' . $login_url . '";</script>';
        }
 
        return;
    }

    /**
     * Método para redirecionar para uma página específica
     * @param type $page_url página de redirecionamento
     * @return type
     */
    final protected function goto_page($page_url = null) {

        if ($page_url) {
            echo '<meta http-equiv="Refresh" content="0; url=' . $page_url . '">';
            echo '<script type="text/javascript">window.location.href = "' . $page_url . '";</script>';
            return;
        }
    }

    /**
     * Método para verificar as permissões do perfil
     * @param type $required
     * @param type $user_permissions
     * @return boolean
     */
    final protected function check_permissions($required = 'any', $user_permissions = array('any')) {

        if (!is_array($user_permissions)) {
            return;
        }

        if (!in_array($required, $user_permissions)) {
            return false;
        } else {
            return true;
        }
    }

}
