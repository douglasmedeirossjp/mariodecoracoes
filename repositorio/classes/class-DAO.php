<?php

class DAO {

    public $db;
    public $phpass;

    public function __construct() {
        $this->db = new DB();
        $this->phpass = new PasswordHash(8, false);
    }

    public function Cadastrar($object) {
        if (is_object($object)) {
            $this->db->insert($object);
        }
    }

    public function Editar($object) {
        if (is_object($object)) {
            return $this->db->update($object);
        }
    }
    
    public function Deletar($object) {
        if (is_object($object)) {
            return $this->db->delete($object);
        }
    }

}
