<?php

require_once ABSPATH_REPOSITORIO . '/models/Pagina.php';

class PaginaDAO extends DAO{

    /**
     * Busca uma página através do ID
     * @param type $id
     * @return \Exception|\Pagina
     */
    public function BuscarPorID($id) {

        $pagina = new Pagina();

        try {

            $query = $this->db->query(
                    "SELECT * FROM pagina WHERE id = ? LIMIT 1", array($id)
            );

            foreach ($query->fetchAll() as $value) {
                $pagina->ToObject($value);                
            }
            
        } catch (Exception $ex) {            
            return $ex;           
        }

        return $pagina;
    }
    
    /**
     * Buscar página por URL amigável
     * @param type $url_amigavel
     * @return \Exception|\Pagina
     */
    public function BuscarPorUrlAmigavel($url_amigavel) {
 
        $pagina = new Pagina();

        try {

            $query = $this->db->query(
                    "SELECT * FROM pagina WHERE url_amigavel = ? LIMIT 1", array($url_amigavel)
            );

            foreach ($query->fetchAll() as $value) {
                $pagina->ToObject($value);                
            }
            
        } catch (Exception $ex) {            
            return $ex;           
        } 
        return $pagina; 
    }    

    /**
     * 
     * @return \Exception|\ArrayObject
     */
    public function BuscarTodos() {

        $lista = new ArrayObject();

        try {

            $query = $this->db->query("SELECT * FROM pagina ORDER BY id DESC");

            foreach ($query->fetchAll() as $value) {

                $pagina = new Pagina();
                
                $pagina->ToObject($value);

                $lista->append($pagina);
            }
            
        } catch (Exception $ex) {            
            return $ex;           
        }

        return $lista;
    }
    
   
}
