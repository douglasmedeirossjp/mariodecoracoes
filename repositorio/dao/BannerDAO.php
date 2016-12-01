<?php

require_once ABSPATH_REPOSITORIO . '/models/Banner.php';

class BannerDAO extends DAO{

    /**
     * Busca um determinado usuário através do ID
     * @param type $id
     * @return \Exception|\Banner
     */
    public function BuscarPorID($id) {

        $banner = new Banner();

        try {

            $query = $this->db->query(
                    "SELECT * FROM banner WHERE id = ? LIMIT 1", array($id)
            );

            return $banner->ToObject($query);
            
        } catch (Exception $ex) {            
            return $ex;           
        }

        return $banner;
    }

    /**
     * 
     * @return \Exception|\ArrayObject
     */
    public function BuscarTodos() {

        $lista = new ArrayObject();

        try {

            $query = $this->db->query("SELECT * FROM banner ORDER BY id DESC");

            foreach ($query->fetchAll() as $value) {

                $banner = new Banner();
                
                $banner->ToObject($value);

                $lista->append($banner);
            }
            
        } catch (Exception $ex) {            
            return $ex;           
        }

        return $lista;
    }
    
    /***
     * Método para buscar a última ordem do banner
     */
    public function BuscarOrdenacao(){
        
        return 1;
        
    }
}
