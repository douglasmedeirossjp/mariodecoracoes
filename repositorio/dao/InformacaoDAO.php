<?php

require_once ABSPATH_REPOSITORIO . '/models/Informacao.php';

class InformacaoDAO extends DAO {

    public function BuscarInformacao() {

        $informacao = new Informacao();

        try {

            $query = $this->db->query("SELECT * FROM informacao LIMIT 1");

            foreach ($query->fetchAll() as $value) {
                $informacao->ToObject($value);
            }
        } catch (Exception $ex) {
            return $ex;
        }

        return $informacao;
    }

}
