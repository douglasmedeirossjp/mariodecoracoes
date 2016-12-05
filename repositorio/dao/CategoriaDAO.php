<?php

require_once ABSPATH_REPOSITORIO . '/models/Categoria.php';

class CategoriaDAO extends DAO{
     
    /**
     * Buscar uma categoria por ID
     * @param type $id
     * @return \Exception|\Banner
     */
    public function BuscarPorID($id) {

        $categoria = new Categoria();

        try {

            $query = $this->db->query(
                    "SELECT * FROM categoria WHERE id = ? LIMIT 1", array($id)
            );

            foreach ($query->fetchAll() as $value) {
                $categoria->ToObject($value);                
            }
            
        } catch (Exception $ex) {            
            return $ex;           
        }

        return $categoria;
    }

   /**
     * 
     * @return \Exception|\ArrayObject
     */
    public function BuscarTodos() {

        $lista = new ArrayObject();

        try {

            $query = $this->db->query("SELECT * FROM categoria ORDER BY id DESC");

            foreach ($query->fetchAll() as $value) {

                $categoria = new Categoria();
                
                $categoria->ToObject($value);

                $lista->append($categoria);
            }
            
        } catch (Exception $ex) {            
            return $ex;           
        }

        return $lista;
    }
    
    
    /**
     * 
     * @return \Exception|\ArrayObject
     */
    public function BuscarTodosAtivos() {

        $lista = new ArrayObject();

        try {

            $query = $this->db->query("SELECT * FROM categoria WHERE ativo = 'S' ORDER BY id DESC");

            foreach ($query->fetchAll() as $value) {

                $categoria = new Categoria();
                
                $categoria->ToObject($value);

                $lista->append($categoria);
            }
            
        } catch (Exception $ex) {            
            return $ex;           
        }

        return $lista;
    }
    
}
