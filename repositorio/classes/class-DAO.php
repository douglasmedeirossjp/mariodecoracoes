<?php

class DAO {

    public $db;
    public $phpass;
    public $last_id;

    public function __construct() {
        $this->db = new DB();
        $this->phpass = new PasswordHash(8, false);
    }

    public function Cadastrar($object) {
        if (is_object($object)) {
            $this->db->insert($object);
            $this->last_id = $this->db->last_id;
        }
    }

    public function Editar($object) { 
        if (is_object($object)) {
            return $this->db->update($object);
        }
    } 
}
