<?php

class UsuarioDAO extends DAO {

    /**
     * Busca um determinado usuário através do ID
     * @param type $id
     * @return \Usuario
     */
    public function BuscarUsuarioPorID($id) {

        $usuario = new Usuario();

        try {

            $query = $this->db->query(
                    "SELECT * FROM usuario WHERE login = ? and status = 'A' LIMIT 1", array($usuario->getLogin())
            );
            
            return $usuario->ToObject($query);
            
        } catch (Exception $ex) {
            
        }

        return $usuario;
    }

    /**
     * Método para validar usuário ao realizar login
     * @param Usuario $usuario
     * @return \Usuario
     */
    public function ValidarUsuarioLogin(Usuario $usuario) {

        $query = $this->db->query(
                "SELECT * FROM usuario WHERE login = ? and status = 'A' LIMIT 1", array($usuario->getLogin())
        );

        $fetch = $query->fetch(PDO::FETCH_ASSOC);

        if (!empty($fetch)) {
             
            if ($this->phpass->CheckPassword($usuario->getSenha(), $fetch['senha'])) {

                date_default_timezone_set('America/Sao_Paulo');

                // data e hora atual
                $agora = date('Y-m-d H:i:s');
                $ultimo_login = $agora . " em " . $_SERVER['REMOTE_ADDR'];

                // gerar token de segurança
                $token = $this->phpass->HashPassword(time());

                // gerar validade do token
                $validadeToken = $this->GerarValidadeToken();

                // adiciona os valores no fetch
                $fetch['ultimoLogin'] = $ultimo_login;
                $fetch['tokenLogin'] = $token;
                $fetch['validadeToken'] = $validadeToken;

                // converter o fetch em um objeto do tipo usuário
                $usuario = $usuario->ToObject($fetch);

                // atualizar último login e token
                $query = $this->db->query(
                        "UPDATE usuario SET tokenLogin = ?, ultimoLogin = ?, validadeToken = ? WHERE id = ?", array($usuario->getTokenLogin(), $usuario->getUltimoLogin(), $usuario->getValidadeToken(), $usuario->getId())
                );

                return $usuario;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    /**
     * Método para validar se o token do usuário da sessão é o mesmo do DB
     * @param type $token
     * @param type $login
     * @return boolean
     */
    function ValidarTokenUsuario() {

        if (!empty($_SESSION["_TokenLogin"])) {

            $query = $this->db->query(
                    "SELECT validadeToken FROM usuario WHERE login = ? and tokenLogin = ? LIMIT 1", array($_SESSION["USLogin"], $_SESSION["_TokenLogin"])
            );

            $fetch = $query->fetch(PDO::FETCH_ASSOC);

            // verifica se existe token
            if (!empty($fetch)) {

                //verifica se o token está validade do token  
                return $this->VerificarValidadeToken($fetch['validadeToken']);
            }

            return false;
        }
    }

    /**
     * Método para remover o token do usuário no DB após fazer logout
     * @param type $login
     */
    public function RemoverTokenUsuario() {

        if (!empty($_SESSION["USLogin"])) {

            $this->db->query(
                    "UPDATE usuario SET tokenLogin = null, validadeToken = null WHERE login = ?", array($_SESSION["USLogin"])
            );
        }
    }
    
    
     public function AlterarSenhaUsuario($senha) {

        if (!empty($_SESSION["USLogin"])) { 
            $this->db->query(
                    "UPDATE usuario SET senha = ? WHERE login = ?", array($senha, $_SESSION["USLogin"])
            );
        }
    }

    /**
     * Método que vai gerar uma nova validade do token com a data atual + 25 dias
     * @return type
     */
    private function GerarValidadeToken() {

        // gerar validade do token (data atual + 25 minutos)
        $dataatual = new DateTime();
        $dataatual->add(new DateInterval('PT25M'));
        return $dataatual->format('Y-m-d H:i:s');
    }

    /**
     * Método para verificar a validade do token comparando com a data e hora atual
     * Se for válido, irá renovar para continaur a navegação
     * @param type $validadeToken
     * @return boolean
     */
    private function VerificarValidadeToken($validadeToken) {

        date_default_timezone_set('America/Sao_Paulo');

        $validade = new DateTime($validadeToken);

        $dataatual = new DateTime(date('Y-m-d H:i:s'));

        // verifica se a validade do token é maior que a data atual
        if ($validade > $dataatual) {

            // gera uma nova validade
            $novavalidade = $this->GerarValidadeToken();

            // update na base para continuar navegação
            $this->db->query(
                    "UPDATE usuario SET validadeToken = ? WHERE login = ?", array($novavalidade, $_SESSION['USLogin'])
            );

            return true;
        } else {
            return false;
        }
    }

}
